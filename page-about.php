<?php get_header(); 

$aboutFeaturedImage = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>

<!-- Hero Section -->
<section id="aboutHero" class="h-[85vh] w-full" style="background-image: url('<?php echo esc_url($aboutFeaturedImage); ?>');">
    <div class="container mx-auto w-full h-full">
        <div class="w-full h-full flex justify-center items-center">
            <?php if( have_rows('about_hero') ): ?>
                <?php while( have_rows('about_hero') ): the_row(); 
                
                $aboutHeroHeading = get_sub_field('about_hero_heading');
                $aboutHeroSubheading = get_sub_field('about_hero_subheading');
                ?>
                    <div class="">
                        <h1 class="aboutHero_heading font-giga text-white font-bold uppercase text-center mb-2"><?php echo $aboutHeroHeading; ?></h1>
                        <div class="w-[70%] mx-auto">
                            <p class="font-space text-white font-normal text-1xl text-center"><?php echo $aboutHeroSubheading; ?></p>
                        </div>
                        <?php if( have_rows('about_hero_button') ): ?>
                            <?php while( have_rows('about_hero_button') ): the_row(); 
                            
                            $aboutUsHeroButtonText = get_sub_field('about_hero_button_button_text');
                            $aboutUsHeroButtonLink = get_sub_field('about_hero_button_button_link');
                            ?>

                            <div class="flex justify-center">
                                <a class="bg-lime font-giga text-md font-bold uppercase tracking-tighter px-14 py-4 mt-10" href="<?php echo esc_url($aboutUsHeroButtonLink); ?>"><?php echo $aboutUsHeroButtonText; ?></a>
                            </div>

                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Our Coaches Section -->
 <section id="coaches" class="py-32 bg-black">
    <?php if( have_rows('about_coaches_section') ): ?>
        <?php while( have_rows('about_coaches_section') ): the_row(); ?>
            <div class="container mx-auto">
                <!-- Heading -->
                    <?php
                    $coachesHeading = get_sub_field('about_coaches_heading');
                    $coachesSubheading = get_sub_field('about_coaches_subheading');
                    ?>

                    <h1 class="heading_greenUnderline font-giga font-bold text-white text-5xl uppercase text-center"><?php echo $coachesHeading; ?></h1>
                    <div class="w-[55%] mx-auto mt-14">
                        <p class="font-normal font-space text-white text-xl text-center pt-5"><?php echo $coachesSubheading; ?></p>
                    </div>
                <!-- Repeater -->
                <div class="grid grid-cols-2 gap-14 my-24">
                    <?php if( have_rows('about_coaches_repeater') ): ?>
                        <?php while( have_rows('about_coaches_repeater') ): the_row(); 
                        
                        $coachCardImage = get_sub_field('about_coaches_repeater_image');
                        $coachCardImageSize = 'coach-card';

                        $coachCardImage = get_sub_field('about_coaches_repeater_image');
                        $coachCardImageSize = 'coach-card';
                        
                        if ($coachCardImage) {
                            // Get the image URL with the specified size
                            $coachCardImageUrl = wp_get_attachment_image_url($coachCardImage, $coachCardImageSize);
                        }
                        ?>
                        <div class="flex justify-center items-center">
                            <?php if( have_rows('about_coaches_repeater_about_coach') ): ?>
                                <?php while( have_rows('about_coaches_repeater_about_coach') ): the_row(); 
                                
                                $coachName = get_sub_field('about_coaches_repeater_about_coach_name');
                                $coachExpertise = get_sub_field('about_coaches_repeater_about_coach_expertise');
                                $coachDescription = get_sub_field('about_coaches_repeater_about_coach_description');
                                ?>
                                    <div class="coachCard relative" style="background-image: url('<?php echo esc_url($coachCardImageUrl); ?>');">
                                        <!-- Visible content -->
                                        <div class="coachesRepeater_card w-full h-[35%] p-14 absolute bottom-0 right-0">
                                            <h4 class="coachesRepeater_card__heading font-giga text-lime font-bold text-1xl uppercase"><?php echo $coachName; ?></h4>
                                            <span class="font-space text-white font-normal text-xl"><?php echo $coachExpertise; ?></span>
                                        </div>
                                        <!-- Hover content -->
                                         <div class="coachesRepeater_card__hover w-full h-full p-14 flex items-center">
                                            <div class="">
                                                <h4 class="coachesRepeater_card__heading font-giga text-lime font-bold text-1xl uppercase"><?php echo $coachName; ?></h4>
                                                <span class="font-space text-white font-bold text-xl"><?php echo $coachExpertise; ?></span>
                                                <div class="text-white font-space font-medium text-xl pt-10">
                                                    <?php echo $coachDescription; ?>
                                                </div>
                                            </div>

                                         </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>


                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
 </section>

<!-- Get started section -->
 <section id="getStarted" class="bg-lime">
    <div class="container mx-auto">
        <?php if( have_rows('about_get_started_section') ): ?>
            <?php while( have_rows('about_get_started_section') ): the_row(); 
            
            $getStartedFeaturedImage = get_sub_field('');
            ?>
                <div class="grid grid-cols-2">
                    <!-- Featured Image -->
                    <div class="">
                        <?php 
                            $getStartedFeaturedImage = get_sub_field('about_get_started_featured_image');
                            ?>
                            <div class="getStartedFeaturedImage" style="background-image: url('<?php echo esc_url($getStartedFeaturedImage); ?>');">
                            </div>
                    </div>
                    <!-- Content -->
                    <div class="my-auto p-5">
                        <?php if( have_rows('about_get_started_content') ): ?>
                            <?php while( have_rows('about_get_started_content') ): the_row(); 
                            
                            $getStartedHeading = get_sub_field('about_get_started_content_heading');
                            $getStartedSubheading = get_sub_field('about_get_started_content_subheading');
                            ?>
                            
                            <h1 class="headingBlack_underline__start text-black font-giga text-4.5xl font-bold leading-tight text-start uppercase mb-8"><?php echo $getStartedHeading; ?></h1>
                            <p class="text-black font-space text-1xl text-start mb-14 w-[75%]"><?php echo $getStartedSubheading; ?></p>

                            <!-- Button -->
                            <?php if( have_rows('about_get_started_content_button') ): ?>
                                <?php while( have_rows('about_get_started_content_button') ): the_row(); 
                                
                                $getStartedButtonText = get_sub_field('about_get_started_content_button_button_text');
                                $getStartedButtonLink = get_sub_field('about_get_started_content_button_button_link');
                                ?>

                                <a class="bg-lime font-giga text-md font-bold uppercase tracking-tighter border border-black px-12 py-5" href="<?php echo esc_url($getStartedButtonLink); ?>"><?php echo $getStartedButtonText; ?></a>

                                <?php endwhile; ?>
                            <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
 </section>

<?php get_footer(); ?>