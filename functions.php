<?php
include_once("inc/testimonial_widget.php");
include_once("inc/application_widget.php");
include_once("inc/news_widget.php");
include('inc/sw_shortcodes.php');
include('inc/menu_builder.php');
include('inc/formidable_hook.php');
include('inc/feed_functions.php');
include('inc/helper_functions.php');

add_theme_support( 'automatic-feed-links' );

/* Set thumbnail sizes */

add_theme_support( 'post-thumbnails' );
add_image_size( 'large-thumbnail', 190, 120, true );
add_image_size( 'widget-thumbnail', 252, 140, true );
add_image_size( 'widget-front', 322, 200, true );
add_image_size( 'carousel-thumbnail', 250, 154, true );

// Shortcodes for widgets
add_filter('widget_text', 'do_shortcode');

/*-- Register Menus --*/

add_action('init', 'custom_navigation_menus');

function custom_navigation_menus() {
	$locations = array(
		'top-menu'	=> __('Top Menu'),
		'main-menu' => __('Main Menu'),
		'news-menu' => __('News Sidebar Menu'),
		'stories-menu' => __('Stories Sidebar Menu'),
		'footer-menu' => __('Footer Menu')
	);

	register_nav_menus( $locations );
}

/* Menu max input vars fix */
function add_js_to_admin() {
	$url = get_option('siteurl');
    $url = get_bloginfo('template_directory') . '/js/admin.js';
    echo '<script type="text/javascript" src="'. $url . '"></script>';
}

add_action('admin_head', 'add_js_to_admin');

/*-- Register Sidebars --*/
function sw_custom_sidebars() {
register_sidebar( array(
		'id'            => 'frontpage-1',
		'name'          => __( 'Frontpage column 1' ),
		'description'   => '',
		'before_title'  => '<p class="widgettitle">',
		'after_title'   => '</p>',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
	));
	register_sidebar( array(
		'id'            => 'frontpage-2',
		'name'          => __( 'Frontpage column 2' ),
		'description'   => '',
		'before_title'  => '<p class="widgettitle">',
		'after_title'   => '</p>',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
	));
	register_sidebar( array(
		'id'            => 'frontpage-3',
		'name'          => __( 'Frontpage column 3' ),
		'description'   => '',
		'before_title'  => '<p class="widgettitle">',
		'after_title'   => '</p>',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
	));
	register_sidebar( array(
		'id'            => 'footer-widget',
		'name'          => __( 'Footer Widget' ),
		'description'   => __( 'Widget(s) will display in the last column of the footer' ),
		'before_title'  => '<p class="widgettitle">',
		'after_title'   => '</p>',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
	));
	register_sidebar( array(
		'id'            => 'constant-widget',
		'name'          => __( 'Constant Contact Widget' ),
		'description'   => __( 'CC Widget will display beneath the social media portion of the footer' ),
		'before_title'  => '<p class="widgettitle">',
		'after_title'   => '</p>',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
	));
}
add_action( 'widgets_init', 'sw_custom_sidebars' );

/* Enqueue stuff */

function sw_enqueue_css() {
    wp_enqueue_style( 'google-open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,300', '', '1.0' );
    wp_enqueue_style( 'google-libre-baskerville', '//fonts.googleapis.com/css?family=Libre+Baskerville:400,700,400italic', '', '1.0' );
    wp_enqueue_style('stylesheet', get_bloginfo('stylesheet_url'), '', '1.0' );

    if (is_front_page()) {
	     wp_enqueue_style('anythingslider_css', get_stylesheet_directory_uri() . '/css/anythingslider.css' , '', '1.0' );
    }
}

add_action( 'wp_enqueue_scripts', 'sw_enqueue_css' );

