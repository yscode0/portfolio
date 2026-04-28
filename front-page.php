<?php get_header(); ?>

    <!-- メインビジュアル -->
    <section class="p-mv js-mv">
      <div class="p-mv__content">
        <h1 class="p-mv__title cormorant-garamond">
          <span class="p-mv__title-label">Frontend Developer</span>
          yosh<span class="u-accent">i</span>nori<br>
          tanaka
        </h1>
        <p class="p-mv__text dm-mono">
          あなたの“伝えたい”を<br>
          確かな技術で形にするコーディングパートナー
        </p>
        <div class="p-mv__cta">
          <p class="p-mv__cta-text dm-mono">
            制作会社様のコーディングパートナーとして<br>
            HTML / CSS / JavaScript / WordPressの<br>
            コーディング業務をサポートします
          </p>
          <div class="c-button">
            <a class="c-button__link" href="<?php echo esc_url(home_url('/contact')); ?>">
              お問い合わせ
            </a>
          </div>
        </div>
      </div>
    </section>
    
    <!-- works -->
    <section class="p-top__works">
      <div class="l-inner">
        <h2 class="c-title cormorant-garamond">
          selected
          <span class="u-accent">works</span>
          <span class="c-title__line"></span>
        </h2>
        <p class="c-text p-top__works-read">
          これまで制作・コーディングを担当したサイトの一部をご紹介します。
        </p>
        <div class="p-top__works-content">
          <ul class="c-works__list">
            <?php
            $top_works = new WP_Query(array(
              'post_type'      => 'works',
              'posts_per_page' => 3,
              'meta_query'     => array(
                array(
                  'key'     => 'is_top',
                  'value'   => '1',
                  'compare' => 'LIKE',
                ),
              ),
            ));

            if ($top_works->have_posts()) :
              while ($top_works->have_posts()) : $top_works->the_post();
                $works_role        = get_field('works_role');
                $works_tech        = get_field('works_tech');
                $pc_img            = get_field('works_pc_img');
                $works_description = get_field('works_description');
            ?>
            <li class="c-works__item u-fade-up js-fade">
              <article class="c-works__card">
                <a class="c-works__link" href="<?php echo esc_url(get_permalink()); ?>">
                  <span class="c-works__arrow"></span>
                  <figure class="c-works__img">
                    <?php if ($pc_img) : ?>
                    <img src="<?php echo esc_url($pc_img['url']); ?>" alt="<?php echo esc_attr($pc_img['alt']); ?>" loading="lazy" width="413" height="239">
                    <?php endif; ?>
                  </figure>
                  <h3 class="c-works__title dm-mono"><?php echo esc_html(get_the_title()); ?></h3>
                  <p class="c-works__text">
                    <?php echo nl2br(esc_html($works_description)); ?>
                  </p>
                  <dl class="c-works__meta">
                    <?php if ($works_role) : ?>
                    <dt class="c-works__term dm-mono">role</dt>
                    <dd class="c-works__desc">
                      <ul class="c-works__tag-list">
                        <?php foreach ($works_role as $role) : ?>
                        <li class="c-works__tag-item dm-mono"><?php echo esc_html($role); ?></li>
                        <?php endforeach; ?>
                      </ul>
                    </dd>
                    <?php endif; ?>
                    <?php if ($works_tech) : ?>
                    <dt class="c-works__term dm-mono">tech</dt>
                    <dd class="c-works__desc">
                      <ul class="c-works__tag-list">
                        <?php foreach ($works_tech as $tech) : ?>
                        <li class="c-works__tag-item dm-mono"><?php echo esc_html($tech); ?></li>
                        <?php endforeach; ?>
                      </ul>
                    </dd>
                    <?php endif; ?>
                  </dl>
                </a>
              </article>
            </li>
            <?php
              endwhile;
              wp_reset_postdata();
            endif;
            ?>
          </ul>
          <div class="c-button">
            <a class="c-button__link c-button__link--light" href="<?php echo esc_url(home_url('/works')); ?>">
              実績一覧を見る
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- about -->
    <section class="p-top__about">
      <div class="l-inner">
        <h2 class="c-title cormorant-garamond">
          about
          <span class="u-accent">me</span>
          <span class="c-title__line"></span>
        </h2>
        <div class="p-top__about-content">
          <figure class="p-top__about-img u-fade-up js-fade">
            <img src="<?php echo esc_url(get_theme_file_uri('/asset/images/yoshi.webp')); ?>" alt="田中 克規" loading="lazy">
            <figcaption class="p-top__about-caption">
              <p class="p-top__about-name dm-mono">
                Yosh<span class="u-accent">i</span>nori Tanaka
              </p>
              <p class="p-top__about-role dm-mono">
                Web Coder
              </p>
            </figcaption>
          </figure>
          <div class="p-top__about-info u-fade-up js-fade">
            <p class="c-text">
              フリーランスのWebコーダーとして活動している田中克規です。
            </p>
            <p class="c-text">
              HTML / CSS / JavaScript を中心に、WordPress構築まで対応しています。デザインの意図を汲み取りながら、BEM設計や保守性を意識したコーディングを心がけています。
            </p>
            <p class="c-text">
              これまでにコーポレートサイトや店舗サイトなどの制作に携わり、制作会社様からのコーディング案件にも対応しております。
            </p>
            <p class="c-text">
              丁寧なコミュニケーションと安定した実装を大切に、長くお付き合いいただけるパートナーを目指しています。
            </p>
            <ul class="c-skill-tag__list">
              <li class="c-skill-tag__item dm-mono js-hove">HTML5</li>
              <li class="c-skill-tag__item dm-mono js-hove">CSS3</li>
              <li class="c-skill-tag__item dm-mono js-hove">Sass / SCSS</li>
              <li class="c-skill-tag__item dm-mono js-hove">JavaScript</li>
              <li class="c-skill-tag__item dm-mono js-hove">jQuery</li>
              <li class="c-skill-tag__item dm-mono js-hove">WordPress</li>
              <li class="c-skill-tag__item dm-mono js-hove">Figma</li>
              <li class="c-skill-tag__item dm-mono js-hove">Git / GitHub</li>
              <li class="c-skill-tag__item dm-mono js-hove">VSCode</li>
            </ul>
            <div class="c-button">
              <a class="c-button__link" href="<?php echo esc_url(home_url('/about')); ?>">
                私についてを見る
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- service -->
    <section class="p-top__service">
      <div class="l-inner">
        <h2 class="c-title cormorant-garamond">
          service
          <span class="u-accent">menu</span>
          <span class="c-title__line"></span>
        </h2>
        <div class="p-top__service-content">
          <ul class="p-top__service-list">
            <li class="p-top__service-item u-fade-up js-fade">
              <a class="p-top__service-link" href="<?php echo esc_url(home_url('/service')); ?>#coding">
                <span class="p-top__service-num dm-mono">01</span>
                <h3 class="p-top__service-title cormorant-garamond">Coding</h3>
                <p class="c-text p-top__service-text">
                  FigmaやXDなどのデザインカンプをもとにHTML/CSS/JavaScriptでコーディングします。
                </p>
                <span class="p-top__service-arrow"></span>
              </a>
            </li>

            <li class="p-top__service-item u-fade-up js-fade">
              <a class="p-top__service-link" href="<?php echo esc_url(home_url('/service')); ?>#wordpress">
                <span class="p-top__service-num dm-mono">02</span>
                <h3 class="p-top__service-title cormorant-garamond">WordPress</h3>
                <p class="c-text p-top__service-text">
                  更新しやすいWordPressサイトを構築します。
                </p>
                <span class="p-top__service-arrow"></span>
              </a>
            </li>

            <li class="p-top__service-item u-fade-up js-fade">
              <a class="p-top__service-link" href="<?php echo esc_url(home_url('/service')); ?>#sitefix">
                <span class="p-top__service-num dm-mono">03</span>
                <h3 class="p-top__service-title cormorant-garamond">Site Fix</h3>
                <p class="c-text p-top__service-text">
                  テキスト変更やレイアウト崩れなど既存サイトの修正にも対応します。
                </p>
                <span class="p-top__service-arrow"></span>
              </a>
            </li>

          </ul>
          <div class="c-button">
            <a class="c-button__link c-button__link--light" href="<?php echo esc_url(home_url('/service')); ?>">
              サービスを見る
            </a>
          </div>
        </div>
      </div>
    </section>
    <?php get_template_part('template-parts/cta'); ?>
  </main>

<?php get_footer(); ?>