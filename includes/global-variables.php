<?php 
/**
 * Setting up global variables for Advanced Custom Fields so they can be used globally.
 */

 //Site name
 function set_global_site_name() {
    global $site_name;

    $theme_settings = get_field('theme_settings', 'option');

    if ($theme_settings && isset($theme_settings['theme_setting_site_identity'])) {
        $site_identity = $theme_settings['theme_setting_site_identity'];

        if (isset($site_identity['site_identitiy_site_name'])) {
            $site_name = $site_identity['site_identitiy_site_name'];
        }
    }
}
add_action('init', 'set_global_site_name');

//Background Colors
function set_global_background_colors() {
    global $primary_color, $secondary_color, $tertiary_color;

    $theme_settings = get_field('theme_settings', 'option');

    if ($theme_settings && isset($theme_settings['theme_settings_site_colors']['theme_settings_background_colors'])) {
        $background_colors = $theme_settings['theme_settings_site_colors']['theme_settings_background_colors'];

        if (isset($background_colors['site_colors_primary_color'])) {
            $primary_color = $background_colors['site_colors_primary_color'];
        }
        if (isset($background_colors['site_colors_secondary_color'])) {
            $secondary_color = $background_colors['site_colors_secondary_color'];
        }
        if (isset($background_colors['site_colors_tertiary_color'])) {
            $tertiary_color = $background_colors['site_colors_tertiary_color'];
        }
    }
}
add_action('init', 'set_global_background_colors');

//Text Colors
function set_global_text_colors() {
    global $primary_text_color, $secondary_text_color, $tertiary_text_color, $quaternary_text_color;

    $theme_settings = get_field('theme_settings', 'option');

    if($theme_settings && isset($theme_settings['theme_settings_site_colors']['theme_settings_text_colors'])) {
        $text_colors = $theme_settings['theme_settings_site_colors']['theme_settings_text_colors'];

        if (isset($text_colors['text_color_primary_color'])) {
            $primary_text_color = $text_colors['text_color_primary_color'];
        }
        if (isset($text_colors['text_color_secondary_color'])) {
            $secondary_text_color = $text_colors['text_color_secondary_color'];
        }
        if (isset($text_colors['text_color_tertiary_color'])) {
            $tertiary_text_color = $text_colors['text_color_tertiary_color'];
        }
        if (isset($text_colors['text_color_quaternary_color'])) {
            $quaternary_text_color = $text_colors['text_color_quaternary_color'];
        }
    }

}
add_action('init', 'set_global_text_colors');
?>