jQuery(document).ready(function($) {
    $('#sortable').sortable();

    $('.upload-image').click(function() {
        var mediaUploader = wp.media({
            title: 'Choose Image',
            button: { text: 'Add Image' },
            multiple: false
        });

        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#sortable').append(`
                <div class="slide-item">
                    <input type="hidden" name="wp_slideshow_images[]" value="${attachment.url}">
                    <img src="${attachment.url}" width="100">
                    <button type="button" class="remove-image">Remove</button>
                </div>
            `);
        });

        mediaUploader.open();
    });

    $(document).on('click', '.remove-image', function() {
        $(this).parent().remove();
    });
});
