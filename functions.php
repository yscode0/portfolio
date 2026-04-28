<?php

// ソース管理
function my_enqueue_scripts() {
  $js_path  = get_template_directory() . '/asset/js/main.js';
  $css_path = get_template_directory() . '/asset/css/app.css';

  // Googleフォント（preconnectはwp_head hookで別途追加）
  wp_enqueue_style(
    'google_fonts',
    'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300..700;1,300..700&family=DM+Mono:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&family=Noto+Sans+JP:wght@100..900&display=swap',
    [],
    null  // バージョン管理不要なのでnull
  );

  wp_enqueue_style('style_css', get_theme_file_uri('/asset/css/app.css') , ['google_fonts'], filemtime($css_path));
  wp_enqueue_script('main_js', get_theme_file_uri('/asset/js/main.js') , [], filemtime($js_path), true);
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');


// preconnectタグを追加
function mytheme_preconnect_fonts() {
  echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
  echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action('wp_head', 'mytheme_preconnect_fonts', 1);


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