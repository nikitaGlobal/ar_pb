<?php get_header() ?>



<div class="ngl-slider-wrap">
  <div class="slide slide-1">
    <div class="d-lg-visible">
    <?php 
      echo ('
        <div class="logo-wrap">
          <img src="' . get_template_directory_uri() . '/img/logo.svg" alt=""/>
        </div>
      ');
      echo "<h2>";
      if (ICL_LANGUAGE_CODE=='ru') { 
        echo get_option( 'theme_logotype_text', false );
      } else { 
        echo get_option( 'theme_logotype_text_en', false );
      } 
    ?>
      </h2>
    </div>

    <div class="items">
      <?php

        $args = array( 
          'post_type' => 'product',
          'posts_per_page' => 3,
          'orderby' =>  'date',
          'order' =>  'ASC'
        );
        $query = new WP_Query( $args );
        while ( $query->have_posts() ) {
          $query->the_post();

          ?>
      
        <div class="item">
          <div class="img-wrap">
            <?php if(get_field('post_image')) : ?>
              <object data="<?php echo get_field('post_image'); ?>" type="image/svg+xml"></object>
            <?php ; endif; ?>
          </div>
          <?php the_title( '<p>', '</p>' ); ?>
        </div> 
        <?php }
        wp_reset_postdata();

      ?>
    </div>
  </div>

  <?php get_template_part( 'about' ); ?>
  <?php get_template_part( 'tooling' ); ?>
  <?php get_template_part( 'advantages' ); ?>
  <?php get_template_part( 'ecology' ); ?>
  <?php get_template_part( 'contact' ); ?>


</div>

<?php get_footer() ?>
