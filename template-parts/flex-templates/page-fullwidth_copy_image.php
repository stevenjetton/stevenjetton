<?php
/**
 * Template part displays Fullwidth Text layout
 */

$anchor_id = get_sub_field('anchor_id');
$fullwidth_copy_image = get_sub_field('fullwidth_copy_image');
$bg_colors = $fullwidth_copy_image['bg_color_numbers'];
$layout = $fullwidth_copy_image['layout_choices'];
$copy = $fullwidth_copy_image['copy'];
$image = $fullwidth_copy_image['image'];
?>


<section id="<?php echo $anchor_id; ?>" class="fullwidth-copy-image <?php maybe_bg_class($bg_colors); ?>">
	<?php if($layout == 'normal') : ?>
	<div class="normal lg-cols-gt-4 desk:row-center">
	<?php elseif($layout == 'reverse') : ?>
	<div class="fx-row-rev desk:row-center">
	<?php endif; ?>
		<div class="copy">
			<?php echo $copy ?>
			<?php if(!empty($cta['cta_link']['url'])) : ?>
				<a href="<?php echo $cta['cta_link']['url']; ?>" class="cta"><?php echo $cta['cta_link']['title']; ?></a>
			<?php endif; ?>
		</div>
		<?php srcset_full($image); ?>
	</div>
</section>