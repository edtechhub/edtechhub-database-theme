<?php
$lead_organisation = get_post_meta($post->ID,'tool_developer',true);
$website = get_post_meta($post->ID,'website',true);

if($lead_organisation != '' || $website != '') : ?><p><?php
  if($lead_organisation != '') : ?>
    <strong>Provided by:</strong> <a href="<?php echo $website ; ?>"><?php echo $lead_organisation; ?></a>
    <?php
  endif;

  if($lead_organisation != '' && $website != '') : ?><br/><?php endif;

  if($website != '') : ?>
    <strong>Website:</strong> <a href="<?php echo $website ; ?>"><?php echo $website; ?></a>
    <?php
  endif;

  ?></p><?php
endif;
?>
