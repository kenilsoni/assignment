<?php
// Add menu item in WP Admin
function wp_slideshow_menu() {
    add_menu_page(
        'WP Slideshow',
        'WP Slideshow',
        'manage_options',
        'wp-slideshow',
        'wp_slideshow_settings_page'
    );
}
add_action('admin_menu', 'wp_slideshow_menu');

// Admin Page Content
function wp_slideshow_settings_page() {
    $images = get_option('wp_slideshow_images', []);

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wp_slideshow_images'])) {
        update_option('wp_slideshow_images', $_POST['wp_slideshow_images']);
        $images = $_POST['wp_slideshow_images'];
    }
    ?>
    <div class="wrap">
        <h1>WP Slideshow Settings</h1>
        <form method="post">
            <div id="sortable">
                
                <?php if($images) {foreach ($images as $image) : ?>
                    <div class="slide-item">
                        <input type="hidden" name="wp_slideshow_images[]" value="<?php echo esc_url($image); ?>">
                        <img src="<?php echo esc_url($image); ?>" width="100">
                        <button type="button" class="remove-image">Remove</button>
                    </div>
                <?php endforeach;} ?>
            </div>
            <input type="button" class="button upload-image" value="Upload Image">
            <input type="submit" class="button button-primary" value="Save Changes">
        </form>
    </div>
    <?php
}

// Enqueue scripts for sortable images
function wp_slideshow_admin_scripts($hook) {
    if ($hook !== 'toplevel_page_wp-slideshow') return;

    wp_enqueue_media();
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('wp-slideshow-admin', plugin_dir_url(__FILE__) . '../assets/js/admin.js', ['jquery'], null, true);
    wp_enqueue_style('wp-slideshow-admin', plugin_dir_url(__FILE__) . '../assets/css/style.css');
}
add_action('admin_enqueue_scripts', 'wp_slideshow_admin_scripts');
