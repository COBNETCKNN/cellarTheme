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

<?php get_footer(); ?>