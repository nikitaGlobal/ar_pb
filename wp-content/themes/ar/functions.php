<?php
/**
 * ar_led functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ar_led
 */
 if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'ar_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ar_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ar_led, use a find and replace
		 * to change 'ar' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ar', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag fin the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'menus' );
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'ar' ),
				'controls' => esc_html__( 'Slider controls', 'ar' ),
				'switcher' => esc_html__( 'Language switcher', 'ar' ),
			)
		);


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'ar_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'ar_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ar_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ar_content_width', 640 );
}
add_action( 'after_setup_theme', 'ar_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function register_my_widgets(){
	register_sidebar( array(
		'name' => 'Задний фон',
		'id' => 'homepage-sidebar',
		'description' => 'Выводится как видеофон сайта.',
		'before_widget' => '<section class="homepage-widget-block">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => 'Задний фон',
		'id' => 'homepage-sidebar-stat',
		'description' => 'Выводится как простой фон сайта.',
		'before_widget' => '<section class="homepage-widget-block-stat">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'register_my_widgets' );

/**
 * Enqueue scripts and styles.
 */
function ar_scripts() {
	wp_enqueue_style( 'ar-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'common_css', get_template_directory_uri() . '/css/common.css', array(), _S_VERSION );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.min.js');
	wp_enqueue_media();
	wp_localize_script( 'scripts', 'myajax', 
		array(
			'ajax_url' => admin_url('admin-ajax.php')
		)
	); 
}
add_action( 'wp_enqueue_scripts', 'ar_scripts' );


// Ajax action to refresh the user image
add_action( 'wp_ajax_myprefix_get_image', 'myprefix_get_image'   );
function myprefix_get_image() {
    if(isset($_GET['id']) ){
        $image = wp_get_attachment_image( filter_input( INPUT_GET, 'id', FILTER_VALIDATE_INT ), 'medium', false, array( 'id' => 'myprefix-preview-image' ) );
        $data = array(
            'image'    => $image,
        );
        wp_send_json_success( $data );
    } else {
        wp_send_json_error();
    }
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	else
		$dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext'] = $type_and_ext['type'] = false;
		}

	}

	return $data;
}

add_filter( 'wp_prepare_attachment_for_js', 'show_svg_in_media_library' );

# Формирует данные для отображения SVG как изображения в медиабиблиотеке.
function show_svg_in_media_library( $response ) {
	if ( $response['mime'] === 'image/svg+xml' ) {
		// С выводом названия файла
		$response['image'] = [
			'src' => $response['url'],
		];
	}

	return $response;
}

// Добавляем классы ссылкам
add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4 );
function filter_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
	if ( $args->theme_location === 'menu-1' ) {
		$atts['class'] = 'menu-link';
		if ( $item->current ) {
			$atts['class'] .= ' active';
		}
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes_c', 10, 4 );
function filter_nav_menu_link_attributes_c( $atts, $item, $args, $depth ) {
	if ( $args->theme_location === 'controls' ) {
		$atts['class'] = 'menu-link';
		if ( $item->current ) {
			$atts['class'] .= ' active';
		}
	}
	return $atts;
}

add_action( 'init', 'about_post_type' ); 
function about_post_type() {
	$labels = array(
		'name' => 'About us',
		'singular_name' => 'About us', // админ панель Добавить->Функцию
		'add_new' => 'Add information about us',
		'add_new_item' => 'About us', // заголовок тега <title>
		'edit_item' => 'Edit about us',
		'new_item' => 'New',
		'all_items' => 'All',
		'view_item' => 'view',
		'search_items' => 'Search about us',
		'not_found' =>  'About us not found.',
		'not_found_in_trash' => 'In trash not found about us',
		'menu_name' => 'About us' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon' => 'dashicons-editor-quote',
		'menu_position' => 3,
		'has_archive' => true,
		'show_in_rest' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments'),
		'taxonomies' => array('post_tag')
	);
	register_post_type('product',$args);
}

add_action( 'init', 'about_company_post_type' ); 
function about_company_post_type() {
	$labels = array(
		'name' => 'About company',
		'singular_name' => 'About company', // админ панель Добавить->Функцию
		'add_new' => 'Add information about company',
		'add_new_item' => 'About company', // заголовок тега <title>
		'edit_item' => 'Edit about company',
		'new_item' => 'New',
		'all_items' => 'All',
		'view_item' => 'view',
		'search_items' => 'Search about company',
		'not_found' =>  'About company not found.',
		'not_found_in_trash' => 'In trash not found about company',
		'menu_name' => 'About company' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon' => 'dashicons-superhero',
		'menu_position' => 4,
		'has_archive' => true,
		'show_in_rest' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments'),
		'taxonomies' => array('post_tag')
	);
	register_post_type('about_company',$args);
}

add_action( 'init', 'tooling_post_type' ); 
function tooling_post_type() {
	$labels = array(
		'name' => 'Tooling',
		'singular_name' => 'Tooling', // админ панель Добавить->Функцию
		'add_new' => 'Add information about tooling',
		'add_new_item' => 'Add new tooling', // заголовок тега <title>
		'edit_item' => 'Edit tooling',
		'new_item' => 'New',
		'all_items' => 'All',
		'view_item' => 'view',
		'search_items' => 'Search tooling',
		'not_found' =>  'Tooling not found.',
		'not_found_in_trash' => 'In trash not found tooling',
		'menu_name' => 'Tooling' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon' => 'dashicons-hammer',
		'menu_position' => 4,
		'has_archive' => true,
		'show_in_rest' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments'),
		'taxonomies' => array('post_tag')
	);
	register_post_type('tooling',$args);
}

add_action( 'init', 'ecology_post_type' ); 
function ecology_post_type() {
	$labels = array(
		'name' => 'Ecology post',
		'singular_name' => 'Ecology post', // админ панель Добавить->Функцию
		'add_new' => 'Add ecology post',
		'add_new_item' => 'Add new ecology post', // заголовок тега <title>
		'edit_item' => 'Edit ecology post',
		'new_item' => 'New',
		'all_items' => 'All',
		'view_item' => 'view',
		'search_items' => 'Search ecology post',
		'not_found' =>  'Ecology post not found.',
		'not_found_in_trash' => 'In trash not found Ecology post',
		'menu_name' => 'Ecology posts' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon' => 'dashicons-buddicons-replies',
		'menu_position' => 4,
		'has_archive' => true,
		'show_in_rest' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments'),
		'taxonomies' => array('')
	);
	register_post_type('ecology_post',$args);
}

add_action('wp_footer', 'my_action_javascript', 99); // для фронта
function my_action_javascript() {
	?>
	<script type="text/javascript" >
	function get_slide(data_for_slide) {
		 $.ajax({
			 	method: 'POST',
			 	url: myajax.ajax_url,
			 	data: data_for_slide,
			 	beforeSend: function(xhr) {
			 		$('.ngl-slider-wrap').html('<div class="preloader"><div class="ico"></div></div>')
			 	},
			 	success: function(response) {
			 		$('.ngl-slider-wrap').html(response)
			 	}
			 })
	}
	// $('.nav-collapser li a, [data-slide-index]').on('click', function() {
 //    e.preventDefault();

 //    var index = $(this).attr('data-slide-index');
 //    $slider.slick('slickGoTo', index);

	//   var data = {
	//   	action: 'my_action',
	//   	strr: newvalue
	//   };

	//   get_slide(data);

	// })


	</script>
	<?php
}
function my_action_callback() {

	if ($_POST['slide_index'] == 0 ) { 
		echo ('
		  <div class="logo-wrap">
		    <img src=' . get_template_directory_uri() . '/img/logo.svg" alt=""/>
		  </div>
		');
		if (ICL_LANGUAGE_CODE=='ru') { 
		  echo '<h2>ООО "ЛэдИнвест"</h2>'; 
		} else { 
		  echo '<h2>"LLC" LED INVEST</h2>'; 
		}
	} 

	$items_wrapper = '<div class="items">';
	$slide_index = $_POST['slide_index'];
	$slides = $_POST['slides'];



	$base = [''];
	if ($slide_index !== 'all') {
	  $args = array( 
	    'post_type' => 'project',
	    'posts_per_page' => 6,
	    'tax_query' =>  array(
	      'relation'  =>  'OR',
	      array(
	        'taxonomy'  =>  'taxonomy',
	        'field'     =>  'slug',
	        'terms'     =>  $whatever
	      )
	    )
	  );
	} else {
		$args = array( 
		  'post_type' => 'project',
		  'posts_per_page' => 6,
		);
	}
  $query = new WP_Query( $args );
  while ( $query->have_posts() ) {
    $query->the_post();
    ?>
  	
    <article class="col-md-6">
      <div class="card">
        <div class="card-header">
        <?php if( get_field('preview') ): ?>
            <img src="<?php the_field('preview'); ?>" />
          <?php endif; ?>
        </div>
        <div class="card-body">
           <a href="<?php the_permalink(); ?>"?><?php the_title('<h4>', '</h4>'); ?></a>
          <?php 
            the_excerpt(); ?>
        </div>
            <?php the_excerpt(); ?>
      </div>
    </article> 
  <?php }
  wp_reset_postdata();
	wp_die();
}
add_action('wp_ajax_my_action', 'my_action_callback');
add_action('wp_ajax_nopriv_my_action', 'my_action_callback');

function my_page_template_redirect(){
	if( is_page() && !(is_privacy_policy()) ){
		wp_redirect( home_url( '/' ) );
		exit();
	}
}
add_action( 'template_redirect', 'my_page_template_redirect' );

add_action( 'after_setup_theme', 'theme_functions' );
function theme_functions() {

    add_theme_support( 'title-tag' );

}

add_filter( 'wp_title', 'custom_titles', 10, 2 );
function custom_titles( $title, $sep ) {

    //Check if custom titles are enabled from your option framework
    if ( ot_get_option( 'enable_custom_titles' ) === 'on' ) {
        //Some silly example
        $title = "Some other title" . $title;;
    }

    return $title;
}


/*
Короткий пример для использования Theme_Customization_API 
http://casepress.org/kb/web/nastrojki-temy-wordpress-kak-dobavit-svoi-polya/
*/
/**
 * Добавляет страницу настройки темы в админку Вордпресса
 */
function mytheme_customize_register( $wp_customize ) {
/*
Добавляем секцию в настройки темы
*/
$wp_customize->add_section(
    // ID
    'data_site_section',
    // Arguments array
    array(
        'title' => 'Текст в рамке',
        'capability' => 'edit_theme_options',
        'description' => "Введите текст"
    )
);
/*
Добавляем поле контактных данных
*/
$wp_customize->add_setting(
    // ID
    'theme_contacttext_ru',
    // Arguments array
    array(
        'default' => '',
        'type' => 'option'
    )
);
$wp_customize->add_control(
    // ID
    'theme_contacttext_control',
    // Arguments array
    array(
        'type' => 'text',
        'label' => "Текст на русском",
        'section' => 'data_site_section',
        // This last one must match setting ID from above
        'settings' => 'theme_contacttext_ru'
    )
);

/*
Добавляем поле контактных данных
*/
$wp_customize->add_setting(
    // ID
    'theme_contacttext_other',
    // Arguments array
    array(
        'default' => '',
        'type' => 'option'
    )
);
$wp_customize->add_control(
    // ID
    'theme_contacttext_control_other',
    // Arguments array
    array(
        'type' => 'text',
        'label' => "Текст на иностранном",
        'section' => 'data_site_section',
        // This last one must match setting ID from above
        'settings' => 'theme_contacttext_other'
    )
);
}
add_action( 'customize_register', 'mytheme_customize_register' );
