<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ar_led
 */

get_header();
?>

<div class="ngl-slider-wrap">
  <div class="slide slide-1">

    <?php
    if ( have_posts() ) :
        ?>
          <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
        <?php

      /* Start the Loop */
      while ( have_posts() ) :
        the_post();

        /*
         * Include the Post-Type-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
         */
        get_template_part( 'template-parts/content', 'page' );

      endwhile;
    else :

      get_template_part( 'template-parts/content', 'none' );

    endif;
    ?>

  </div>
</div>

<?php
get_footer();
