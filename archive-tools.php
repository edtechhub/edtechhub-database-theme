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

<section class="introduction">
  <h1>Education Tools</h1>
  <?php
    $page = get_page_by_path('tools');
    echo($page->post_content);
  ?>

</section>

<?php get_template_part( 'template-parts/response-tag-result', get_post_type() ); ?>


<?php
get_footer();
