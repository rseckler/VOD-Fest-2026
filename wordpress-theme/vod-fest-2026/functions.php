<?php
/**
 * VOD Fest 2026 Theme Functions
 *
 * @package VOD_Fest_2026
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Constants
 */
define('VOD_FEST_VERSION', '1.0.0');
define('VOD_FEST_THEME_DIR', get_template_directory());
define('VOD_FEST_THEME_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function vod_fest_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(800, 800, true); // Square for band images
    add_image_size('vod-fest-hero', 1920, 1080, true); // Hero images
    add_image_size('vod-fest-card', 400, 400, true); // Card images

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'vod-fest'),
        'footer'  => __('Footer Menu', 'vod-fest'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add support for Block Styles
    add_theme_support('wp-block-styles');

    // Add support for full and wide align images
    add_theme_support('align-wide');

    // Add support for responsive embedded content
    add_theme_support('responsive-embeds');

    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');

    // Load text domain for translations
    load_theme_textdomain('vod-fest', VOD_FEST_THEME_DIR . '/languages');
}
add_action('after_setup_theme', 'vod_fest_setup');

/**
 * Set the content width in pixels
 */
function vod_fest_content_width() {
    $GLOBALS['content_width'] = apply_filters('vod_fest_content_width', 1400);
}
add_action('after_setup_theme', 'vod_fest_content_width', 0);

/**
 * Enqueue Scripts and Styles
 */
function vod_fest_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'vod-fest-fonts',
        'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@400;600;700&family=Roboto+Slab:wght@700&display=swap',
        array(),
        null
    );

    // CSS Variables (load first)
    wp_enqueue_style(
        'vod-fest-variables',
        VOD_FEST_THEME_URI . '/assets/css/variables.css',
        array(),
        VOD_FEST_VERSION
    );

    // Global Styles
    wp_enqueue_style(
        'vod-fest-global',
        VOD_FEST_THEME_URI . '/assets/css/global.css',
        array('vod-fest-variables'),
        VOD_FEST_VERSION
    );

    // Components
    wp_enqueue_style(
        'vod-fest-components',
        VOD_FEST_THEME_URI . '/assets/css/components.css',
        array('vod-fest-global'),
        VOD_FEST_VERSION
    );

    // Animations
    wp_enqueue_style(
        'vod-fest-animations',
        VOD_FEST_THEME_URI . '/assets/css/animations.css',
        array('vod-fest-components'),
        VOD_FEST_VERSION
    );

    // Main Theme Stylesheet (style.css)
    wp_enqueue_style(
        'vod-fest-style',
        get_stylesheet_uri(),
        array('vod-fest-animations'),
        VOD_FEST_VERSION
    );

    // Main JavaScript
    wp_enqueue_script(
        'vod-fest-main',
        VOD_FEST_THEME_URI . '/assets/js/main.js',
        array(),
        VOD_FEST_VERSION,
        true
    );

    // Localize script for AJAX
    wp_localize_script('vod-fest-main', 'vodFest', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('vod-fest-nonce'),
    ));

    // Comment reply script for threaded comments
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'vod_fest_scripts');

/**
 * Register Widget Areas
 */
function vod_fest_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer 1', 'vod-fest'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in footer column 1.', 'vod-fest'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 2', 'vod-fest'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in footer column 2.', 'vod-fest'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 3', 'vod-fest'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in footer column 3.', 'vod-fest'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 4', 'vod-fest'),
        'id'            => 'footer-4',
        'description'   => __('Add widgets here to appear in footer column 4.', 'vod-fest'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'vod_fest_widgets_init');

/**
 * Custom Post Types
 */
require_once VOD_FEST_THEME_DIR . '/inc/post-types.php';

/**
 * Custom Taxonomies
 */
require_once VOD_FEST_THEME_DIR . '/inc/taxonomies.php';

/**
 * Template Tags
 */
require_once VOD_FEST_THEME_DIR . '/inc/template-tags.php';

/**
 * Customizer Additions
 */
require_once VOD_FEST_THEME_DIR . '/inc/customizer.php';

/**
 * AJAX Handlers
 */
require_once VOD_FEST_THEME_DIR . '/inc/ajax-handlers.php';

/**
 * Admin Functions
 */
if (is_admin()) {
    require_once VOD_FEST_THEME_DIR . '/inc/admin.php';
}

/**
 * Add body classes
 */
function vod_fest_body_classes($classes) {
    // Add class if sidebar is active
    if (is_active_sidebar('sidebar-1')) {
        $classes[] = 'has-sidebar';
    }

    // Add class for page templates
    if (is_page_template()) {
        $classes[] = 'page-template';
    }

    // Add class for front page
    if (is_front_page()) {
        $classes[] = 'front-page';
    }

    return $classes;
}
add_filter('body_class', 'vod_fest_body_classes');

/**
 * Add custom excerpt length
 */
function vod_fest_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'vod_fest_excerpt_length');

/**
 * Add custom excerpt more
 */
function vod_fest_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'vod_fest_excerpt_more');

/**
 * Disable Gutenberg editor for specific post types (optional)
 */
function vod_fest_disable_gutenberg($use_block_editor, $post_type) {
    // Disable for bands if using ACF
    // if ($post_type === 'band') return false;
    return $use_block_editor;
}
add_filter('use_block_editor_for_post_type', 'vod_fest_disable_gutenberg', 10, 2);

/**
 * Security: Remove WordPress version from head
 */
remove_action('wp_head', 'wp_generator');

/**
 * Performance: Defer JavaScript loading
 */
function vod_fest_defer_scripts($tag, $handle, $src) {
    $defer_scripts = array('vod-fest-main');

    if (in_array($handle, $defer_scripts)) {
        return str_replace(' src', ' defer src', $tag);
    }

    return $tag;
}
add_filter('script_loader_tag', 'vod_fest_defer_scripts', 10, 3);

/**
 * Add custom mime types for SVG upload
 */
function vod_fest_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter('upload_mimes', 'vod_fest_mime_types');

/**
 * Enable SVG preview in media library
 */
function vod_fest_fix_svg_thumb_display() {
    echo '<style>
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
    </style>';
}
add_action('admin_head', 'vod_fest_fix_svg_thumb_display');
