<?php
/**
 * Plugin Name: WP Slideshow Plugin
 * Description: A simple WordPress plugin to create a slideshow using shortcodes.
 * Version: 1.0
 * Author: Kenil Soni
 */

if (!defined('ABSPATH')) exit; // Prevent direct access

// Include necessary files
include_once plugin_dir_path(__FILE__) . 'admin/settings.php';
include_once plugin_dir_path(__FILE__) . 'public/slideshow.php';

// Register activation hook
function wp_slideshow_activate() {
    add_option('wp_slideshow_images', []);
}
register_activation_hook(__FILE__, 'wp_slideshow_activate');

// Register deactivation hook
function wp_slideshow_deactivate() {
    delete_option('wp_slideshow_images');
}
register_deactivation_hook(__FILE__, 'wp_slideshow_deactivate');
