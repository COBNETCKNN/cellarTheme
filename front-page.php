<?php get_header(); ?>

<?php 
    //Checking if the page has Featured Image
    if ( has_post_thumbnail() ) {
        $featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' ); 
    }
?>

<!-- Hero Section -->
 <section class="heroBackground h-screen w-full" style="background-image: url('<?php echo esc_url($featured_img_url); ?>');">
    <div class="container mx-auto w-full h-full flex justify-center items-center">
        <div class="text-center w-[80%]">
            <?php if( have_rows('home_hero_section') ): ?>
                <?php while( have_rows('home_hero_section') ): the_row(); 
                
                $heroHeadlineIntro = get_sub_field('home_hero_headline_intro');
                $heroHeading = get_sub_field('home_hero_heading');
                $heroSubHeading = get_sub_field('home_hero_subheading');
                ?>

                <!-- Hero Headings -->
                <span class="text-lg text-lime font-light font-giga uppercase"><?php echo $heroHeadlineIntro; ?></span>
                <h1 class="homepageHero_heading text-white font-bold font-giga uppercase mt-5 mb-8"><?php echo $heroHeading; ?></h1>
                <div class="flex justify-center">
                    <h3 class="text-white font-space font-medium text-3xl w-[50%] leading-snug"><?php echo $heroSubHeading; ?></h3>
                </div>

                <!-- Intro Button -->
                 <div class="mt-14">
                    <?php if( have_rows('theme_settings', 'option') ): ?>
                        <?php while( have_rows('theme_settings', 'option') ): the_row(); ?>
                            <?php if( have_rows('header_button') ): ?>
                                <?php while( have_rows('header_button') ): the_row(); 
                                    $headerButtonName = get_sub_field('header_button_button_name', 'option');
                                    $headerButtonLink = get_sub_field('header_button_link', 'option'); ?>

                                    <a class="bg-lime font-giga text-md font-bold uppercase tracking-tighter px-12 py-5 mt-10" href="<?php echo esc_url($headerButtonLink); ?>"><?php echo $headerButtonName; ?></a>

                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                 </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
 </section>

<!-- Process Overview Section -->
 <section class="bg-black">
    <div class="container mx-auto">
        <div class="processOverview_wrapper py-24">
            <?php if( have_rows('home_process_overview') ): ?>
                <?php while( have_rows('home_process_overview') ): the_row(); 
                    $processOverviewHeading = get_sub_field('process_overview_section_heading');
                    ?>
                    <!-- Heading -->
                    <h1 class="heading_greenUnderline font-giga font-bold text-white text-5xl uppercase text-center"><?php echo $processOverviewHeading; ?></h1>

                    <!-- Cards Repeater -->
                    <div class="grid grid-cols-3 gap-14 my-24 mx-24">
                        <?php
                        $counter = 1;
                        ?>
                        <?php if( have_rows('process_overview_cards') ): ?>
                            <?php while( have_rows('process_overview_cards') ): the_row(); 
                            
                            $processOverviewCardsHeading = get_sub_field('process_heading');
                            $processOverviewCardsDescrirption = get_sub_field('process_description');
                            $formatted_number = sprintf('%02d', $counter);
                            ?>

                            <div class="processCard_wrapper bg-charcoal px-8 py-7">
                                <span class="processOverview_cards__counter text-zinc-600 font-giga text-black font-black leading-none opacity-40"><?php echo $formatted_number; ?></span>
                                <h5 class="font-bold font-giga text-lime text-1xl uppercase text-start mt-14"><?php echo $processOverviewCardsHeading; ?></h5>
                                <p class="font-medium font-giga text-white text-xl text-start pt-5"><?php echo $processOverviewCardsDescrirption; ?></p>
                            </div>


                            <?php $counter++; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
 </section>

