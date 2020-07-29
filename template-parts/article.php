<article <?php post_class('post-item'); ?> id="post-<?php the_ID(); ?>">

	<header>
    <?php
      if(is_singular()) {
        the_title( '<h1>', '</h1>' );
      } else {
        the_title( '<h3><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );
      }
    ?>
  </header>

	<div class="post-inner">

		<div class="post-content">

      <?php if(is_singular()) {
        the_content();
      } else {
        the_excerpt();
      }
			?>

		</div><!-- .post-content -->

	</div><!-- .post-inner -->

</article><!-- .post -->
