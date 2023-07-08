<?php
/**
 * Renders an accessible CTA
 */
$cta = $args['cta'];
$link = $cta['cta_link'];
$descrip = $cta['accessible_description'];
$cta_color = !empty($args['color']) ? $args['color'] : '2';
?>

<a 
class="button--<?php echo $cta_color ?>" 
href="<?php echo esc_url( $link['url'] ); ?>" 
<?php if ( $descrip ) : ?>
  aria-label="<?php echo $descrip; ?>"
<?php endif; ?>
>
  <?php echo esc_html( $link['title'] ); ?>
</a>
