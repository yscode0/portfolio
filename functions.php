<?php

// ソース管理
function my_enqueue_scripts() {
  $js_path  = get_template_directory() . '/asset/js/main.js';
  $css_path = get_template_directory() . '/asset/css/app.css';

  wp_enqueue_style('style_css', get_theme_file_uri('/asset/css/app.css'), [], filemtime($css_path));
  wp_enqueue_script('main_js', get_theme_file_uri('/asset/js/main.js'), [], filemtime($js_path), true);
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

function mytheme_preconnect_fonts() {
  // preconnect不要（外部フォント使用なし）

  // Cormorant Garamondのみpreload（LCP要素）
  $font_url = get_theme_file_uri('/asset/fonts/CormorantGaramond-Medium.woff2');
  echo '<link rel="preload" href="' . esc_url($font_url) . '" as="font" type="font/woff2" crossorigin>' . "\n";

  // app.css preload
  $css_path = get_template_directory() . '/asset/css/app.css';
  $css_url  = get_theme_file_uri('/asset/css/app.css');
  echo '<link rel="preload" href="' . esc_url($css_url) . '?ver=' . filemtime($css_path) . '" as="style">' . "\n";
}
add_action('wp_head', 'mytheme_preconnect_fonts', 1);

// CF7のJS/CSSをコンタクトページ以外で無効化
function disable_cf7_scripts($posts) {
  if (is_admin()) return $posts;

  // コンタクトページ以外ではCF7スクリプトを削除
  if (!is_page('contact')) {
    wp_dequeue_script('contact-form-7');
    wp_dequeue_script('contact-form-7-swv');
    wp_dequeue_style('contact-form-7');
    wp_dequeue_script('wpcf7-swv');
  }

  return $posts;
}
add_action('wp_enqueue_scripts', 'disable_cf7_scripts', 99);

// Google analytics
function mytheme_google_analytics() {
  if ( is_admin() ) return; // 管理画面では出力しない
  ?>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZNT886ZDKP"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-ZNT886ZDKP');
  </script>
  <?php
}
add_action( 'wp_head', 'mytheme_google_analytics' );

// カスタム投稿タイプ「works」の登録
function register_works_post_type() {
  $args = array(
    'label'         => '実績',
    'public'        => true,
    'has_archive'   => true,
    'show_in_rest' => true,
    'rewrite' => array(
      'slug' => 'works',
      'with_front' => false
    ),
    'menu_icon'     => 'dashicons-portfolio',
    'supports'      => array('title', 'thumbnail', 'editor', 'excerpt'),
    'menu_position' => 5,
  );
  register_post_type('works', $args);
}
add_action('init', 'register_works_post_type');

// カスタムタクソノミー「works_category」の登録
function register_works_taxonomy() {
  $args = array(
    'label'        => '実績カテゴリー',
    'public'       => true,
    'hierarchical' => true,
    'rewrite'      => array('slug' => 'works-category'),
    'show_in_rest' => true,
  );
  register_taxonomy('works_category', 'works', $args);
}
add_action('init', 'register_works_taxonomy');


// デフォルトの画像サイズ自動生成を無効化
function disable_image_sizes( $sizes ) {
  unset($sizes['medium']);       // 300px
  unset($sizes['medium_large']); // 768px
  unset($sizes['large']);        // 1024px
  unset($sizes['1536x1536']);    // 1536px
  unset($sizes['2048x2048']);    // 2048px
  return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'disable_image_sizes');

// タイトル表示(head内の<title>タグは削除してください)
function mytheme_set() {
  add_theme_support( 'title-tag' );
  add_theme_support('post-thumbnails');
  register_nav_menus( [
    'header_menu' => 'ヘッダーメニュー',
    'footer_menu' => 'フッターメニュー',
  ] );
}
add_action( 'after_setup_theme', 'mytheme_set' );

// タイトル表示設定
function mytheme_rewrite_title($title) {
  // トップページ
  if (is_front_page()) {
    $title['tagline'] = ''; //タイトルのみ

  } elseif ( is_singular('works') ) {
    $title['title'] = get_the_title() . ' | 実績';

  } elseif ( is_post_type_archive('works') ) {
    $title['title'] = '実績一覧';

  }
  return $title;
}
add_filter('document_title_parts', 'mytheme_rewrite_title');

// ヘッダーメニュー用Walker
class Header_Menu_Walker extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
    $output .= '<li class="l-header__item dm-mono">';
    $output .= '<a class="l-header__item-link" href="' . esc_url($item->url) . '">';
    $output .= esc_html($item->title);
    $output .= '</a>';
    $output .= '</li>';
  }
}

