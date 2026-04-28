<!-- フッター -->
  <footer class="l-footer">
    <div class="l-inner">
      <div class="l-footer__content">
        <div class="c-site-title">
          <a class="c-site-title__link dm-mono" href="<?php echo esc_url(home_url('/')); ?>">
            yosh<span class="u-accent">i</span> code
          </a>
        </div>
        <nav class="l-footer__nav">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'footer_menu',
            'container'      => false,
            'menu_class'     => 'l-footer__menu',
            'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
            'walker'         => new Footer_Menu_Walker(),
          ));
          ?>
        </nav>
      </div>
      <div class="l-footer__privacy">
        <a class="l-footer__privacy-link dm-mono" href="<?php echo esc_url(home_url('/privacy')); ?>">
          Privacy Policy
        </a>
      </div>
    </div>
    <div class="l-footer__copyright">
      <p class="l-footer__copyright-text">
        Copyright <?php echo esc_html(date('Y')); ?> Yoshi Code
      </p>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>