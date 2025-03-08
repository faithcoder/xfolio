<?php
/**
 * Xfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Xfolio
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

// Move this near the top of functions.php, before any other includes
require_once get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/tgmpa/tgmpa-config.php';

function xfolio_setup() {

	load_theme_textdomain( 'xfolio', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'xfolio' ),
		)
	);

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

	add_theme_support(
		'custom-background',
		apply_filters(
			'xfolio_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );

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
add_action( 'after_setup_theme', 'xfolio_setup' );


function xfolio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'xfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'xfolio_content_width', 0 );

function xfolio_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'xfolio' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'xfolio' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'xfolio_widgets_init' );

function xfolio_scripts() {
	wp_enqueue_style( 'xfolio-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style('exfolio-style', get_template_directory_uri() . '/assets/css/xfolio-style.css');
	wp_enqueue_style( 'xfolio-main', get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION);
	// wp_style_add_data( 'xfolio-style', 'rtl', 'replace' );

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'xfolio-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script('exfolio-script', get_template_directory_uri() . '/assets/js/xfolio.js', ['jquery'], true);
	wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/main.js');
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'xfolio_scripts' );


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
require get_template_directory() . '/inc/kirki-customizer.php';

/**
 * Include TGMPA configuration
 */
require get_template_directory() . '/inc/tgmpa/tgmpa-config.php';

require_once get_template_directory() . '/xfolio-cf-post/xfolio-custom-post.php';

// Add this near your other add_action hooks
add_action('template_redirect', 'xfolio_handle_ajax_request');

function xfolio_handle_ajax_request() {
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        // Remove unnecessary output for AJAX requests
        remove_action('wp_head', '_wp_render_title_tag', 1);
        remove_action('wp_head', 'wp_resource_hints', 2);
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'wp_generator');
    }
}

// Add this after your existing code
function xfolio_rewrite_flush() {
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'xfolio_rewrite_flush');

// Add AJAX handling
function xfolio_enqueue_ajax_scripts() {
    wp_localize_script('exfolio-script', 'xfolio_ajax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('xfolio_ajax_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'xfolio_enqueue_ajax_scripts');

// AJAX handler for portfolio content
function xfolio_load_portfolio() {
    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'xfolio_ajax_nonce')) {
        wp_send_json_error('Invalid nonce');
    }

    // Get post ID
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
    if (!$post_id) {
        wp_send_json_error('Invalid post ID');
    }

    // Get post data
    $post = get_post($post_id);
    if (!$post || $post->post_type !== 'xfolio-portfolio') {
        wp_send_json_error('Post not found');
    }

    // Get post content
    $response = array(
        'title' => get_the_title($post_id),
        'content' => apply_filters('the_content', $post->post_content),
        'image' => has_post_thumbnail($post_id) ? get_the_post_thumbnail($post_id, 'large') : '',
        'tools' => '',
        'preview' => ''
    );

    // Get tools used
    $tools_used = get_post_meta($post_id, '_xfolio_tools_used', true);
    if ($tools_used) {
        $response['tools'] = sprintf(
            '<div class="xfolio-portfolio-tools"><h3>%s</h3><div class="xfolio-tools-list">%s</div></div>',
            esc_html__('Tools Used', 'xfolio'),
            wp_kses_post(nl2br($tools_used))
        );
    }

    // Get preview URL
    $preview_url = get_post_meta($post_id, '_xfolio_preview_url', true);
    if ($preview_url) {
        $response['preview'] = sprintf(
            '<div class="xfolio-portfolio-preview"><a href="%s" class="xfolio-preview-button" target="_blank" rel="noopener">%s<svg class="xfolio-external-link" width="16" height="16" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6M15 3h6v6M10 14L21 3"/></svg></a></div>',
            esc_url($preview_url),
            esc_html__('Live Preview', 'xfolio')
        );
    }

    wp_send_json_success($response);
}
add_action('wp_ajax_xfolio_load_portfolio', 'xfolio_load_portfolio');
add_action('wp_ajax_nopriv_xfolio_load_portfolio', 'xfolio_load_portfolio');




