<?php
/**
 * The template for displaying the 404 template
 *
 * @package WordPress
 * @subpackage ETHDB
 * @since EdTech Hub Database 0.1
 */

get_header();
?>

	<h1 class="entry-title"><?php _e( 'Page Not Found', 'ethdb' ); ?></h1>

	<div class="intro-text"><p><?php _e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'ethdb' ); ?></p></div>


<?php
get_footer();
