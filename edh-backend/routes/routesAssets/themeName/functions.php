<?php
/**
 * Skinjectables functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Skinjectables
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function skinjectables_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Skinjectables, use a find and replace
		* to change 'skinjectables' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'skinjectables', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'skinjectables' ),
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
			'skinjectables_custom_background_args',
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
add_action( 'after_setup_theme', 'skinjectables_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function skinjectables_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'skinjectables_content_width', 640 );
}
add_action( 'after_setup_theme', 'skinjectables_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function skinjectables_widgets_init() {
	register_sidebar(
    [
        'name' => esc_html__( 'Footer Col 1', 'alpine' ),
        'id' => 'footer-1',
        'description' => esc_html__( 'Add widgets here.', 'alpine' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]
  );
  register_sidebar(
    [
        'name' => esc_html__( 'Footer Col 2', 'alpine' ),
        'id' => 'footer-2',
        'description' => esc_html__( 'Add widgets here.', 'alpine' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]
  );
  register_sidebar(
    [
        'name' => esc_html__( 'Footer Col 3', 'alpine' ),
        'id' => 'footer-3',
        'description' => esc_html__( 'Add widgets here.', 'alpine' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_sidebar' => '<div class="ps-5">',
        'after_sidebar' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]
  );
  register_sidebar(
    [
        'name' => esc_html__( 'Footer Col 4', 'alpine' ),
        'id' => 'footer-4',
        'description' => esc_html__( 'Add widgets here.', 'alpine' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]
  );
}
add_action( 'widgets_init', 'skinjectables_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function skinjectables_scripts() {
  wp_enqueue_style( 'skinjectables-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'skinjectables-style', 'rtl', 'replace' );
  wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/custom-bootstrap.min.css', [], '5.0.2' );
  wp_enqueue_style( 'bootstrap-icons', get_template_directory_uri().'/assets/css/bootstrap-icons.css', [], '1.8.3' );
  wp_enqueue_style( 'custom', get_template_directory_uri().'/assets/css/custom.css', [], '1.0.0' );
  wp_enqueue_style( 'components', get_template_directory_uri().'/assets/css/components.css', [], '1.0.0' );

  wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.bundle.min.js', ['jquery'], '4.6.1', true );
  wp_enqueue_script( 'custom-js', get_template_directory_uri().'/assets/js/custom.js', [], '1.0.0', true );
  wp_localize_script( 'custom-js', 'ajax_var', array(
    'url'    => rest_url( '/wp/v2/posts' ),
    'nonce'  => wp_create_nonce( 'wp_rest' ),
  ) );
  wp_localize_script( 'custom-js', 'ajax_search', array(
    'url'    => rest_url( '/wp/v2/search' ),
    'nonce'  => wp_create_nonce( 'wp_rest' ),
  ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skinjectables_scripts' );

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
 * Load theme helpers.
 */
require get_template_directory().'/inc/theme-helpers.php';

/**
 * Register an ACF Option Page Menu.
 */
