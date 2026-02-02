<?php
/**
 * Custom Taxonomies
 *
 * @package VOD_Fest_2026
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Band Genre Taxonomy
 */
function vod_fest_register_genre_taxonomy() {
    $labels = array(
        'name'              => _x('Genres', 'taxonomy general name', 'vod-fest'),
        'singular_name'     => _x('Genre', 'taxonomy singular name', 'vod-fest'),
        'search_items'      => __('Search Genres', 'vod-fest'),
        'all_items'         => __('All Genres', 'vod-fest'),
        'parent_item'       => __('Parent Genre', 'vod-fest'),
        'parent_item_colon' => __('Parent Genre:', 'vod-fest'),
        'edit_item'         => __('Edit Genre', 'vod-fest'),
        'update_item'       => __('Update Genre', 'vod-fest'),
        'add_new_item'      => __('Add New Genre', 'vod-fest'),
        'new_item_name'     => __('New Genre Name', 'vod-fest'),
        'menu_name'         => __('Genres', 'vod-fest'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'genre'),
    );

    register_taxonomy('band_genre', array('band'), $args);
}
add_action('init', 'vod_fest_register_genre_taxonomy', 0);

/**
 * Register Festival Day Taxonomy
 */
function vod_fest_register_day_taxonomy() {
    $labels = array(
        'name'              => _x('Festival Days', 'taxonomy general name', 'vod-fest'),
        'singular_name'     => _x('Festival Day', 'taxonomy singular name', 'vod-fest'),
        'search_items'      => __('Search Days', 'vod-fest'),
        'all_items'         => __('All Days', 'vod-fest'),
        'edit_item'         => __('Edit Day', 'vod-fest'),
        'update_item'       => __('Update Day', 'vod-fest'),
        'add_new_item'      => __('Add New Day', 'vod-fest'),
        'new_item_name'     => __('New Day Name', 'vod-fest'),
        'menu_name'         => __('Festival Days', 'vod-fest'),
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'day'),
    );

    register_taxonomy('festival_day', array('band', 'schedule'), $args);
}
add_action('init', 'vod_fest_register_day_taxonomy', 0);

/**
 * Register Stage Taxonomy
 */
function vod_fest_register_stage_taxonomy() {
    $labels = array(
        'name'              => _x('Stages', 'taxonomy general name', 'vod-fest'),
        'singular_name'     => _x('Stage', 'taxonomy singular name', 'vod-fest'),
        'search_items'      => __('Search Stages', 'vod-fest'),
        'all_items'         => __('All Stages', 'vod-fest'),
        'edit_item'         => __('Edit Stage', 'vod-fest'),
        'update_item'       => __('Update Stage', 'vod-fest'),
        'add_new_item'      => __('Add New Stage', 'vod-fest'),
        'new_item_name'     => __('New Stage Name', 'vod-fest'),
        'menu_name'         => __('Stages', 'vod-fest'),
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'stage'),
    );

    register_taxonomy('stage', array('band', 'schedule'), $args);
}
add_action('init', 'vod_fest_register_stage_taxonomy', 0);

/**
 * Add default terms on theme activation
 */
function vod_fest_insert_default_terms() {
    // Add default genres
    $genres = array(
        'Industrial',
        'Experimental',
        'Post-Punk',
        'Avant-Garde',
        'Noise',
        'Electronic',
        'Dark Wave',
    );

    foreach ($genres as $genre) {
        if (!term_exists($genre, 'band_genre')) {
            wp_insert_term($genre, 'band_genre');
        }
    }

    // Add festival days
    $days = array(
        'Friday, July 17' => 'friday',
        'Saturday, July 18' => 'saturday',
        'Sunday, July 19' => 'sunday',
    );

    foreach ($days as $day => $slug) {
        if (!term_exists($day, 'festival_day')) {
            wp_insert_term($day, 'festival_day', array('slug' => $slug));
        }
    }

    // Add stages
    $stages = array(
        'Inside Stage' => 'inside',
        'Outside Stage' => 'outside',
    );

    foreach ($stages as $stage => $slug) {
        if (!term_exists($stage, 'stage')) {
            wp_insert_term($stage, 'stage', array('slug' => $slug));
        }
    }
}
add_action('after_switch_theme', 'vod_fest_insert_default_terms');
