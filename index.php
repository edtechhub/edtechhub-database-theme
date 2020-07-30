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
  <?php

  if ( have_posts() ) {

    while ( have_posts() ) {
      the_post();

      get_template_part( 'template-parts/article', get_post_type() );
    }
  }

  ?>
</section>

<?php
get_footer();
