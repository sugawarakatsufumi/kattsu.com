<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
  <meta name="format-detection" content="telephone=no">
  <meta name="theme-color" content="#ffffff">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&family=M+PLUS+Rounded+1c:wght@400;700;800&family=Zen+Kaku+Gothic+New&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.css">
  <link rel="stylesheet" href="/wp-includes/css/dist/block-library/style.min.css">
</head>
<body <?php body_class(); ?> >
<header class="header">
  <div  class="header-inner">
    <div class="header-logo">
      <h1 class="header-logo-img">
        <a href="/">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="カッツプロダクション ロゴ">
        </a>
      </h1>
    </div>
    <nav class="header-nav pc-only">
      <ul class="header-nav-list ">
        <li class="header-nav-item"><a href="/#service">出来ること</a></li>
        <li class="header-nav-item"><a href="/works">事例紹介</a></li>
        <li class="header-nav-item"><a href="/#about">事務所について</a></li>
        <li class="header-nav-item"><a href="/#office">事務所情報</a></li>
      </ul>
      <a href="/inquiry/" class="header-cta-button">お問い合わせ</a>
    </nav>
  </div><!--/.header-inner-->
</header>
<button class="header-sp-menu-btn sp-only">
  <span></span>
  <span></span>
  <span></span>
</button>

<div>
  <div class="header-sp-menu">
    <div class="header-sp-menu-content">
      <nav class="header-sp-nav">
        <ul class="header-sp-nav-list">
          <li class="header-sp-nav-item"><a href="#">代表プロフィール</a></li>
          <li class="header-sp-nav-item"><a href="/#service">出来ること</a></li>
          <li class="header-sp-nav-item"><a href="/#works">事例紹介</a></li>
          <li class="header-sp-nav-item"><a href="/#about">事務所について</a></li>
          <li class="header-sp-nav-item"><a href="#office">事務所情報</a></li>
          <li class="header-sp-nav-item"><a href="/inquiry/" class="header-sp-cta-button">お問い合わせ</a></li>
        </ul>
      </nav>
    </div>
  </div>
</div>
<?php if(is_front_page()): ?>
  <section class="kv">
    <p class="kv-msg">コミュニケーションはフランク<br><span class="kv-color-orange">品質は厳格</span>な<span class="kv-color-blue">Web屋</span></p>
  </section>
<?php else: ?>
  <?php if ( is_page() && get_field('lower_heading_html') ) : ?>
    <?php echo get_field('lower_heading_html'); ?>
  <?php elseif( is_single() ): ?>
    <section class="lower-head lower-works-detail-head">
      <h2 class="lower-head-ttl">
      <?php the_title(); ?>
    </h2>
    </section>
  <?php elseif( is_tax('works-cat') || is_tax('works-tag') ): ?>
    <section class="lower-head">
      <h2 class="lower-head-ttl">
        <span class="lower-head-ttl-en">WORKS</span>事例紹介<span class="lower-head-ttl-sub">(<?php single_cat_title(); ?>)</span>
      </h2>
    </section>
  <?php elseif( is_archive('') && $post_type=="works" ): ?>
    <section class="lower-head">
      <h2 class="lower-head-ttl">
        <span class="lower-head-ttl-en">WORKS</span><?php single_cat_title(); ?>事例紹介
      </h2>
    </section>
  <?php endif; ?>
<?php endif; ?>
<main class="main">
  <?php if(!is_front_page()): ?>
    <?php get_template_part('template-parts/pankz'); ?>
  <?php endif; ?>