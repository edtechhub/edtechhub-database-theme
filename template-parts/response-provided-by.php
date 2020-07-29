<p><strong>Provided by:</strong>
  <?php
    $lead_organisation = get_post_meta($post->ID,'tool_developer',true);
    $website = get_post_meta($post->ID,'website',true);

    if($lead_organisation != '') :
      if($website != '') : ?>
        <a href="<?php echo $website ; ?>"><?php echo $lead_organisation; ?></a>
        <br/><strong>Website:</strong> <a href="<?php echo $website ; ?>"><?php echo $website; ?></a>
  <?php
      else : ?>
        <?php echo $lead_organisation; ?>
  <?php
      endif;
    else : ?>
      Unknown
  <?php endif; ?>
</p>
