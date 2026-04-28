<?php get_header(); ?>

    <!-- ページヘッダー -->
    <section class="l-page-header js-mv">
      <div class="l-inner">
        <div class="l-page-header__content">
          <h1 class="l-page-header__title cormorant-garamond">
            privacy
            <span class="u-accent">policy</span>
          </h1>
        </div>
        <!-- パンくずリスト -->
        <?php breadcrumb(); ?>
      </div>
    </section>

    <!-- プライバシーポリシー本文 -->
    <section class="p-privacy">
      <div class="l-inner">
        <div class="p-privacy__content">

          <p class="c-text p-privacy__lead">
            田中 克規（以下、「当方」）は、本ウェブサイト（以下、「本サイト」）における個人情報の取り扱いについて、以下のとおりプライバシーポリシーを定めます。
          </p>

          <div class="p-privacy__block">
            <h2 class="p-privacy__title dm-mono">01. 取得する情報</h2>
            <div class="p-privacy__info">
              <p class="c-text">
                本サイトのお問い合わせフォームにてご連絡いただく際に、以下の情報を取得します。
              </p>
              <ul class="p-privacy__list">
                <li class="p-privacy__list-item">お名前</li>
                <li class="p-privacy__list-item">会社名・屋号（任意）</li>
                <li class="p-privacy__list-item">メールアドレス</li>
                <li class="p-privacy__list-item">お問い合わせ内容</li>
              </ul>
            </div>
          </div>

          <div class="p-privacy__block">
            <h2 class="p-privacy__title dm-mono">02. 利用目的</h2>
            <div class="p-privacy__info">
              <p class="c-text">
                取得した個人情報は、以下の目的のみに利用します。
              </p>
              <ul class="p-privacy__list">
                <li class="p-privacy__list-item">お問い合わせへの回答・連絡</li>
                <li class="p-privacy__list-item">業務上のご連絡・情報提供</li>
              </ul>
            </div>
          </div>

          <div class="p-privacy__block">
            <h2 class="p-privacy__title dm-mono">03. 第三者への提供</h2>
            <div class="p-privacy__info">
              <p class="c-text">
                取得した個人情報は、法令に基づく場合を除き、ご本人の同意なく第三者に提供・開示することはありません。
              </p>
            </div>
          </div>

          <div class="p-privacy__block">
            <h2 class="p-privacy__title dm-mono">04. 安全管理</h2>
            <div class="p-privacy__info">
              <p class="c-text">
                取得した個人情報は、不正アクセス・紛失・漏洩等が生じないよう、適切な安全管理に努めます。
              </p>
            </div>
          </div>

          <div class="p-privacy__block">
            <h2 class="p-privacy__title dm-mono">05. Cookieの使用</h2>
            <div class="p-privacy__info">
              <p class="c-text">
                本サイトでは、アクセス解析のためにGoogle Analyticsを使用しています。Google Analyticsはデータ収集のためにCookieを使用しますが、個人を特定する情報は含まれません。収集されたデータはGoogleのプライバシーポリシーに基づいて管理されます。
              </p>
              <p class="c-text">
                ブラウザの設定によりCookieを無効にすることができますが、一部の機能が利用できなくなる場合があります。
              </p>
            </div>
          </div>

          <div class="p-privacy__block">
            <h2 class="p-privacy__title dm-mono">06. 個人情報の開示・訂正・削除</h2>
            <div class="p-privacy__info">
              <p class="c-text">
                ご本人からの個人情報の開示・訂正・削除のご要望については、お問い合わせフォームよりご連絡ください。本人確認のうえ、速やかに対応いたします。
              </p>
            </div>
          </div>

          <div class="p-privacy__block">
            <h2 class="p-privacy__title dm-mono">07. プライバシーポリシーの変更</h2>
            <div class="p-privacy__info">
              <p class="c-text">
                本プライバシーポリシーは、必要に応じて変更する場合があります。変更後のポリシーは本ページにて掲載します。
              </p>
            </div>
          </div>

          <div class="p-privacy__block">
            <h2 class="p-privacy__title dm-mono">08. お問い合わせ</h2>
            <div class="p-privacy__info">
              <p class="c-text">
                本プライバシーポリシーに関するお問い合わせは、<a class="p-privacy__link" href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせフォーム</a>よりご連絡ください。
              </p>
            </div>
          </div>

          <p class="p-privacy__date dm-mono">2026.04.01 制定</p>

        </div>
      </div>
    </section>

  </main>
<?php get_footer(); ?>