if ( function_exists('acf_add_options_page') ) {
    acf_add_options_page([
        'page_title' => __('Theme Settings', 'theme-slug'),
        'menu_title' => __('Theme Settings', 'theme-slug'),
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false,
        'position' => '63.3',
        'icon_url' => 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iMTcwOHB0IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxNzA4IDE3MDguNzQ5NSIgd2lkdGg9IjE3MDhwdCI+CjxnIGlkPSJzdXJmYWNlMSI+CjxwYXRoIGQ9Ik0gMjI0Ljk0MTQwNiAzMDUuMzU1NDY5IEMgMjMwLjI4MTI1IDMwNi42OTUzMTIgMjM1LjE2Nzk2OSAzMDkuNDY0ODQ0IDIzOS4wNjI1IDMxMy4zNTU0NjkgTCA2NzQuMTM2NzE5IDc0OC40Mzc1IEwgNzUyLjg2MzI4MSA2NjkuNzE4NzUgTCAzMTcuNzgxMjUgMjM0LjYzNjcxOSBDIDMxMy44Nzg5MDYgMjMwLjczODI4MSAzMTEuMTIxMDk0IDIyNS44MzU5MzggMzA5Ljc3MzQzOCAyMjAuNDgwNDY5IEwgMjgyLjM5MDYyNSAxMTEuMzI0MjE5IEwgMTAwLjg2NzE4OCA3LjU0Njg3NSBMIDExLjk3NjU2MiA5Ni40MzM1OTQgTCAxMTUuNzg1MTU2IDI3OC4wODIwMzEgWiBNIDIyNC45NDE0MDYgMzA1LjM1NTQ2OSAiIHN0eWxlPSIgc3Ryb2tlOm5vbmU7ZmlsbC1ydWxlOm5vbnplcm87ZmlsbDpyZ2IoMCUsMCUsMCUpO2ZpbGwtb3BhY2l0eToxOyIgLz4KPHBhdGggZD0iTSA2MTEuODI0MjE5IDEyOTcuNzg5MDYyIEwgMTMwMi4yMTg3NSA2MDcuMzgyODEyIEMgMTMwOS43ODEyNSA1OTkuODEyNSAxMzIwLjc1MzkwNiA1OTYuNzc3MzQ0IDEzMzEuMTI4OTA2IDU5OS4zNTkzNzUgQyAxNDIyLjAyNzM0NCA2MjIuNjU2MjUgMTUxOC41NzgxMjUgNjAyLjQ2ODc1IDE1OTIuNTU4NTk0IDU0NC43NSBDIDE2NjYuNTUwNzgxIDQ4Ny4wMjczNDQgMTcwOS41ODk4NDQgMzk4LjI2MTcxOSAxNzA5LjA5Mzc1IDMwNC40Mjk2ODggQyAxNzA5LjA5Mzc1IDI5OC43MTQ4NDQgMTcwOC45MjU3ODEgMjkyLjk1NzAzMSAxNzA4LjU1NDY4OCAyODcuMTQ4NDM4IEwgMTU0Ny45NzY1NjIgNDQ3LjcwNzAzMSBDIDE1MzkuODM5ODQ0IDQ1NS44NTE1NjIgMTUyNy43NzM0MzggNDU4LjcwNzAzMSAxNTE2LjgzNTkzOCA0NTUuMDU4NTk0IEwgMTMzNC4xOTkyMTkgMzk0LjE3MTg3NSBDIDEzMjUuMTA1NDY5IDM5MS4xNjAxNTYgMTMxNy45NzI2NTYgMzg0LjAyNzM0NCAxMzE0LjkzNzUgMzc0Ljk0MTQwNiBMIDEyNTQuMDY2NDA2IDE5Mi4zMDA3ODEgQyAxMjUwLjQxNDA2MiAxODEuMzc4OTA2IDEyNTMuMjYxNzE5IDE2OS4zMDg1OTQgMTI2MS40MTc5NjkgMTYxLjE1NjI1IEwgMTQyMS45OTIxODggMC41ODU5MzggQyAxMzI1LjI5Njg3NSAtNS40Mjk2ODggMTIzMS41NTA3ODEgMzUuMTk1MzEyIDExNjkuNzg5MDYyIDEwOS44MzU5MzggQyAxMTA4LjAzNTE1NiAxODQuNDkyMTg4IDEwODUuNzE4NzUgMjg0LjE4NzUgMTEwOS43MzgyODEgMzc4LjAzNTE1NiBDIDExMTIuMzM5ODQ0IDM4OC40MjU3ODEgMTEwOS4zMDg1OTQgMzk5LjM5NDUzMSAxMTAxLjczODI4MSA0MDYuOTYwOTM4IEwgNDExLjM1NTQ2OSAxMDk3LjMyMDMxMiBDIDQwMy43ODEyNSAxMTA0LjgzMjAzMSAzOTIuODIwMzEyIDExMDcuODc4OTA2IDM4Mi40Mzc1IDExMDUuMzM1OTM4IEMgMzU4LjQwMjM0NCAxMDk5LjE2NDA2MiAzMzMuNjgzNTk0IDEwOTUuOTY0ODQ0IDMwOC44NTU0NjkgMTA5NS44NjcxODggQyAxNzcuNzU3ODEyIDEwOTUuMDAzOTA2IDYwLjYyMTA5NCAxMTc3LjY0ODQzOCAxNy40NTcwMzEgMTMwMS40NjQ4NDQgQyAtMjUuNjgzNTk0IDE0MjUuMjY5NTMxIDE0LjcxODc1IDE1NjIuODIwMzEyIDExNy45Njg3NSAxNjQzLjYyNSBDIDIyMS4yMTg3NSAxNzI0LjQyOTY4OCAzNjQuNDQ1MzEyIDE3MzAuNjA5Mzc1IDQ3NC4yNTc4MTIgMTY1OC45Njg3NSBDIDU4NC4wNzgxMjUgMTU4Ny4zMzIwMzEgNjM2LjE0ODQzOCAxNDUzLjc2OTUzMSA2MDMuNzg1MTU2IDEzMjYuNjk5MjE5IEMgNjAxLjIxMDkzOCAxMzE2LjMyODEyNSA2MDQuMjUzOTA2IDEzMDUuMzM5ODQ0IDYxMS44MjQyMTkgMTI5Ny43ODkwNjIgWiBNIDM4Mi45NDkyMTkgMTUyMi4wMzEyNSBMIDIzNC43ODUxNTYgMTUyMi4wMzEyNSBMIDE2MS43MTA5MzggMTQwMC4yNzczNDQgTCAyMzQuNzg1MTU2IDEyNzguNTAzOTA2IEwgMzgyLjk0OTIxOSAxMjc4LjUwMzkwNiBMIDQ1Ni4wMDc4MTIgMTQwMC4yNzczNDQgWiBNIDUwMC40MjU3ODEgMTE2NS42Njc5NjkgTCAxMTcwLjA5NzY1NiA0OTUuOTg4MjgxIEwgMTIxMy4xMzI4MTIgNTM5LjAzMTI1IEwgNTQzLjQ2MDkzOCAxMjA4LjcxMDkzOCBaIE0gNTAwLjQyNTc4MSAxMTY1LjY2Nzk2OSAiIHN0eWxlPSIgc3Ryb2tlOm5vbmU7ZmlsbC1ydWxlOm5vbnplcm87ZmlsbDpyZ2IoMCUsMCUsMCUpO2ZpbGwtb3BhY2l0eToxOyIgLz4KPHBhdGggZD0iTSAxNDU5LjUgMTY5Mi44NjcxODggQyAxNTI3LjMwMDc4MSAxNzE4LjM1OTM3NSAxNjAzLjc0MjE4OCAxNzAxLjgyODEyNSAxNjU0Ljk2NDg0NCAxNjUwLjYwOTM3NSBDIDE3MDYuMTkxNDA2IDE1OTkuMzc1IDE3MjIuNzI2NTYyIDE1MjIuOTIxODc1IDE2OTcuMjIyNjU2IDE0NTUuMTM2NzE5IFogTSAxNDU5LjUgMTY5Mi44NjcxODggIiBzdHlsZT0iIHN0cm9rZTpub25lO2ZpbGwtcnVsZTpub256ZXJvO2ZpbGw6cmdiKDAlLDAlLDAlKTtmaWxsLW9wYWNpdHk6MTsiIC8+CjxwYXRoIGQ9Ik0gMTY1NC45Njg3NSAxMzg5LjE5OTIxOSBMIDEzMTMuMDgyMDMxIDEwNDcuMTc1NzgxIEMgMTI3NS4zNzEwOTQgMTA3OC44NzUgMTIxOS42ODM1OTQgMTA3Ni40NjQ4NDQgMTE4NC44MjgxMjUgMTA0MS42NTIzNDQgQyAxMTQ5Ljk2ODc1IDEwMDYuODQ3NjU2IDExNDcuNTExNzE5IDk1MS4xNzU3ODEgMTE3OS4xNTYyNSA5MTMuNDI1NzgxIEwgMTEzMC43MzgyODEgODY0Ljk0OTIxOSBMIDg2OS4zODI4MTIgMTEyNi4zMTY0MDYgTCA5MTguMDkzNzUgMTE3NS4wMjM0MzggQyA5NTUuODA0Njg4IDExNDMuMzI0MjE5IDEwMTEuNSAxMTQ1LjcyNjU2MiAxMDQ2LjMzNTkzOCAxMTgwLjUyNzM0NCBDIDEwODEuMTkxNDA2IDEyMTUuMzM5ODQ0IDEwODMuNjY0MDYyIDEyNzEuMDE5NTMxIDEwNTIuMDE1NjI1IDEzMDguNzczNDM4IEwgMTM5My42MTMyODEgMTY1MC41NTA3ODEgQyAxMzk3LjMzOTg0NCAxNjU0LjI3NzM0NCAxNDAxLjI3MzQzOCAxNjU3LjczMDQ2OSAxNDA1LjI0NjA5NCAxNjYxLjA4OTg0NCBMIDE2NjUuNTE1NjI1IDE0MDAuODIwMzEyIEMgMTY2Mi4xNjQwNjIgMTM5Ni44Mzk4NDQgMTY1OC42OTUzMTIgMTM5Mi45MjE4NzUgMTY1NC45Njg3NSAxMzg5LjE5OTIxOSBaIE0gMTQ3NC40OTIxODggMTUxMy4xMDU0NjkgTCAxMTcwLjA5NzY1NiAxMjA4LjcxMDkzOCBMIDEyMTMuMTMyODEyIDExNjUuNjY3OTY5IEwgMTUxNy41MzUxNTYgMTQ3MC4wNzgxMjUgWiBNIDE0NzQuNDkyMTg4IDE1MTMuMTA1NDY5ICIgc3R5bGU9IiBzdHJva2U6bm9uZTtmaWxsLXJ1bGU6bm9uemVybztmaWxsOnJnYigwJSwwJSwwJSk7ZmlsbC1vcGFjaXR5OjE7IiAvPgo8L2c+Cjwvc3ZnPg==',
    ]);
}

/**
 * Disable Gutenberg for selected post types
 */
add_filter( 'use_block_editor_for_post', '__return_false', 10 );

/**
 * Remove WP top bar
 */
add_filter( 'show_admin_bar', '__return_false' );

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_filter('Yoast\WP\SEO\post_redirect_slug_change', '__return_true' );
add_filter('Yoast\WP\SEO\term_redirect_slug_change', '__return_true' );