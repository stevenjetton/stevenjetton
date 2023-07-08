<?php
/**
 * Template Name: Custom Blog Page
 * 
 * @package steven_jetton
 */

get_header(); 

?>


<main id="primary" class="site-main">
	<section>
		<div class="lg-cols-gt-3">
			<div class="copy">
				<h1>Articles</h1>
				<p>
					This page lists my best articles on prophetic stewardship.
					What is prophetic stewardship anyway? What you do with a prophetic
					word after you recieve it is what I call prophetic stewarship.
					If you are active in a church that practices the gift of prophesy,
					then you probably have a few prophetic words.
				</p>
				<br />
				<p>
					In my writing, I expolore the scriptures to see how people in 
					the bible interacted with God and how God interacted with them as 
					relates to prophetic words. You will need to know that I broaden
					the scope of what "prophetic words" means by including any type of
					encounter with God where the person, group or nation received the 
					Word of the Lord. 
				</p>
			</div>
			<div class="sign-up-form-section">
				<div class="form-wrapper">
					<?php echo do_shortcode('[mc4wp_form id="2269"]'); ?>
				</div>
				<p class="">
					No spam. In fact, I won't email you that often.
				</p>
				<p class="">
					Just once a week with the best of the best.
				</p>
			</div>
		</div>
	</section>

	<section>
		<div class="text-center">
			<h1>All Articles</h1>
			<p>Browse by article topic.</p>
		</div>
	</section>
		
<section class="blog-section">
	<div class="lg-cols">
		<div class="category-column">
		<?php // opinion posts loop begins here
	$prophetic_stewardship = new WP_Query('cat=4&posts_per_page=2');

	if ($prophetic_stewardship->have_posts()) : ?>
		<h2>Prophetic Stewardship</h2>
		<ul>
		<?php while ($prophetic_stewardship->have_posts()) : $prophetic_stewardship->the_post(); ?>

				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

		<?php endwhile;

		else :
			// fallback no content message here
	endif;
	?>
	</ul>
	<?php
	wp_reset_postdata(); 
	?>
		</div>

		<div class="category-column">
		<?php
	$bible_examples = new WP_Query('cat=15&posts_per_page=2');

	if ($bible_examples->have_posts()) : ?>
		<h2>Biblical Examples</h2>
		<ul>
			<?php while ($bible_examples->have_posts()) : $bible_examples->the_post(); ?>
			
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><li>
			
			<?php endwhile;

			else :
				// fallback no content message here
			endif; 
			?>
			</ul>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</section><!-- end .blog-section -->
</main><!-- #main -->

<?php get_footer(); ?>