<!-- Intro Section -->
 <section id="intro" class="bg-charcoal py-24">
    <div class="container mx-auto">
        <div class="grid grid-cols-2 gap-4 mx-10">
            <?php if( have_rows('home_intro') ): ?>
                <?php while( have_rows('home_intro') ): the_row(); 
                
                    $introFeaturedImage = get_sub_field('intro_featured_image');
                    $introFeaturedImageSize = 'intro-featured';
                    ?>
                    <!-- Featured Image -->
                    <div class="">
                        <?php 
                            if( $introFeaturedImage ) {
                                echo wp_get_attachment_image( $introFeaturedImage, $introFeaturedImageSize );
                            }
                        ?>
                    </div>
                    <!-- Content -->
                    <div class="my-auto">
                        <?php if( have_rows('intro_content') ): ?>
                            <?php while( have_rows('intro_content') ): the_row(); 
                            
                            $introHeading = get_sub_field('intro_heading');
                            $introDescription = get_sub_field('intro_description');
                            $introButtonText = get_sub_field('intro_button_text');
                            $introButtonLink = get_sub_field('intro_button_link');
                            ?>

                            <h1 class="headingGreen_underline__start text-white font-giga text-4.5xl font-bold leading-tight text-start uppercase mb-8"><?php echo $introHeading; ?></h1>
                            <p class="text-white font-space text-xl text-start mb-14"><?php echo $introDescription; ?></p>
                            <a class="bg-lime font-giga text-md font-bold uppercase tracking-tighter px-12 py-5" href="<?php echo esc_url($introButtonLink); ?>"><?php echo $introButtonText; ?></a>

                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
 </section>

<!-- Programs Section -->
 <section id="programs" class="bg-black py-32">
    <div class="container mx-auto">
        <!-- Heading -->
        <div class="">
            <?php if( have_rows('home_programs') ): ?>
                <?php while( have_rows('home_programs') ): the_row(); 
                
                $programsSectionHeading = get_sub_field('programs_section_heading');
                ?>

                    <h1 class="heading_greenUnderline font-giga font-bold text-white text-5xl uppercase text-center"><?php echo $programsSectionHeading; ?></h1>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <!-- Cards -->
         <div class="grid grid-cols-3 gap-6 mt-20">
         <?php
            // The Query
            $programsArgs = array(
                'post_type' => 'programs',   // Specify the custom post type
                'posts_per_page' => 3,      // Number of posts to display
                'orderby' => 'date',        // Order by date
                'order' => 'DESC',           // Sort in descending order
            );

            $programsQuery = new WP_Query($programsArgs); 
            
            // The Loop
            if ($programsQuery->have_posts()) :
                while ($programsQuery->have_posts()) : $programsQuery->the_post(); 
                
                $partnersFeaturedImageUrl = get_the_post_thumbnail_url(get_the_ID(), 'program-card'); 
                ?>
                <div class="programsCard relative z-10" style="background-image: url('<?php echo esc_url($partnersFeaturedImageUrl); ?>');">
                    <div class="programsCard_content__wrapper h-[50%] w-full px-10">
                        <div class="w-full h-full flex justify-center items-center">
                            <div class="">
                                <h3 class="text-lime font-giga text-2xl text-start mb-5 uppercase"><?php echo the_title(); ?></h3>
                                <div class="text-white font-space text-xl text-start">
                                    <?php wp_trim_words(the_content(), 30); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Hovering content -->
                    <div class="programsCard_hoverContent__wrapper h-full w-full z-20 absolute top-0 right-0 flex justify-center items-center">
                        <div class="px-10">
                            <h3 class="text-black font-giga text-2xl text-start mb-5 uppercase font-bold"><?php echo the_title(); ?></h3>
                            <div class="text-black font-space text-xl text-start mb-10">
                                <?php wp_trim_words(the_content(), 30); ?>
                            </div>
                            <a class="bg-lime text-black font-giga text-sm font-semibold uppercase tracking-tighter px-7 py-3 border border-black" href="<?php echo esc_url(the_permalink()); ?>">Learn More</a>
                        </div>
                    </div>
                </div>

                <?php
                endwhile;
            else :
                // No posts found
                echo 'No programs found';
            endif; 
            wp_reset_postdata();
            ?>
         </div>
    </div>
 </section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-32">
    <div class="container mx-auto">
        <?php if( have_rows('home_testimonials') ): ?>
            <?php while( have_rows('home_testimonials') ): the_row(); ?>
                <div class="grid grid-cols-2 gap-4">
                    <!-- Content -->
                    <?php if( have_rows('home_testimonials_content') ): ?>
                        <?php while( have_rows('home_testimonials_content') ): the_row(); 
                        
                            $testimonialsHeading = get_sub_field('home_testimonials_content_heading');
                            $testimonialsDescription = get_sub_field('home_testimonials_content_description');
                            ?>
                            
                            <div class="my-auto">
                                <h1 class="headingGreen_underline__start text-white font-giga text-4.5xl font-bold leading-tight text-start uppercase mb-8"><?php echo $testimonialsHeading; ?></h1>
                                <p class="text-white font-space text-1xl text-start mb-14"><?php echo $testimonialsDescription; ?></p>
                                <?php if( have_rows('home_testimonials_content_button') ): ?>
                                    <?php while( have_rows('home_testimonials_content_button') ): the_row(); 
                                    
                                    $testimonialButtonText = get_sub_field('home_testimonials_content_button_button_text');
                                    $testimonialButtonLink = get_sub_field('home_testimonials_content_button_button_link');
                                    ?>
                                        <a class="bg-lime font-giga text-md font-bold uppercase tracking-tighter px-12 py-5" href="<?php echo esc_url($testimonialButtonLink); ?>"><?php echo $testimonialButtonText; ?></a>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <!-- Slider -->
                    <div class="testimonial_slideCard bg-grey p-14 my-auto">
                        <?php if( have_rows('home_repeater_testimonials') ): ?>
                            <?php while( have_rows('home_repeater_testimonials') ): the_row(); 
                            
                            $reviewerImage = get_sub_field('home_repeater_testimonials_image');
                            $reviewerImageSize = 'testimonial-avatar';
                            $reviewerName = get_sub_field('home_repeater_testimonials_name');
                            $reviewerReview = get_sub_field('home_repeater_testimonials_review_text');
                            ?>

                            <p class="font-space text-2xl text-black font-medium"><?php echo $reviewerReview; ?></p>
                            <div class="flex justify-start items-center mt-10">
                                <?php 
                                if( $reviewerImage ) {
                                    echo wp_get_attachment_image( $reviewerImage, $reviewerImageSize );
                                }
                                ?>
                                <h4 class="font-giga text-lg text-black font-bold uppercase"><?php echo $reviewerName; ?></h4>
                            </div>
                            

                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>