// ハンバーガーメニュー用Walker
class Burger_Menu_Walker extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
    $output .= '<li class="l-header__burger-item dm-mono">';
    $output .= '<a class="l-header__burger-item-link" href="' . esc_url($item->url) . '">';
    $output .= esc_html($item->title);
    $output .= '</a>';
    $output .= '</li>';
  }
}

// フッターメニュー用Walker
class Footer_Menu_Walker extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
    $output .= '<li class="l-footer__item dm-mono">';
    $output .= '<a class="l-footer__item-link" href="' . esc_url($item->url) . '">';
    $output .= esc_html($item->title);
    $output .= '</a>';
    $output .= '</li>';
  }
}

// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
  return false;
}

// スラッグの日本語禁止
function auto_post_slug($slug, $post_ID, $post_status, $post_type)
{
  if (preg_match('/(%[0-9a-f]{2})+/', $slug)) {
    $slug = sanitize_title($post_type) . '-' . $post_ID;
  }
  return $slug;
}
add_filter('wp_unique_post_slug', 'auto_post_slug', 10, 4);



// 固定ページに抜粋文を表示
add_post_type_support('page', 'excerpt');

// 抜粋文に改行を反映
function apply_excerpt_br($value)
{
  return nl2br($value);
}
add_filter('get_the_excerpt', 'apply_excerpt_br');

//投稿本文のオートパラグラフ機能解除
add_action('init', function() {
  remove_filter('the_content', 'wpautop');
});

