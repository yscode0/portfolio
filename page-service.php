<?php get_header(); ?>

    <!-- ページヘッダー -->
    <section class="l-page-header js-mv">
      <div class="l-inner">
        <div class="l-page-header__content">
          <h1 class="l-page-header__title cormorant-garamond">
            service
            <span class="u-accent">menu</span>
          </h1>
        </div>
        <!-- パンくずリスト -->
        <?php breadcrumb(); ?>
      </div>
    </section>

    <!-- サービス一覧 -->
    <section class="p-service">
      <div class="l-inner">
        <ul class="p-service__list">
          <li id="coding" class="p-service__item u-fade-up js-fade">
            <div class="p-service__card">
              <div class="p-service__card-head">
                <span class="p-service__num dm-mono">01</span>
                <h2 class="p-service__title cormorant-garamond">Coding</h2>
              </div>
              <div class="p-service__card-body">
                <p class="c-text">
                  FigmaやXDなどのデザインカンプをもとに、HTML / CSS / JavaScriptでコーディングします。BEM設計と保守性を意識した実装で、納品後の運用・修正もしやすい構造を心がけています。
                </p>
                <ul class="p-service__detail-list">
                  <li class="p-service__detail-item dm-mono">デザインカンプからのコーディング</li>
                  <li class="p-service__detail-item dm-mono">レスポンシブ対応</li>
                  <li class="p-service__detail-item dm-mono">アニメーション・インタラクション実装</li>
                  <li class="p-service__detail-item dm-mono">SCSS / BEM設計</li>
                </ul>
              </div>
            </div>
          </li>
          <li id="wordpress" class="p-service__item u-fade-up js-fade">
            <div class="p-service__card">
              <div class="p-service__card-head">
                <span class="p-service__num dm-mono">02</span>
                <h2 class="p-service__title cormorant-garamond">WordPress</h2>
              </div>
              <div class="p-service__card-body">
                <p class="c-text">
                  オリジナルテーマの構築から、カスタムフィールド・カスタム投稿タイプの実装まで対応します。クライアントが更新しやすい設計を意識し、運用負荷を軽減する構築を行います。
                </p>
                <ul class="p-service__detail-list">
                  <li class="p-service__detail-item dm-mono">オリジナルテーマ構築</li>
                  <li class="p-service__detail-item dm-mono">カスタムフィールド実装</li>
                  <li class="p-service__detail-item dm-mono">カスタム投稿タイプ設定</li>
                  <li class="p-service__detail-item dm-mono">既存テーマのカスタマイズ</li>
                </ul>
              </div>
            </div>
          </li>
          <li id="sitefix" class="p-service__item u-fade-up js-fade">
            <div class="p-service__card">
              <div class="p-service__card-head">
                <span class="p-service__num dm-mono">03</span>
                <h2 class="p-service__title cormorant-garamond">Site Fix</h2>
              </div>
              <div class="p-service__card-body">
                <p class="c-text">
                  テキスト変更・レイアウト崩れの修正・機能追加など、既存サイトへの改修にも対応します。WordPressサイトの修正や、部分的なJavaScript実装なども承ります。
                </p>
                <ul class="p-service__detail-list">
                  <li class="p-service__detail-item dm-mono">テキスト・画像の変更</li>
                  <li class="p-service__detail-item dm-mono">レイアウト崩れの修正</li>
                  <li class="p-service__detail-item dm-mono">機能追加・改修</li>
                  <li class="p-service__detail-item dm-mono">表示速度の改善</li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </section>

    <!-- price -->
    <section class="p-service__price">
      <div class="l-inner">
        <h2 class="c-title cormorant-garamond">
          price
          <span class="c-title__line"></span>
        </h2>
        <p class="c-text p-service__price-read">
          以下はあくまで参考価格です。ページの複雑さや機能・工数によって変動しますので、まずはお気軽にご相談ください。
        </p>

        <div class="p-service__price-content">
          <ul class="p-service__price-list">
            <li class="p-service__price-item u-fade-up js-fade js-hover">
              <div class="p-service__price-card">
                <h3 class="p-service__price-title dm-mono">Coding</h3>
                <div class="p-service__price-info">
                  <p class="p-service__price-amount dm-mono">
                    ¥<span class="p-service__price-num">10,000</span><span class="p-service__price-unit">〜 / page</span>
                  </p>
                  <p class="c-text">
                    デザインカンプをもとにHTML / CSS / JavaScriptでコーディングします。レスポンシブ対応・アニメーション実装も対応可能です。
                  </p>
                </div>
              </div>
            </li>
            <li class="p-service__price-item u-fade-up js-fade js-hover">
              <div class="p-service__price-card">
                <h3 class="p-service__price-title dm-mono">WordPress</h3>
                <div class="p-service__price-info">
                  <p class="p-service__price-amount dm-mono">
                    ¥<span class="p-service__price-num">30,000</span><span class="p-service__price-unit">〜</span>
                  </p>
                  <p class="c-text">
                    オリジナルテーマ構築・カスタムフィールド実装など、更新しやすいWordPressサイトを構築します。
                  </p>
                </div>
              </div>
            </li>
            <li class="p-service__price-item u-fade-up js-fade js-hover">
              <div class="p-service__price-card">
                <h3 class="p-service__price-title dm-mono">Site Fix</h3>
                <div class="p-service__price-info">
                  <p class="p-service__price-amount dm-mono">
                    ¥<span class="p-service__price-num">5,000</span><span class="p-service__price-unit">〜</span>
                  </p>
                  <p class="c-text">
                    既存サイトのテキスト修正・レイアウト崩れの対応・機能追加など、部分的な改修にも対応します。
                  </p>
                </div>
              </div>
            </li>
          </ul>

          <p class="c-text p-service__price-note">
            ※表示価格はすべて税抜きの参考価格です。<br>
            ※案件の内容・ボリューム・納期によって変動します。詳細はお見積りにてご確認ください。
          </p>
        </div>
      </div>
    </section>

    <!-- 対応の流れ -->
    <section class="p-service__flow">
      <div class="l-inner">
        <h2 class="c-title cormorant-garamond">
          flow
          <span class="c-title__line"></span>
        </h2>
        <p class="c-text p-service__flow-read">
          ご依頼からお届けまでの流れをご説明します。
        </p>
        <ol class="p-service__flow-list">
          <li class="p-service__flow-item u-fade-up js-fade js-hover">
            <div class="p-service__flow-card">
              <span class="p-service__flow-num dm-mono">01</span>
              <h3 class="p-service__flow-title dm-mono">お問い合わせ</h3>
              <p class="c-text">
                まずはお気軽にお問い合わせフォームよりご連絡ください。案件の概要・納期・ご予算などをお聞かせいただければスムーズです。
              </p>
            </div>
          </li>
          <li class="p-service__flow-item u-fade-up js-fade js-hover">
            <div class="p-service__flow-card">
              <span class="p-service__flow-num dm-mono">02</span>
              <h3 class="p-service__flow-title dm-mono">ヒアリング・お見積り</h3>
              <p class="c-text">
                ご要件を詳しくお聞きし、お見積りをご提示します。デザインカンプやワイヤーフレームがあればご共有ください。
              </p>
            </div>
          </li>
          <li class="p-service__flow-item u-fade-up js-fade js-hover">
            <div class="p-service__flow-card">
              <span class="p-service__flow-num dm-mono">03</span>
              <h3 class="p-service__flow-title dm-mono">制作・実装</h3>
              <p class="c-text">
                ご発注後、制作をスタートします。進捗はこまめに共有し、認識のズレが生じないよう丁寧にコミュニケーションをとりながら進めます。
              </p>
            </div>
          </li>
          <li class="p-service__flow-item u-fade-up js-fade js-hover">
            <div class="p-service__flow-card">
              <span class="p-service__flow-num dm-mono">04</span>
              <h3 class="p-service__flow-title dm-mono">確認・修正</h3>
              <p class="c-text">
                納品前に確認いただき、修正がある場合は対応します。細部までご確認いただけるよう、丁寧にフィードバックをお待ちしています。
              </p>
            </div>
          </li>
          <li class="p-service__flow-item u-fade-up js-fade js-hover">
            <div class="p-service__flow-card">
              <span class="p-service__flow-num dm-mono">05</span>
              <h3 class="p-service__flow-title dm-mono">納品</h3>
              <p class="c-text">
                最終確認後、納品となります。納品後も気になる点があればお気軽にご相談ください。
              </p>
            </div>
          </li>
        </ol>
      </div>
    </section>

    <!-- よくある質問 -->
    <section class="p-service__faq">
      <div class="l-inner">
        <h2 class="c-title cormorant-garamond">
          faq
          <span class="c-title__line"></span>
        </h2>
        <dl class="p-service__faq-list">
          <div class="p-service__faq-item u-fade-up js-fade">
            <dt class="p-service__faq-q">
              <button class="p-service__faq-button dm-mono js-accordion-trigger js-hover" type="button" aria-expanded="false" aria-controls="faq-answer-1">
                <span>デザインなしでも依頼できますか？</span>
                <span class="p-service__faq-icon" aria-hidden="true"></span>
              </button>
            </dt>
            <dd class="p-service__faq-a" id="faq-answer-1">
              <p class="c-text">
                基本的にはデザインカンプ（FigmaやXDなど）をご用意いただいた上でのコーディングが中心となります。デザインの用意が難しい場合はご相談ください。
              </p>
            </dd>
          </div>
          <div class="p-service__faq-item u-fade-up js-fade">
            <dt class="p-service__faq-q">
              <button class="p-service__faq-button dm-mono js-accordion-trigger js-hover" type="button" aria-expanded="false" aria-controls="faq-answer-2">
                <span>納期はどのくらいですか？</span>
                <span class="p-service__faq-icon" aria-hidden="true"></span>
              </button>
            </dt>
            <dd class="p-service__faq-a" id="faq-answer-2">
              <p class="c-text">
                案件の規模や内容によって異なります。まずはお問い合わせいただき、ご要件をお聞かせください。可能な限りご希望の納期に沿えるよう対応いたします。
              </p>
            </dd>
          </div>
          <div class="p-service__faq-item u-fade-up js-fade">
            <dt class="p-service__faq-q">
              <button class="p-service__faq-button dm-mono js-accordion-trigger js-hover" type="button" aria-expanded="false" aria-controls="faq-answer-3">
                <span>修正対応はしてもらえますか？</span>
                <span class="p-service__faq-icon" aria-hidden="true"></span>
              </button>
            </dt>
            <dd class="p-service__faq-a" id="faq-answer-3">
              <p class="c-text">
                納品前の修正は対応しております。納品後の追加修正については、内容に応じて別途ご相談させていただく場合があります。
              </p>
            </dd>
          </div>
          <div class="p-service__faq-item u-fade-up js-fade">
            <dt class="p-service__faq-q">
              <button class="p-service__faq-button dm-mono js-accordion-trigger js-hover" type="button" aria-expanded="false" aria-controls="faq-answer-4">
                <span>制作会社からのコーディング依頼は受けていますか？</span>
                <span class="p-service__faq-icon" aria-hidden="true"></span>
              </button>
            </dt>
            <dd class="p-service__faq-a" id="faq-answer-4">
              <p class="c-text">
                はい、制作会社様のコーディングパートナーとしての対応を歓迎しています。継続的なお取引も大歓迎ですので、お気軽にご相談ください。
              </p>
            </dd>
          </div>
        </dl>
      </div>
    </section>
    <?php get_template_part('template-parts/cta'); ?>
  </main>
<?php get_footer(); ?>
