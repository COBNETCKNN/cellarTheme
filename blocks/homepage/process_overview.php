<?php
/**
 * Flexible content template for Process Overview section.
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

<!-- Processes Section -->
<section id="processes" class="py-24" style="<?php echo $section_style; ?>">
    <div class="container mx-auto">
        <!-- Progress Content -->
        <?php if( have_rows('processes_content') ): ?>
            <div class="nested-flexible-content">
                <?php while( have_rows('processes_content') ): the_row(); 

                    $processOverviewHeading = get_sub_field('heading');
                    $processOverviewHeadingColor = get_sub_field('heading_color');
                    $processOverviewSubheading = get_sub_field('subheading');
                    $processOverviewSubheadingColor = get_sub_field('subheading_color');
                    // Get the current layout
                    $layout = get_row_layout();
                    ?>
                    
                    <?php if( $layout == 'heading' ): ?>
                        <h1 class="heading_greenUnderline font-giga font-bold text-5xl uppercase text-center mb-14" style="color:<?php echo $processOverviewHeadingColor; ?>"><?php echo $processOverviewHeading; ?></h1>
                    <?php elseif( $layout == 'subheading' ): ?>
                        <p class="font-space text-1xl text-center mb-14" style="color:<?php echo $processOverviewSubheadingColor ?>"><?php echo $processOverviewSubheading; ?></p>
                    <?php elseif( $layout == 'button' ): ?>
                        <div class="w-full flex justify-center items-center">
                            <?php if( have_rows('button') ): ?>
                                <?php while( have_rows('button') ): the_row(); 
                                
                                $buttonName = get_sub_field('button_name');
                                $buttonLink = get_sub_field('button_link');
                                $buttonColor = get_sub_field('button_color');
                                $buttonTextColor = get_sub_field('button_text_color');
                                ?>

                                <a class="font-giga text-md font-bold uppercase tracking-tighter px-12 py-5 border border-black" style="background-color: <?php echo $buttonColor; ?>; color: <?php echo $buttonTextColor; ?>;"
                                " href="<?php echo esc_url($buttonLink); ?>"><?php echo $buttonName; ?></a>

                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <!-- Cards Repeater -->
        <?php
        $cards_count = count(get_sub_field('process_card'));
        $columns = $cards_count > 0 ? min($cards_count, 4) : 3;
        $counter = 1;
        $grid_style = "grid-template-columns: repeat($columns, 1fr);";
        ?>

        <!-- Cards Repeater -->
        <div class="grid gap-14 my-24 mx-24 process-overview-wrapper" style="<?php echo $grid_style; ?>">
            <?php if( have_rows('process_card') ): ?>
                <?php while( have_rows('process_card') ): the_row(); 

                $processOverviewCardsHeading = get_sub_field('name');
                $processOverviewCardsDescrirption = get_sub_field('description');
                $formatted_number = sprintf('%02d', $counter);
                ?>

                <div class="processCard_wrapper bg-charcoal px-10 py-10">
                    <span class="processOverview_cards__counter text-zinc-600 font-giga text-black font-black leading-none opacity-40"><?php echo $formatted_number; ?></span>
                    <h5 class="font-bold font-giga text-lime text-2.5xl uppercase text-start mt-14"><?php echo $processOverviewCardsHeading; ?></h5>
                    <p class="font-medium font-space text-white text-xl text-start pt-5"><?php echo $processOverviewCardsDescrirption; ?></p>
                </div>

                <?php $counter++; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <!-- Progress Bar -->
        <div class="h-auto w-full flex justify-center">
            <div class="progress-bar-top">
                <div class="progress-bar-inner-top"></div>
            </div>
        </div>
    </div>
</section>