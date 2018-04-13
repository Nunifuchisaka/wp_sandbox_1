<?php

add_action('wp_enqueue_scripts', 'my_enqueue_scripts');



function my_enqueue_scripts() {
  $td = get_template_directory_uri();
  
  wp_enqueue_style('my_reset',
    $td.'/assets/css/reset.css',
    array(),
    filemtime( TEMPLATEPATH . '/assets/css/reset.css' )
  );
  
  wp_enqueue_style('my_common',
    $td.'/assets/css/common.css',
    array(),
    filemtime( TEMPLATEPATH . '/assets/css/common.css' )
  );
  
  wp_enqueue_style('my_patch',
    $td.'/assets/css/patch.css',
    array(),
    filemtime( TEMPLATEPATH . '/assets/css/patch.css' )
  );
  
  
  //wp_deregister_script('jquery');
  //wp_deregister_script('json2');
  
  //wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');
  //wp_enqueue_script('underscore', '//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js');
  //wp_enqueue_script('json2', '//cdnjs.cloudflare.com/ajax/libs/json2/20160511/json2.min.js');
  //wp_enqueue_script('backbone', '//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.2/backbone-min.js', array('underscore','jquery'));
  wp_enqueue_script('jquery_easing', $td . '/assets/libs/jquery.easing.js', array('jquery'));
  //wp_enqueue_script('jquery_cookie', $td . '/assets/libs/jquery.cookie.js', array('jquery'));
  
  /*
  wp_enqueue_script('my_common',
    $td.'/assets/js/common.js',
    array('json2', 'slick'),
    filemtime( TEMPLATEPATH . '/assets/js/common.js' ),
    true
  );
  */
}
