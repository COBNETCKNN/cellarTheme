<?php get_header(); ?>

<?php 
/**
 * Flexible content fields
 */
?>

<?php
  if( have_rows('home_flexible_content') ):
      while ( have_rows('home_flexible_content') ) : the_row();
            include 'blocks/homepage/' . get_row_layout() . '.php';
      endwhile;
  endif; 
?>

<?php get_footer(); ?>
