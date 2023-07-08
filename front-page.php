<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package steven_jetton
 */

get_header();
?>

	<main id="primary" class="site-main">
		<section class="hero bg-8" style="background-image: url('/wp-content/uploads/2022/12/Cloudy-11.svg');
		background-size: cover;
		background-repeat: no-repeat;
		max-width: none;
		width: 100%;
		background-position: center top;
		"
		>
			<h1>Join the prophetic stewardship and encouragement <span class="nowrap">community.</span></h1>
		</section>
		
		<section class="">
			<h2>Prophetic encounter <br>
			<strong>stewardship</strong></h2>
			<div class="lg-cols-gt-4 has-list">
				<div class="content-one">
					<p>Have you had a prophetic encounter with God? Every encounter with God is prophetic and
						encounters with God come in all shapes and sizes, such as dreams, visions, heart whispers, 
						seeing something in a movie, hearing something in a movie, reading something in the good 
						book (or other book) that tickles your heart strings, receiving a prophetic word from somebody, 
						and the list is infinite.
					</p>
					<p>
						Encounters with God are his way of inviting us into a deeper and dynamic relationship with him.
						This website is my invitation to you to join a conversation about all these things.
					</p>
				</div>
				<div class="content-two has-list">
					<h6>Read an article:</h6>
					<ul>
					<?php
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 5,
						'post_status' => 'publish',
						'post__in' => get_option( 'sticky_posts' ),
						'category__not_in' => array(14)

					);
					$article_posts = new WP_Query( $args );
					if($article_posts->have_posts()) : 
					while ($article_posts->have_posts()) : $article_posts->the_post();
					// if(have_posts()) :
					// while(have_posts()) : the_post();
					?>
						<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
					<?php else :	?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
					</ul>
				</div>
			</div>
		</section>
		
		<section class="bg-1" style="padding-top: 4rem;">
			<h2>3:13 Encouragement <br>
				<strong>newsletter</strong>
			</h2>
			<div class="lg-cols-gt-4 has-list">

			<div class="content-one">
		        <div class="sign-up-form-section">
		            <div class="form-wrapper" style="margin-top: 1rem;">
		                	<p style="color: black;">
                			    Join the community that is receiving the 
                				3:13 Encouragement Newsletter every Monday. Each email contains
                				3 encouraging words from me, 1 question for you, and 3 truths about who you are in Christ.
        					</p>
				        <?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true"]'); ?>
								<p style="color: black;">Inspired by Hebrews 3:13, "encourage one another daily".</p>
				    </div>
				</div>
			</div>
			
			<div class="content-two">
				<h6>Browse my newsletter</h6>
				<?php
					$args = array(
						'post_type' => 'newsletters',
						'posts_per_page' => 5,
						'post_status' => 'publish'
					);
					$the_query = new WP_Query( $args ); ?>
					<ul>
					<?php if ( $the_query->have_posts() ) : ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
						<?php else : ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
				</ul>	
				</div>
			</div>
		</section>

        <!--
		<section>
			<div id="encouragement" class="sign-up-form-section">
				<div class="content-wrapper">
					<h6>
						Get started with a free chapter (verse by verse) download about who you are now in Christ.
					</h6>
					<div class="form-wrapper">
						<?php //echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
					</div>
				</div>
			</div>
		</section>
		-->

				<!--<p>-->
				<!--	I received my first prophetic word in a public church setting in 2006 and have been stewarding-->
				<!--	those words God spoke to me to this day. I've been inspired to write about-->
				<!--	this idea since 2018. There is no cookie-cutter approach to stewarding prophetic encounters. God has a lot to say-->
				<!--	in the scripture about what we can do with encounters and promises we recieve from heaven.-->
				<!--</p>-->
				<!--<p>-->
				<!--	Every believer's God-given identity is unique. We have a lot in common,-->
				<!--	being sons and daughters born of God, but we are not cookie-cutter replicas-->
				<!--	of each other! We all have a unique identity, calling and gift mix that -->
				<!--	make up the DNA or who we are in Christ.-->
				<!--</p>-->
				<!-- <ul>
					<li>Awareness of identity in Christ</li>
					<li>Alignment to that identity in Christ</li>
					<li>Acceleration into becoming that identity in Christ</li>
				</ul> -->


		<!-- 
		<section id="home-sign-up-newsletter" class="bg-8">
		<div class="lg-cols-gt-3">
			<div class="copy">
				<h2>3:13 Encouragement</h2>
				<p><i>3:13 Encouragement is inspired by Hebrews 3:13, "encourage
				one another daily".
				</i></p>
				<p>
				Join the community of encouragment that is receiving the 
				3:13 Encouragement every Monday by 3:13 p.m. Each email contains
				an encouragement from me, related scripture, and questions for you. 
				</p>
			</div>
			<div class="sign-up-form-section">
				<div class="form-wrapper">
					<p class="heading">Join today for free, weekly encouragment by entering your email.</p>
					<?php //echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true"]'); ?>
					<p>
						No spam. But a whole lotta truth about who you are in Christ.
					</p>
				</div>
			</div>
		</div>
	</section> 
	-->
	
	<?php
		//while ( have_posts() ) :
			//the_post();

			//get_template_part( 'template-parts/content', 'page' );

		//endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
