<?php get_header(); ?>
<?php if(is_tax('works-cat') || is_tax('works-tag')): ?>
  <section class="works lower-works" id="works">
    <div class="works-inner ka2-container">
      <p class="works-msg">制作会社を選ぶ決め手は、何より「実績」。 代表も他社をチェックする場合は実績が中心です。 <br>当社は、公開許可を得た案件だけを掲載し、透明性を徹底しています！</p>
      <?php get_template_part( 'template-parts/works-tags-cats-menu' ); ?>
      <ul class="works-list">
      <?php if (have_posts()): ?>
        <?php while (have_posts()) : the_post(); ?>
          <li><?php get_template_part('template-parts/works-archive-list-item'); ?></li>
        <?php endwhile; ?>
      <?php endif; ?>
      </ul>
    </div>
  </section>
<?php elseif(is_404()): ?>
  <section class="">
    <div class="ka2-container" style="text-align:center;">
      <p><br>申し訳ございません。お探しのページは見つかりませんでした。<br>このページは移動したか、すでに削除された可能性があります。</p>
    </div>
    <nav class="contents-nav ka2-container">
      <a href="/" class="contents-nav-back">トップに戻る <i class="bi bi-arrow-right"></i></a>
    </nav>
  </section>
<?php endif; ?>
<?php get_footer(); ?>
