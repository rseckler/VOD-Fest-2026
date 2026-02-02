<?php
/**
 * AJAX Handlers
 *
 * @package VOD_Fest_2026
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create Newsletter Subscribers Table on Theme Activation
 */
function vod_fest_create_subscribers_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'vod_fest_subscribers';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        email varchar(255) NOT NULL,
        status varchar(20) NOT NULL DEFAULT 'active',
        source varchar(50) DEFAULT 'website',
        subscribed_date datetime DEFAULT CURRENT_TIMESTAMP,
        ip_address varchar(100) DEFAULT NULL,
        user_agent text DEFAULT NULL,
        PRIMARY KEY  (id),
        UNIQUE KEY email (email),
        KEY status (status),
        KEY subscribed_date (subscribed_date)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_switch_theme', 'vod_fest_create_subscribers_table');

/**
 * Newsletter Subscription Handler
 */
function vod_fest_handle_newsletter_subscription() {
    global $wpdb;

    // Verify nonce
    if (!isset($_POST['newsletter_nonce']) || !wp_verify_nonce($_POST['newsletter_nonce'], 'vod_fest_newsletter')) {
        wp_send_json_error(array(
            'message' => __('Security check failed. Please refresh the page and try again.', 'vod-fest')
        ));
    }

    // Get and sanitize email
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';

    // Validate email
    if (empty($email)) {
        wp_send_json_error(array(
            'message' => __('Please enter your email address.', 'vod-fest')
        ));
    }

    if (!is_email($email)) {
        wp_send_json_error(array(
            'message' => __('Please enter a valid email address.', 'vod-fest')
        ));
    }

    // Check if email already exists
    $table_name = $wpdb->prefix . 'vod_fest_subscribers';
    $existing = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM $table_name WHERE email = %s",
        $email
    ));

    if ($existing) {
        if ($existing->status === 'active') {
            wp_send_json_error(array(
                'message' => __('This email is already subscribed to our newsletter.', 'vod-fest')
            ));
        } else {
            // Reactivate subscription
            $wpdb->update(
                $table_name,
                array(
                    'status' => 'active',
                    'subscribed_date' => current_time('mysql')
                ),
                array('email' => $email),
                array('%s', '%s'),
                array('%s')
            );

            wp_send_json_success(array(
                'message' => __('Welcome back! Your subscription has been reactivated.', 'vod-fest')
            ));
        }
    }

    // Get subscriber info
    $ip_address = vod_fest_get_client_ip();
    $user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? substr($_SERVER['HTTP_USER_AGENT'], 0, 255) : '';

    // Insert new subscription
    $result = $wpdb->insert(
        $table_name,
        array(
            'email' => $email,
            'status' => 'active',
            'source' => 'website',
            'subscribed_date' => current_time('mysql'),
            'ip_address' => $ip_address,
            'user_agent' => $user_agent
        ),
        array('%s', '%s', '%s', '%s', '%s', '%s')
    );

    if ($result === false) {
        wp_send_json_error(array(
            'message' => __('An error occurred. Please try again later.', 'vod-fest')
        ));
    }

    // Send confirmation email to subscriber
    vod_fest_send_subscription_confirmation($email);

    // Send notification to admin
    vod_fest_send_admin_notification($email);

    wp_send_json_success(array(
        'message' => __('Thanks for subscribing! Check your email for confirmation.', 'vod-fest')
    ));
}
add_action('wp_ajax_vod_fest_newsletter_subscribe', 'vod_fest_handle_newsletter_subscription');
add_action('wp_ajax_nopriv_vod_fest_newsletter_subscribe', 'vod_fest_handle_newsletter_subscription');

/**
 * Newsletter Unsubscribe Handler
 */
function vod_fest_handle_newsletter_unsubscribe() {
    global $wpdb;

    // Get and validate email
    $email = isset($_GET['email']) ? sanitize_email($_GET['email']) : '';
    $token = isset($_GET['token']) ? sanitize_text_field($_GET['token']) : '';

    if (empty($email) || empty($token)) {
        wp_die(__('Invalid unsubscribe link.', 'vod-fest'));
    }

    // Verify token
    $expected_token = md5($email . wp_salt());
    if ($token !== $expected_token) {
        wp_die(__('Invalid unsubscribe token.', 'vod-fest'));
    }

    // Update subscription status
    $table_name = $wpdb->prefix . 'vod_fest_subscribers';
    $result = $wpdb->update(
        $table_name,
        array('status' => 'unsubscribed'),
        array('email' => $email),
        array('%s'),
        array('%s')
    );

    if ($result !== false) {
        wp_die(__('You have been successfully unsubscribed from our newsletter.', 'vod-fest'), __('Unsubscribed', 'vod-fest'), array('response' => 200));
    } else {
        wp_die(__('Email address not found in our system.', 'vod-fest'));
    }
}
add_action('init', function() {
    if (isset($_GET['vod_fest_unsubscribe'])) {
        vod_fest_handle_newsletter_unsubscribe();
    }
});

