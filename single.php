<?php
/**
 * The template for displaying all single posts
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
					<?php the_title('<h1>', '</h1>'); ?>
					

					<?php $author = get_the_author(); ?>
					<p class="author-info-meta"><i>written by</i> 
						<a href="/about/" class="the-author">
							<?php echo $author ?>
						</a> | 
					
					<?php
					// get_template_part( 'template-parts/content', get_post_type() );
					$categories = get_the_category();
					$separator = ", ";
					$output = "";
					
						if($categories) { ?>
						<span class="cat-list">	
						<?php
							foreach($categories as $category) {
								$output .= '<a href="' . get_category_link($category->term_id) .'" class="cat-copy">' . $category->cat_name . '</a>' . $separator;
							}

							echo trim($output, $separator);
						}
					?>
					</span>
					</p>

				</section><!-- end .article-header -->

				<article class="article">
					<?php the_content(); ?>
					<?php
					endwhile;
					else : 
						echo '<p>No Content Found</p>';
						
					wp_reset_postdata();
					endif;?> 
				

				</article><!-- end .article -->
				<section class="sign-up-form-section">
					<div class="form-wrapper">
						<p class="form-intro-copy">Thanks for reading. You can get more articles like this once a week in your
							inbox. 
						</p>
						<div class="form-wrapper">
							<?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?>
						</div>
					</div>
				</section>
			</div><!-- end .header-and-article-wrapper -->

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
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 3
				// 'category__in' => 

			);
			$article_posts = new WP_Query($args);

			if($article_posts->have_posts()) : 
				?>
			<div class="read-next-widget">
				<h2>Read next</h2>
				<ul class="">
					<?php while($article_posts->have_posts()) :
						$article_posts->the_post(); ?> 
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

		</div><!-- .content-container -->
	</main><!-- #main -->
<?php

get_footer();
