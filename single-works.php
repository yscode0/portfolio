<?php get_header(); ?>

    <!-- ページヘッダー -->
    <section class="l-page-header js-mv">
      <div class="l-inner">
        <div class="l-page-header__content">
          <h1 class="l-page-header__title cormorant-garamond">
            project
            <span class="u-accent">detail</span>
          </h1>
        </div>
        <!-- パンくずリスト -->
        <?php breadcrumb(); ?>
      </div>
    </section>

    <!-- 実績コンテンツ -->
    <section class="p-work">
      <div class="l-inner">
        <?php if (have_posts()) : while (have_posts()) : the_post();
          $works_url      = get_field('works_url');
          $is_basic       = get_field('is_basic');
          $works_role     = get_field('works_role');
          $works_tech     = get_field('works_tech');
          $works_function = get_field('works_function');
          $works_duration = get_field('works_duration');
          $works_overview = get_field('works_overview');
          $works_points   = get_field('works_points');
          $works_points_text  = get_field('works_points_text');
          $pc_img         = get_field('works_pc_img');
          $sp_img         = get_field('works_sp_img');
        ?>
        <div class="p-work__content">

          <!-- 情報 -->
          <div class="p-work__info">
            <h2 class="c-title__page dm-mono"><?php echo esc_html(get_the_title()); ?></h2>
            <dl class="p-work__meta">

              <?php if ($works_url) : ?>
              <dt class="p-work__term dm-mono">url</dt>
              <dd class="p-work__desc">
                <a class="p-work__link dm-mono" href="<?php echo esc_url($works_url); ?>" target="_blank" rel="noopener noreferrer">
                  <?php echo esc_html($works_url); ?>
                </a>
                <?php if ($is_basic) : ?>
                  <p class="p-work__note">
                    ※Basic認証でアクセス制限をかけております。<br>
                    ID/passwordともに「demo」
                  </p>
                <?php endif; ?>
              </dd>
              <?php endif; ?>

              <?php if ($works_role) : ?>
              <dt class="p-work__term dm-mono">role</dt>
              <dd class="p-work__desc">
                <ul class="p-work__list dm-mono">
                  <?php foreach ($works_role as $role) : ?>
                  <li class="p-work__list-item"><?php echo esc_html($role); ?></li>
                  <?php endforeach; ?>
                </ul>
              </dd>
              <?php endif; ?>

              <?php if ($works_tech) : ?>
              <dt class="p-work__term dm-mono">tech</dt>
              <dd class="p-work__desc">
                <ul class="p-work__list dm-mono">
                  <?php foreach ($works_tech as $tech) : ?>
                  <li class="p-work__list-item"><?php echo esc_html($tech); ?></li>
                  <?php endforeach; ?>
                </ul>
              </dd>
              <?php endif; ?>

              <?php if ($works_function) : ?>
              <dt class="p-work__term dm-mono">function</dt>
              <dd class="p-work__desc">
                <ul class="p-work__list dm-mono">
                  <?php foreach ($works_function as $function) : ?>
                  <li class="p-work__list-item"><?php echo esc_html($function); ?></li>
                  <?php endforeach; ?>
                </ul>
              </dd>
              <?php endif; ?>

              <?php if ($works_duration) : ?>
              <dt class="p-work__term dm-mono">duration</dt>
              <dd class="p-work__desc"><?php echo esc_html($works_duration); ?></dd>
              <?php endif; ?>

            </dl>
          </div>

          <!-- 画像 -->
          <div class="p-work__body">
            <?php if ($pc_img) : ?>
            <div class="p-work__pc">
              <img class="p-work__pc-frame" src="<?php echo get_theme_file_uri('/asset/images/mockup-imac.png'); ?>" alt="" loading="lazy" width="756" height="649">
              <figure class="p-work__pc-img">
                <img src="<?php echo esc_url($pc_img['url']); ?>" alt="<?php echo esc_attr($pc_img['alt']); ?>" loading="lazy" width="693" height="400">
              </figure>
            </div>
            <?php endif; ?>

            <?php if ($sp_img) : ?>
            <div class="p-work__sp">
              <img class="p-work__sp-frame" src="<?php echo get_theme_file_uri('/asset/images/mockup-iphone.png'); ?>" alt="" loading="lazy">
              <figure class="p-work__sp-img">
                <img src="<?php echo esc_url($sp_img['url']); ?>" alt="<?php echo esc_attr($sp_img['alt']); ?>" loading="lazy">
              </figure>
            </div>
            <?php endif; ?>
          </div>

        </div>

        <!-- 詳細 -->
        <div class="p-work__detail">
          <div class="p-work__detail-inner">

            <?php if ($works_overview) : ?>
            <div class="p-work__block">
              <h3 class="p-work__title dm-mono">Overview</h3>
              <p class="c-text"><?php echo nl2br(esc_html($works_overview)); ?></p>
            </div>
            <?php endif; ?>

            <?php if ($works_points) : ?>
            <div class="p-work__block">
              <h3 class="p-work__title dm-mono">Points</h3>
              <ul class="p-work__point-list">
                <?php
                $points = explode("\n", $works_points);
                foreach ($points as $point) :
                  $point = trim($point);
                  if ($point) :
                ?>
                <li class="p-work__point-item"><?php echo esc_html($point); ?></li>
                <?php
                  endif;
                endforeach;
                ?>
              </ul>

              <?php 
              $works_points_text = get_field('works_points_text');
              if ($works_points_text) : ?>
              <p class="c-text">
                <?php echo nl2br(esc_html($works_points_text)); ?>
              </p>
              <?php endif; ?>

            </div>
            <?php endif; ?>

          </div>
        </div>

        <!-- 前後の投稿ナビ -->
        <nav class="p-work__nav">
          <div class="p-work__nav-prev">
            <?php $prev_post = get_previous_post(); ?>
            <?php if ($prev_post) : ?>
            <a class="p-work__nav-link" href="<?php echo esc_url(get_permalink($prev_post)); ?>">
              <?php echo esc_html(get_the_title($prev_post)); ?>
            </a>
            <?php endif; ?>
          </div>

          <div class="p-work__nav-archive">
            <a class="p-work__nav-link" href="<?php echo esc_url(home_url('/works')); ?>">
              実績一覧
            </a>
          </div>

          <div class="p-work__nav-next">
            <?php $next_post = get_next_post(); ?>
            <?php if ($next_post) : ?>
            <a class="p-work__nav-link" href="<?php echo esc_url(get_permalink($next_post)); ?>">
              <?php echo esc_html(get_the_title($next_post)); ?>
            </a>
            <?php endif; ?>
          </div>
        </nav>

        <?php endwhile; endif; ?>

      </div>
    </section>
    <?php get_template_part('template-parts/cta'); ?>
  </main>

<?php get_footer(); ?>