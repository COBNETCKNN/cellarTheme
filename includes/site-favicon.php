<?php 
/**
 * Making function that will overwrite current code for displaying favicon with the one that will pull the favicon from the Theme Settings and the already made field for it in Advanced Custom Fields.
 */

function set_site_favicon() {
    // Get the theme settings group field from the options page
    $theme_settings = get_field('theme_settings', 'option');

    // Check if the theme settings and site identity group fields exist
    if ($theme_settings && isset($theme_settings['theme_setting_site_identity'])) {
        $site_identity = $theme_settings['theme_setting_site_identity'];

        // Get the image URL from the image field
        if (isset($site_identity['site_identitiy_site_favicon'])) {
            $favicon_id = $site_identity['site_identitiy_site_favicon'];
            $favicon_url = wp_get_attachment_image_url($favicon_id, 'full');

            // Output the favicon in the head section if the URL exists
            if ($favicon_url) {
                echo '<link rel="icon" href="' . esc_url($favicon_url) . '" type="image/x-icon" />';
            }
        }
    }
}
add_action('wp_head', 'set_site_favicon');

?>