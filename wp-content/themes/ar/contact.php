  <div class="slide slide-6">
    <?php 
      $contacts = array(
        'page_id' => pll_get_post(15)
      );
      $query_for_contacts = new WP_Query( $contacts );
      if ( $query_for_contacts -> have_posts() ) {
        $query_for_contacts -> the_post();
        the_title( '<h2>', '</h2>');
        the_content();

      } else {
        get_template_part( 'template-parts/', 'none' );
      }
      wp_reset_postdata();
    ?>
  </div>
