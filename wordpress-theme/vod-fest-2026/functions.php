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

    // Add support for site icon (favicon)
    add_theme_support('custom-header');
    add_theme_support('site-icon');

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

    // Cookie Consent
    wp_enqueue_style(
        'vod-fest-cookie-consent',
        VOD_FEST_THEME_URI . '/assets/css/cookie-consent.css',
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

    // Cookie Consent JavaScript
    wp_enqueue_script(
        'vod-fest-cookie-consent',
        VOD_FEST_THEME_URI . '/assets/js/cookie-consent.js',
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
 * Render Cookie Consent Banner via wp_footer
 */
function vod_fest_cookie_consent_banner() {
    get_template_part('templates/cookie-consent-banner');
}
add_action('wp_footer', 'vod_fest_cookie_consent_banner');

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
 * Google Analytics (gtag.js) with Cookie Consent Integration
 * Uses Google Consent Mode v2 for GDPR compliance
 */
function vod_fest_google_analytics() {
    if (is_admin()) return;
    ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-53ZSWBBTD2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('consent', 'default', { 'analytics_storage': 'denied' });
    gtag('js', new Date());
    gtag('config', 'G-53ZSWBBTD2');
    (function() {
        try {
            var c = JSON.parse(localStorage.getItem('vod_cookie_consent'));
            if (c && c.analytics) gtag('consent', 'update', { 'analytics_storage': 'granted' });
        } catch(e) {}
        document.addEventListener('cookie-consent-updated', function(e) {
            gtag('consent', 'update', { 'analytics_storage': e.detail.analytics ? 'granted' : 'denied' });
        });
    })();
    </script>
    <?php
}
add_action('wp_head', 'vod_fest_google_analytics', 1);

/**
 * JSON-LD Event Schema for rich snippets in Google
 */
function vod_fest_event_schema() {
    if (!is_front_page()) return;

    $bands = get_posts(array('post_type' => 'band', 'posts_per_page' => -1, 'post_status' => 'publish'));
    $performers = array();
    foreach ($bands as $band) {
        $performers[] = array(
            '@type' => 'MusicGroup',
            'name'  => $band->post_title,
            'url'   => get_permalink($band->ID),
        );
    }

    $schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'MusicEvent',
        'name'        => 'VOD Fest 2026',
        'description' => 'Three days of industrial, experimental, post-punk and avant-garde music. 21 bands, 2 stages.',
        'startDate'   => '2026-07-17T17:00:00+02:00',
        'endDate'     => '2026-07-19T24:00:00+02:00',
        'eventStatus' => 'https://schema.org/EventScheduled',
        'eventAttendanceMode' => 'https://schema.org/OfflineEventAttendanceMode',
        'location'    => array(
            '@type'   => 'Place',
            'name'    => 'Kulturhaus Caserne',
            'address' => array(
                '@type'           => 'PostalAddress',
                'streetAddress'   => 'Fallenbrunnen 17',
                'addressLocality' => 'Friedrichshafen',
                'postalCode'      => '88045',
                'addressCountry'  => 'DE',
            ),
        ),
        'organizer'   => array(
            '@type' => 'Organization',
            'name'  => 'VOD Records',
            'url'   => 'https://www.vod-records.com',
            'email' => 'frank@vod-records.com',
        ),
        'offers'      => array(
            '@type'         => 'Offer',
            'name'          => '3-Day Pass',
            'price'         => '333',
            'priceCurrency' => 'EUR',
            'availability'  => 'https://schema.org/InStock',
            'url'           => home_url('/tickets/'),
        ),
        'performer'   => $performers,
    );

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
}
add_action('wp_head', 'vod_fest_event_schema', 2);

/**
 * Security: Remove WordPress version from head
 */
remove_action('wp_head', 'wp_generator');

/**
 * Performance: Defer JavaScript loading
 */
function vod_fest_defer_scripts($tag, $handle, $src) {
    $defer_scripts = array('vod-fest-main', 'vod-fest-cookie-consent');

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

/**
 * Add custom meta boxes for band embeds
 */
function vod_fest_band_meta_boxes() {
    add_meta_box(
        'vod_fest_band_embeds',
        __('Media Embeds', 'vod-fest'),
        'vod_fest_band_embeds_callback',
        'band',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'vod_fest_band_meta_boxes');

/**
 * Render band embeds meta box
 */
function vod_fest_band_embeds_callback($post) {
    wp_nonce_field('vod_fest_band_embeds_nonce', 'vod_fest_band_embeds_nonce');

    $bandcamp_embed = get_post_meta($post->ID, '_band_bandcamp_embed', true);
    $youtube_id = get_post_meta($post->ID, '_band_youtube_id', true);
    $website_url = get_post_meta($post->ID, '_band_website_url', true);
    ?>
    <p>
        <label for="band_website_url"><strong><?php _e('Band Website URL:', 'vod-fest'); ?></strong></label><br>
        <input type="url" id="band_website_url" name="band_website_url" value="<?php echo esc_attr($website_url); ?>" style="width: 100%;" placeholder="https://www.example.com">
        <small><?php _e('Official band/artist website (displayed below the About section).', 'vod-fest'); ?></small>
    </p>
    <p>
        <label for="band_bandcamp_embed"><strong><?php _e('Bandcamp Embed Code:', 'vod-fest'); ?></strong></label><br>
        <textarea id="band_bandcamp_embed" name="band_bandcamp_embed" rows="4" style="width: 100%;" placeholder='<iframe style="border: 0; width: 350px; height: 470px;" src="https://bandcamp.com/EmbeddedPlayer/..." seamless></iframe>'><?php echo esc_textarea($bandcamp_embed); ?></textarea>
        <small><?php _e('Paste the complete Bandcamp embed code from the "Share/Embed" button on Bandcamp.', 'vod-fest'); ?></small>
    </p>
    <p>
        <label for="band_youtube_id"><strong><?php _e('YouTube Video ID:', 'vod-fest'); ?></strong></label><br>
        <input type="text" id="band_youtube_id" name="band_youtube_id" value="<?php echo esc_attr($youtube_id); ?>" style="width: 100%;" placeholder="dQw4w9WgXcQ">
        <small><?php _e('Enter only the video ID from the YouTube URL (e.g., from youtube.com/watch?v=dQw4w9WgXcQ just enter: dQw4w9WgXcQ)', 'vod-fest'); ?></small>
    </p>
    <?php
}

/**
 * Save band embeds meta box data
 */
function vod_fest_save_band_embeds($post_id) {
    // Check nonce
    if (!isset($_POST['vod_fest_band_embeds_nonce']) ||
        !wp_verify_nonce($_POST['vod_fest_band_embeds_nonce'], 'vod_fest_band_embeds_nonce')) {
        return;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save Bandcamp embed
    if (isset($_POST['band_bandcamp_embed'])) {
        update_post_meta($post_id, '_band_bandcamp_embed', wp_kses_post($_POST['band_bandcamp_embed']));
    }

    // Save YouTube ID
    if (isset($_POST['band_youtube_id'])) {
        update_post_meta($post_id, '_band_youtube_id', sanitize_text_field($_POST['band_youtube_id']));
    }

    // Save Website URL
    if (isset($_POST['band_website_url'])) {
        update_post_meta($post_id, '_band_website_url', esc_url_raw($_POST['band_website_url']));
    }
}
add_action('save_post_band', 'vod_fest_save_band_embeds');

/**
 * Newsletter signup shortcode
 */
function vod_fest_newsletter_signup($atts) {
    $atts = shortcode_atts(array(
        'title' => __('Stay Updated', 'vod-fest'),
        'subtitle' => __('Get festival updates, band announcements, and exclusive content.', 'vod-fest'),
    ), $atts);

    ob_start();
    ?>
    <div class="newsletter-signup" style="background: linear-gradient(135deg, var(--color-blood-red) 0%, var(--color-black) 100%); padding: var(--space-4xl); border-radius: var(--radius-lg); text-align: center; margin: var(--space-4xl) 0;">
        <h3 style="font-size: var(--font-size-3xl); margin-bottom: var(--space-md); color: var(--color-gold);">
            <?php echo esc_html($atts['title']); ?>
        </h3>
        <p style="font-size: var(--font-size-lg); color: var(--color-brass); margin-bottom: var(--space-2xl); max-width: 600px; margin-left: auto; margin-right: auto;">
            <?php echo esc_html($atts['subtitle']); ?>
        </p>
        <div style="max-width: 500px; margin: 0 auto;">
            <a href="mailto:frank@vod-records.com?subject=<?php echo rawurlencode('VOD Fest 2026 - Newsletter Signup'); ?>" class="btn btn-primary" style="font-size: var(--font-size-lg); padding: 14px 40px;">
                <?php esc_html_e('Subscribe via Email', 'vod-fest'); ?>
            </a>
            <p style="font-size: var(--font-size-sm); color: var(--color-brass); margin-top: var(--space-md);">
                <?php esc_html_e('We respect your privacy. Unsubscribe at any time.', 'vod-fest'); ?>
            </p>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('newsletter', 'vod_fest_newsletter_signup');

/**
 * Handle newsletter signup submission
 */
function vod_fest_handle_newsletter_signup() {
    // Verify nonce
    if (!isset($_POST['newsletter_nonce']) ||
        !wp_verify_nonce($_POST['newsletter_nonce'], 'vod_fest_newsletter')) {
        wp_die(__('Security check failed', 'vod-fest'));
    }

    $email = sanitize_email($_POST['newsletter_email']);

    if (!is_email($email)) {
        wp_redirect(add_query_arg('newsletter', 'invalid', wp_get_referer()));
        exit;
    }

    // Save to database (simple storage)
    global $wpdb;
    $table_name = $wpdb->prefix . 'vod_fest_newsletter';

    $wpdb->insert(
        $table_name,
        array(
            'email' => $email,
            'subscribed_at' => current_time('mysql'),
            'ip_address' => $_SERVER['REMOTE_ADDR'],
        ),
        array('%s', '%s', '%s')
    );

    // Redirect with success message
    wp_redirect(add_query_arg('newsletter', 'success', wp_get_referer()));
    exit;
}
add_action('admin_post_nopriv_vod_fest_newsletter_signup', 'vod_fest_handle_newsletter_signup');
add_action('admin_post_vod_fest_newsletter_signup', 'vod_fest_handle_newsletter_signup');

/**
 * Create newsletter database table
 */
function vod_fest_create_newsletter_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'vod_fest_newsletter';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        email varchar(100) NOT NULL,
        subscribed_at datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        ip_address varchar(45) DEFAULT '' NOT NULL,
        PRIMARY KEY  (id),
        UNIQUE KEY email (email)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'vod_fest_create_newsletter_table');

/**
 * Add customizer settings for social media
 */
function vod_fest_customize_register($wp_customize) {
    // Social Media Section
    $wp_customize->add_section('vod_fest_social', array(
        'title'    => __('Social Media', 'vod-fest'),
        'priority' => 30,
    ));

    // Facebook
    $wp_customize->add_setting('vod_fest_facebook', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('vod_fest_facebook', array(
        'label'   => __('Facebook URL', 'vod-fest'),
        'section' => 'vod_fest_social',
        'type'    => 'url',
    ));

    // Instagram
    $wp_customize->add_setting('vod_fest_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('vod_fest_instagram', array(
        'label'   => __('Instagram URL', 'vod-fest'),
        'section' => 'vod_fest_social',
        'type'    => 'url',
    ));

    // YouTube
    $wp_customize->add_setting('vod_fest_youtube', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('vod_fest_youtube', array(
        'label'   => __('YouTube URL', 'vod-fest'),
        'section' => 'vod_fest_social',
        'type'    => 'url',
    ));

    // Bandcamp
    $wp_customize->add_setting('vod_fest_bandcamp', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('vod_fest_bandcamp', array(
        'label'   => __('Bandcamp URL', 'vod-fest'),
        'section' => 'vod_fest_social',
        'type'    => 'url',
    ));
}
add_action('customize_register', 'vod_fest_customize_register');
