<?php 

/**
 * Disable editor on certain pages.
 */
function remove_pages_editor() {
    $disabled_pages = array(14, 8);

    $current_page_id = get_the_ID();

    if (in_array($current_page_id, $disabled_pages)) {
        remove_post_type_support('page', 'editor');
    }

    remove_post_type_support( 'post', 'editor' );
}
add_action('add_meta_boxes', 'remove_pages_editor');