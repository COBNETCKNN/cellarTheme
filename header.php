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
<?php wp_body_open(); ?>

<header class="bg-black py-5">
    <div class="container mx-auto h-auto">
        <?php if( have_rows('theme_settings', 'option') ): ?>
            <?php while( have_rows('theme_settings', 'option') ): the_row(); ?>
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
                                    echo '<h1 class="font-space text-2xl font-bold">' . get_bloginfo('name') . '</h1>';
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
                                'container_class' => 'header-menu text-white font-medium font-space',
                                )
                            );
                        ?>
                    </div>
                    <!-- Button -->
                    <div class="headerButton_wrapper my-auto text-black ">
                        <?php if( have_rows('header_button') ): ?>
                            <?php while( have_rows('header_button') ): the_row(); 
                                $headerButtonName = get_sub_field('header_button_button_name', 'option');
                                $headerButtonLink = get_sub_field('header_button_link', 'option'); ?>

                                <a class="bg-lime font-giga text-sm font-bold uppercase tracking-tighter px-5 py-3" href="<?php echo esc_url($headerButtonLink); ?>"><?php echo $headerButtonName; ?></a>

                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</header>