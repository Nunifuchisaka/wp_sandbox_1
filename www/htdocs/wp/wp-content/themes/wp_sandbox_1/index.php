<?php get_header(); ?>

<div class="l_container_1">
  
  index.php
  

<?php
if ( have_posts() ) :
  while ( have_posts() ) : the_post();
    get_template_part('content');
  endwhile;
else :
  get_template_part('none');
endif;
?>

</div><!-- /.l_container_1 -->

<?php get_footer();
