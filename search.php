<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage ETHDB
 * @since EdTech Hub Database 0.1
 */

get_header();
?>

<section class="content-page">
  <h1>Search for '<span><?php echo get_search_query(); ?></span>'<?php if(is_paged()): ?> - page <?php endif; ?></h1>
  <?php

  if ( have_posts() ) {

    while ( have_posts() ) {
      the_post();

      get_template_part( 'template-parts/article', get_post_type() );
    }
  }

  ?>
</section>
<?php get_template_part( 'template-parts/pagination' ); ?>
<?php
get_footer();
