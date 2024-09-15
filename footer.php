<footer class="bg-charcoal">
    <div class="container mx-auto">
        <div class="flex justify-between mx-10">
            <!-- Rights reserved -->
             <div class="py-6 my-auto w-[30%]">
             <p class="text-start text-md font-space text-white">Copyright &copy; <span id="year"><?php echo date("Y"); ?></span> <a class="text-lime" href="https://usekilo.com/" target=”_blank”><?php echo bloginfo('name'); ?></a>. All rights reserved.</p>
             </div>
            <!-- Footer navigation & Social media -->
             <div class="footer_navigation__wrapper py-6 my-auto bg-lime w-[70%]">
                <div class="flex justify-between mx-16">
                    <!-- Navigation -->
                     <div class="footer_navItems__wrapper">
                        <?php 
                                wp_nav_menu(
                                    array(
                                    'theme_location' => 'footer-menu',
                                    'container_class' => 'footer-menu text-black font-bold font-space',
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

<?php wp_footer(); ?>
</body>
</html>