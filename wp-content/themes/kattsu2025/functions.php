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

remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

function enqueue_block_library_css() {
  wp_enqueue_style(
    'wp-block-library', // ハンドル名
    includes_url('css/dist/block-library/style.min.css'), // パス
    array(), // 依存関係
    null // バージョン
  );
}
add_action('wp_enqueue_scripts', 'enqueue_block_library_css');

add_filter( 'big_image_size_threshold', '__return_false' );