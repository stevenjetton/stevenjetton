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
				<h1>3:13 Encouragment</h1>
				<p><i>3:13 Encouragment is inspired by Hebrews 3:13, 
					"encourage one another daily".</i></p>
				<p>
			  Join the community that is receiving the 3:13 Encouragement Newsletter every Monday. Each email contains
                3 encouraging words from me, 1 question for you, and 3 truths about who you are in Christ.
				</p>
			</div>
			<div class="sign-up-form-section">
				<div class="form-wrapper">
					<p class="heading">Get the "3:13 Encouragement" newsletter in your inbox.</p>
					<?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true"]'); ?>
					<p class="">
						No spam. But a whole lotta encouragement.
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="newsletter-section">
		<div class="text-center">
			<h2>All Encouragement Newsletters</h2>
			<p style="padding-top: 1.5rem;">Read past issues of the 3:13 Encouragement newsletter</p>
			</div>
		<div class="all-newsletters-list">
		<div class="this-year">
			<?php
			$args = array(
					'post_type' => 'newsletters',
					'posts_per_page' => -1,
					'post_status' => 'publish',
					'year' => '2023'
			);

			$the_query = new WP_Query( $args ); ?>

			<?php if ( $the_query->have_posts() ) : ?>
			<div class="all-articles-year">
				<p>2023</p>
			</div>
			<ul>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<li>
					<p class="the-date"><?php the_date('M j'); ?></p>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</li>
				<?php endwhile; ?>
				
			</ul>
			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
			<div class="this-year">
			<?php
			$args = array(
					'post_type' => 'newsletters',
					'posts_per_page' => -1,
					'post_status' => 'publish',
					'year' => '2022'
			);

			$the_query = new WP_Query( $args ); ?>

			<?php if ( $the_query->have_posts() ) : ?>
			<div class="all-articles-year">
				<p>2022</p>
			</div>
			<ul>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<li>
					<p class="the-date"><?php the_date('M j'); ?></p>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</li>
				<?php endwhile; ?>
				
			</ul>
			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
	</div>
</section><!-- end .newsletter-section -->
</main><!-- #main -->

<?php get_footer(); ?>