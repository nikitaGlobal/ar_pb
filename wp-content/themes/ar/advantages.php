<div class="slide slide-4">
    <?php
      wp_reset_postdata();
      $args = array( 
        'page_id'   => pll_get_post(11)
      );
      $query = new WP_Query( $args );
      if ( $query -> have_posts() ) {
        $query->the_post();
        the_content();  
      } else { 

        get_template_part( 'template-parts/content', 'none' );

      } wp_reset_postdata(); ?>
</div>
