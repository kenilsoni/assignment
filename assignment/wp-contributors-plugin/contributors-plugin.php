<?php
/**
 * Plugin Name: WordPress Contributors Plugin
 * Description: Adds a metabox to select multiple contributors for a post and displays them on the frontend.
 * Version: 1.0
 * Author: Kenil Soni
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Add a metabox to the post editor
function contributors_add_metabox() {
    add_meta_box(
        'contributors_metabox',
        'Contributors',
        'contributors_metabox_callback',
        'post',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'contributors_add_metabox');

// Metabox content
function contributors_metabox_callback($post) {
    $users = get_users(array('role__in' => array('author', 'editor', 'administrator')));
    $selected_contributors = get_post_meta($post->ID, '_contributors', true) ?: [];

    echo '<ul>';
    foreach ($users as $user) {
        $checked = in_array($user->ID, (array) $selected_contributors) ? 'checked' : '';
        echo '<li><input type="checkbox" name="contributors[]" value="' . esc_attr($user->ID) . '" ' . $checked . '> ' . esc_html($user->display_name) . '</li>';
    }
    echo '</ul>';
}

// Save selected contributors
function contributors_save_post($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!isset($_POST['contributors'])) return;
    
    $contributors = array_map('intval', $_POST['contributors']);
    update_post_meta($post_id, '_contributors', $contributors);
}
add_action('save_post', 'contributors_save_post');

// Display contributors at the end of the post
function contributors_display_box($content) {
    if (!is_single()) return $content;

    global $post;
    $contributors = get_post_meta($post->ID, '_contributors', true);

    if (empty($contributors)) return $content;

    $output = '<div class="contributors-box"><h3>Contributors</h3><ul>';
    
    foreach ($contributors as $user_id) {
        $user = get_userdata($user_id);
        $avatar = get_avatar($user_id, 50);
        $author_link = get_author_posts_url($user_id);
        $output .= '<li>' . $avatar . ' <a href="' . esc_url($author_link) . '">' . esc_html($user->display_name) . '</a></li>';
    }

    $output .= '</ul></div>';
    return $content . $output;
}
add_filter('the_content', 'contributors_display_box');

// Add basic CSS
function contributors_enqueue_styles() {
    echo '<style>.contributors-box { border: 1px solid #ddd; padding: 10px; margin-top: 20px; background: #f9f9f9; } .contributors-box ul { list-style: none; padding: 0; } .contributors-box li { display: flex; align-items: center; gap: 10px; }</style>';
}
add_action('wp_head', 'contributors_enqueue_styles');
