<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package steven_jetton
 */


$footer_options = get_field('footer_options', 'option');
$anchor_id = $footer_options['anchor_id'];
$bg_colors = $footer_options['bg_color_numbers'];
?>

	<footer id="colophon" class="site-footer bg-8">
	<?php //get_template_part('template-parts/svg/decor-svg/decor-top-smooth.svg'); ?>
	<div class="footer-logo">
		<?php the_custom_logo(); ?>
	</div>
	<?php $args = array(
      'theme_location' => 'footer',
			'menu_class' => 'lg-cols-gt-2',
    );
    ?>

      <?php wp_nav_menu($args); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
