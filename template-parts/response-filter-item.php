<?php
  $taxonomy = get_taxonomy($filter_tax);
  if($taxonomy && $taxonomy->public) :
  $taxonomy_slug = $taxonomy->rewrite['slug'];
  $terms = get_terms( array ( 'taxonomy'=>$taxonomy->name, 'hide_empty'=>true ) );
  if(!empty($terms)) :
?>

<div class="card">
  <div class="card-header"><?php echo $taxonomy->labels->name; ?></div>
  <div class="card-body">
    <ul>
    <?php
      foreach($terms as $term) {
        $active = "";
        if(is_tax($filter_tax) && $term->slug === $term_slug) { $active = " class=\"active\""; }
        echo "<li $active><a href=\"/$taxonomy_slug/$term->slug\">$term->name</a></li>";
      }
    ?>
    </ul>
</div>
</div>
<?php endif; endif; ?>
