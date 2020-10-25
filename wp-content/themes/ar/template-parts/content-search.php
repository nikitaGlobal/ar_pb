<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ar_led
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class('item'); ?>>
  <div class="img-wrap">
    <?php if(get_field('post_image')) : ?>
      <object data="<?php echo(get_field('post_image')) ?>" type="image/svg+xml"></object>
    <?php ; endif; ?>
  </div>
  <?php the_title( '<p>', '</p>' ); ?>
  <footer class="entry-footer">
		<?php ar_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</div> 