function sw_enqueue_js() {
	wp_register_script(
        'sw_main_js',
        get_stylesheet_directory_uri() . '/js/script.js',
        array( 'jquery' ),
        '1.0',
        true
    );

    wp_register_script(
        'sw_front_js',
        get_stylesheet_directory_uri() . '/js/front.js',
        array( 'jquery' ),
        '1.0',
        true
    );

    wp_register_script(
        'anythingslider_js',
        get_stylesheet_directory_uri() . '/js/jquery.anythingslider.min.js',
         array( 'jquery' ),
        '1.0',
        true
    );

	wp_register_script(
        'donation_js',
        get_stylesheet_directory_uri() . '/js/donation.js',
         array( 'jquery' ),
        '1.0',
        true
    );


	wp_register_script(
        'ccwidgetcustom_js',
        get_stylesheet_directory_uri() . '/js/ccwidgetcustom.js',
         array( 'jquery' ),
        '1.0',
        true
    );
	
	wp_register_script(
        'testimonial_js',
        get_stylesheet_directory_uri() . '/js/testimonial.js',
         array( 'jquery' ),
        '1.0',
        true
    );

	wp_register_script(
	'jquery_cycle_js',
	get_stylesheet_directory_uri() . '/js/jquery.cycle.all.latest-1307121040.js',
	 array( 'jquery' ),
	'1.0',
	true
    );


    if (is_front_page()) {
    	wp_enqueue_script( 'anythingslider_js' );
    	wp_enqueue_script( 'sw_front_js' );
		wp_enqueue_script( 'testimonial_js' );
    }

	if (is_page( 'make-a-gift' )) {
		wp_enqueue_script( 'donation_js' );
	}

	if (is_page( array('bachelor-of-social-work', 'field-education', 'alumni-giving', 'stay-connected', 'engagement-resources', 'give-back', 'current-students', 'faculty-staff') )) {
		wp_enqueue_script( 'testimonial_js' );
	}

	if (is_singular()) {
		wp_enqueue_script( 'testimonial_js' );
	}
	
	wp_enqueue_script('sw_main_js');
	wp_enqueue_script('ccwidgetcustom_js');
	wp_enqueue_script( 'jquery_cycle_js' );
}

add_action( 'wp_enqueue_scripts', 'sw_enqueue_js' );

function add_ie_html5_shim () {
	    echo '<!--[if lt IE 9]>';
		echo '<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>';
		echo '<script src="' . get_site_url() . '/wp-content/themes/uiuc-ssw/js/respond.js"></script>';
		echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_html5_shim');

/* Custom Header */

$args = array (
		'width' => 380,
		'height' => 91,
		'default-image' => get_template_directory_uri() . '/img/ssw-logo.png'
	);

add_theme_support('custom-header');

/*=====================
	Template Functions
	===================*/

// Disable admin bar for subscriber level
// show admin bar only for admins and editors
// turning off to test issues -pek
if (!current_user_can('edit_posts')) {
	add_filter('show_admin_bar', '__return_false');
}

// Function for generating subnav, uses menu_builder.php
function generate_subnav($post_id, $menu_location) {
    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_location ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_location ] );

		$menu_items = wp_get_nav_menu_items($menu->term_id);

		// Create menu builder object
		$menu_builder = new menu_builder(
			array(
				'menu_items'=> $menu_items,
				'post_id'	=> $post_id,
			)
		);

		//Determine if there is a menu to build
		if ($menu_builder->has_menu()) {

			// Build the menu
			$menu = $menu_builder->build();

			//generate html
			$html = $menu_builder->to_html();
			$html .= "</ul>";
		}
		else {
			return false;
		}

		return $html;
    }
}

function get_subnav() {
	$subnav = false;
	$type = get_post_type();

	if (($type === 'post') || (get_the_id() === get_page_template_id('news-template'))) {
		if (has_nav_menu('news-menu')) {
			$subnav = wp_nav_menu(array('theme_location'  => 'news-menu', 'echo' => false));
		}
	}
	elseif ($type === 'job') {
		$subnav = generate_subnav(get_job_board_post_id(), 'main-menu');
	}
	elseif ($type === 'field-placement') {
		$subnav = generate_subnav(get_field_placement_post_id(), 'main-menu');
	}
	elseif (!is_page_template('templates/news-template.php') && !is_page_template('templates/news-events-template.php')) {
		$subnav = generate_subnav(get_the_id(), 'main-menu');
	}

	return $subnav;
}

// Duplicate parent menu fix

add_filter('nav_menu_css_class' , 'duplicate_nav_parent' , 10 , 2);

function duplicate_nav_parent($classes, $item) {
	global $post;

	if (isset($post->ID)) {
		$post_id = $post->ID;
		$job_id = get_job_board_post_id();
		if ($post_id === $job_id) {
			if ($item->title === 'Alumni & Giving')
				$classes[] = "not-real-parent";
		}
	}
	return $classes;
}

/* Homepage Functions */

// For displaying front page slideshow
function display_carousel() {

	$slide_link = null;


	$args = array('post_type' => 'carousel-slide', 'posts_per_page' => 5, 'orderby' => 'menu_order', 'order' => 'asc' );
	$q = new WP_Query($args);

	echo '<ul class="slider">';

	if ($q->have_posts()) {
		while ($q->have_posts()) {
			$q->the_post();

			$slide_link = rwmb_meta('slide_link');

			echo '<li class="item">';

			the_post_thumbnail('full');

			echo '<div class="wrap"><div class="caption">';

			if ($slide_link) {
				echo '<a href="' . $slide_link . '">';
			}

			the_title('<p class="caption-title">', '</p>');
			the_content();

			if ($slide_link) {
				echo '</a>';
			}

			echo '</div></div>';

			echo '<div class="caption-bg-fade"></div>';

			echo '<div class="caption-bg">';

			echo '</li>';

		}
	}
	echo '</ul>';

}

