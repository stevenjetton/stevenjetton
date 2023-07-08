<?php
/**
 * renders an image 
 */
  $background_image = $args['media']['background_image']['hero_image'];
  echo wp_get_attachment_image($background_image, 'full', false, ['loading' => true]);
?>

