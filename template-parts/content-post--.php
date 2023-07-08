<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package steven_jetton
 */

?>

	<!--<header class="entry-header">
		<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>.entry-header -->

	<?php //steven_jetton_post_thumbnail(); ?>

	<aside class="aside">
			<div class="about-author">
				<h2>About the author</h2>
				<p><strong>Steven Jetton </strong> writes about identity in Christ Jesus and how 
				prophetic stewarship is the journey that each beleiver must take in order to fully
				mature into his or her God-given identity.
				</p>
				<div class="link-wrapper">
					<a href="/about">Click here to learn more 
						<span>&#8594;</span>
					</a>
				</div>
			</div>

			<?php
			$normal_posts = new WP_Query(array(
				'post_type' => 'post',
				'posts_per_page' => '5',
				'post_status' => 'published',
				// 'category__in' => 

			));
		
			if($normal_posts->have_posts()) : 
				setup_postdata($normal_posts);
				?>
			<div class="read-next-widget">
				<h2>Read next</h2>
				<ul class="">
					<?php while($normal_posts->have_posts()) :
					$normal_posts->the_post(); ?> 
						<li class="">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</ul>
				<?php endif; ?>
				<div class="link-wrapper">
					<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="read-more">All articles
					<span>&#8594;</span>
					</a> 
				</div>
			</div><!-- .read-next-widget -->
		</aside><!-- .aside -->
		



