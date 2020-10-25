<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ar_led
 */

get_header();
?>

<div class="ngl-slider-wrap">
  <div class="slide slide-1">

		<?php if ( have_posts() ) : ?>

			<div class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'ar' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</div><!-- .page-header -->
			<div class="items">
				
			
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;
			echo "</div>";
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

  </div>
</div>

<?php get_footer() ?>
