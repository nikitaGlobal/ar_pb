<div class="slide slide-3">
<?php
    wp_reset_postdata();
    $about_page = array(
      'page_id' => pll_get_post(9)
    );
    $query_for_page = new WP_Query( $about_page );
    if ( $query_for_page -> have_posts() ) {
      $query_for_page -> the_post();
      the_content();
      the_title('<h2>', '</h2>');
      wp_reset_postdata();


      $args = array( 
        'post_type' => 'tooling',
        'posts_per_page' => 5,
        'orderby' =>  'date',
        'order' =>  'ASC'
      );
      $query = new WP_Query( $args );

      if ( $query->have_posts() ) { 
        ?> 

        <div class="items">  

          <?php
        $counter = 0;
        while ( $query->have_posts() ) {
          $query->the_post(); 
          $counter++; 
          ?>   

        <div class="item">
          <div class="round">
            <?php the_title( '<p>', '</p>' ); ?>
            <div class="n"><?php echo($counter); ?></div>
          </div>
        </div>
      <?php } echo "</div>"; } else { ?>

      <h2>Ops, nothing not found</h2>

      <?php } wp_reset_postdata(); } else { get_template_part( 'content', 'none' ); } ?>

</div>
