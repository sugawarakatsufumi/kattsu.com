<?php
$paged = isset($_GET['paged']) ? intval($_GET['paged']) : 1;
$query = new WP_Query(array(
  'post_type' => 'works',
  'posts_per_page' => isset($args['posts_per_page']) ? intval($args['posts_per_page']) : -1,
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
  <?php if(!is_front_page()): ?>
  <div class="works-cta">
    <p class="works-cta-msg">他にもこちらで公開できない事例が多数ございます。<br>まずは気軽にご連絡ください。</p>
    <div class="works-cta-buttons">
      <a href="/inquiry/" class="works-cta-btn works-cta-btn-primary">お問い合わせ</a>
    </div>
  </div>
  <?php endif; ?>
<?php endif; ?>
