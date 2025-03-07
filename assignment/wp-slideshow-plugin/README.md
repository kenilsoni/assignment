# WordPress Slideshow Plugin

## Description
This WordPress plugin allows users to create a simple image slideshow using a shortcode. Admins can upload, reorder, and remove images via an admin settings page. The images are displayed as a slideshow on the front-end using a shortcode.

## Features
- **Admin Panel for Managing Images**
- **Drag & Drop Sorting** (Uses jQuery UI Sortable)
- **Shortcode Support** ([myslideshow])
- **AJAX-based Save Order Button**
- **Uses jQuery Slideshow Plugin for Frontend Display**
- **Secure AJAX Requests with Nonce Validation**

## Installation
1. Download the plugin files or clone the repository.
2. Upload the folder to `wp-content/plugins/`.
3. Activate the plugin in the WordPress admin panel.
4. Navigate to **Slideshow Settings** in the admin menu to manage images.

## Usage
- **To display the slideshow**, add the following shortcode to any post or page:
  ```
  [myslideshow]
  ```
- Images added via the admin panel will be displayed in the slideshow.

## AJAX Functionality
- When the **Save Order** button is clicked, an AJAX request sends the new image order to `admin-ajax.php`.