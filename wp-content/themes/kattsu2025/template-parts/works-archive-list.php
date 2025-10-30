<?php
$paged = isset($_GET['paged']) ? intval($_GET['paged']) : 1;
$query = new WP_Query(array(
  'post_type' => 'works',
  'posts_per_page' => isset($args['posts_per_page']) ? intval($args['posts_per_page']) : 6,
  'post_status' => 'publish',
  'paged' => $paged,
));
?>
<?php if ( $query->have_posts() ) : ?>
  <ul class="works-list">
  <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <li>
        <?php get_template_part('template-parts/works-archive-list-item'); ?>
      </li>
  <?php endwhile; wp_reset_postdata(); ?>
  </ul>
<?php endif; ?>
