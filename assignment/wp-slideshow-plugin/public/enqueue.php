<?php
function wp_slideshow_frontend_scripts() {
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css');
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js', ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', 'wp_slideshow_frontend_scripts');
