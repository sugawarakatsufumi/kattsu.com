<?php get_header(); ?>
<?php 
  $thumbPc = get_field('screenshot_pc_thumb');
  $thumbSp = get_field('screenshot_sp_thumb');
  $workstags = get_the_terms( get_the_ID(), 'works-tag' );
  $workscats = get_the_terms( get_the_ID(), 'works-cat' );
  $dtpFlg = in_array( 'dtp', wp_list_pluck( $workscats, 'slug' ) );
?>
<section class="works-detail ka2-container">
  <div class="works-detail-inner">
    <figure class="works-detail-eyecatch <?php if ($dtpFlg) echo 'cat-dtp'; ?>">
      <div class="works-detail-eyecatch-pc-img">
        <img src="<?php echo $thumbPc["sizes"]["medium_large"]; ?>" alt="<?php echo get_the_title(); ?> イメージ">
      </div>
      <?php if (!$dtpFlg): ?>
        <div class="works-detail-eyecatch-sp-img">
          <img src="<?php echo $thumbSp["sizes"]["medium_large"]; ?>" alt="<?php echo get_the_title(); ?> イメージ スマホ表示">
        </div>
      <?php endif; ?>
      <button data-modaal-content-source="#screenshot-pc" class="modaal works-detail-eyecatch-pc-zoom-btn">　</button>
      <button data-modaal-content-source="#screenshot-sp" class="modaal works-detail-eyecatch-sp-zoom-btn">　</button>
    </figure>
    <div id="screenshot-pc" style="display:none">
      <figure style="text-align:center"><img src="https://mercart.jp/cms/images/contents/19/pris_cap_pc.jpg" style="width:100%"></figure>
    </div>
    <div id="screenshot-sp" style="display:none">かきくけこ</div>
    <p class="works-detail-zoom-msg"><i class="bi bi-zoom-in"></i>クリックでサイトキャプチャを表示できます</p>
    <section class="detail-contents-main">
      <?php the_content(); ?>
    </section>
    <section class="detail-contents-meta">
      <ul class="cat-list">
        <?php foreach ( $workscats as $workscat ): ?>
          <li class="cat-list-item"><a href="<?php echo get_term_link($workscat); ?>" class="cat-list-item-tag"><i class="bi bi-folder"></i>&nbsp;<?php echo $workscat->name; ?></a></li>
        <?php endforeach; ?>
        <?php foreach ( $workstags as $workstag ): ?>
          <li class="cat-list-item"><a href="<?php echo get_term_link($workstag); ?>" class="cat-list-item-tag">#<?php echo $workstag->name; ?></a></li>
        <?php endforeach; ?>
      </ul>
      <div class="meta-date">
        <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="posted-date">
          公開日 <?php echo get_the_date(); ?>
        </time>
      </div>
    </section>
  </div>
</section>
<nav class="contents-nav ka2-container">
  <a href="/works/" class="contents-nav-back">事例一覧に戻る <i class="bi bi-arrow-right"></i></a>
</nav>
<?php get_footer(); ?>
