<div class="slide slide-2">
<?php
    wp_reset_postdata();
    $about_page = array(
      'page_id' => pll_get_post(2)
    );
    $query_for_page = new WP_Query( $about_page );
    if ( $query_for_page -> have_posts() ) {
      $query_for_page -> the_post();
      the_content();
      the_title('<h2>', '</h2>');
      echo "<div class='items'>";
      wp_reset_postdata();


    $args = array( 
      'post_type' => 'about_company',
      'posts_per_page' => 4,
      'orderby' =>  'date',
      'order' =>  'ASC'
    );
    $query = new WP_Query( $args );
      while ( $query->have_posts() ) {
        $query->the_post(); ?>    
      <div class="item">
        <div class="img-wrap">
          <?php if(get_field('post_image')) : ?>
            <object data="<?php echo(get_field('post_image')) ?>" type="image/svg+xml"></object>
          <?php ; endif; ?>
        </div>
        <?php the_title( '<p>', '</p>' ); ?>
      </div> 
      <?php }
      wp_reset_postdata();
      echo "</div>";
      ?>

        <div class="bordered">
          <?php if(ICL_LANGUAGE_CODE=='ru'): 
            echo(get_option( 'theme_contacttext_ru', false ));
           else : 
            echo(get_option( 'theme_contacttext_other', false ));
            endif; ?>
        </div>

      <?
} else {
  get_template_part( 'content', 'none' );
} ?>
</div>
