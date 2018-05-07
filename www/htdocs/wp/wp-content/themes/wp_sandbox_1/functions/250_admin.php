<?php


//管理者以外のアカウントにはアップデート通知を非表示
if (!current_user_can('administrator')) {
  add_filter('pre_site_transient_update_core', create_function('$a', "return null;"));
}



//管理画面のメニュー
add_action('admin_menu', 'remove_menus');
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



//ダッシュボード関連
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');
function example_remove_dashboard_widgets() {
  global $wp_meta_boxes;
  //ダッシュボードの要素を削除
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
  
  remove_meta_box('dashboard_activity', 'dashboard', 'normal');
  
  //ダッシュボードの要素を追加
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



//管理バーのメニュー関連
add_action('admin_bar_menu', 'my_admin_bar_menu', 201);
function my_admin_bar_menu( $wp_admin_bar ) {
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



//管理画面のフッターの内容を変更
add_filter('admin_footer_text', 'custom_admin_footer');
function custom_admin_footer() {
  echo '(´・ω・｀)ゆっくりしていってね&nbsp;';
}



//画像挿入時の添付ファイルのページの選択肢を消す
add_action( 'post-upload-ui', 'media_script_buffer_start' );
function media_script_buffer_start() {
  ob_start();
}

add_action( 'print_media_templates', 'media_script_buffer_get' );
function media_script_buffer_get() {
  $scripts = ob_get_clean();
  $scripts = preg_replace( '#<option value="post">.*?</option>#s', '', $scripts );
  echo $scripts;
}

