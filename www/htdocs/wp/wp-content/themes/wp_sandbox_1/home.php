<?php
get_header();

if ( is_user_logged_in() ) {
  get_template_part( 'content', 'index' );
} else {
  get_template_part( 'content', 'login' );
}

get_footer();