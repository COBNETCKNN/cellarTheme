<?php 

//Enqueing theme's files
function cellarTheme_files() {

    //Enqueue CSS files
    wp_enqueue_style('mainCSS', get_template_directory_uri() . '/css/main.css', array(), '1.0');

    //Enqueue JS files
    wp_enqueue_script('jquery');
    wp_enqueue_script('mainJS', get_stylesheet_directory_uri() . '/js/main.js', array(), 1.0, true);

}
add_action('wp_enqueue_scripts', 'cellarTheme_files');

//Registration of the navigation menus
require_once('includes/nav-menus.php');

//Custom image sizes
require_once('includes/image-sizes.php');

//Disable classic editor from certain pages
require_once('includes/disable-editor.php');

//Theme supports
require_once('includes/theme-supports.php');

//Custom Post Types
require_once('includes/post-types.php');
