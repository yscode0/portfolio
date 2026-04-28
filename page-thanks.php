<?php get_header(); ?>
    <section class="p-thanks">
      <div class="l-inner">
        <div class="p-thanks__content">
          <p class="p-thanks__label dm-mono">thank you</p>
          <h1 class="p-thanks__title cormorant-garamond">
            お問い合わせ<br>
            ありがとうございます
          </h1>
          <p class="c-text">
            お問い合わせを受け付けました。<br>
            内容を確認のうえ、2営業日以内にご返信いたします。<br>
            しばらくお待ちください。
          </p>
          <div class="p-thanks__nav">
            <a class="p-thanks__nav-link dm-mono" href="<?php echo esc_url(home_url('/')); ?>">
              トップへ戻る
            </a>
            <a class="p-thanks__nav-link dm-mono" href="<?php echo esc_url(home_url('/works')); ?>">
              実績を見る
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>
<?php get_footer(); ?>