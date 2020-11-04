<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ar_led
 */

?>
          </div> <!-- / ngl-slider-wrapper -->
        </div> <!-- / ngl-content -->
        <?php 

          if (is_home()) {
            ?>
            <nav class="ngl-controlls navigation pagination fix" role="navigation">
              <div class="nav-links">
                <?php 
                  wp_nav_menu( [
                    'theme_location'  => 'controls',
                    'menu'            => 'Slider controls', 
                    'container'       => false, 
                    'menu_class'      => 'nav-links', 
                    'items_wrap'      => '%3$s',
                    'depth'           => 0,
                    'walker'          => '',
                  ] );
                 ?>
              </div>
            </nav>
            <?php
          }

         ?>
      </div>
    </div>
  	<footer class="main-footer">
  	  <div class="container">
  	    <p>
          <?php if(ICL_LANGUAGE_CODE=='ru'): 
            echo(get_option( 'theme_footer_text_ru', false ));
           else : 
            echo(get_option( 'theme_footer_text_en', false ));
            endif; ?>
        </p>
        <a href="<?php echo(get_page_link(pll_get_post(3))); ?>">
          
          <?php if(ICL_LANGUAGE_CODE=='ru'): ?>
              Политика конфиденциальности и файлы cookie
          <?php else : ?>
              Privacy policy & cookies
          <?php endif; ?>

        </a>
  	  </div>
  	</footer>
</section>

<?php wp_footer(); ?>

<script>
    var vid = document.querySelector('video.wp-video-shortcode');
    vid.autoplay = true;
    vid.load();
    $('video').attr('loop', 'loop')
</script>
</body>
</html>
