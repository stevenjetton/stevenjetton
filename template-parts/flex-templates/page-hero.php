<?php
/**
 * Template part displays Hero layout
 */

 $anchor_id = get_sub_field('anchor_id');
 $bg_colors = get_sub_field('bg_color_numbers');
 $media_options = get_sub_field('media_options');
 $media_type = $media_options['media_type'];

?>

<section id="<?php echo $anchor_id; ?>" class="hero <?php maybe_bg_class($bg_colors); ?>">
	<?php //get_template_part('template-parts/svg/decor-svg/decor-bottom-large-light-blue.svg'); ?>
	<?php //get_template_part('template-parts/svg/decor-svg/decor-bottom-large.svg'); ?>
	<div class="media">
		<?php get_template_part( 'template-parts/media-types/media',
		$media_type,
		['media'=>$media_options]);
		?>
		<!-- <div id="earth"> -->
	</div>
</section>