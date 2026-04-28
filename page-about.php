<?php get_header(); ?>

    <!-- ページヘッダー -->
    <section class="l-page-header js-mv">
      <div class="l-inner">
        <div class="l-page-header__content">
          <h1 class="l-page-header__title cormorant-garamond">
            about
            <span class="u-accent">me</span>
          </h1>
        </div>
        <!-- パンくずリスト -->
        <?php breadcrumb(); ?>
      </div>
    </section>

    <!-- プロフィール -->
    <section class="p-about">
      <div class="l-inner">
        <div class="p-about__profile">
          <figure class="p-about__img u-fade-up js-fade">
            <img src="<?php echo get_theme_file_uri('/asset/images/yoshi.webp') ?>" alt="田中 克規" loading="lazy">
            <figcaption class="p-about__caption">
              <p class="p-about__name dm-mono">
                Yosh<span class="u-accent">i</span>nori Tanaka
              </p>
              <p class="p-about__role dm-mono">
                Web Coder
              </p>
            </figcaption>
          </figure>
          <div class="p-about__info u-fade-up js-fade">
            <h2 class="c-title__page dm-mono">Profile</h2>
            <div class="p-about__info-texts">
              <p class="c-text">
                フリーランスのWebコーダーとして活動している田中克規です。
              </p>
              <p class="c-text">
                HTML / CSS / JavaScript を中心に、WordPress構築まで対応しています。デザインの意図を汲み取りながら、BEM設計や保守性を意識したコーディングを心がけています。
              </p>
              <p class="c-text">
                制作会社様のコーディングパートナーとして、スピードと品質の両立を意識しながら丁寧な実装を行っています。コミュニケーションを大切にし、長くお付き合いいただけるパートナーを目指しています。
              </p>
            </div>
            <dl class="p-about__meta">
              <dt class="p-about__term dm-mono">name</dt>
              <dd class="p-about__desc">田中 克規（Yoshinori Tanaka）</dd>
              <dt class="p-about__term dm-mono">base</dt>
              <dd class="p-about__desc">大阪府</dd>
              <dt class="p-about__term dm-mono">works</dt>
              <dd class="p-about__desc">フリーランス Webコーダー</dd>
            </dl>
          </div>
        </div>
      </div>
    </section>

    <!-- スキル -->
    <section class="p-about__skill">
      <div class="l-inner">
        <h2 class="c-title cormorant-garamond">
          skill
          <span class="c-title__line"></span>
        </h2>
        <div class="p-about__skill-content">
          <ul class="p-about__skill-list">
            <li class="p-about__skill-item u-fade-up js-fade js-hover">
              <div class="p-about__skill-card">
                <span class="p-about__skill-num dm-mono">01</span>
                <h3 class="p-about__skill-title dm-mono">HTML / CSS</h3>
                <p class="c-text">
                  セマンティックなHTML構造とBEM設計を基本に、保守性・可読性の高いコーディングを行います。SCSSを用いた効率的なスタイル管理にも対応しています。
                </p>
              </div>
            </li>
            <li class="p-about__skill-item u-fade-up js-fade js-hover">
              <div class="p-about__skill-card">
                <span class="p-about__skill-num dm-mono">02</span>
                <h3 class="p-about__skill-title dm-mono">JavaScript</h3>
                <p class="c-text">
                  バニラJSによるインタラクション実装を得意としています。スクロールアニメーションやモーダル、スライダーなど、UXを高める機能の実装に対応します。
                </p>
              </div>
            </li>
            <li class="p-about__skill-item u-fade-up js-fade js-hover">
              <div class="p-about__skill-card">
                <span class="p-about__skill-num dm-mono">03</span>
                <h3 class="p-about__skill-title dm-mono">WordPress</h3>
                <p class="c-text">
                  オリジナルテーマの構築からカスタムフィールド・カスタム投稿タイプの実装まで対応。クライアントが更新しやすい設計を意識して構築します。
                </p>
              </div>
            </li>
            <li class="p-about__skill-item u-fade-up js-fade js-hover">
              <div class="p-about__skill-card">
                <span class="p-about__skill-num dm-mono">04</span>
                <h3 class="p-about__skill-title dm-mono">Figma</h3>
                <p class="c-text">
                  デザインカンプの読み取りはもちろん、簡単なデザイン修正や素材の書き出しも対応可能です。デザイナーとのスムーズな連携を意識しています。
                </p>
              </div>
            </li>
          </ul>
        </div>

        <!-- スキルタグ -->
        <div class="p-about__skill-tags u-fade-up js-fade">
          <ul class="c-skill-tag__list">
            <li class="c-skill-tag__item dm-mono js-hover">HTML5</li>
            <li class="c-skill-tag__item dm-mono js-hover">CSS3</li>
            <li class="c-skill-tag__item dm-mono js-hover">Sass / SCSS</li>
            <li class="c-skill-tag__item dm-mono js-hover">JavaScript</li>
            <li class="c-skill-tag__item dm-mono js-hover">jQuery</li>
            <li class="c-skill-tag__item dm-mono js-hover">WordPress</li>
            <li class="c-skill-tag__item dm-mono js-hover">Figma</li>
            <li class="c-skill-tag__item dm-mono js-hover">Git / GitHub</li>
            <li class="c-skill-tag__item dm-mono js-hover">VSCode</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- 経歴 -->
    <section class="p-about__history">
      <div class="l-inner">
        <h2 class="c-title cormorant-garamond">
          history
          <span class="c-title__line"></span>
        </h2>
        <div class="p-about__history-content">
          <ol class="p-about__history-list">
            <li class="p-about__history-item u-fade-up js-fade">
              <span class="p-about__history-year dm-mono">2023.01</span>
              <div class="p-about__history-body">
                <h3 class="p-about__history-title">Web技術を体系的に学ぶ</h3>
                <p class="c-text">
                  HTML / CSS / JavaScript / PHP / Python / Java・データベース・Git など、
                  Web制作に必要な技術を体系的に学習。開発の基礎から実践的なスキルを習得する。
                </p>
              </div>
            </li>
            <li class="p-about__history-item u-fade-up js-fade">
              <span class="p-about__history-year dm-mono">2023.07</span>
              <div class="p-about__history-body">
                <h3 class="p-about__history-title">美容室・求人サイトの制作・運用を受託</h3>
                <p class="c-text">
                  美容室のWeb管理および新規求人サイトの制作を受託。
                  サイト設計から公開後の運用・更新まで一貫して担当し、現在も継続中。
                </p>
              </div>
            </li>
            <li class="p-about__history-item u-fade-up js-fade">
              <span class="p-about__history-year dm-mono">2024.10</span>
              <div class="p-about__history-body">
                <h3 class="p-about__history-title">Web制作案件の受注を開始</h3>
                <p class="c-text">
                  クラウドソーシングにてWeb制作案件の受注をスタート。
                  以降、継続的に依頼をいただき、コーポレートサイトや店舗サイトなど10数件を対応。
                </p>
              </div>
            </li>
            <li class="p-about__history-item u-fade-up js-fade">
              <span class="p-about__history-year dm-mono">2026</span>
              <div class="p-about__history-body">
                <h3 class="p-about__history-title">フリーランスWebコーダーとして活動中</h3>
                <p class="c-text">
                  これまでの実績を活かし、制作会社様のコーディングパートナーとして活動。
                  丁寧なコミュニケーションと安定した実装で、長くお付き合いいただけるパートナーを目指しています。
                </p>
              </div>
            </li>
          </ol>
        </div>
      </div>
    </section>
    <?php get_template_part('template-parts/cta'); ?>
  </main>

<?php get_footer(); ?>