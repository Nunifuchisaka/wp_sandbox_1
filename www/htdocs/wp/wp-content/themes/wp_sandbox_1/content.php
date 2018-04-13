<article id="post-<?php the_ID(); ?>" <?php post_class('article_1'); ?>>
  <header class="article_1__header">
    <h1 class="article_1__h1">
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h1>
    <p class="article_1__date"><?php the_time('Y.m.d'); ?></p>
  </header>
  <figure class="article_1__eyecatch">
    <?php the_post_thumbnail('thumbnail'); ?>
  </figure>
  <div class="article_1__1">
    <?php
    the_content( sprintf(
      get_the_title()
    ) );
    ?>
  </div>
</article>