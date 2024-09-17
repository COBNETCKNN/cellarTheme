<?php
/**
 * Flexible content template for Program Offerings section.
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

<!-- Program Offerings -->
<section id="programs" class="py-32" style="<?php echo $section_style; ?>">
    <div class="container mx-auto">
        <!-- Content -->
        <div class="my-auto">
            <?php if( have_rows('content') ): ?>
                <div class="nested-flexible-content">
                    <?php while( have_rows('content') ): the_row(); 

                        $programsHeading = get_sub_field('heading');
                        $programsHeadingColor = get_sub_field('heading_color');
                        $programsSubheading = get_sub_field('subheading');
                        $programsSubheadingColor = get_sub_field('subheading_color');
                        // Get the current layout
                        $layout = get_row_layout();
                        ?>
                        
                        <?php if( $layout == 'heading' ): ?>
                            <h1 class="heading_greenUnderline font-giga text-5xl font-bold leading-tight text-center uppercase mb-8" style="color:<?php echo $programsHeadingColor ?>"><?php echo $programsHeading; ?></h1>
                        <?php elseif( $layout == 'subheading' ): ?>
                            <p class="font-space text-xl text-center mb-14" style="color:<?php echo $programsSubheadingColor; ?>"><?php echo $programsSubheading; ?></p>
                        <?php elseif( $layout == 'button' ): ?>
                            <div class="w-full flex justify-center items-center">
                                <?php if( have_rows('button') ): ?>
                                    <?php while( have_rows('button') ): the_row(); 
                                    
                                    $buttonName = get_sub_field('button_name');
                                    $buttonLink = get_sub_field('button_link');
                                    $buttonColor = get_sub_field('button_color');
                                    $buttonTextColor = get_sub_field('button_text_color');
                                    ?>

                                    <a class="font-giga text-md font-bold uppercase tracking-tighter px-12 py-5 border border-black" style="background-color: <?php echo $buttonColor; ?>; color: <?php echo $buttonTextColor; ?>;"><?php echo $buttonName; ?></a>

                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- Cards -->
        <?php
        $programsArgs = array(
            'post_type' => 'programs',  
            'posts_per_page' => -1,  
            'orderby' => 'date',       
            'order' => 'DESC',        
        );

        $programsQuery = new WP_Query($programsArgs); 

        $totalPosts = $programsQuery->post_count;
        $maxColumns = 5; 
        $gridColumns = $totalPosts < $maxColumns ? $totalPosts : $maxColumns;
        ?>

        <div class="grid gap-6 mt-20" style="grid-template-columns: repeat(<?php echo $gridColumns; ?>, 1fr);">
            <?php
            if ($programsQuery->have_posts()) :
                while ($programsQuery->have_posts()) : $programsQuery->the_post(); 
                
                $partnersFeaturedImageUrl = get_the_post_thumbnail_url(get_the_ID(), 'program-card'); 
                ?>
                <div class="programsCard relative z-10" style="background-image: url('<?php echo esc_url($partnersFeaturedImageUrl); ?>');">
                    <div class="programsCard_content__wrapper h-[50%] w-full px-10">
                        <div class="w-full h-full flex justify-center items-center">
                            <div class="">
                                <h3 class="text-lime font-giga font-bold text-2xl text-start mb-5 uppercase"><?php the_title(); ?></h3>
                                <div class="text-white font-space text-xl text-start">
                                    <?php echo wp_trim_words(get_the_content(), 30); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Hovering content -->
                    <div class="programsCard_hoverContent__wrapper h-full w-full z-20 absolute top-0 right-0 flex justify-center items-center">
                        <div class="px-10">
                            <h3 class="text-black font-giga text-2xl text-start mb-5 uppercase font-bold"><?php the_title(); ?></h3>
                            <div class="text-black font-space text-xl text-start mb-10">
                                <?php echo wp_trim_words(get_the_content(), 30); ?>
                            </div>
                            <a class="bg-lime text-black font-giga text-sm font-semibold uppercase tracking-tighter px-7 py-3 border border-black" href="<?php echo esc_url(get_permalink()); ?>">Learn More</a>
                        </div>
                    </div>
                </div>
                <?php
                endwhile;
            else :
                // No programs found
                echo 'No programs found';
            endif; 
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>