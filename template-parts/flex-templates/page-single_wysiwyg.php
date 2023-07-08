<?php
/**
 * Template part displays Single Wywiwyg layout
 */

$single_wysiwyg = get_sub_field('single_wysiwyg');
$anchor_id = $single_wysiwyg['anchor_id'];
$bg_colors = $single_wysiwyg['bg_color_numbers'];
$layout = $single_wysiwyg['layout_choices'];
$copy = $single_wysiwyg['copy'];
$image = $single_wysiwyg['image'];
$cta = $single_wysiwyg['cta'];
?>

<section id="<?php echo $anchor_id; ?>" class="single-wysiwyg <?php maybe_bg_class($bg_colors); ?>">
<?php if($layout == 'stacked') : ?>
	<div class="stacked">
			<div class="copy">
				<?php echo $copy ?>
				<?php if(!empty($cta['cta_link']['url'])) : ?>
					<a href="<?php echo $cta['cta_link']['url']; ?>" class="cta"><?php echo $cta['cta_link']['title']; ?></a>
				<?php endif; ?>
			</div>
			<?php if(!empty($image)) : ?>
			<div class="image-wrapper">
				<?php srcset_full($image); ?>
			</div>
			<?php endif; ?>
		</div>
	<?php elseif($layout == 'normal') : ?>
		<div class="normal lg-cols desk:row-center">
			<div class="copy">
				<?php echo $copy ?>		
				<?php if(!empty($cta['cta_link']['url'])) : ?>
					<a href="<?php echo $cta['cta_link']['url']; ?>" class="cta"><?php echo $cta['cta_link']['title']; ?></a>
				<?php endif; ?>
			</div>
			<?php if(!empty($image)) : ?>
			<div class="image-wrapper">
				<?php srcset_full($image); ?>
			</div>
			<?php endif; ?>
		</div>
	<?php elseif($layout == 'reverse') : ?>
		<div class="fx-row-rev desk:row-center">
			<div class="copy">
				<?php echo $copy ?>
				<?php if(!empty($cta['cta_link']['url'])) : ?>
					<a href="<?php echo $cta['cta_link']['url']; ?>" class="cta"><?php echo $cta['cta_link']['title']; ?></a>
				<?php endif; ?>
			</div>
			<?php if(!empty($image)) : ?>
			<div class="image-wrapper">
				<?php srcset_full($image); ?>
			</div>
			<?php endif; ?>
		</div>
<?php endif; ?>
</section>