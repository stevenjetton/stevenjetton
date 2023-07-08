<?php
/**
* A Simple Category Template
*/
 
get_header(); ?> 

<main>


  <section id="primary" class="site-content">
    <div id="content" role="main">
      <div class="cat-list">
      <?php 
      // Check if there are any posts to display
      if ( have_posts() ) : ?>

      <header class="archive-header">
      <h1 class="archive-title">All <?php single_cat_title(); ?> articles</h1>


      <?php
      // Display optional category description
      if ( category_description() ) : ?>
      <div class="archive-meta"><?php echo category_description(); ?></div>
      <?php endif; ?>
      </header>
      <ul style="list-style-type: disc;">
      <?php
      while ( have_posts() ) : the_post(); ?>
      <li>
        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
      </li>
      <?php endwhile; 

      else: ?>
      <p>Sorry, no posts matched your criteria.</p>
      </ul>

      <?php endif; ?>
      </div>
      <div class="sidebar">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>