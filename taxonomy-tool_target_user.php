<?php
/**
 * The taxonomy template file
 *
 * @package WordPress
 * @subpackage ETHDB
 * @since EdTech Hub Database 0.1
 */

get_header();
?>

<section class="introduction">
  <h1>Education Tools</h1>
</section>

<?php get_template_part( 'template-parts/response-tag-result', get_post_type() ); ?>


<?php
get_footer();
