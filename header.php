<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package steven_jetton
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'steven-jetton' ); ?></a>

	<header id="masthead" class="site-header bg-8">
		<nav id="site-navigation" class="main-navigation">
			<?php the_custom_logo(); ?>
      <button 
        id="primary-nav-toggle" 
        class="menu-toggle" 
        aria-controls="primary-menu" 
        aria-expanded="false"
      >
        <span class="burger"></span>
        <span class="sr-only"><?php esc_html_e( 'Primary Menu', 'steven-jetton' ); ?></span>
      </button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu'
          // 'walker' => new Steven_Jetton_Top_Nav_walker()
				)
			);
			?>
		</nav><!-- #site-navigation -->


	</header><!-- #masthead -->