/* Excerpt is read more is manually added to always appear */

function excerpt_read_more() {
	$more_link = "";
	return $more_link;
}

add_filter( 'excerpt_more', 'excerpt_read_more' );



/* Page title element */

function get_page_title() {
	global $post;

	$header_title = "";
	$sep = " - ";

	if (isset($post))
		$post_id = $post->ID;
	else
		$post_id = -1;

	$sitename = get_bloginfo('name');
	$post_type = get_post_type();

	if ($post_id) {
		$pagetitle = get_the_title();
	}
	if (is_front_page()) {
		$header_title = $sitename . $sep .  get_bloginfo('description');
	}
	elseif (is_archive()) {
		if ($post_type == "post") {
			$header_title = $post_type . ' Archive Page' . $sep . $sitename;
		}
	}
	elseif ($post_id == -1) {
		$header_title = "Page not found" .  $sep . $sitename;
	}
	else {
		$header_title = $pagetitle . $sep . $sitename;
	}
	return $header_title;
}

/* For determining faculty page layout or staff page layout */
function get_faculty_or_staff() {
	$terms = get_the_terms(get_the_id(), 'classification');
	$type = null;
	if ($terms) {
			foreach ($terms as $term) {
				if ($term->slug === 'faculty') {
					$type = 'faculty';
				}
			}
		if ($type !== 'faculty') {
			$type = 'staff';
		}
	}

	return $type;
}

/**
 *	Determine if there is a widget or regular sidebar
 *
 *  Returns false, 'widgets', or the sidebar field itself for displaying.
 **/

function determine_sidebar($post_id) {
	$sidebar = false;

	if (is_active_sidebar('blank_sidebar')) {
		return 'widgets';
	}
	elseif ($sidebar = rwmb_meta('sidebar-field')) {
		return $sidebar;
	}

	return false;

}

/* Sub nav mobile menu */
function display_submenu_toggle() {
	global $post;
	$html = "";
	$p = get_post_ancestors($post->ID);
	$page_parent = get_the_title(end($p));
	$html = '<div class="menu-toggle-container"><a class="menu-toggle" href="#">' . $page_parent . ' Menu ></a></div>';

	echo $html;
}

/* Function for returning webtools calender link */

function get_calender_url() {
	return "http://illinois.edu/calendar/list/935";
}

/* Breadcrumbs */

function generate_breadcrumbs() {
	if (function_exists('bcn_display')) {
		echo '<div class="breadcrumbs">';
		bcn_display();
		echo '</div>';
	}
}


function my_template_path() {
	return My_Wrapping::$main_template;
}

function my_template_base() {
	return My_Wrapping::$base;
}


class My_Wrapping {

	/**
	 * Stores the full path to the main template file
	 */
	static $main_template;

	/**
	 * Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
	 */
	static $base;

	static function wrap( $template ) {
		self::$main_template = $template;

		self::$base = substr( basename( self::$main_template ), 0, -4 );

		if ( 'index' == self::$base )
			self::$base = false;

		$templates = array( 'wrapper.php' );

		if ( self::$base )
			array_unshift( $templates, sprintf( 'wrapper-%s.php', self::$base ) );

		return locate_template( $templates );
	}
}

add_filter( 'template_include', array( 'My_Wrapping', 'wrap' ), 99 );

if(!function_exists('_log')){
  function _log( $message ) {
    if( WP_DEBUG === true ){
      if( is_array( $message ) || is_object( $message ) ){
        error_log( print_r( $message, true ) );
      } else {
        error_log( $message );
      }
    }
  }
}

add_filter('rewrite_rules_array', 'sw_rewrite_rules');
function sw_rewrite_rules($rules) {
	$newRules = array();
	$newRules['basename/(.+)/?$'] = 'index.php?custom_post_type_name=$matches[1]';
    $newRules['basename/(.+)/?$'] = 'index.php?taxonomy_name=$matches[1]';
	
	return array_merge($newRules, $rules);
}

add_filter('post_type_link', 'filter_post_type_link', 10, 2);
function filter_post_type_link($url, $post) {
	if ( 'staff' != get_post_type( $post ) )
	{
        return $url;
	}
	else
	{
		if ($cats = get_the_terms($post->ID, 'faculty'))
		{
			$url = str_replace('/staff/', '/faculty/' , $url);
		}
		return $url;
	}
}

add_action('wp_footer', 'sw_emergency_alert');
function sw_emergency_alert() {
	$script = '<script type="text/javascript" src="http://emergency.webservices.illinois.edu/illinois.js"></script>';
	
	echo $script;
}

add_action('wp_footer', 'sw_ping_tracking');
function sw_ping_tracking() {
	$script = '<script async="async" src="https://enroll.illinois.edu/ping">/**/</script>';
	
	echo $script;
}
