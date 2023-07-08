<?php
/**
 * The Blog Posts Index Page template file
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
					This page lists my articles on prophetic encounter stewardship.
					Prophetic encounter stewardship is what we do after we have an
					encounter with God of any type: a dream, someone gives
					you a prophetic word, God highlights a scripture for you,
					God gives you a promise, a vision, and any other type of
					encounter you have with God. I explore answers to questions like,
					"What is prophetic encounter stewardship?", "Are there any examples 
					from scripture?", "Does the bible really have anything 
					to say about what to do with a prophetic encounter?". 
				</p>
				<br />
				<!--<p>-->
				<!--	In my writing, I expolore the scriptures to see how people in -->
				<!--	the bible interacted with God and how God interacted with them as -->
				<!--	relates to prophetic encounters. I broaden the scope of what -->
				<!--	"prophetic words" means by including any type of encounter with -->
				<!--	God where the person, group or nation received the Word of the Lord. -->
				<!--</p>-->
			</div>
			<div class="sign-up-form-section">
				<div class="form-wrapper">
					<p class="heading">Get the latest news and <span class="nowrap">prophetic encounter stewardship articles.</span></p>
					<?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?>
					<p class="">
						No spam. Only the latest articles on prophetic encounter stewardhip.
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


<div class="blog-section grid-4">
<?php
//for each category, show 5 posts
$cat_args=array(
  'orderby' => 'name',
  'order' => 'ASC'
   );
$categories=get_categories($cat_args);
  foreach($categories as $category) { 
		
		// echo '<pre>';
		// var_dump($category);
		// echo '</pre>';
		$cat_link = get_category_link($category->term_id);
    $args=array(
      'posts_per_page' => 3,
      'category__in' => array($category->term_id),
			'post_status' => 'publish',
      'ignore_sticky_posts'=>0
    );
    $posts=get_posts($args);
      if ($posts) { ?>
				<ul>
        <?php echo '<h2>' . $category->name . '</h2>';
        foreach($posts as $post) {
					
          setup_postdata($post); 
					?>
          <li>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<?php the_title(); ?>
						</a>
					</li>
					<?php
				} // foreach($posts
				wp_reset_postdata();
				?>
				<a href="<?php echo esc_attr( esc_url($cat_link) ); ?>" title="Category Name"
				class="cat-read-more"
				>
				Read more articles about <?php echo $category->name ?>
				</a>
				<?php
      } // if ($posts
			?>
			</ul>	
			<?php
    } // foreach($categories
	?>
	</div><!-- end .blog-section -->
</section>
</main><!-- #main -->

<?php get_footer(); ?>