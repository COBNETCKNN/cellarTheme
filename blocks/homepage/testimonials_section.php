<?php
/**
 * Flexible content template for Testimonial Section.
 */
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
            $section_style = "background-color: " . esc_attr($secondary_color) . ";";
        }

    endwhile; ?>
<?php endif; ?>

<!-- Testimonials Section -->
<section id="testimonials" class="py-32" style="<?php echo $section_style; ?>">
    <div class="container mx-auto">
        <div class="grid grid-cols-2 gap-4">
            <!-- Content -->
                <div class="my-auto">
                <?php if( have_rows('content') ): ?>
                    <?php while( have_rows('content') ): the_row(); 
                    
                        $testimonialsHeading = get_sub_field('heading');
                        $testimonialHeadingColor = esc_attr($primary_text_color);
                        $testimonialsDescription = get_sub_field('description'); 
                        $testimonialDescritpionColor = esc_attr($primary_text_color);
                        $layout = get_row_layout();
                        ?>

                        <?php if( $layout == 'heading' ): ?>
                            <h1 class="headingGreen_underline__start font-giga text-4.5xl font-bold leading-tight text-start uppercase mb-8" style="color:<?php echo $testimonialHeadingColor; ?>"><?php echo $testimonialsHeading; ?></h1>
                        <?php elseif( $layout == 'description' ): ?>
                            <p class="font-space text-1xl text-start mb-8" style="color:<?php echo $testimonialDescritpionColor; ?>"><?php echo $testimonialsDescription; ?></p>
                        <?php elseif( $layout == 'button' ): ?>
                            <div class="w-full flex justify-start items-center">
                                <?php if( have_rows('button') ): ?>
                                    <?php while( have_rows('button') ): the_row(); 
                                    
                                    $buttonName = get_sub_field('button_name');
                                    $buttonLink = get_sub_field('button_link');
                                    $buttonColor = esc_attr($primary_color);
                                    $buttonTextColor = esc_attr($secondary_text_color);
                                    ?>

                                    <a class="font-giga text-md font-bold uppercase tracking-tighter px-12 py-5 border border-black" style="background-color: <?php echo $buttonColor; ?>; color: <?php echo $buttonTextColor; ?>;"><?php echo $buttonName; ?></a>

                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                </div>
            <!-- Slider -->
            <div class="testimonial_slideCard bg-grey px-14 pt-14 my-auto">
                <div class="owl-carousel owl-theme">
                    <?php if( have_rows('testimonials_repeater') ): ?>
                        <?php while( have_rows('testimonials_repeater') ): the_row(); 
                        
                        $reviewerImage = get_sub_field('testimonials_image');
                        $reviewerImageSize = 'testimonial-avatar';
                        $reviewerName = get_sub_field('testimonial_name');
                        $reviewerReview = get_sub_field('testimonial_testimonial');
                        ?>

                        <div class="item">
                            <p class="font-space text-2xl text-black font-medium"><?php echo $reviewerReview; ?></p>
                            <div class="reviewerImage flex justify-start items-center mt-10">
                                <?php 
                                if( $reviewerImage ) {
                                    echo wp_get_attachment_image( $reviewerImage, $reviewerImageSize );
                                }
                                ?>
                                <h4 class="font-giga text-lg text-black font-bold uppercase ml-3"><?php echo $reviewerName; ?></h4>
                            </div>
                        </div>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="progress-bar">
                    <div class="progress-bar-inner"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .progress-bar-inner {
        width: 0;
        height: 100%;
        background-color: <?php echo esc_attr($primary_color); ?>;
        transition: width 0ms;
    }
</style>