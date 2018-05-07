<?php

add_theme_support('post-thumbnails');//アイキャッチ画像を使用
remove_action('welcome_panel', 'wp_welcome_panel');//ダッシュボードのウェルカムパネルを削除


//表示オプションとヘルプも非表示
/*
function my_admin_head(){
  echo '<style type="text/css">#contextual-help-link-wrap{display:none;}</style>';
  echo '<style type="text/css">#screen-options-link-wrap{display:none;}</style>';
}
add_action('admin_head', 'my_admin_head');
*/



//セルフピンバックの禁止
function no_self_ping( &$links ) {
  $home = get_option( 'home' );
  foreach ( $links as $l => $link )
    if ( 0 === strpos( $link, $home ) )
      unset($links[$l]);
}
add_action('pre_ping', 'no_self_ping');



/*
add_action('admin_init', 'my_check_login');
function my_check_login() {
  global $current_user;
  
  get_currentuserinfo();
  extract($current_user->wp_capabilities);
  if ($subscriber) {
    wp_redirect(get_bloginfo('url'));
  }
}
*/




/*
## ログイン周り
★★★あとでまとめる
*/

/*
add_filter( 'show_admin_bar', '__return_false' );
function my_function_admin_bar ( $content ) {
  return ( current_user_can('administrator') ) ? $content : false;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

//
add_action('wp_login', 'redirect_page', 10, 2);
function redirect_page ( $user_login, $user ) {
  $user_role = $user->roles[0];
  if ( 'subscriber' == $user_role ) {
    wp_redirect( get_home_url() );
    exit();
  }
}

//
add_action('wp_logout','redirect_logout_page');
function redirect_logout_page(){
  wp_safe_redirect( get_home_url() );
  exit();
}
*/
