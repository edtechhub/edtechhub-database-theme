<?php
/**
 * @package WordPress
 * @subpackage ETHDB
 * @since EdTech Hub Database 0.1
 */

?>

<article <?php post_class('response-item'); ?> id="response-<?php the_ID(); ?>">

	<header>
    <?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); ?>
  </header>

	<div class="response-inner">

		<div class="response-content">

			<?php
				the_excerpt();
			?>

		</div><!-- .response-content -->

	</div><!-- .response-inner -->

</article><!-- .post -->
