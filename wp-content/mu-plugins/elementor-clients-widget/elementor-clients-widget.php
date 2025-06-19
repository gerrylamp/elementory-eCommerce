<?php
/*
Plugin Name: Elementor Clients Widget
Description: Custom Elementor widget for Clients CPT
*/

function ecw_register_clients_widget($widgets_manager) {
    require_once(__DIR__ . '/clients-widget.php');
    $widgets_manager->register(new \Elementor_Clients_Widget());
}
add_action('elementor/widgets/register', 'ecw_register_clients_widget');

// Register a custom image size specific to this plugin
function ecw_register_custom_image_size() {
    add_image_size('client-thumb', 300, 119, true); // 300x119 hard crop
}
add_action('after_setup_theme', 'ecw_register_custom_image_size');

function ecw_enqueue_styles() {
    wp_enqueue_style('ecw-styles', plugin_dir_url(__FILE__) . 'clients-widget.css');
}
add_action('wp_enqueue_scripts', 'ecw_enqueue_styles');
