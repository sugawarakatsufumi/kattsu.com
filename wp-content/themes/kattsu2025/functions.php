<?php

function custom_template_part_shortcode( $atts ) {
  $atts = shortcode_atts(
    array(
      'slug' => '', // 必須: テンプレートファイルのスラッグ (例: 'content')
      'name' => null,
      'args' => array(),
    ),
    $atts,
    'snippet'
  );
  // JSON文字列 → 配列変換
  if ( is_string( $atts['args'] ) ) {
    $decoded = json_decode( wp_unslash( $atts['args'] ), true );
    if ( JSON_ERROR_NONE === json_last_error() && is_array( $decoded ) ) {
      $atts['args'] = $decoded;
    } else {
      $atts['args'] = array();
    }
  }
  if ( empty( $atts['slug'] ) ) {
    return '';
  }
  ob_start();
  get_template_part( 
    $atts['slug'], 
    $atts['name'], 
    $atts['args'] 
  );
  $output = ob_get_clean();
  return $output;
}
add_shortcode( 'snippet', 'custom_template_part_shortcode' );

function years_since_2009_shortcode() {
  return date('Y') - 2009;
}
add_shortcode('years_since_2009', 'years_since_2009_shortcode');

function disable_wpautop_for_specific_post_type($content) {
  if (get_post_type() === 'page') {
    remove_filter('the_content', 'wpautop');
  }
  return $content;
}
add_filter('the_content', 'disable_wpautop_for_specific_post_type', 9);

function enqueue_block_library_css() {
  wp_enqueue_style('wp-block-library-orgn', includes_url('css/dist/block-library/style.min.css'),array(), null);
  wp_enqueue_style('wp-style-orgn', get_template_directory_uri() . '/style.css',array(), null);
}
add_action('wp_enqueue_scripts', 'enqueue_block_library_css');

add_filter( 'big_image_size_threshold', '__return_false' );

//オーサーページを無効化
function disable_author_archive() {
  if( preg_match( '#/author/.+#', $_SERVER['REQUEST_URI'] ) ){
    wp_redirect( esc_url( home_url( '/404.php' ) ) );
    exit;
  }
}
add_action('init', 'disable_author_archive');
add_filter( 'author_rewrite_rules', '__return_empty_array' );