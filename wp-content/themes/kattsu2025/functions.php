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