// パンくずリスト
function breadcrumb() {
  $home = '<li class="c-breadcrumb__item dm-mono"><a class="c-breadcrumb__link" href="'.get_bloginfo('url').'" >top</a></li>';

  echo '<ul class="c-breadcrumb__list">';
  if ( is_front_page() ) {
    // トップページの場合は表示させない
  
  // 実績一覧
  } else if ( is_post_type_archive('works') ) {
    echo $home;
    echo '<li class="c-breadcrumb__item dm-mono">works</li>';

  // 実績詳細ページ
  } else if ( is_singular('works') ) {
    echo $home;
    echo '<li class="c-breadcrumb__item dm-mono"><a class="c-breadcrumb__link" href="' . esc_url( get_post_type_archive_link('works') ) . '">works</a></li>';
    echo '<li class="c-breadcrumb__item dm-mono">' . get_the_title() . '</li>';

  // 
  } else if ( is_category() ) {
    $cat = get_queried_object();
    $cat_id = $cat->parent;
    $cat_list = array();
    while ($cat_id != 0){
      $cat = get_category( $cat_id );
      $cat_link = get_category_link( $cat_id );
      array_unshift( $cat_list, '<li class="c-breadcrumb__item dm-mono"><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
      $cat_id = $cat->parent;
    }
    echo $home;
    foreach($cat_list as $value){
      echo $value;
    }
    the_archive_title('<li class="c-breadcrumb__item dm-mono">', '</li>');
  }
  // アーカイブ・タグページ
  else if ( is_archive() ) {
    echo $home;
    the_archive_title('<li class="c-breadcrumb__item dm-mono">', '</li>');
  }
  // 投稿ページ
  else if ( is_single() ) {
    $cat = get_the_category();
    if( isset($cat[0]->cat_ID) ) $cat_id = $cat[0]->cat_ID;
    $cat_list = array();
    while ($cat_id != 0){
      $cat = get_category( $cat_id );
      $cat_link = get_category_link( $cat_id );
      array_unshift( $cat_list, '<li class="c-breadcrumb__item dm-mono"><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
      $cat_id = $cat->parent;
    }
    foreach($cat_list as $value){
      echo $value;
    }
    the_title('<li class="c-breadcrumb__item dm-mono">', '</li>');
  }
  // 固定ページ
  else if( is_page() ) {
    echo $home;
    the_title('<li class="c-breadcrumb__item dm-mono">', '</li>');
  }
  // 404ページの場合
  else if( is_404() ) {
    echo $home;
    echo '<li class="c-breadcrumb__item dm-mono">ページが見つかりません</li>';
  }
  echo "</ul>";
}

// サイトマップ
function mytheme_sitemap() {
  if ( ! isset($_GET['sitemap']) ) return;

  header('Content-Type: application/xml; charset=utf-8');

  // noindex対象ページのスラッグ（サイトマップから除外）
  $exclude_slugs = ['thanks', 'privacy'];

  $urls = [];

  // トップページ
  $urls[] = [
    'loc'        => home_url('/'),
    'priority'   => '1.0',
    'changefreq' => 'monthly',
  ];

  // 固定ページ（トップ除外 + noindex除外）
  $pages = get_posts([
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'exclude'        => [ get_option('page_on_front') ],
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
  ]);
  foreach ($pages as $page) {
    if ( in_array($page->post_name, $exclude_slugs) ) continue;
    $urls[] = [
      'loc'        => get_permalink($page->ID),
      'lastmod'    => get_the_modified_date('c', $page->ID),
      'priority'   => '0.8',
      'changefreq' => 'monthly',
    ];
  }

  // worksアーカイブ
  $archive_url = get_post_type_archive_link('works');
  if ( $archive_url ) {
    $latest_work = get_posts([
      'post_type'      => 'works',
      'posts_per_page' => 1,
      'orderby'        => 'modified',
      'order'          => 'DESC',
    ]);
    $urls[] = [
      'loc'        => $archive_url,
      'lastmod'    => ! empty($latest_work) ? get_the_modified_date('c', $latest_work[0]->ID) : '',
      'priority'   => '0.8',
      'changefreq' => 'monthly',
    ];
  }

  // works個別ページ
  $works = get_posts([
    'post_type'      => 'works',
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'DESC',
  ]);
  foreach ($works as $work) {
    $urls[] = [
      'loc'        => get_permalink($work->ID),
      'lastmod'    => get_the_modified_date('c', $work->ID),
      'priority'   => '0.7',
      'changefreq' => 'yearly',
    ];
  }

  echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
  echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
  foreach ($urls as $url) {
    echo '<url>' . "\n";
    echo '  <loc>' . esc_url($url['loc']) . '</loc>' . "\n";
    if ( ! empty($url['lastmod']) )    echo '  <lastmod>'    . esc_html($url['lastmod'])    . '</lastmod>' . "\n";
    if ( ! empty($url['changefreq']) ) echo '  <changefreq>' . esc_html($url['changefreq']) . '</changefreq>' . "\n";
    if ( ! empty($url['priority']) )   echo '  <priority>'   . esc_html($url['priority'])   . '</priority>' . "\n";
    echo '</url>' . "\n";
  }
  echo '</urlset>';
  exit;
}
add_action('init', 'mytheme_sitemap', 99);

// 構造化データ（JSON-LD）
function mytheme_json_ld() {
  $site_url  = home_url('/');
  $site_name = 'Yoshi Code';

  // ① Person + WebSite（全ページ共通）
  $person = [
    '@type'         => 'Person',
    '@id'           => $site_url . '#person',
    'name'          => '田中 克規',
    'alternateName' => 'Yoshinori Tanaka',
    'jobTitle'      => 'フリーランス Webコーダー',
    'description'   => '大阪府を拠点に活動するフリーランスWebコーダー。制作会社のコーディングパートナーとしてHTML / CSS / JavaScript / WordPressの実装を担当。',
    'url'           => $site_url,
    'address'       => [
      '@type'           => 'PostalAddress',
      'addressRegion'   => '大阪府',
      'addressCountry'  => 'JP',
    ],
    'knowsAbout' => ['HTML', 'CSS', 'JavaScript', 'WordPress', 'Sass', 'Figma'],
  ];

  $website = [
    '@type'       => 'WebSite',
    '@id'         => $site_url . '#website',
    'name'        => $site_name,
    'description' => get_bloginfo('description'),
    'url'         => $site_url,
    'publisher'   => [ '@id' => $site_url . '#person' ],
  ];

  $schemas = [
    [ '@context' => 'https://schema.org' ] + $person,
    [ '@context' => 'https://schema.org' ] + $website,
  ];

  // ② BreadcrumbList（内部ページ全般）
  if ( ! is_front_page() ) {
    $crumbs = [
      [
        '@type'    => 'ListItem',
        'position' => 1,
        'name'     => 'Top',
        'item'     => $site_url,
      ],
    ];

    if ( is_singular('works') ) {
      $crumbs[] = [
        '@type'    => 'ListItem',
        'position' => 2,
        'name'     => 'Works',
        'item'     => (string) get_post_type_archive_link('works'),
      ];
      $crumbs[] = [
        '@type'    => 'ListItem',
        'position' => 3,
        'name'     => get_the_title(),
        'item'     => get_permalink(),
      ];
    } elseif ( is_post_type_archive('works') ) {
      $crumbs[] = [
        '@type'    => 'ListItem',
        'position' => 2,
        'name'     => 'Works',
        'item'     => get_post_type_archive_link('works'),
      ];
    } elseif ( is_page() ) {
      $crumbs[] = [
        '@type'    => 'ListItem',
        'position' => 2,
        'name'     => get_the_title(),
        'item'     => get_permalink(),
      ];
    }

    $schemas[] = [
      '@context'        => 'https://schema.org',
      '@type'           => 'BreadcrumbList',
      'itemListElement' => $crumbs,
    ];
  }

  // ③ CreativeWork（works詳細ページのみ）
  if ( is_singular('works') ) {
    $schemas[] = [
      '@context'      => 'https://schema.org',
      '@type'         => 'CreativeWork',
      'name'          => get_the_title(),
      'url'           => get_permalink(),
      'datePublished' => get_the_date('c'),
      'dateModified'  => get_the_modified_date('c'),
      'creator'       => [ '@id' => $site_url . '#person' ],
    ];
  }
	
  // ④ FAQPage（serviceページのみ）
  if ( is_page('service') ) {
    $schemas[] = [
	  '@context'   => 'https://schema.org',
	  '@type'      => 'FAQPage',
	  'mainEntity' => [
	    [
		  '@type'          => 'Question',
		  'name'           => 'デザインなしでも依頼できますか？',
		  'acceptedAnswer' => [
		    '@type' => 'Answer',
		    'text'  => '基本的にはデザインカンプ（FigmaやXDなど）をご用意いただいた上でのコーディングが中心となります。デザインの用意が難しい場合はご相談ください。',
		  ],
	    ],
	    [
		  '@type'          => 'Question',
		  'name'           => '納期はどのくらいですか？',
		  'acceptedAnswer' => [
		    '@type' => 'Answer',
		    'text'  => '案件の規模や内容によって異なります。まずはお問い合わせいただき、ご要件をお聞かせください。可能な限りご希望の納期に沿えるよう対応いたします。',
		  ],
	    ],
	    [
		  '@type'          => 'Question',
		  'name'           => '修正対応はしてもらえますか？',
		  'acceptedAnswer' => [
		    '@type' => 'Answer',
		    'text'  => '納品前の修正は対応しております。納品後の追加修正については、内容に応じて別途ご相談させていただく場合があります。',
		  ],
	    ],
	    [
		  '@type'          => 'Question',
		 'name'           => '制作会社からのコーディング依頼は受けていますか？',
		  'acceptedAnswer' => [
		    '@type' => 'Answer',
		    'text'  => 'はい、制作会社様のコーディングパートナーとしての対応を歓迎しています。継続的なお取引も大歓迎ですので、お気軽にご相談ください。',
		  ],
	    ],
	  ],
    ];
  }

  foreach ($schemas as $schema) {
    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_PRETTY_PRINT);
    echo "\n" . '</script>' . "\n";
  }
}
add_action('wp_head', 'mytheme_json_ld');