<div class="row">
  <div class="col-md-3">
    <section class="response-filters">
      <h2>Apply filters</h2>
      <?php get_template_part( 'template-parts/response-filters', get_post_type() ); ?>
    </section>
  </div>
  <div class="col-md-9">
    <section class="response-list">
      <?php
        $page = "";
        if(is_paged()) { $page = " - page ".get_query_var('paged'); }
      ?>

      <?php if(is_tax()) : ?>
          <?php
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if(is_tax('tool_region') || is_tax('tool_country') || is_tax('tool_language')) : ?>
              <h2>Tools available in <?php echo $term->name; ?><?php echo $page ?></h2>
          <?php elseif(is_tax('tool_connectivity_requirement') || is_tax('tool_hardware_requirement')) : ?>
              <h2>Tools which require <?php echo $term->name; ?><?php echo $page ?></h2>
          <?php elseif(is_tax('tool_terms_and_costs') || is_tax('tool_code_type')) : ?>
              <h2>Tools which are <?php echo $term->name; ?><?php echo $page ?></h2>
          <?php else : ?>
              <h2>Tools for <?php echo $term->name; ?><?php echo $page ?></h2>
          <?php endif; ?>
      <?php else : ?>
        <h2>All tools<?php echo $page ?>:</h2>
      <?php endif; ?>
        <?php
        if ( have_posts() ) {

          while ( have_posts() ) {

            the_post();

            get_template_part( 'template-parts/response-excerpt', get_post_type() );

          }
        } else {

          get_template_part('template-parts/no-results', get_post_type());

        }
        ?>
      </section>
      <?php get_template_part( 'template-parts/pagination' ); ?>
  </div>
</div>
