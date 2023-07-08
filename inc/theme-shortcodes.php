<?php
/**
 * MISC SHORTCODES
 */

 /**
*   "Buttons" - links that look like buttons
*/

function button_w_shortcode($atts = [], $content = null) {
  $link = $atts['link'];
  return "<a class='button--w' href='$link'>$content</a>";
}
add_shortcode('button-w','button_w_shortcode');

function button_1_shortcode($atts = [], $content = null) {
  $link = $atts['link'];
  return "<a class='button--1' href='$link'>$content</a>";
}
add_shortcode('button1','button_1_shortcode');

function button_2_shortcode($atts = [], $content = null) {
  $link = $atts['link'];
  return "<a class='button--2' href='$link'>$content</a>";
}
add_shortcode('button2','button_2_shortcode');

function button_3_shortcode($atts = [], $content = null) {
  $link = $atts['link'];
  return "<a class='button--3' href='$link'>$content</a>";
}
add_shortcode('button3','button_3_shortcode');

function button_4_shortcode($atts = [], $content = null) {
  $link = $atts['link'];
  return "<a class='button--4' href='$link'>$content</a>";
}
add_shortcode('button4','button_4_shortcode');


/**
 * Small Text and Big Text
 */

function lyst_small_text($atts, $content=null) {
  return "<span class='small-text'>$content</span><br/>";
}
add_shortcode('sm','lyst_small_text');

function lyst_large_text($atts, $content=null) {
  return "<span class='large-text'>$content</span><br/>";
}
add_shortcode('lg','lyst_large_text');

/**
 * Turn a gallery into a slick slider
 */
function acf_gallery_to_slick($atts) {
  ob_start();
  $field = $atts['field'];
  $slider_class = get_field('slick_class'); 
  $images = get_field($field);
  $slider_html = "";
  if ($images) { 
    $slider_html .= "<div class='$slider_class'>";
    foreach ($images as $image) {  
      $slider_html .= "<div class='slider-img'>";
      $slider_html .= wp_get_attachment_image( $image['ID'], 'full' ); 
      wp_get_attachment_image( $image['ID'], 'full' ); 
      $slider_html .= "</div>";
    } 
    $slider_html .= "</div>";
  }
  echo $slider_html;
  return ob_get_clean();
}
add_shortcode( 'slick-acf', 'acf_gallery_to_slick' );


// Shortcode [apply-now] for adding "Apply Now" button to a page
function apply_now_button($atts) {
  $atts = shortcode_atts(
    array('color' => '2'),
    $atts, 'apply-now'
  );
  $color = $atts['color'];
  $apply_now_link = get_field('apply_now','option');
  return "<a href='$apply_now_link' target='_blank' rel='noopener' class='button--$color'>Apply Now</a>";
}
add_shortcode('apply-now','apply_now_button');

// Shortcode [resident-portal] for adding "Resident Access" button to a page
function resident_portal_button($atts) {
  $atts = shortcode_atts(
    array('color' => '2'),
    $atts, 'resident-portal'
  );
  $color = $atts['color'];
  $resident_link = get_field('resident_portal','option');
  return "<a href='$resident_link' target='_blank' rel='noopener' class='button--$color'>Resident Access</a>";
}
add_shortcode('resident-portal','resident_portal_button');
