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

<?php get_footer(); ?>