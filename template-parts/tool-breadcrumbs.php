<?php if(is_singular()) : ?>
  <div class="breadcrumbs">
    <ul>
      <li><a href="/">Homepage</a></li>
      <li><a href="/tools/">Education tools</a></li>
      <li>Tool: <?php the_title(); ?></li>
    </ul>
  </div>
<?php elseif(is_tax()) : ?>

  <?php
    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
    $taxonomy = get_taxonomy($term->taxonomy);
  ?>
  <div class="breadcrumbs">
    <ul>
      <li><a href="/">Homepage</a></li>
      <li><a href="/tools/">Education tools</a></li>
      <li>
        <?php
          $page = "";
          if(is_paged()) { $page = " - page ".get_query_var('paged'); }
          echo ethdb_get_filter_title($wp_query,$page);
        ?>
        <?php if(is_paged()) :?>
          (Page <?php echo get_query_var('paged'); ?>)
        <?php endif; ?>
      </li>

    </ul>
  </div>
<?php elseif(is_archive()) : ?>
  <div class="breadcrumbs">
    <ul>
      <li><a href="/">Homepage</a></li>
      <?php if(is_paged()) : ?>
        <li><a href="/tools/">Education tools</a></li>
        <li>Page <?php echo get_query_var('paged'); ?></li>
      <?php else : ?>
        <li>Education tools</li>
      <?php endif; ?>
    </ul>
  </div>
<?php endif; ?>
