<?php
/**
 * Steven Jetton functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package steven_jetton
 */

if ( ! defined( 'STEVEN_JETTON_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'STEVEN_JETTON_VERSION', '1.0.0' );
}

if ( ! function_exists('lyst_log') ) {
  function lyst_log ( $log ) {
    if ( is_array( $log ) || is_object( $log ) ) {
      error_log( print_r( $log, true) );
    } else {
      error_log( $log );
    }
  }
}

if ( ! function_exists( 'steven_jetton_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function steven_jetton_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on , use a find and replace
		 * to change 'steven-jetton' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'steven-jetton', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'steven-jetton' ),
				'footer' => esc_html__( 'Footer', 'steven-jetton' ),

			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'steven_jetton_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'steven_jetton_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function steven_jetton_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'steven_jetton_content_width', 640 );
}
add_action( 'after_setup_theme', 'steven_jetton_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function steven_jetton_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'steven-jetton' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'steven-jetton' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'steven_jetton_widgets_init' );


// Disable Gutenburg
add_filter('use_block_editor_for_post', '__return_false', 10);


/**
 *-------------------------------------------------------------------------------- 
 * --- CUSTOM POST TYPES ---
 *-------------------------------------------------------------------------------- 
 */


/***********************************************************************************/

/**
 *-------------------------------------------------------------------------------- 
 * --- ADVANCED CUSTOM FIELDS ---
 *-------------------------------------------------------------------------------- 
 */

// Load Composer’s autoloader
// NOTE: Don't forget to run composer install when starting project or the site will crash
require_once (__DIR__ . '/vendor/autoload.php');

 
/* Allow shortcodes in ACF textarea fields */
add_filter('acf/format_value/type=textarea', 'do_shortcode');
add_filter('acf/format_value/type=text', 'do_shortcode');

/* Create Options Pages */

if( function_exists('acf_add_options_page') ) {
	
  acf_add_options_page(array(
		'page_title' 	=> 'Site Settings',
		'menu_title'	=> 'Site Settings',
		'menu_slug' 	=> 'site-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
  ));
	
}

/**
 * Customize ACF Color Picker
 */
$steven_jetton_theme_colors = ['#2b2d42','#5fdd9d','#fffc31',"#a9def9","#4d9de0", "#ffffff","#000000", "#f4f4f4", "#4d4d4d"];
$color_index = 0;
define( 'THEME_COLORS', $steven_jetton_theme_colors );

function custom_acf_color_picker() { ?>
  <script type="text/javascript">
  (function($){
    acf.add_filter('color_picker_args', function(args,$field){
      args.palettes = <?php array_to_js(THEME_COLORS); ?>;
      return args;
    });
  })(jQuery);
  </script>
<?php
}
add_action('acf/input/admin_footer','custom_acf_color_picker');

/**
 * Populate ACF select field options with Gravity Forms forms
 * Field Name must be gform_picker
 * Field Type must be select
 * https://www.advancedcustomfields.com/resources/acf-load_field/
 */
function acf_populate_gf_forms_ids( $field ) {
	if ( class_exists( 'GFFormsModel' ) ) {
		$choices = [];

		foreach ( \GFFormsModel::get_forms() as $form ) {
			$choices[ $form->id ] = $form->title;
		}

		$field['choices'] = $choices;
	}

	return $field;
}
add_filter( 'acf/load_field/name=gform_picker', 'acf_populate_gf_forms_ids' );


/***********************************************************************************/


/**
 *-------------------------------------------------------------------------------- 
 * --- MISC CONTENT FILTERS ---
 *-------------------------------------------------------------------------------- 
 */

/**
 * Filter YouTube oembed url to add rel=0 so it doesn't show rando videos
 * also adds the url param to allow the Youtube iframe api
 */
function no_youtube_randos( $html, $url, $args ) {
  if ( strpos( $html,'youtube' ) !== false || strpos($html,'youtu.be') !== false ) {
    $args = [
      'rel' => 0,
      'showinfo' => 0,
      'modestbranding' => 1,
      'enablejsapi' => 1
    ];
    $params = '?feature=oembed&';
    foreach ( $args as $arg => $val ) {
      $params .= "$arg=$val&";
    }
    $html = str_replace( '?feature=oembed', $params, $html );
  }
  return $html;
}
add_filter( 'oembed_result', 'no_youtube_randos', 10, 3 );

/**
 *-------------------------------------------------------------------------------- 
 * --- Menu Filters ---
 *-------------------------------------------------------------------------------- 
 */

// Change all menu Apply Now links to the url for Apply Now in the Community Settings.
// NOTE: the link title attribute must be "application portal"
function menu_apply_now_change($menu_objects, $args) {
  $apply_now_url = get_field('leasing_portal_link','option');
  if ( !empty($apply_now_url) ) {
    foreach ( $menu_objects as $menu_item ) {
      if ($menu_item->attr_title == 'application portal') {
        $menu_item->url = $apply_now_url;
      }
    }
  }
  return $menu_objects;
}
// add_filter('wp_nav_menu_objects','menu_apply_now_change', 10, 2);

// Automatically change menu link if it's the resident portal link
// NOTE: checks the title attribute for "residents portal"
function menu_residents_change($menu_objects, $args) {
  $residents_url = get_field('residents_link','option');
  if ( !empty($residents_url) ) {
    foreach ( $menu_objects as $menu_item ) {
      if ($menu_item->attr_title == 'residents portal') {
        $menu_item->url = $residents_url;
      }
    }
  }
  return $menu_objects;
}
// add_filter('wp_nav_menu_objects','menu_residents_change', 10, 2);

/**
 *-------------------------------------------------------------------------------- 
 * --- COMMUNITY CONSTANTS ---
 *-------------------------------------------------------------------------------- 
 */

// define( 'CONTACT', get_field('contact_info', 'option') );
// define( 'FOOTER_CONTENT', get_field('footer_content', 'option') );
// define( 'COMM_NAME', get_field('details_community_name', 'option') );
// define( 'LEASING_ACTIVE', get_field('leasing_active', 'option') );
/***********************************************************************************/

/**
 *-------------------------------------------------------------------------------- 
 * --- ENQUEUE SCRIPTS & STYLES ---
 * Note: Sass will bundle Magnific Popup and Slick slider CSS with the theme CSS
 * Webpack will bundle Slick JS and Magnific Popup JS with the theme JS
 *-------------------------------------------------------------------------------- 
 */
function steven_jetton_scripts() {
	wp_enqueue_style( 'steven-jetton-style', get_stylesheet_directory_uri() . '/public/css/main.min.css', array(), filemtime(get_stylesheet_directory() . '/public/css/main.min.css') );
	wp_style_add_data( 'steven-jetton-style', 'rtl', 'replace' );

  // consolidated JS file (via webpack)
  wp_register_script( 'steven-jetton-main-js', 
    get_template_directory_uri() . '/public/js/steven-jetton-main.min.js', 
    array( 'jquery' ), 
    filemtime(get_template_directory() . '/public/js/steven-jetton-main.min.js'), 
    true 
  );
  wp_enqueue_script( 'steven-jetton-main-js' );
}
add_action( 'wp_enqueue_scripts', 'steven_jetton_scripts' );

function steven_jetton_admin_scripts() {
  wp_enqueue_style( 'steven-jetton-admin-style', get_template_directory_uri() . '/admin/admin-styles.css' );
	wp_enqueue_script(
		'theme-admin-scripts',
		get_template_directory_uri() . '/admin/admin-scripts.js',
		array('jquery'),
		false,
		true
	);
}
add_action( 'admin_enqueue_scripts', 'steven_jetton_admin_scripts', 20 );

/***********************************************************************************/

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * MISC HELPER FUNCTIONS 
 *********************************************************************************/
require get_template_directory() . '/inc/theme-helper-functions.php';

/**
 *  MISC Shortcodes
 *********************************************************************************/
require get_template_directory() . '/inc/theme-shortcodes.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Nav Walkers
 */
require get_template_directory() . '/inc/theme-navigation/top-nav-walker.php';
require get_template_directory() . '/inc/theme-navigation/footer-nav-walker.php'; 

/**
 * Lyst ACF Layouts
 */
require get_template_directory() . '/inc/theme-custom-fields.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 *-------------------------------------------------------------------------------- 
 *     ---- FORMS FUNCTIONALITY ----
 *-------------------------------------------------------------------------------- 
 */

/**
 * Gravity Wiz // Gravity Forms // Entry Count Shortcode
 *
 * Extends the [gravityforms] shortcode, providing a custom action to retrieve the total entry count and
 * also providing the ability to retrieve counts by entry status (i.e. 'trash', 'spam', 'unread', 'starred').
 *
 * @version	  1.0
 * @author    David Smith <david@gravitywiz.com>
 * @license   GPL-2.0+
 * @link      http://gravitywiz.com/...
 */
add_filter( 'gform_shortcode_entry_count', 'gwiz_entry_count_shortcode', 10, 2 );
function gwiz_entry_count_shortcode( $output, $atts ) {

    extract( shortcode_atts( array(
        'id' => false,
        'status' => 'total', // accepts 'total', 'unread', 'starred', 'trash', 'spam'
        'format' => false // should be 'comma', 'decimal'
    ), $atts ) );

    $valid_statuses = array( 'total', 'unread', 'starred', 'trash', 'spam' );

    if( ! $id || ! in_array( $status, $valid_statuses ) ) {
        return current_user_can( 'update_core' ) ? __( 'Invalid "id" (the form ID) or "status" (i.e. "total", "trash", etc.) parameter passed.' ) : '';
    }

    $counts = GFFormsModel::get_form_counts( $id );
    $output = rgar( $counts, $status );

    if( $format ) {
        $format = $format == 'decimal' ? '.' : ',';
        $output = number_format( $output, 0, false, $format );
    }

    return $output;
}


add_filter( 'gform_confirmation_anchor', '__return_true' );

/**
 *      FIRES THE FORM SUBMISSION EVENT FOR GTM
 */
add_filter( 'gform_confirmation', 'fire_form_submit_tracking', 10, 4 );
function fire_form_submit_tracking( $confirmation, $form, $entry, $ajax ) {
    if ( is_array( $confirmation ) ) {
        return $confirmation;
    } else {
        return $confirmation .= "<script>(function(){ window.dataLayer ? window.dataLayer.push({'event':'formConfirmed'}) : false; })();</script>";
    }
}

function allow_new_mime_type($mimes) {

	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}
add_filter( 'mime_types', 'allow_new_mime_type' );

function current_year() {
	$year = date('Y');
	return $year;
}

add_shortcode('year', 'current_year');


add_filter( 'gform_multifile_upload_field', 'create_custom_file_upload_field', 10, 3 );
 
function create_custom_file_upload_field( $field, $form, $field_id ) {
        $field = new GF_Field_FileUpload( array(
            'id'                => $field_id,
            'multipleFiles'     => true,
            'maxFiles'          => 1,
            'maxFileSize'       => '',
            'allowedExtensions' => 'm4a, mp4, mp3'     
        ) );
 
       return $field;
    }

add_action( 'wp_print_footer_scripts', function() { ?>

			<script>
			gform.addFilter(  'gform_square_card_details_style', function( styleObject, formId ) {
				if ( formId === 4 ) {
					 styleObject.input.backgroundColor = '#FFFFFF';
					 styleObject.input.color = '#000000';
				}
				return styleObject;
			});
			</script>

	<?php

} );


