<?php 

//Enqueing theme's files
function cellarTheme_files() {

    //Enqueue CSS files
    wp_enqueue_style('mainCSS', get_template_directory_uri() . '/css/main.css', array(), '1.0');
    wp_enqueue_style('owlCarousel', get_template_directory_uri() . '/assets/owlCarousel/owl.carousel.min.css', array(), '1.0');

    //Enqueue JS files
    wp_enqueue_script('jquery');
    wp_enqueue_script('mainJS', get_stylesheet_directory_uri() . '/js/main.js', array(), 1.0, true);
    wp_enqueue_script('owlCarouselJS', get_stylesheet_directory_uri(). '/assets/owlCarousel/owl.carousel.min.js', array(), 1.0, true);

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

//Global Variables for ACF fields
require_once('includes/global-variables.php');

//Adjusting site favicon to be pulled from Theme Settings
require_once('includes/site-favicon.php');

// Exclude node_modules from exporting All In One Migration Plugin
add_filter( 'ai1wm_exclude_themes_from_export',
function ( $exclude_filters ) {
  $exclude_filters[] = 'cellarTheme/node_modules'; // insert your theme name
  return $exclude_filters;
} );
