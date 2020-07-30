<?php if(is_plugin_active('search-filter/search-filter.php')) : ?>

  <?php echo do_shortcode( '[searchandfilter types="checkbox,checkbox,checkbox,checkbox,checkbox,checkbox" headings="Target users,Tool target levels,Tool approaches,Tool connectivity requirements,Terms,Open source" post_types="tools" fields="tool_target_user,tool_target_level,tool_approach,tool_connectivity_requirement,tool_terms_and_costs,tool_code_type"]' ); ?>

<?php else : ?>

<?php
  $term_slug = FALSE;
  if(is_tax()) {
    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
    $term_slug = $term->slug;
  }
?>

<!-- target user filter -->
<?php
  $filter_tax = "tool_target_user";
  include('response-filter-item.php');
?>

<!-- target level filter -->
<?php
  $filter_tax = "tool_target_level";
  include('response-filter-item.php');
?>

<!-- approaches filter -->
<?php
  $filter_tax = "tool_approach";
  include('response-filter-item.php');
?>

<!-- connectivity filter -->
<?php
  $filter_tax = "tool_connectivity_requirement";
  include('response-filter-item.php');
?>

<!-- terms filter -->
<?php
  $filter_tax = "tool_terms_and_costs";
  include('response-filter-item.php');
?>

<!-- code type filter -->
<?php
  $filter_tax = "tool_code_type";
  include('response-filter-item.php');
?>
<?php endif; ?>
