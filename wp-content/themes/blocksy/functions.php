<?php
/**
 * Blocksy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blocksy
 */

if (version_compare(PHP_VERSION, '5.7.0', '<')) {
	require get_template_directory() . '/inc/php-fallback.php';
	return;
}

function register_clients_post_type() {
    register_post_type('clients', [
        'label' => 'Clients',
        'public' => true,
        'menu_icon' => 'dashicons-businessperson',
        'supports' => ['title', 'editor', 'thumbnail'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'clients'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'register_clients_post_type');

/** ---------- Start Custom Code to Restrict Add to Cart to Logged-in Users ---------- **/
// add_filter('woocommerce_add_to_cart_validation', 'require_login_before_add_to_cart', 10, 2);

// function require_login_before_add_to_cart($passed, $product_id) {
//     if (!is_user_logged_in()) {
//         wc_add_notice(__('You must be logged in to add items to your cart.', 'woocommerce'), 'error');
//         return false;
//     }
//     return $passed;
// }
/** ---------- End Custom Code to Restrict Add to Cart to Logged-in Users ---------- **/


/** ---------- Start Redirect to Login Page Automatically ---------- **/
// functions.php
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('guest-check-cart', get_template_directory_uri() . '/js/guest-check.js', ['jquery'], null, true);
    wp_localize_script('guest-check-cart', 'guestCheck', [
        'is_logged_in' => is_user_logged_in(),
    ]);
});
/** ---------- End Redirect to Login Page Automatically ---------- **/


require get_template_directory() . '/inc/init.php';

