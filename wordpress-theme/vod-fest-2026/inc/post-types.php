<?php
/**
 * Custom Post Types
 *
 * @package VOD_Fest_2026
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Band Post Type
 */
function vod_fest_register_band_post_type() {
    $labels = array(
        'name'                  => _x('Bands', 'Post Type General Name', 'vod-fest'),
        'singular_name'         => _x('Band', 'Post Type Singular Name', 'vod-fest'),
        'menu_name'             => __('Bands', 'vod-fest'),
        'name_admin_bar'        => __('Band', 'vod-fest'),
        'archives'              => __('Band Archives', 'vod-fest'),
        'attributes'            => __('Band Attributes', 'vod-fest'),
        'parent_item_colon'     => __('Parent Band:', 'vod-fest'),
        'all_items'             => __('All Bands', 'vod-fest'),
        'add_new_item'          => __('Add New Band', 'vod-fest'),
        'add_new'               => __('Add New', 'vod-fest'),
        'new_item'              => __('New Band', 'vod-fest'),
        'edit_item'             => __('Edit Band', 'vod-fest'),
        'update_item'           => __('Update Band', 'vod-fest'),
        'view_item'             => __('View Band', 'vod-fest'),
        'view_items'            => __('View Bands', 'vod-fest'),
        'search_items'          => __('Search Band', 'vod-fest'),
        'not_found'             => __('Not found', 'vod-fest'),
        'not_found_in_trash'    => __('Not found in Trash', 'vod-fest'),
        'featured_image'        => __('Band Photo', 'vod-fest'),
        'set_featured_image'    => __('Set band photo', 'vod-fest'),
        'remove_featured_image' => __('Remove band photo', 'vod-fest'),
        'use_featured_image'    => __('Use as band photo', 'vod-fest'),
        'insert_into_item'      => __('Insert into band', 'vod-fest'),
        'uploaded_to_this_item' => __('Uploaded to this band', 'vod-fest'),
        'items_list'            => __('Bands list', 'vod-fest'),
        'items_list_navigation' => __('Bands list navigation', 'vod-fest'),
        'filter_items_list'     => __('Filter bands list', 'vod-fest'),
    );

    $args = array(
        'label'               => __('Band', 'vod-fest'),
        'description'         => __('Festival performing bands', 'vod-fest'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'taxonomies'          => array('band_genre', 'festival_day', 'stage'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-format-audio',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => 'lineup',
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
        'rewrite'             => array('slug' => 'band', 'with_front' => false),
    );

    register_post_type('band', $args);
}
add_action('init', 'vod_fest_register_band_post_type', 0);

/**
 * Register Schedule Post Type
 */
function vod_fest_register_schedule_post_type() {
    $labels = array(
        'name'                  => _x('Schedule', 'Post Type General Name', 'vod-fest'),
        'singular_name'         => _x('Schedule Item', 'Post Type Singular Name', 'vod-fest'),
        'menu_name'             => __('Schedule', 'vod-fest'),
        'name_admin_bar'        => __('Schedule Item', 'vod-fest'),
        'archives'              => __('Schedule Archives', 'vod-fest'),
        'attributes'            => __('Schedule Attributes', 'vod-fest'),
        'all_items'             => __('All Schedule Items', 'vod-fest'),
        'add_new_item'          => __('Add New Schedule Item', 'vod-fest'),
        'add_new'               => __('Add New', 'vod-fest'),
        'new_item'              => __('New Schedule Item', 'vod-fest'),
        'edit_item'             => __('Edit Schedule Item', 'vod-fest'),
        'update_item'           => __('Update Schedule Item', 'vod-fest'),
        'view_item'             => __('View Schedule Item', 'vod-fest'),
        'view_items'            => __('View Schedule', 'vod-fest'),
        'search_items'          => __('Search Schedule', 'vod-fest'),
        'not_found'             => __('Not found', 'vod-fest'),
        'not_found_in_trash'    => __('Not found in Trash', 'vod-fest'),
    );

    $args = array(
        'label'               => __('Schedule Item', 'vod-fest'),
        'description'         => __('Festival schedule items', 'vod-fest'),
        'labels'              => $labels,
        'supports'            => array('title', 'custom-fields'),
        'taxonomies'          => array('festival_day', 'stage'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 21,
        'menu_icon'           => 'dashicons-calendar-alt',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => 'schedule',
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
        'rewrite'             => array('slug' => 'schedule', 'with_front' => false),
    );

    register_post_type('schedule', $args);
}
add_action('init', 'vod_fest_register_schedule_post_type', 0);

/**
 * Add custom columns to Band admin list
 */
function vod_fest_band_columns($columns) {
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['thumbnail'] = __('Photo', 'vod-fest');
    $new_columns['title'] = $columns['title'];
    $new_columns['genre'] = __('Genre', 'vod-fest');
    $new_columns['day'] = __('Day', 'vod-fest');
    $new_columns['stage'] = __('Stage', 'vod-fest');
    $new_columns['time'] = __('Time', 'vod-fest');
    $new_columns['date'] = $columns['date'];

    return $new_columns;
}
add_filter('manage_band_posts_columns', 'vod_fest_band_columns');

/**
 * Populate custom columns in Band admin list
 */
function vod_fest_band_custom_column($column, $post_id) {
    switch ($column) {
        case 'thumbnail':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, array(50, 50));
            } else {
                echo '—';
            }
            break;

        case 'genre':
            $terms = get_the_terms($post_id, 'band_genre');
            if ($terms && !is_wp_error($terms)) {
                $genres = array();
                foreach ($terms as $term) {
                    $genres[] = $term->name;
                }
                echo implode(', ', $genres);
            } else {
                echo '—';
            }
            break;

        case 'day':
            $terms = get_the_terms($post_id, 'festival_day');
            if ($terms && !is_wp_error($terms)) {
                echo $terms[0]->name;
            } else {
                echo '—';
            }
            break;

        case 'stage':
            $terms = get_the_terms($post_id, 'stage');
            if ($terms && !is_wp_error($terms)) {
                echo $terms[0]->name;
            } else {
                echo '—';
            }
            break;

        case 'time':
            $start_time = get_post_meta($post_id, '_band_start_time', true);
            $end_time = get_post_meta($post_id, '_band_end_time', true);
            if ($start_time && $end_time) {
                echo esc_html($start_time) . ' - ' . esc_html($end_time);
            } else {
                echo '—';
            }
            break;
    }
}
add_action('manage_band_posts_custom_column', 'vod_fest_band_custom_column', 10, 2);

/**
 * Make custom columns sortable
 */
function vod_fest_band_sortable_columns($columns) {
    $columns['genre'] = 'genre';
    $columns['day'] = 'day';
    $columns['stage'] = 'stage';
    $columns['time'] = 'time';

    return $columns;
}
add_filter('manage_edit-band_sortable_columns', 'vod_fest_band_sortable_columns');
