<?php
/**
 * Flexible content template for Hero Section.
 */
// Global Variables for colors selected in Theme Settings
global $primary_color, $secondary_color, $tertiary_color, $primary_text_color, $secondary_text_color, $tertiary_text_color;
?>

<?php if( have_rows('section_appearance') ): ?>
    <?php while( have_rows('section_appearance') ): the_row(); 
        
        // Fetch the background image and color
        $background_image_id = get_sub_field('background_image'); 
        $background_color = get_sub_field('background_color'); 

        // Check if a background image is set
        if ($background_image_id) {
            // Get the image URL
            $background_image_url = wp_get_attachment_url($background_image_id);
            $section_style = "background-image: url('$background_image_url'); background-size: cover; background-position: center;";
        } else {
            // Fallback background style
            $section_style = "background-color: " . esc_attr($primary_color) . ";";
        }

    endwhile; ?>
<?php endif; ?>

<!-- Hero Section -->
<section class="heroBackground h-screen w-full" style="<?php echo $section_style; ?>">
    <div class="container mx-auto w-full h-full flex justify-center items-center">
        <div class="text-center w-[80%]">
            <?php if( have_rows('content') ): ?>
                <?php while( have_rows('content') ): the_row(); 
            
                $heroHeadlineIntro = get_sub_field('headline_intro');
                $heroHeadlineIntroColor = esc_attr($tertiary_text_color);
                $heroHeading = get_sub_field('heading');
                $heroHeadingTextColor = esc_attr($primary_text_color);
                $heroSubHeading = get_sub_field('subheading');
                $heroSubHeadingTextColor = esc_attr($primary_text_color);
                // Get the current layout
                $layout = get_row_layout();
                ?>

                <?php if( $layout == 'headline_intro'): ?>
                    <span class="text-lg font-light font-giga uppercase" style="color:<?php echo $heroHeadlineIntroColor; ?>"><?php echo $heroHeadlineIntro; ?></span>
                <?php elseif( $layout == 'heading' ): ?>
                    <h1 class="homepageHero_heading font-bold font-giga uppercase mt-5 mb-8" style="color:<?php echo $heroHeadingTextColor; ?>"><?php echo $heroHeading; ?></h1>
                <?php elseif( $layout == 'subheading' ): ?>
                    <div class="flex justify-center">
                        <h3 class="font-space font-medium text-3xl w-[50%] leading-snug" style="color:<?php echo $heroSubHeadingTextColor; ?>"><?php echo $heroSubHeading; ?></h3>
                    </div>
                <?php elseif( $layout == 'button' ): ?>
                    <div class="w-full flex justify-center items-center">
                        <?php if( have_rows('button') ): ?>
                            <?php while( have_rows('button') ): the_row(); 
                            
                            $buttonName = get_sub_field('button_name');
                            $buttonLink = get_sub_field('button_link');
                            $buttonColor = esc_attr($primary_color);
                            $buttonTextColor = esc_attr($secondary_text_color);
                            ?>

                            <a class="font-giga text-md font-bold uppercase tracking-tighter px-12 py-5 mt-10" style="background-color: <?php echo $buttonColor; ?>; color: <?php echo $buttonTextColor; ?>;"
                            href="<?php echo esc_url($buttonLink); ?>"><?php echo $buttonName; ?></a>

                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" class="divider-triangle-shape" viewBox="0 0 1080 100" preserveAspectRatio="none">
        <path d="M 0 55 L 0 100 L 540 74 Z" fill="<?php echo $primary_color; ?>"></path>
        <path d="M 0,100 540,75 1080,100 Z" fill="<?php echo $secondary_color; ?>"></path>
    </svg>
 </section>
