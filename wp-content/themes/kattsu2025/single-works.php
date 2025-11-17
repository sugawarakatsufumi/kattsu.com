<?php get_header(); ?>
<?php 
  $thumbPc = get_field('screenshot_pc_thumb');
  $thumbSp = get_field('screenshot_sp_thumb');
  $screenshotPc = get_field('screenshot_pc');
  $screenshotSp = get_field('screenshot_sp');
  $workstags = get_the_terms( get_the_ID(), 'works-tag' );
  $workscats = get_the_terms( get_the_ID(), 'works-cat' );
  $dtpFlg = in_array( 'dtp', wp_list_pluck( $workscats, 'slug' ) );
  $screenshotPcOnly = get_field('screenshot_pc_only');
?>
<section class="works-detail ka2-container">
  <div class="works-detail-inner">
    <figure class="works-detail-eyecatch <?php if ($screenshotPcOnly) echo 'cat-dtp'; ?>">
      <div class="works-detail-eyecatch-pc-img">
        <img src="<?php echo $thumbPc["sizes"]["medium_large"]; ?>" alt="<?php echo get_the_title(); ?> イメージ">
      </div>
      <?php if (!$screenshotPcOnly): ?>
        <div class="works-detail-eyecatch-sp-img">
          <img src="<?php echo $thumbSp["sizes"]["medium_large"]; ?>" alt="<?php echo get_the_title(); ?> イメージ スマホ表示">
        </div>
      <?php endif; ?>
      <?php if ($screenshotPc): ?>
        <button data-modaal-content-source="#screenshot-pc" class="modaal works-detail-eyecatch-pc-zoom-btn">　</button>
        <div id="screenshot-pc" style="display:none">
          <figure style="text-align:center"><img src="<?php echo $screenshotPc["url"]; ?>" style="width:100%"></figure>
        </div>
      <?php endif; ?>
      <?php if (!$screenshotPcOnly && $screenshotSp): ?>
        <button data-modaal-content-source="#screenshot-sp" class="modaal works-detail-eyecatch-sp-zoom-btn">　</button>
        <div id="screenshot-sp" style="display:none">
          <figure style="text-align:center"><img src="<?php echo $screenshotSp["url"]; ?>" style="max-width:100%;width:375px"></figure>
        </div>
      <?php endif; ?>
    </figure>
    <p class="works-detail-zoom-msg">
      <?php if($screenshotPc || $screenshotSp): ?>
      <i class="bi bi-zoom-in"></i>クリックでサイトキャプチャを表示できます
      <?php endif; ?>
    </p>
    <section class="detail-contents-main">
      <?php
       //$titleStr = get_field('front_title') ? get_field('front_title') : get_the_title();
      ?>
      <?php if( get_field('front_title') ): ?>
        <h1 class="detail-contents-title"><?php echo get_the_title(); ?></h1>
      <?php endif; ?>
      <?php the_content(); ?>
      <?php echo get_post_field( 'post_content', 189 ); ?> 
    </section>
    <section class="detail-contents-meta">
      <ul class="cat-list">
        <?php foreach ( $workscats as $workscat ): ?>
          <li class="cat-list-item"><a href="<?php echo get_term_link($workscat); ?>#works-cat-list" class="cat-list-item-tag"><i class="bi bi-folder"></i>&nbsp;<?php echo $workscat->name; ?></a></li>
        <?php endforeach; ?>
        <?php foreach ( $workstags as $workstag ): ?>
          <li class="cat-list-item"><a href="<?php echo get_term_link($workstag); ?>#works-cat-list" class="cat-list-item-tag">#<?php echo $workstag->name; ?></a></li>
        <?php endforeach; ?>
      </ul>
      <div class="meta-date">
        <!--<time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="posted-date">
          公開日 <?php echo get_the_date(); ?>
        </time>-->
      </div>
    </section>
  </div>
</section>
<nav class="contents-nav ka2-container">
  <a href="/works/" class="contents-nav-back">事例一覧に戻る <i class="bi bi-arrow-right"></i></a>
</nav>
<?php get_footer(); ?>