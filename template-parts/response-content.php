<?php
/**
 * @package WordPress
 * @subpackage ETHDB
 * @since EdTech Hub Database 0.1
 */

?>

<article <?php post_class('response-item'); ?> id="response-<?php the_ID(); ?>">

  <header>
    <?php
      if(is_singular('tools')) {
        the_title( '<h1><span>Education tool:</span><br/>', '</h1>' );
      } elseif(is_singular('responses')) {
        the_title( '<h1><span>Education response:</span><br/>', '</h1>' );
      } else {
        the_title( '<h1>', '</h1>' );
      }
    ?>
  </header>

  <div class="response-inner">
    <div class="response-content">

      <?php get_template_part( 'template-parts/response-provided-by', get_post_type() ); ?>
      <?php the_content(); ?>

      <?php
      $year_released = get_post_meta($post->ID,'year_released',true);
      $country_headquarter = get_post_meta($post->ID,'country_headquarter',true);
      if($year_released != '' || $country_headquarter != '') {
        echo ("<hr/><p>");
        if($year_released != '') {
          echo ("<strong>Released in:</strong> $year_released<br/>");
        }
        if($country_headquarter != '') {
          echo ("<strong>Headquarters:</strong> $country_headquarter<br/>");
        }
        echo("</p>");
      }
      ?>


    </div><!-- .entry-content -->

    <div class="row response-meta">
      <!-- meta information -->
      <div class="response-meta-content col-md-6 col-lg-4">
        <h2>Target users:</h2>
        <?php echo get_the_term_list( $post->ID, 'tool_target_user', '<p>', ', ', '</p>' ); ?>
        <?php echo get_the_term_list( $post->ID, 'tool_target_level', '<p>At these levels: ', ', ', '</p>' ); ?>
        <?php echo get_the_term_list( $post->ID, 'tool_language', '<p>In these languages: ', ', ', '</p>' ); ?>
      </div>

      <!-- approaches + code type -->
      <div class="response-meta-content col-md-6 col-lg-4">
        <h2>Type of tool:</h2>
        <ul>
          <?php echo get_the_term_list( $post->ID, 'tool_approach', '<li>', '</li><li>', '</li>' ); ?>
          <?php echo get_the_term_list( $post->ID, 'tool_code_type', '<li class="code-type">', '</li></li>', '</li>' ); ?>
        </ul>
      </div>

      <!-- requirements + terms -->
      <div class="response-meta-content col-md-12 col-lg-4">
        <h2>Requirements:</h2>
        <?php echo get_the_term_list( $post->ID, 'tool_connectivity_requirement', '<p>Connectivity: ', ', ', '</p>' ); ?>
        <?php echo get_the_term_list( $post->ID, 'tool_terms_and_costs', '<p>Cost: ', ', ', '</p>' ); ?>


      </div>
    </div><!-- .response-meta -->

  </div><!-- .response-inner -->

</article><!-- .response -->
