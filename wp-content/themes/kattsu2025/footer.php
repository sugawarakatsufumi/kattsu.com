</main>
<footer class="footer">
  <nav class="footer-nav">
    <ul class="footer-nav-list ka2-container">
      <li class="footer-nav-item"><a href="/#service">出来ること</a></li>
      <li class="footer-nav-item"><a href="/#works">事例紹介</a></li>
      <li class="footer-nav-item"><a href="/#about">事務所について</a></li>
      <li class="footer-nav-item"><a href="/#office">事務所情報</a></li>
      <li class="footer-nav-item"><a href="/profile/">代表プロフィール</a></li>
      <li class="footer-nav-item"><a href="/privacy-policy/">プライバシーポリシー</a></li>
      <li class="footer-nav-item"><a href="/inquiry/" class="footer-cta-button">お問い合わせ</a></li>
    </ul>
  </nav>
  <div class="footer-copy">
    <div class="footer-copy-inner ka2-container">
      <a href="#" class="footer-copy-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-symbol.svg" alt="カッツプロダクション ロゴ フッター">
        <span>©カッツプロダクション All Rights Reserved.</span>
      </a>
    </div>
</footer>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins.js"></script>
<script>
$(function(){
  $('.header-sp-menu-btn').on('click', function(){
    $('.header-sp-menu-btn, .header-sp-menu').toggleClass('is-active');
  });
  $('.header-sp-menu a').on('click', function(){
    $('.header-sp-menu-btn, .header-sp-menu').removeClass('is-active');
  });
  $('form.form-main-form').validate({
    rules: {
      "名前": {
        required: true,
      },
      "Email": {
        required: true,
        email: true,
      },
      "お問い合わせ内容": {
        required: true,
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.insertAfter(element);
    }
  });
  $('.modaal').modaal({
    type: 'inline',
  });
});
</script>
<?php wp_footer(); ?>
</body>
</html>