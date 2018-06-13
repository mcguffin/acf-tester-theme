<?php
/**
 * ACF Tester functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ACF_Tester
 */


function acf_tester_init_acf() {
	global $acf_tester_theme_mods;
	$acf_tester_theme_mods = array();
	if ( function_exists('acf_add_customizer_panel') && function_exists('acf_add_customizer_section') ) {
		$panel = acf_add_customizer_panel( array(
			'id'			=> 'some_acf_panel',
			'title'			=> 'ACF-Panel',
			'description'	=> 'Some Settings brougt to you by ACF.',
			'priority'		=> 200,
		) );

		$post_id = 'acf_theme_mod';
		acf_add_customizer_section( array(
			'panel'			=> $panel,
			'title'			=> 'ACF-Section (Theme Mod)',
			'description'	=> 'Some ACF-Fields.',
			'post_id'		=> 'acf_theme_mod',
		) );
		$acf_tester_theme_mods[] = $post_id;

		$post_id = 'acf_other_theme_mod';
		acf_add_customizer_section( array(
			'panel'			=> $panel,
			'title'			=> 'ACF-Section (Other Theme Mod)',
			'description'	=> 'Some ACF-Fields.',
			'post_id'		=> $post_id,
		) );
		$acf_tester_theme_mods[] = $post_id;


		foreach ( array( 'Content', 'jQuery', 'Relational' ) as $acf_group ) {
			$post_id = 'acf_' . sanitize_key( $acf_group );
			acf_add_customizer_section( array(
				'panel'			=> $panel,
				'title'			=> $acf_group,
				'description'	=> 'Some more Settings brougt to you by ACF.',
				'post_id'		=> $post_id,
			) );
			$acf_tester_theme_mods[] = $post_id;
		}

		acf_add_customizer_section( array(
			'panel'			=> $panel,
			'title'			=> 'ACF-Section (Option)',
			'description'	=> 'Same values as Options Page `acf_option`',
			'storage_type'	=> 'option',
			'post_id'		=> 'acf_option',
		) );
	}

	if ( function_exists('acf_add_options_sub_page') ) {
		acf_add_options_sub_page( array(
			'page_title'	=> 'ACF Theme Options',
			'description'	=> 'Some more Settings brougt to you by ACF.',
			'post_id'		=> 'acf_option',
			'parent_slug'	=> 'themes.php',
		) );
	}

	if ( function_exists( 'acf_register_form' ) ) {

	}


}

add_action('init','acf_tester_init_acf');



if ( ! function_exists( 'acf_tester_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function acf_tester_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ACF Tester, use a find and replace
		 * to change 'acf-tester' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'acf-tester', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'acf-tester' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'acf_tester_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'acf_tester_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function acf_tester_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'acf_tester_content_width', 640 );
}
add_action( 'after_setup_theme', 'acf_tester_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function acf_tester_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'acf-tester' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'acf-tester' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'acf_tester_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function acf_tester_scripts() {
	wp_enqueue_style( 'acf-tester-style', get_stylesheet_uri() );

	wp_enqueue_script( 'acf-tester-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'acf-tester-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'acf_tester_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}