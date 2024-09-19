<?php 
global $primary_color, $secondary_color, $tertiary_color, $primary_text_color, $secondary_text_color, $tertiary_text_color, $quaternary_text_color;
?>
<footer style="background-color: <?php echo $tertiary_color; ?>">
    <div class="container mx-auto">
        <!-- Upper footer -->
        <div class="grid grid-cols-2 gap-4 py-44 mx-10" style="background-color: <?php echo $tertiary_color; ?>">
            <?php if( have_rows('theme_settings', 'option') ): ?>
                <?php while( have_rows('theme_settings', 'option') ): the_row(); ?>
                    <?php if( have_rows('theme_settings_footer', 'option') ): ?>
                        <?php while( have_rows('theme_settings_footer', 'option') ): the_row(); ?>
                            <!-- Logo and Accreditations -->
                            <div class="">
                                <?php if( have_rows('logo_accrediations', 'option') ): ?>
                                    <?php while( have_rows('logo_accrediations', 'option') ): the_row(); 
                                    
                                    $footerLogo = get_sub_field('footer_logo', 'option');
                                    $footerLogoSize = 'full'; ?>

                                    <!-- Logo -->
                                    <div class="footerLogo">
                                        <?php
                                            if( $footerLogo ) {
                                                echo wp_get_attachment_image( $footerLogo, $footerLogoSize );
                                            }
                                        ?>
                                    </div>
                                    <!-- Accreditations -->
                                     <div class="grid grid-cols-5 gap-4 mt-10">
                                        <?php if( have_rows('footer_accreditations', 'option') ): ?>
                                            <?php while( have_rows('footer_accreditations', 'option') ): the_row(); 
                                                $accreditationImage = get_sub_field('accrediation_image');
                                                $accreditationImageSize = 'full';
                                                ?>

                                                <?php 
                                                    if( $accreditationImage ) {
                                                        echo wp_get_attachment_image( $accreditationImage, $accreditationImageSize );
                                                    }
                                                ?>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                     </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                            <!-- Contact and Address -->
                            <div class="my-auto">
                                <div class="grid grid-cols-2 gap-4">
                                    <!-- Contact -->
                                    <div class="">
                                        <h4 class="font-giga text-md uppercase font-extrabold mb-5" style="color: <?php echo $tertiary_text_color; ?>;">Contact</h4>
                                        <?php if( have_rows('footer_contact', 'option') ): ?>
                                            <?php while( have_rows('footer_contact', 'option') ): the_row(); 
                                            
                                            $contactPhone = get_sub_field('footer_contact_phone', 'option');
                                            $contactEmail = get_sub_field('footer_contact_email', 'option')
                                            ?>

                                            <div class="my-auto">
                                                <!-- Phone -->
                                                <div class="mb-5">
                                                    <span class="font-space uppercase text-sm" style="color: <?php echo $quaternary_text_color; ?>">Phone:</span>
                                                    <a class="font-space font-semibold text-sm" style="color: <?php echo $primary_text_color; ?>;" href="tel:<?php echo $contactPhone; ?>"><?php echo $contactPhone; ?></a>
                                                </div>
                                                <!-- Email -->
                                                <div class="">
                                                    <span class="font-space uppercase text-sm" style="color: <?php echo $quaternary_text_color; ?>">Email:</span>
                                                    <a class="font-space font-semibold text-sm" style="color: <?php echo $primary_text_color; ?>;" href="mailto:<?php echo $contactEmail; ?>"><?php echo $contactEmail; ?></a>
                                                </div>

                                            </div>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                    <!-- Address -->
                                    <div class="">
                                        <h4 class="font-giga text-md uppercase font-extrabold mb-5" style="color: <?php echo $tertiary_text_color; ?>;">Address</h4>
                                        <?php if( have_rows('footer_address', 'option') ): ?>
                                            <?php while( have_rows('footer_address', 'option') ): the_row(); 
                                            
                                            $addressName = get_sub_field('footer_address_name');
                                            $addressLocation = get_sub_field('footer_address_address');
                                            ?>

                                            <span class="block font-space text-sm" style="color: <?php echo $quaternary_text_color; ?>"><?php echo $addressName; ?></span>
                                            <span class="block text-white font-space font-semibold text-sm"><?php echo $addressLocation; ?></span>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <!-- Bottom footer -->
        <div class="flex justify-between mx-10">
            <!-- Rights reserved -->
             <div class="py-6 my-auto w-[30%]">
             <p class="text-start text-md font-space" style="color: <?php echo $primary_text_color; ?>">Copyright &copy; <span id="year"><?php echo date("Y"); ?></span> <a class="text-lime" style="color: <?php echo $tertiary_text_color; ?>" href="https://usekilo.com/" target=”_blank”><?php echo bloginfo('name'); ?></a>. All rights reserved.</p>
             </div>
            <!-- Footer navigation & Social media -->
             <div class="footer_navigation__wrapper py-6 my-auto w-[70%]" style="background-color: <?php echo $primary_color; ?>">
                <div class="flex justify-between mx-16">
                    <!-- Navigation -->
                     <div class="footer_navItems__wrapper">
                        <?php 
                                wp_nav_menu(
                                    array(
                                    'theme_location' => 'footer-menu',
                                    'container_class' => 'footer-menu font-bold font-space',
                                    )
                                );
                            ?>
                     </div>
                    <!-- Social Media -->
                    <?php if( have_rows('theme_settings', 'option') ): ?>
                        <?php while( have_rows('theme_settings', 'option') ): the_row(); ?>
                            <?php if( have_rows('theme_settings_footer', 'option') ): ?>
                                <?php while( have_rows('theme_settings_footer', 'option') ): the_row(); ?>
                                    <div class="socialMedia_icons__wrapper flex justify-start my-auto">
                                        <?php
                                            if( have_rows('social_media', 'option') ):
                                                while( have_rows('social_media', 'option') ) : the_row();
                                                
                                                $socialMediaIcon = get_sub_field('social_media_icon', 'option');
                                                $socilaMediaIconSize = 'social-media';
                                                $socialMediaIconLink = get_sub_field('social_media_link', 'option'); ?>

                                                <a href="<?php echo esc_url($socialMediaIconLink); ?>">
                                                    <?php
                                                        if( $socialMediaIcon ) {
                                                            echo wp_get_attachment_image( $socialMediaIcon, $socilaMediaIconSize );
                                                        }
                                                    ?>
                                                </a>

                                                <?php

                                                endwhile;

                                            // No value.
                                            else :
                                                // Do something...
                                            endif;
                                        ?>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
             </div>
        </div>
    </div>
</footer>

<style>
    #menu-footer-menu > .menu-item > a {
        color: <?php echo esc_attr($secondary_text_color); ?>;
    }
</style>

<?php wp_footer(); ?>
</body>
</html>