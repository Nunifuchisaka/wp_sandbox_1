<?php

function custom_login() { ?>
  <style>
    #login {
      display: none
    }
  </style>
  <script>
  location.href = "/";
  </script>
<?php }
add_action( 'login_enqueue_scripts', 'custom_login' );

