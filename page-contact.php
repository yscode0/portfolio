<?php get_header(); ?>

    <!-- ページヘッダー -->
    <section class="l-page-header js-mv">
      <div class="l-inner">
        <div class="l-page-header__content">
          <h1 class="l-page-header__title cormorant-garamond">
            get in
            <span class="u-accent">touch</span>
          </h1>
        </div>
        <!-- パンくずリスト -->
        <?php breadcrumb(); ?>
      </div>
    </section>

    <!-- コンタクト -->
    <section class="p-contact">
      <div class="l-inner">
        <div class="p-contact__content">

          <!-- リード文 -->
          <div class="p-contact__lead">
            <p class="c-text">
              制作のご依頼・ご相談はお気軽にどうぞ。<br>
              2営業日以内にご返信いたします。
            </p>
          </div>

          <!-- フォーム -->
           <!-- 動作確認用 -->
          <div class="p-contact__form-content">
            <?php echo do_shortcode('[contact-form-7 id="a9b10a6" title="お問い合わせ"]'); ?>
          </div>
        </div>
      </div>
    </section>

  </main>
<?php get_footer(); ?>