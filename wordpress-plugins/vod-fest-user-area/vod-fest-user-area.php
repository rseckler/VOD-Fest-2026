<?php
/**
 * Plugin Name: VOD Fest User Area
 * Plugin URI: https://vodfest.com
 * Description: Custom user registration, login, dashboard, and profile management for VOD Fest 2026
 * Version: 1.0.0
 * Author: Robin Seckler
 * Author URI: https://vodfest.com
 * License: GPL v2 or later
 * Text Domain: vod-fest-user
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('VOD_USER_VERSION', '1.0.0');
define('VOD_USER_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('VOD_USER_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Main Plugin Class
 */
class VOD_Fest_User_Area {
    private static $instance = null;

    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        $this->init_hooks();
        $this->load_dependencies();
    }

    private function init_hooks() {
        add_action('init', array($this, 'register_endpoints'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_shortcode('vod_login', array($this, 'login_shortcode'));
        add_shortcode('vod_register', array($this, 'register_shortcode'));
        add_shortcode('vod_dashboard', array($this, 'dashboard_shortcode'));
        add_shortcode('vod_profile', array($this, 'profile_shortcode'));
        add_action('wp_ajax_nopriv_vod_user_login', array($this, 'handle_login'));
        add_action('wp_ajax_nopriv_vod_user_register', array($this, 'handle_register'));
        add_action('wp_ajax_vod_user_update_profile', array($this, 'handle_profile_update'));
        add_action('wp_ajax_vod_user_logout', array($this, 'handle_logout'));
    }

    private function load_dependencies() {
        // Future: load additional files
    }

    public function enqueue_scripts() {
        wp_enqueue_style(
            'vod-user-area',
            VOD_USER_PLUGIN_URL . 'assets/style.css',
            array(),
            VOD_USER_VERSION
        );

        wp_enqueue_script(
            'vod-user-area',
            VOD_USER_PLUGIN_URL . 'assets/script.js',
            array('jquery'),
            VOD_USER_VERSION,
            true
        );

        wp_localize_script('vod-user-area', 'vodUserAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('vod-user-nonce')
        ));
    }

    public function register_endpoints() {
        add_rewrite_endpoint('user-dashboard', EP_ROOT);
        add_rewrite_endpoint('user-profile', EP_ROOT);
        flush_rewrite_rules();
    }

    /**
     * Login Form Shortcode
     */
    public function login_shortcode($atts) {
        if (is_user_logged_in()) {
            return '<p>' . __('You are already logged in.', 'vod-fest-user') . ' <a href="' . wp_logout_url(home_url()) . '">' . __('Logout', 'vod-fest-user') . '</a></p>';
        }

        ob_start();
        include VOD_USER_PLUGIN_DIR . 'templates/login-form.php';
        return ob_get_clean();
    }

    /**
     * Registration Form Shortcode
     */
    public function register_shortcode($atts) {
        if (is_user_logged_in()) {
            return '<p>' . __('You already have an account.', 'vod-fest-user') . ' <a href="' . home_url('/dashboard/') . '">' . __('Go to Dashboard', 'vod-fest-user') . '</a></p>';
        }

        ob_start();
        include VOD_USER_PLUGIN_DIR . 'templates/register-form.php';
        return ob_get_clean();
    }

    /**
     * Dashboard Shortcode
     */
    public function dashboard_shortcode($atts) {
        if (!is_user_logged_in()) {
            return '<p>' . __('Please login to access your dashboard.', 'vod-fest-user') . ' <a href="' . home_url('/login/') . '">' . __('Login', 'vod-fest-user') . '</a></p>';
        }

        ob_start();
        include VOD_USER_PLUGIN_DIR . 'templates/dashboard.php';
        return ob_get_clean();
    }

    /**
     * Profile Shortcode
     */
    public function profile_shortcode($atts) {
        if (!is_user_logged_in()) {
            return '<p>' . __('Please login to access your profile.', 'vod-fest-user') . ' <a href="' . home_url('/login/') . '">' . __('Login', 'vod-fest-user') . '</a></p>';
        }

        ob_start();
        include VOD_USER_PLUGIN_DIR . 'templates/profile.php';
        return ob_get_clean();
    }

    /**
     * Handle Login AJAX
     */
    public function handle_login() {
        check_ajax_referer('vod-user-nonce', 'nonce');

        $username = sanitize_user($_POST['username']);
        $password = $_POST['password'];
        $remember = isset($_POST['remember']) ? true : false;

        $user = wp_signon(array(
            'user_login'    => $username,
            'user_password' => $password,
            'remember'      => $remember,
        ), false);

        if (is_wp_error($user)) {
            wp_send_json_error(array(
                'message' => __('Invalid username or password.', 'vod-fest-user')
            ));
        } else {
            wp_send_json_success(array(
                'message' => __('Login successful!', 'vod-fest-user'),
                'redirect' => home_url('/dashboard/')
            ));
        }
    }

    /**
     * Handle Registration AJAX
     */
    public function handle_register() {
        check_ajax_referer('vod-user-nonce', 'nonce');

        $username = sanitize_user($_POST['username']);
        $email = sanitize_email($_POST['email']);
        $password = $_POST['password'];
        $first_name = sanitize_text_field($_POST['first_name']);
        $last_name = sanitize_text_field($_POST['last_name']);

        // Validate
        if (empty($username) || empty($email) || empty($password)) {
            wp_send_json_error(array(
                'message' => __('All fields are required.', 'vod-fest-user')
            ));
        }

        if (!is_email($email)) {
            wp_send_json_error(array(
                'message' => __('Invalid email address.', 'vod-fest-user')
            ));
        }

        if (username_exists($username)) {
            wp_send_json_error(array(
                'message' => __('Username already exists.', 'vod-fest-user')
            ));
        }

        if (email_exists($email)) {
            wp_send_json_error(array(
                'message' => __('Email already registered.', 'vod-fest-user')
            ));
        }

        // Create user
        $user_id = wp_create_user($username, $password, $email);

        if (is_wp_error($user_id)) {
            wp_send_json_error(array(
                'message' => $user_id->get_error_message()
            ));
        }

        // Update user meta
        wp_update_user(array(
            'ID' => $user_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
        ));

        // Auto login
        wp_set_auth_cookie($user_id);

        // Send welcome email
        wp_new_user_notification($user_id, null, 'user');

        wp_send_json_success(array(
            'message' => __('Registration successful! Welcome to VOD Fest!', 'vod-fest-user'),
            'redirect' => home_url('/dashboard/')
        ));
    }

    /**
     * Handle Profile Update AJAX
     */
    public function handle_profile_update() {
        check_ajax_referer('vod-user-nonce', 'nonce');

        if (!is_user_logged_in()) {
            wp_send_json_error(array(
                'message' => __('You must be logged in.', 'vod-fest-user')
            ));
        }

        $user_id = get_current_user_id();
        $first_name = sanitize_text_field($_POST['first_name']);
        $last_name = sanitize_text_field($_POST['last_name']);
        $email = sanitize_email($_POST['email']);

        // Update user
        $result = wp_update_user(array(
            'ID' => $user_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'user_email' => $email,
        ));

        if (is_wp_error($result)) {
            wp_send_json_error(array(
                'message' => $result->get_error_message()
            ));
        }

        // Update custom meta
        if (isset($_POST['country'])) {
            update_user_meta($user_id, 'country', sanitize_text_field($_POST['country']));
        }
        if (isset($_POST['phone'])) {
            update_user_meta($user_id, 'phone', sanitize_text_field($_POST['phone']));
        }

        wp_send_json_success(array(
            'message' => __('Profile updated successfully!', 'vod-fest-user')
        ));
    }

    /**
     * Handle Logout AJAX
     */
    public function handle_logout() {
        wp_logout();
        wp_send_json_success(array(
            'redirect' => home_url()
        ));
    }
}

// Initialize plugin
function vod_fest_user_area_init() {
    return VOD_Fest_User_Area::get_instance();
}
add_action('plugins_loaded', 'vod_fest_user_area_init');

/**
 * Activation Hook
 */
function vod_fest_user_area_activate() {
    // Create pages
    $pages = array(
        'login' => array(
            'title' => 'Login',
            'content' => '[vod_login]'
        ),
        'register' => array(
            'title' => 'Register',
            'content' => '[vod_register]'
        ),
        'dashboard' => array(
            'title' => 'Dashboard',
            'content' => '[vod_dashboard]'
        ),
        'profile' => array(
            'title' => 'My Profile',
            'content' => '[vod_profile]'
        ),
    );

    foreach ($pages as $slug => $page) {
        $existing = get_page_by_path($slug);
        if (!$existing) {
            wp_insert_post(array(
                'post_title' => $page['title'],
                'post_content' => $page['content'],
                'post_name' => $slug,
                'post_status' => 'publish',
                'post_type' => 'page',
            ));
        }
    }

    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'vod_fest_user_area_activate');
