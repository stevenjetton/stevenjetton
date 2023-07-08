<?php
/**
 * Template part displays Card Grid layout
 */

 $anchor_id = get_sub_field('anchor_id');
 $bg_colors = get_sub_field('bg_color_numbers');
 $card_group = get_sub_field('card_group');
 $cards = $card_group['cards'];

 ?>

<section id="<?php echo $anchor_id; ?>" class="card-section <?php maybe_bg_class($bg_colors); ?>">
	<?php if($cards) : ?>
		<ul class="grid-2 ministry-cards">
			<?php foreach ($cards as $one_card) : 
				$copy = $one_card['copy'];
				$icon = $one_card['icon'];
				$cta = $one_card['cta'];
				$show_hide = $one_card['show_hide'];
				// echo '<pre>';
				// var_dump($file);
				// echo '</pre>';
			?>
		<?php if($show_hide == 0) : ?>
		<li class="card fx-col">
			<?php echo $copy ?>
			<?php if($icon) : echo srcset_full($icon); endif; ?>
			<?php if(!empty($cta['cta_link']['url'])) : ?>
				<a href="<?php echo $cta['cta_link']['url']; ?>" class="cta">
				<?php echo $cta['cta_link']['title']; ?>
				</a>
			<?php endif; ?>
		</li>
		<?php endif; ?>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
</section>