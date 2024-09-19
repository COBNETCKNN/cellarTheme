<?php
/**
 * Flexible content template for Intro Section.
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
            $section_style = "background-color: " . esc_attr($tertiary_color) . ";";
        }

    endwhile; ?>
<?php endif; ?>

<!-- Intro Section -->
<section id="intro" class="py-24" style="<?php echo $section_style; ?>">
    <div class="container mx-auto">
        <div class="grid grid-cols-2 gap-4 mx-10">
            <?php
            $introFeaturedImage = get_sub_field('intro_section_featured_image');
            $introFeaturedImageSize = 'intro-featured';
            ?>
            <!-- Featured Image -->
            <div class="introFeaturedImage">
                <?php 
                    if( $introFeaturedImage ) {
                        echo wp_get_attachment_image( $introFeaturedImage, $introFeaturedImageSize );
                    }
                ?>
            </div>
            <!-- Content -->
            <div class="my-auto">
                <?php if( have_rows('intro_section_content') ): ?>
                    <div class="nested-flexible-content">
                        <?php while( have_rows('intro_section_content') ): the_row(); 

                            $introContentHeading = get_sub_field('heading');
                            $introContentHeadingColor = esc_attr($primary_text_color);
                            $introContentDescription = get_sub_field('description');
                            $introContentDescriptionColor = esc_attr($primary_text_color);
                            // Get the current layout
                            $layout = get_row_layout();
                            ?>
                            
                            <?php if( $layout == 'heading' ): ?>
                                <h1 class="headingGreen_underline__start font-giga text-4.5xl font-bold leading-tight text-start uppercase mb-8" style="color:<?php echo $introContentHeadingColor; ?>"><?php echo $introContentHeading; ?></h1>
                            <?php elseif( $layout == 'description' ): ?>
                                <p class="font-space text-xl text-start mb-14" style="color:<?php echo $introContentDescriptionColor; ?>"><?php echo $introContentDescription; ?></p>
                            <?php elseif( $layout == 'button' ): ?>
                                <div class="w-full flex justify-start items-center">
                                    <?php if( have_rows('button') ): ?>
                                        <?php while( have_rows('button') ): the_row(); 
                                        
                                        $buttonName = get_sub_field('button_name');
                                        $buttonLink = get_sub_field('button_link');
                                        $buttonColor = esc_attr($primary_color);
                                        $buttonTextColor = esc_attr($secondary_text_color);
                                        ?>

                                        <a class="font-giga text-md font-bold uppercase tracking-tighter px-12 py-5 border border-black" style="background-color: <?php echo $buttonColor; ?>; color: <?php echo $buttonTextColor; ?>;"
                                        href="<?php echo esc_url($buttonLink); ?>"><?php echo $buttonName; ?></a>

                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
 </section>

 <style>
    .headingGreen_underline__start::after {
        content: "";
        display: block;
        width: 70px; 
        height: 2px;
        background-color: <?php echo esc_attr($primary_color); ?>;
        margin: 25px 0 0;
        position: relative;
    }
 </style>