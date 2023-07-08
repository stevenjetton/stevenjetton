<?php
/**
 * The Newsletter Index Page template file
 * 
 * @package steven_jetton
 */

get_header(); 

?>


<main id="primary" class="site-main">
	<section class="bg-8">
		<div class="lg-cols-gt-3">
			<div class="copy">
				<h1>Articles</h1>
				<p>
					This page lists my monthly 1x1 newsletters. In my writing, I expolore 
					the scriptures to see how people in the bible interacted with God and how God interacted with them as 
					relates to prophetic words. You will need to know that I broaden
					the scope of what "prophetic words" means by including any type of
					encounter with God where the person, group or nation received the 
					Word of the Lord. 
				</p>
			</div>
			<div class="sign-up-form-section">
				<div class="form-wrapper">
					<p class="heading">Get the latest news and prophetic stewardship articles.</p>
					<?php echo do_shortcode('[mc4wp_form id="2269"]'); ?>
					<p class="">
						No spam. You have my word.
					</p>
				</div>
			</div>
		</div>
	</section>

<section>
	<div class="text-center">
		<h2>All Articles</h2>
		<p>Browse by article topic.</p>
	</div>


<div class="blog-section">
	<?php
		//for each category, show 5 posts
		$cat_args=array(
			'orderby' => 'name',
			'order' => 'ASC'
		);
		$categories=get_categories($cat_args); 
		//if($categories) : ?>
	<!-- <div class="grid-4"> -->
		<div class="grid-4">
		<?php
		foreach($categories as $category) :
			$args=array(
				'showposts' => 5,
				'category__in' => array($category->term_id),
				'ignore_sticky_posts'=>1
			);
			$posts=get_posts($args);
				if ($posts) : ?>
					<ul>
					<?php echo '<h2>' . $category->name . '</h2>' ?>
					<?php foreach($posts as $post) : ?>
						<?php setup_postdata($post); ?>
						<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
						<?php endforeach; ?>
						<?php wp_reset_postdata(); ?>
					</ul>
				<?php endif; ?>
			<?php endforeach; ?>

		<!-- </div> -->
		<?php //endif; ?>
		</div>
	</div>
</section><!-- end .blog-section -->
</main><!-- #main -->

<?php get_footer(); ?>