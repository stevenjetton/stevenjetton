<?php
/**
 * Template part displays Single Wywiwyg layout
 */

$list_with_icons = get_sub_field('list_with_icons');
$anchor_id = $list_with_icons['anchor_id'];
$bg_colors = $list_with_icons['bg_color_numbers'];
$layout = $list_with_icons['layout_choices'];
$heading = $list_with_icons['heading'];
$list_items = $list_with_icons['list_with_icons'];
$image = $list_with_icons['image'];
$cta = $list_with_icons['cta'];

?>

<section id="<?php echo $anchor_id; ?>" class="list-with-icons <?php maybe_bg_class($bg_colors); ?>">
	<?php if($layout == 'normal') : ?>
	<div class="normal lg-cols desk:row-center">
	<?php elseif($layout == 'reverse') : ?>
	<div class="lg-cols fx-row-rev desk:row-center">
		<?php endif; ?>
		<div class="list-wrapper">
		<?php if($list_items) : ?>
			<?php echo $heading ?>
		<ul>
			<?php foreach($list_items as $item) : 
				$copy = $item['copy'];
				$icon = $item['icon'];
				?>
				<li><span><?php echo srcset_full($icon); ?></span><?php echo $copy ?></li>
				<?php endforeach; ?>
			</ul>
				<?php if(!empty($cta['cta_link']['url'])) : ?>
				<a href="<?php echo $cta['cta_link']['url']; ?>" class="cta"><?php echo $cta['cta_link']['title']; ?></a>
				<?php endif; ?>
			<?php endif; ?>
			</div>
			<div class="image-wrapper">
				<?php srcset_full($image); ?>
			</div>
		</div>
</section>