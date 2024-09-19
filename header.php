<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-cursor">
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); 
global $site_name;
global $primary_color, $secondary_color, $tertiary_color, $primary_text_color, $secondary_text_color, $tertiary_text_color;
?>

<header class="py-5 relative">
    <div class="container mx-auto h-auto">
        <?php if( have_rows('theme_settings', 'option') ): ?>
            <?php while( have_rows('theme_settings', 'option') ): the_row(); ?>
                <?php if( have_rows('theme_settings_header', 'option') ): ?>
                    <?php while( have_rows('theme_settings_header', 'option') ): the_row(); ?>
                        <div class="flex justify-between mx-10">
                            <!-- Logo of the site -->
                            <div class="">
                                <a href="<?php echo site_url(); ?>">
                                    <?php 
                                        $website_logo = get_sub_field('site_logo', 'option');
                                        $website_logo_size = 'full';

                                        if( $website_logo ) {
                                            echo wp_get_attachment_image( $website_logo, $website_logo_size );
                                        }else {
                                            echo '<h1 class="font-space text-2xl font-bold">' . $site_name . '</h1>';
                                        }
                                    ?>
                                </a>
                            </div>
                            <!-- Nav items -->
                            <div class="header_navItems__wrapper my-auto">
                                <?php 
                                    wp_nav_menu(
                                        array(
                                        'theme_location' => 'header-menu',
                                        'container_class' => 'header-menu font-medium font-space',
                                        )
                                    );
                                ?>
                            </div>
                            <!-- Button -->
                            <div class="headerButton_wrapper my-auto text-black ">
                                <?php if( have_rows('header_button') ): ?>
                                    <?php while( have_rows('header_button') ): the_row(); 
                                        $headerButtonName = get_sub_field('header_button_button_name', 'option');
                                        $headerButtonLink = get_sub_field('header_button_link', 'option'); 
                                        $headerButtonBackgroundColor = esc_attr($primary_color);
                                        $headerButtonTextColor = esc_attr($secondary_text_color);
                                        ?>


                                        <a class="font-giga text-sm font-bold uppercase tracking-tighter px-5 py-3" style="background-color: <?php echo $headerButtonBackgroundColor; ?>; color: <?php echo $headerButtonTextColor; ?>;" href="<?php echo esc_url($headerButtonLink); ?>"><?php echo $headerButtonName; ?></a>

                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</header>

<?php
function hexToRgbHeader($hex) {
    // Remove the hash (#) if present
    $hex = str_replace('#', '', $hex);

    // Parse the hex color into RGB
    if (strlen($hex) == 6) {
        list($r, $g, $b) = sscanf($hex, "%02x%02x%02x");
    } else {
        // Handle shorthand hex colors (e.g., #fff)
        list($r, $g, $b) = sscanf($hex, "%1x%1x%1x");
        $r *= 17;
        $g *= 17;
        $b *= 17;
    }

    return "$r, $g, $b"; // Return RGB string
}

$rgb_color = hexToRgbHeader($tertiary_color); // Convert hex to RGB
?>

<style>
    header {
        background-color: rgba(<?php echo $rgb_color; ?>, 0.7); /* 0.7 is the alpha value */
    }

    #menu-header-menu > .menu-item > a {
        color: <?php echo esc_attr($primary_text_color); ?>;
    }
</style>