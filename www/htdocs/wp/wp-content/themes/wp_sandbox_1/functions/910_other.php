<?php

add_theme_support('post-thumbnails');
remove_action('welcome_panel', 'wp_welcome_panel');

//アップデート通知を非表示
if (!current_user_can('administrator')) {
  add_filter('pre_site_transient_update_core', create_function('$a', "return null;"));
}


//管理画面のメニュー
function remove_menus() {
  if (!current_user_can('administrator')) {
    remove_menu_page('edit.php');
    //remove_menu_page('edit.php?post_type=page');
    remove_menu_page('edit.php?post_type=api');
    remove_menu_page('edit-comments.php');
    //remove_menu_page('profile.php');
    remove_menu_page('tools.php');
  }
}
add_action('admin_menu', 'remove_menus');



//ダッシュボード
function example_remove_dashboard_widgets() {
  global $wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
  
  remove_meta_box('dashboard_activity', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');



add_action('wp_dashboard_setup', 'my_dashboard_widgets');
function my_dashboard_widgets() {
  wp_add_dashboard_widget('my_theme_options_widget', 'hoge', 'my_dashboard_widget_function');
}
function my_dashboard_widget_function() {
  global $wp_meta_boxes;
  $admin_url = admin_url();
  //echo "メンテナンス中だよ(´・ω・｀)";
  //echo $admin_url;
  /*
  <div class="admin_list_1">
    <ul class="admin_list_1__items">
      <li class="admin_list_1__item"><a href=""></a></li>
    </ul>
  </div><!-- /.admin_list_1 -->
  */
}



//管理画面上部のメニューを非表示
function my_wp_before_admin_bar_render() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('wp-logo');
  //$wp_admin_bar->remove_menu('site-name');
  $wp_admin_bar->remove_menu('updates');
  $wp_admin_bar->remove_menu('comments');
  $wp_admin_bar->remove_menu('new-content');
  $wp_admin_bar->remove_menu('my-account');
}
add_action( 'wp_before_admin_bar_render', 'my_wp_before_admin_bar_render' );


function admin_bar_right_logout( $wp_admin_bar ) {
  // ログアウトを追加
  $wp_admin_bar->add_menu( array(
    'id'    => 'mylogout',
    'title' => __('ログアウト'),
    'href'  => wp_logout_url(),
    'meta'   => array(
      'class' => 'ab-top-secondary',
    ),
  ) );
}
add_action('admin_bar_menu', 'admin_bar_right_logout', 201);



//表示オプションとヘルプも非表示
/*
function my_admin_head(){
  echo '<style type="text/css">#contextual-help-link-wrap{display:none;}</style>';
  echo '<style type="text/css">#screen-options-link-wrap{display:none;}</style>';
}
add_action('admin_head', 'my_admin_head');
*/



//
function custom_admin_footer() {
  echo '(´・ω・｀)ゆっくりしていってね&nbsp;';
}
add_filter('admin_footer_text', 'custom_admin_footer');



//セルフピンバックの禁止
function no_self_ping( &$links ) {
  $home = get_option( 'home' );
  foreach ( $links as $l => $link )
    if ( 0 === strpos( $link, $home ) )
      unset($links[$l]);
}
add_action('pre_ping', 'no_self_ping');



/*
## 画像挿入時の添付ファイルのページの選択肢を消す
*/

function media_script_buffer_start() {
  ob_start();
}
add_action( 'post-upload-ui', 'media_script_buffer_start' );
 
function media_script_buffer_get() {
  $scripts = ob_get_clean();
  $scripts = preg_replace( '#<option value="post">.*?</option>#s', '', $scripts );
  echo $scripts;
}
add_action( 'print_media_templates', 'media_script_buffer_get' );





function my_check_login() {
  global $current_user;
  
  get_currentuserinfo();
  extract($current_user->wp_capabilities);
  if ($subscriber) {
    wp_redirect(get_bloginfo('url'));
  }
}

add_action('admin_init', 'my_check_login');



/*
## ログイン周り
*/

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
