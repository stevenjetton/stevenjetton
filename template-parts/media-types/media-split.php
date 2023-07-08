<?php
/**
 * renders an image 
 */
  $split = $args['media']['split'];
  $copy = $split['copy'];
  $cta = $split['cta'];
  $image = $split['image'];
  
  ?>

<div class="lg-cols-gt-3">
  <div class="hero-copy">
    <?php echo $copy ?>
  </div>
  <?php echo wp_get_attachment_image($image, 'full', false, ['loading' => true]); ?>
</div>


