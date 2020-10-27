<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo(get_template_directory_uri()) ?>/img/favicon/apple-touch-icon.png"/>
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo(get_template_directory_uri()) ?>/img/favicon/favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo(get_template_directory_uri()) ?>/img/favicon/favicon-16x16.png"/>
  <link rel="manifest" href="<?php echo(get_template_directory_uri()) ?>/img/favicon/site.webmanifest"/>
  <link rel="mask-icon" href="<?php echo(get_template_directory_uri()) ?>/img/favicon/safari-pinned-tab.svg" color="#b02786"/>
  <link rel="shortcut icon" href="<?php echo(get_template_directory_uri()) ?>/img/favicon/favicon.ico"/>
  <meta name="msapplication-TileColor" content="#b02786"/>
  <meta name="msapplication-config" content="<?php echo(get_template_directory_uri()) ?>/img/favicon/browserconfig.xml"/>
  <meta name="theme-color" content="#b02786"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<style>
  .hidden{
    height: 0;
    display: none !important;
  }
</style>
<section class="ngl-home">
<?php 
  if ( is_active_sidebar( 'homepage-sidebar' ) ) {
    dynamic_sidebar( 'homepage-sidebar' );
  } else {
    ?> 
    <div class="background__layer"></div>
    <?
  }
?>

	<div class="ngl-page">
	  <div class="container">
      <div class="fix">
        <?php 
         wp_nav_menu( [
           'theme_location'  => 'switcher',
           'menu'            => 'switcher', 
           'container'       => false, 
           'menu_class'      => 'languages', 
           'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
           'walker'          => '',
         ] );
        ?>
      </div>
	    <div class="ngl-content">
				<div class="ngl-aside">
				  <header class="main-header">
				  	<a data-slide-index="0" class="logo-wrap" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				      <div class="img-wrap"><img src="<?php echo(get_template_directory_uri()) ?>/img/logo.svg" alt=""/></div>
				      <div class="text-wrap">
				        <div class="title"><?php bloginfo( 'name' ); ?></div>
				        <div class="subtitle"><?php bloginfo( 'description' ); ?></div>
				      </div>
				    </a>
            <div class="d-sm-visible">
              <?php 
               wp_nav_menu( [
                 'theme_location'  => 'switcher',
                 'menu'            => 'switcher', 
                 'container'       => false, 
                 'menu_class'      => 'languages', 
                 'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                 'walker'          => '',
               ] );
              ?>
            </div>
				    <nav class="nav-collapser">
              
              <?php 
                wp_nav_menu( [
                  'theme_location'  => 'menu-1',
                  'menu'            => 'primary', 
                  'container'       => false, 
                  'menu_class'      => '', 
                  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                  'walker'          => '',
                ] );
               ?>
               <button>
                 <span></span>
                 <span></span>
                 <span></span>
               </button>
				    </nav>
				  </header>
				</div> <!-- marker #1 | / ngl-aside -->

        <div class="ngl-slider-wrapper hidden">
        	<?php if (is_home()) : 
            $next = get_next_post(true, '', 'page');
          ?>
            <a class="fix next" href="#"><img src="<?php echo(get_template_directory_uri()) ?>/img/next-btn.svg" alt=""></a>
          <?php endif; ?>
