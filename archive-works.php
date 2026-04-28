<?php get_header(); ?>

    <!-- ページヘッダー -->
    <section class="l-page-header js-mv">
      <div class="l-inner">
        <div class="l-page-header__content">
          <h1 class="l-page-header__title cormorant-garamond">
            selected
            <span class="u-accent">works</span>
          </h1>
        </div>
        <?php breadcrumb(); ?>
      </div>
    </section>

    <!-- 実績一覧 -->
    <section class="p-archive">
      <div class="l-inner">

        <!-- 実案件 -->
        <div class="p-archive__content">
          <h2 class="c-title__page dm-mono">Client Work</h2>
          <div class="p-archive__list">
            <ul class="c-works__list">
              <?php
              $client_works = new WP_Query(array(
                'post_type'      => 'works',
                'posts_per_page' => -1,
                'tax_query'      => array(
                  array(
                    'taxonomy' => 'works_category',
                    'field'    => 'slug',
                    'terms'    => 'client',
                  ),
                ),
              ));

              if ($client_works->have_posts()) :
                while ($client_works->have_posts()) : $client_works->the_post();
                  $works_role = get_field('works_role');
                  $works_tech = get_field('works_tech');
                  $pc_img     = get_field('works_pc_img');
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
          </div>
          <p class="c-text">
            ※掲載している実績は一部です。守秘義務の都合上、非公開の制作実績も多数ございます。詳細についてはお問い合わせください。
          </p>
        </div>

        <!-- 練習作品 -->
        <div class="p-archive__content">
          <h2 class="c-title__page dm-mono">Practice</h2>
          <div class="p-archive__list">
            <ul class="c-works__list">
              <?php
              $practice_works = new WP_Query(array(
                'post_type'      => 'works',
                'posts_per_page' => -1,
                'tax_query'      => array(
                  array(
                    'taxonomy' => 'works_category',
                    'field'    => 'slug',
                    'terms'    => 'practice',
                  ),
                ),
              ));

              if ($practice_works->have_posts()) :
                while ($practice_works->have_posts()) : $practice_works->the_post();
                  $works_role = get_field('works_role');
                  $works_tech = get_field('works_tech');
                  $pc_img     = get_field('works_pc_img');
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
          </div>
        </div>

      </div>
    </section>
    <?php get_template_part('template-parts/cta'); ?>
  </main>

<?php get_footer(); ?>