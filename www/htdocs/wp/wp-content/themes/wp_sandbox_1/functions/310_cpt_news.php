<?php

/*
# カスタム投稿タイプの定義（news）
*/

add_action('init', 'register_post_type__news');


function register_post_type__news() {
  
  register_post_type('news', array(
    'label' => 'お知らせ',
    'public' => true,
    'has_archive' => true,
    //'rewrite' => true,
    'rewrite' => array('with_front' => false),
    'hierarchical' => false,
    'menu_position' => 5,
    //'can_export' => true,
    'supports' => array(
      'title',
      'editor',
      'thumbnail',
      'custom-fields',
    ),
    //'show_ui' => false,
  ));
  
  //カテゴリ（カスタムタクソノミーの定義）
  register_taxonomy(
    'news_cat',
    'news',
    array(
      'hierarchical' => true,
      //'update_count_callback' => '_update_post_term_count',
      'label' => 'カテゴリ',
      //'singular_label' => 'カテゴリ',
      'public' => true,
      'show_ui' => true,
      'rewrite' => array(
        'slug' => 'news/cat',
        'with_front' => true
      )
    )
  );
  
}
