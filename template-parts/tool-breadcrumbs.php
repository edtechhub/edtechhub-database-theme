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
        <?php if(is_paged()) :?><a href="/<?php echo $term->taxonomy.'/'.$term->slug; ?>"><?php endif;?>
        <?php
          echo $taxonomy->labels->singular_name;
          echo ': ';
          echo $term->name;
        ?>
        <?php if(is_paged()) : ?></a><?php endif; ?>
      </li>
      <?php if(is_paged()) :?>
        <li>Page <?php echo get_query_var('paged'); ?></li>
      <?php endif; ?>
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