/**
 * Send Subscription Confirmation Email
 */
function vod_fest_send_subscription_confirmation($email) {
    $site_name = get_bloginfo('name');
    $unsubscribe_token = md5($email . wp_salt());
    $unsubscribe_url = add_query_arg(array(
        'vod_fest_unsubscribe' => '1',
        'email' => urlencode($email),
        'token' => $unsubscribe_token
    ), home_url());

    $subject = sprintf(__('Welcome to %s Newsletter', 'vod-fest'), $site_name);

    $message = sprintf(
        __("Hi there!\n\nThanks for subscribing to the %s newsletter!\n\n" .
           "You'll be the first to know about:\n" .
           "• Lineup announcements\n" .
           "• Ticket releases\n" .
           "• Festival updates\n" .
           "• Exclusive content\n\n" .
           "Stay tuned for more underground sounds!\n\n" .
           "---\n" .
           "VOD Fest 2026 // 17-19 July // Friedrichshafen\n\n" .
           "To unsubscribe, click here: %s", 'vod-fest'),
        $site_name,
        $unsubscribe_url
    );

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . $site_name . ' <' . get_option('admin_email') . '>'
    );

    wp_mail($email, $subject, $message, $headers);
}

/**
 * Send Admin Notification
 */
function vod_fest_send_admin_notification($email) {
    $admin_email = get_option('admin_email');
    $site_name = get_bloginfo('name');

    $subject = sprintf(__('[%s] New Newsletter Subscription', 'vod-fest'), $site_name);
    $message = sprintf(
        __("New newsletter subscription:\n\nEmail: %s\nDate: %s\n\nView all subscribers in WordPress admin.", 'vod-fest'),
        $email,
        current_time('mysql')
    );

    $headers = array('Content-Type: text/plain; charset=UTF-8');

    wp_mail($admin_email, $subject, $message, $headers);
}

/**
 * Contact Form Handler
 */
function vod_fest_handle_contact_form() {
    // Verify nonce
    if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'vod_fest_contact')) {
        wp_send_json_error(array(
            'message' => __('Security check failed.', 'vod-fest')
        ));
    }

    // Get and sanitize form data
    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $subject = isset($_POST['subject']) ? sanitize_text_field($_POST['subject']) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';

    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error(array(
            'message' => __('Please fill in all required fields.', 'vod-fest')
        ));
    }

    if (!is_email($email)) {
        wp_send_json_error(array(
            'message' => __('Please enter a valid email address.', 'vod-fest')
        ));
    }

    // Send email to admin
    $admin_email = get_option('admin_email');
    $site_name = get_bloginfo('name');

    $email_subject = sprintf('[%s] Contact Form: %s', $site_name, $subject ?: __('No Subject', 'vod-fest'));
    $email_message = sprintf(
        "Name: %s\nEmail: %s\nSubject: %s\n\nMessage:\n%s",
        $name,
        $email,
        $subject,
        $message
    );

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $name . ' <' . $email . '>'
    );

    $sent = wp_mail($admin_email, $email_subject, $email_message, $headers);

    if ($sent) {
        wp_send_json_success(array(
            'message' => __('Thank you for your message! We will get back to you soon.', 'vod-fest')
        ));
    } else {
        wp_send_json_error(array(
            'message' => __('Failed to send message. Please try again later.', 'vod-fest')
        ));
    }
}
add_action('wp_ajax_vod_fest_contact_form', 'vod_fest_handle_contact_form');
add_action('wp_ajax_nopriv_vod_fest_contact_form', 'vod_fest_handle_contact_form');

/**
 * Ticket Inquiry Handler
 */
