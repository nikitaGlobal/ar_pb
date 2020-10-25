 <div class="slide slide-5">
  <?php 
    wp_reset_postdata();
    $ecology_page = array(
      'page_id' => pll_get_post(13)
    );
    $query_for_page = new WP_Query( $ecology_page );
    if ( $query_for_page -> have_posts() ) {
      $query_for_page -> the_post();
      the_content();

      wp_reset_postdata();

      echo "<div class='items'>";

      $post_args = array(
        'post_type' => 'ecology_post',
        'posts_per_page' => 3,
        'orderby' =>  'date',
        'order' =>  'ASC'
      );
      $eco_post = new WP_Query( $post_args );
      while ( $eco_post -> have_posts() ) {
        $eco_post -> the_post(); ?>

      <div class="item">
        <div class="img-wrap">
          <?php if(get_field('post_image')) : ?>
            <object data="<?php echo(get_field('post_image')) ?>" type="image/svg+xml"></object>
          <?php ; endif; ?>
        </div>
        <div class="title">
          <?php echo(the_title()); ?>
        </div>
        <?php the_content(); ?>
      </div>

      <?php } //  / while condition
      echo "</div>";
    } else {
      get_template_part( 'template-parts/content', 'none' );
    }

    wp_reset_postdata();

   ?>
</div>
