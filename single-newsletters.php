<?php
/**
 * The template for displaying all single-newsletter posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package steven_jetton
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="content-container desk:fx-row">
			<div class="header-and-article-wrapper">
				<section class="article-header">
				<?php
				if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
					<h1><?php the_title(); ?> </h1>
					<?php $author = get_the_author(); ?>
					<p class="author-info-meta"><i>sent by</i> <span class="the-author"><a href="/about/"><?php echo $author ?></a></span> | 
					<span class="the-date"><?php the_date(); ?></span>
				<?php
					// get_template_part( 'template-parts/content', get_post_type() );
					$categories = get_the_category();
					$separator = ", ";
					$output = "";
					
					if($categories) :
						foreach($categories as $category) : 
						$link = get_category_link($category->term_id);
				
						?>
						<span style="text-transform: uppercase;">
						    <?php $link ?><?php echo $category->cat_name; ?>
						</span>
						<?php endforeach; ?>
					<?php endif; ?>
					
					<?php
					// $post_tags = get_the_tags();

					// if ( $post_tags ) {
					// 	foreach( $post_tags as $tag ) {
					// 		echo $tag->name . ', '; 
					// 	}
					// }
					?>
				</section><!-- end .article-header -->
				<section class="article">
					<?php the_content(); ?>
					<?php
					endwhile;
					else : 
						echo '<p>No Content Found</p>';
						
					endif;?> 
				<?php wp_reset_postdata(); ?>

				</section><!-- end .article -->
				<section class="sign-up-form-section">
					<div class="form-wrapper">
						<p class="form-intro-copy">Thanks for reading. You can get more encouraging 
							content like this in your inbox every Monday. My 3:13 Encouragement
							newsletter is based on Hebrews 3:13, "... encourage one another daily."</p>
						<div class="form-wrapper">
							<?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?>
						</div>
					</div>
				</section>
			</div><!-- end .header-and-article-wrapper -->

		<aside class="aside">
			<div class="about-author">
				<h2>About the author</h2>
				    <p>I received my first prophetic word in a public church setting in 2006 and have been stewarding
					those words God spoke to me to this day. I've been inspired to write about
					this idea since 2018. I've discovered is that although there is 
					no cookie-cutter approach to stewarding prophetic words, God has a lot to say
					in the scripture about what we can do with the words and promises we recieve from heaven.
					</p>
				<div class="link-wrapper">
					<a href="/about">Click here to learn more 
						<span>&#8594;</span>
					</a>
				</div>
			</div>

			<?php
			$newsletter_posts = new WP_Query(array(
				'posts_per_page' => 3,
				'post_type' => 'newsletters',
				'post_status' => 'publish'
			));
		
			if($newsletter_posts->have_posts()) : ?>
			<div class="read-next-widget">
				<h2>Read next</h2>
				<ul class="">
					<?php while($newsletter_posts->have_posts()) :
					$newsletter_posts->the_post(); ?> 
						<li class="">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
				<div class="link-wrapper">
					<a href="<?php echo get_post_type_archive_link('newsletters') ?>" class="read-more">All Newsletters
					<span>&#8594;</span>
					</a> 
				</div>
			</div><!-- .read-next-widget -->
		</aside><!-- .aside -->

		</div><!-- .content-container -->
	</main><!-- #main -->
<?php
get_footer();
