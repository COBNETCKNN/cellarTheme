<?php 

/**
 *  Creation of the custom post types
 */

function cellarPostTypes() {

    // Programs Post Type
    register_post_type('programs', array(
        'public' => true,
        'labels' => array(
            'name' => 'Programs',
            'add_new' => 'Add New Program',
            'add_new_item' => 'Add New Program',
            'edit_item' => 'Edit Program',
            'all_items' => 'All Programs',
            'singular_name' => 'Program',
        ),
        'menu_icon' => 'dashicons-universal-access',
        'rewrite' => array('slug' => 'program'),
        'has_arcive' => true,
        'supports' => array('thumbnail', 'title', 'editor'),
        'show_in_rest' => true,
    ));

}
add_action('init', 'cellarPostTypes');