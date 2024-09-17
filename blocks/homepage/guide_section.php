<?php
/**
 * Flexible content template for Guide Section.
 */
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
        } elseif ($background_color) {
            // Set the background color if no image
            $section_style = "background-color: $background_color;";
        } else {
            // Fallback background style
            $section_style = "background-color: black;";
        }

    endwhile; ?>
<?php endif; ?>

<!-- Guide Section -->
<section id="guide" style="<?php echo $section_style; ?>">
    <div class="container mx-auto">
        <div class="grid grid-cols-5">
            <!-- Content -->
            <div class="col-span-2 py-24 my-auto">
                <?php if( have_rows('content') ): ?>
                    <?php while( have_rows('content') ): the_row(); 
                    
                    $guideHeading = get_sub_field('heading');
                    $guideHeadingColor = get_sub_field('heading_color');
                    $guideDescription = get_sub_field('description');
                    $guideDescriptionColor = get_sub_field('description_color');
                    $layout = get_row_layout();
                    ?>

                    <?php if( $layout == 'heading' ): ?>
                        <h1 class="headingBlack_underline__start font-giga text-4.5xl font-bold leading-tight text-start uppercase mb-8" style="color:<?php echo $guideHeadingColor; ?>"><?php echo $guideHeading; ?></h1>
                    <?php elseif( $layout == 'description' ): ?>
                        <p class="font-space text-1xl text-start mb-8" style="color:<?php echo $guideDescriptionColor; ?>"><?php echo $guideDescription; ?></p>
                    <?php elseif( $layout == 'button' ): ?>
                        <div class="w-full flex justify-start items-center">
                            <?php if( have_rows('button') ): ?>
                                <?php while( have_rows('button') ): the_row(); 
                                
                                $buttonName = get_sub_field('button_name');
                                $buttonLink = get_sub_field('button_link');
                                $buttonColor = get_sub_field('button_color');
                                $buttonTextColor = get_sub_field('button_text_color');
                                ?>

                                <a class="font-giga text-md font-bold uppercase tracking-tighter border border-black px-12 py-5" style="background-color: <?php echo $buttonColor; ?>; color: <?php echo $buttonTextColor; ?>;"><?php echo $buttonName; ?></a>

                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <!-- Featured Image -->
            <?php 
            $guideFeaturedImage = get_sub_field('featured_image');
            ?>
            <div class="guideFeaturedImage col-span-3" style="background-image: url('<?php echo esc_url($guideFeaturedImage); ?>');">
            </div>
        </div>
    </div>
 </section>