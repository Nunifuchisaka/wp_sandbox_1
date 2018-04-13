<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width">
<meta name="format-detection" content="telephone=no">

<?php $td = get_template_directory_uri(); ?>

<title><?php bloginfo('name'); ?></title>

<?php wp_head(); ?>

</head>
<body id="top" <?php body_class(); ?>>

<div id="wrapper" class="l_wrapper_1">


<header id="header" class="g_header_1">
  <h1 class="g_header_1__h1">
    <a href="<?php echo home_url(); ?>">
      <?php bloginfo('name'); ?>
    </a>
  </h1>
</header>
