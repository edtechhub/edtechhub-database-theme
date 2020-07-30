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
          <?php echo "<h2>".ethdb_get_filter_title($wp_query,$page)."</h2>"; ?>
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
