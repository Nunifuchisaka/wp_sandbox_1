<?php

/*
## pre_get_postsだけを記述するファイル
pre_get_posts：このフックはクエリ変数オブジェクトの生成後、実際にクエリが実行される前に呼び出されます。
*/

add_action('pre_get_posts','my_pre_get_posts');


function my_pre_get_posts( $query ){
  // 管理画面のときには適用しない
  if ( is_admin() || ! $query->is_main_query() ){
    return;
  }
  
  /*
  if( $query->is_home() ){
    $query->set('post_type', 'news');
    $query->set('posts_per_page', 4);
  }
  */
  
  if ( $query->is_post_type_archive('news') ) {
    $query->set('posts_per_page', 12);
  }
}