function vod_fest_handle_ticket_inquiry() {
    // Verify nonce
    if (!isset($_POST['ticket_nonce']) || !wp_verify_nonce($_POST['ticket_nonce'], 'vod_fest_ticket')) {
        wp_send_json_error(array(
            'message' => __('Security check failed.', 'vod-fest')
        ));
    }

    // Get and sanitize form data
    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
    $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';

    // Validate
    if (empty($name) || empty($email)) {
        wp_send_json_error(array(
            'message' => __('Please provide your name and email.', 'vod-fest')
        ));
    }

    if (!is_email($email)) {
        wp_send_json_error(array(
            'message' => __('Please enter a valid email address.', 'vod-fest')
        ));
    }

    if ($quantity < 1 || $quantity > 10) {
        wp_send_json_error(array(
            'message' => __('Please select between 1 and 10 tickets.', 'vod-fest')
        ));
    }

    // Send email to admin
    $admin_email = get_option('admin_email');
    $site_name = get_bloginfo('name');

    $subject = sprintf('[%s] Ticket Inquiry - %d tickets', $site_name, $quantity);
    $email_message = sprintf(
        "New ticket inquiry:\n\n" .
        "Name: %s\n" .
        "Email: %s\n" .
        "Quantity: %d tickets\n" .
        "Date: %s\n\n" .
        "Message:\n%s\n\n" .
        "---\n" .
        "Reply to this email to send payment instructions.",
        $name,
        $email,
        $quantity,
        current_time('mysql'),
        $message ?: __('No additional message', 'vod-fest')
    );

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $name . ' <' . $email . '>'
    );

    $sent = wp_mail($admin_email, $subject, $email_message, $headers);

    if ($sent) {
        // Send confirmation to user
        $user_subject = sprintf(__('Your Ticket Inquiry for %s', 'vod-fest'), $site_name);
        $user_message = sprintf(
            __("Hi %s,\n\n" .
               "Thanks for your interest in VOD Fest 2026!\n\n" .
               "We have received your inquiry for %d ticket(s).\n" .
               "You will receive payment instructions via email within 24 hours.\n\n" .
               "Ticket price: €60 per ticket\n" .
               "Total: €%d\n\n" .
               "If you have any questions, feel free to reply to this email.\n\n" .
               "See you at VOD Fest 2026!\n\n" .
               "---\n" .
               "VOD Fest 2026 // 17-19 July // Friedrichshafen", 'vod-fest'),
            $name,
            $quantity,
            $quantity * 60
        );

        $user_headers = array(
            'Content-Type: text/plain; charset=UTF-8',
            'From: ' . $site_name . ' <' . get_option('admin_email') . '>'
        );

        wp_mail($email, $user_subject, $user_message, $user_headers);

        wp_send_json_success(array(
            'message' => __('Thank you! You will receive payment instructions via email within 24 hours.', 'vod-fest')
        ));
    } else {
        wp_send_json_error(array(
            'message' => __('Failed to send inquiry. Please try again later.', 'vod-fest')
        ));
    }
}
add_action('wp_ajax_vod_fest_ticket_inquiry', 'vod_fest_handle_ticket_inquiry');
add_action('wp_ajax_nopriv_vod_fest_ticket_inquiry', 'vod_fest_handle_ticket_inquiry');

/**
 * Get Client IP Address
 */
function vod_fest_get_client_ip() {
    $ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');

    foreach ($ip_keys as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                $ip = trim($ip);
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                    return $ip;
                }
            }
        }
    }

    return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
}

/**
 * Export Subscribers to CSV (Admin only)
 */
function vod_fest_export_subscribers_csv() {
    // Check user capabilities
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have permission to access this page.', 'vod-fest'));
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'vod_fest_subscribers';

    $subscribers = $wpdb->get_results("SELECT email, status, subscribed_date FROM $table_name ORDER BY subscribed_date DESC");

    if (empty($subscribers)) {
        wp_die(__('No subscribers found.', 'vod-fest'));
    }

    // Set headers for CSV download
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=vod-fest-subscribers-' . date('Y-m-d') . '.csv');

    // Create output stream
    $output = fopen('php://output', 'w');

    // Add BOM for Excel UTF-8 compatibility
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));

    // Add headers
    fputcsv($output, array('Email', 'Status', 'Subscribed Date'));

    // Add data
    foreach ($subscribers as $subscriber) {
        fputcsv($output, array(
            $subscriber->email,
            $subscriber->status,
            $subscriber->subscribed_date
        ));
    }

    fclose($output);
    exit;
}

// Add export action
add_action('admin_init', function() {
    if (isset($_GET['vod_fest_export_subscribers']) && $_GET['vod_fest_export_subscribers'] === '1') {
        vod_fest_export_subscribers_csv();
    }
});
