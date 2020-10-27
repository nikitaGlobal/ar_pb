<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ar_led
 */

get_header();
?>

<div class="ngl-slider-wrap">
  <div class="slide slide-1">

		<section class="error-404 not-found">
			<div class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ar' ); ?></h1>
			</div><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'ar' ); ?></p>

					<?php
					get_search_form()
					?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</div>
</div>

<?php
get_footer();
