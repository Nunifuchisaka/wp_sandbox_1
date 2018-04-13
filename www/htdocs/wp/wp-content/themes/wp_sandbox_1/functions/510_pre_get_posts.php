<?php

function my_pre_get_posts( $query ){
  if ( is_admin() || ! $query->is_main_query() ){
    return;
  }
  
  //var_dump( $query->is_post_type_archive('news') );
  
  /*
  if( $query->is_home() ){
    $query->set('post_type', 'news');
    $query->set('posts_per_page', 4);
  }
  */
  
  if ( $query->is_post_type_archive('recommend') ) {
    $query->set('post_type', array('recommend', 'book'));
    $query->set('posts_per_page', 15);
    //$query->set('posts_per_page', 1);
  }
  if ( $query->is_post_type_archive('book') ) {
    $query->set('posts_per_page', -1);
  }
  if ( $query->is_post_type_archive('news') ) {
    $query->set('posts_per_page', 12);
  }
  /*
  if ( $query->is_page('allbooks') ) {
    //$query->set('post_type', 'book');
    $query->set('post_type', array('page', 'book'));
    $query->set('posts_per_page', -1);
  }
  */
  
  /*
  if ( $query->is_singular('api') ) {
    $query->set('post_type', 'recommend');
  }
  */
  
  //$query->set('suppress_filters', false);
}
add_action('pre_get_posts','my_pre_get_posts');
