<?php

/*
## 細分化したファイルの読み込み
*/

locate_template('functions/210_function.php', true);
locate_template('functions/250_admin.php', true);
locate_template('functions/310_cpt_news.php', true);
locate_template('functions/510_enqueue.php', true);
locate_template('functions/510_pre_get_posts.php', true);
locate_template('functions/910_other.php', true);

//remove_action( 'template_redirect', 'wp_redirect_admin_locations', 1000 );

