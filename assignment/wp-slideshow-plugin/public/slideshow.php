<?php
function wp_slideshow_shortcode() {
    $images = get_option('wp_slideshow_images', []);

    if (empty($images)) return "No images found.";

    ob_start(); ?>
    <div class="wp-slideshow">
        <?php foreach ($images as $image) : ?>
            <div class="slide"><img src="<?php echo esc_url($image); ?>" width="600"></div>
        <?php endforeach; ?>
    </div>
    <script>
        jQuery(document).ready(function($) {
            $('.wp-slideshow').slick({
                autoplay: true,
                dots: true,
                arrows: false
            });
        });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('myslideshow', 'wp_slideshow_shortcode');