<!-- Guide Section -->
 <section id="guide" class="bg-lime">
    <div class="container mx-auto">
        <?php if( have_rows('home_guide') ): ?>
            <?php while( have_rows('home_guide') ): the_row(); ?>
                <div class="grid grid-cols-5">
                    <!-- Content -->
                    <div class="col-span-2 py-24 my-auto">
                        <?php if( have_rows('home_guide_content') ): ?>
                            <?php while( have_rows('home_guide_content') ): the_row(); 
                            
                            $guideHeading = get_sub_field('home_guide_content_heading');
                            $guideDescription = get_sub_field('home_guide_content_description');
                            $guideDownloadLink = get_sub_field('home_guide_content_download_link');
                            ?>

                                <h1 class="headingBlack_underline__start text-black font-giga text-4.5xl font-bold leading-tight text-start uppercase mb-8"><?php echo $guideHeading; ?></h1>
                                <p class="text-black font-space text-1xl text-start mb-14"><?php echo $guideDescription; ?></p>
                                <a class="bg-lime font-giga text-md font-bold uppercase tracking-tighter border border-black px-12 py-5" href="<?php echo esc_url($guideDownloadLink); ?>">Download</a>


                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <!-- Featured Image -->
                    <?php 
                    $guideFeaturedImage = get_sub_field('home_guide_featured_image');
                    ?>
                    <div class="guideFeaturedImage col-span-3" style="background-image: url('<?php echo esc_url($guideFeaturedImage); ?>');">
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
 </section>


<?php get_footer(); ?>
