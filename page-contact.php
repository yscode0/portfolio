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
            <?php echo do_shortcode('[contact-form-7 id="d80dd61" title="お問い合わせ"]'); ?>
          </div>
          <!-- <div class="p-contact__form-content">
            <form class="p-contact__form" action="#" method="post">

              <div class="p-contact__field">
                <label class="p-contact__label dm-mono" for="name">
                  name
                  <span class="p-contact__required dm-mono">required</span>
                </label>
                <input
                  class="p-contact__input js-hover"
                  type="text"
                  id="name"
                  name="name"
                  placeholder="山田 太郎"
                  required
                >
              </div>

              <div class="p-contact__field">
                <label class="p-contact__label dm-mono" for="company">
                  company
                  <span class="p-contact__optional dm-mono">optional</span>
                </label>
                <input
                  class="p-contact__input js-hover"
                  type="text"
                  id="company"
                  name="company"
                  placeholder="株式会社〇〇"
                >
              </div>

              <div class="p-contact__field">
                <label class="p-contact__label dm-mono" for="email">
                  email
                  <span class="p-contact__required dm-mono">required</span>
                </label>
                <input
                  class="p-contact__input js-hover"
                  type="email"
                  id="email"
                  name="email"
                  placeholder="example@mail.com"
                  required
                >
              </div>

              <div class="p-contact__field">
                <label class="p-contact__label dm-mono" for="type">
                  type
                  <span class="p-contact__required dm-mono">required</span>
                </label>
                <div class="p-contact__select-wrap">
                  <select
                    class="p-contact__select js-hover"
                    id="type"
                    name="type"
                    required
                  >
                    <option value="" disabled selected>お問い合わせ種別を選択してください</option>
                    <option value="coding">コーディング依頼</option>
                    <option value="wordpress">WordPress構築依頼</option>
                    <option value="fix">修正・改修依頼</option>
                    <option value="other">その他</option>
                  </select>
                </div>
              </div>

              <div class="p-contact__field">
                <label class="p-contact__label dm-mono" for="message">
                  message
                  <span class="p-contact__required dm-mono">required</span>
                </label>
                <textarea
                  class="p-contact__textarea js-hover"
                  id="message"
                  name="message"
                  placeholder="案件の概要・納期・ご予算などをお聞かせいただけるとスムーズです。"
                  rows="8"
                  required
                ></textarea>
              </div>

              <div class="p-contact__privacy">
                <label class="p-contact__privacy-label">
                  <input class="p-contact__privacy-check js-hover" type="checkbox" name="privacy" required>
                  <span class="p-contact__privacy-text dm-mono">
                    <a class="p-contact__privacy-link" href="<?php echo esc_url(home_url('/privacy')); ?>" target="_blank" rel="noopener noreferrer">プライバシーポリシー</a>に同意する
                  </span>
                </label>
              </div>

              <div class="p-contact__submit">
                <button class="p-contact__submit-btn dm-mono" type="submit">
                  Send Message
                </button>
              </div>
              
            </form>
          </div> -->
        </div>
      </div>
    </section>

  </main>
<?php get_footer(); ?>