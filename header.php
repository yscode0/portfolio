<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <?php
  if (is_post_type_archive('works')) {
    // 実績一覧のdescription
    $description = '大阪のフリーランスWebコーダー田中克規の制作実績一覧です。コーポレートサイトや店舗サイトなど、HTML / CSS / JavaScript / WordPressを用いたコーディング実績をご紹介しています。制作会社様のコーディングパートナーとしての対応実績もございます。';
  } else {
    // 各ページのACFフィールドから取得
    $description = function_exists('get_field') ? get_field('description') : '';
  }
  ?>
  
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo esc_attr($description ?: get_bloginfo('description')); ?>">
  <meta name="keywords" content="Webコーダー,フリーランス,コーディング,WordPress,大阪,制作会社,外注,コーディングパートナー,HTML,CSS,JavaScript">

  <!-- ファビコン -->
  <link rel="shortcut icon" href="<?php echo esc_url( get_theme_file_uri('/asset/images/favicon.ico') ); ?>"> <!-- 48×48 -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( get_theme_file_uri('/asset/images/favicon-32.png') ); ?>">
  <link rel="icon" type="image/png" sizes="192x192" href="<?php echo esc_url( get_theme_file_uri('/asset/images/icon-192.png') ); ?>">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_theme_file_uri('/asset/images/apple-touch-icon.png') ); ?>">


  <!-- OGP設定　記載必要 -->
  <meta property="og:url" content="<?php echo esc_url( is_front_page() ? home_url('/') : get_permalink() ); ?>" />
  <?php
  // OGP画像
  if ( is_singular() && has_post_thumbnail() ) {
    $og_image = get_the_post_thumbnail_url( get_queried_object_id(), 'full' );
  } else {
    $og_image = get_theme_file_uri('/asset/images/og-mv.jpg');
  }
  ?>
  <meta property="og:image" content="<?php echo esc_url( $og_image ); ?>" />
  <meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo('name') ); ?>" />
  <meta property="og:title" content="<?php echo esc_attr( wp_get_document_title() ); ?>" />
  <meta property="og:description" content="<?php echo esc_attr($description ?: get_bloginfo('description')); ?>" />
  <meta property="og:type" content="<?php echo is_singular('post') ? 'article' : 'website'; ?>" />
  <meta name="twitter:card" content="summary_large_image" />

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <!-- ヘッダー -->
  <header class="l-header js-header">
    <div class="c-site-title">
      <a class="c-site-title__link dm-mono" href="<?php echo esc_url(home_url('/')); ?>">
        yosh<span class="u-accent">i</span> code
      </a>
    </div>
    <nav class="l-header__nav" aria-label="メインナビゲーション">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'header_menu',
        'container'      => false,
        'menu_class'     => 'l-header__menu',
        'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
        'walker'         => new Header_Menu_Walker(),
      ));
      ?>
    </nav>
    <button class="l-header__burger js-menu-toggle" aria-label="メニューを開く" aria-expanded="false" aria-controls="burger-menu">
      <span class="l-header__burger-bar"></span>
      <span class="l-header__burger-bar"></span>
    </button>

    <div class="l-header__burger-content js-menu" id="burger-menu" role="dialog" aria-modal="true" aria-label="ナビゲーションメニュー">
      <div class="l-header__burger-header">
        <div class="c-site-title">
          <a class="c-site-title__link dm-mono" href="<?php echo esc_url(home_url('/')); ?>">
            yosh<span class="u-accent">i</span> code
          </a>
        </div>
        <button class="l-header__burger js-menu-toggle">
          <span class="l-header__burger-bar"></span>
          <span class="l-header__burger-bar"></span>
        </button>
      </div>
      <div class="l-header__burger-body">
        <nav class="l-header__burger-nav" aria-label="モバイルナビゲーション">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'header_menu',
            'container'      => false,
            'menu_class'     => 'l-header__burger-menu',
            'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
            'walker'         => new Burger_Menu_Walker(),
          ));
          ?>
        </nav>
      </div>
    </div>
  </header>

  <main class="l-main">