<?php
/**
 * Ravenna functions and definitions
 *
 * @package Ravenna
 */

if ( ! function_exists( 'ravenna_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ravenna_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Ravenna, use a find and replace
	 * to change 'ravenna' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ravenna', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Content width
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1170;
	}

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('ravenna-large-thumb', 700);
	add_image_size('ravenna-small-thumb', 350,250,true);


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'ravenna' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ravenna_custom_background_args', array(
		'default-color' => 'f5f5f5',
		'default-image' => '',
	) ) );
}
endif; // ravenna_setup
add_action( 'after_setup_theme', 'ravenna_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function ravenna_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ravenna' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	//Register widget areas for the Widgetized page template
	$pages = get_pages(array(
		'meta_key' => '_wp_page_template',
		'meta_value' => 'page-templates/page_widgetized.php',
	));
	foreach($pages as $page){
		register_sidebar( array(
			'name'          => __( 'Page ', 'ravenna' ) . $page->post_title,
			'id'            => 'widget-area-' . $page->post_id,
			'description'   => __( 'Use this widget area to build content for the page: ', 'ravenna' ) . $page->post_title,
			'before_widget' => '<section id="sectionid" class="home-block parallax"><aside id="%1$s" class="container clearfix %2$s">',
			'after_widget'  => '</aside><div class="block-overlay"></div></section>',
			'before_title'  => '<h3 class="widget-title"><span>',
			'after_title'   => '</span></h3>',
		) );
	}

	//Footer widget areas
	$widget_areas = get_theme_mod('footer_widget_areas', '3');
	for ($i=1; $i<=$widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer ', 'ravenna' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	//Register widgets
	register_widget( 'Ravenna_Services' );
	register_widget( 'Ravenna_Action' );
	register_widget( 'Ravenna_Blog' );
	register_widget( 'Ravenna_Social' );
	register_widget( 'Ravenna_Skills' );
}
add_action( 'widgets_init', 'ravenna_widgets_init' );

//Load widgets
require get_template_directory() . "/widgets/front-services.php";
require get_template_directory() . "/widgets/front-action.php";
require get_template_directory() . "/widgets/front-blog.php";
require get_template_directory() . "/widgets/front-social.php";
require get_template_directory() . "/widgets/front-skills.php";

/**
 * Enqueue scripts and styles.
 */
function ravenna_scripts() {

	wp_enqueue_style( 'ravenna-style', get_stylesheet_uri() );

	if ( get_theme_mod('body_font_name') !='' ) {
	    wp_enqueue_style( 'ravenna-body-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('body_font_name')) );
	} else {
	    wp_enqueue_style( 'ravenna-body-fonts', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
	}

	if ( get_theme_mod('headings_font_name') !='' ) {
	    wp_enqueue_style( 'ravenna-headings-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('headings_font_name')) );
	} else {
	    wp_enqueue_style( 'ravenna-headings-fonts', '//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700');
	}

	wp_enqueue_style( 'ravenna-fontawesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );

	wp_enqueue_script( 'ravenna-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'ravenna-parallax', get_template_directory_uri() . '/js/main.js', array('jquery'),'', true );

	wp_enqueue_script( 'ravenna-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'),'', true );

}
add_action( 'wp_enqueue_scripts', 'ravenna_scripts' );

/**
 * Enqueue Bootstrap
 */
function ravenna_enqueue_bootstrap() {
	wp_enqueue_style( 'ravenna-bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css', array(), true );
}
add_action( 'wp_enqueue_scripts', 'ravenna_enqueue_bootstrap', 9 );

/**
 * Load html5shiv
 */
function ravenna_html5shiv() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'ravenna_html5shiv' );

/**
 * Header boxes
 */
if ( ! function_exists( 'ravenna_header_boxes' ) ) :
function ravenna_header_boxes() {

	$box_icon_1 = get_theme_mod('box_icon_1', 'fa-building-o');
	$box_icon_2 = get_theme_mod('box_icon_2', 'fa-heart-o');
	$box_icon_3 = get_theme_mod('box_icon_3', 'fa-tablet');

	echo '<div class="header-block">';
	if ($box_icon_1) {
	echo 	'<span class="header-icon"><i class="fa ' . esc_html($box_icon_1) . '"></i></span>';
	}
	echo 	'<h3 class="header-title">' . esc_html(get_theme_mod('box_title_1', 'Solid construction')) . '</h3>';
	echo 	'<div class="header-text">' . wp_kses_post(get_theme_mod('box_text_1', 'Try it and see for yourself. You will be amazed.')) . '</div>';
	echo '</div>';
	echo '<div class="header-block">';
	if ($box_icon_2) {
	echo 	'<span class="header-icon"><i class="fa ' . esc_html($box_icon_2) . '"></i></span>';
	}
	echo 	'<h3 class="header-title">' . esc_html(get_theme_mod('box_title_2', 'Built with love')) . '</h3>';
	echo 	'<div class="header-text">' . wp_kses_post(get_theme_mod('box_text_2', 'Countless hours of work and passion went into this.')) . '</div>';
	echo '</div>';
	echo '<div class="header-block">';
	if ($box_icon_3) {
	echo 	'<span class="header-icon"><i class="fa ' . esc_html($box_icon_3) . '"></i></span>';
	}
	echo 	'<h3 class="header-title">' . esc_html(get_theme_mod('box_title_3', 'Responsive design')) . '</h3>';
	echo 	'<div class="header-text">' . wp_kses_post(get_theme_mod('box_text_3', 'Looks great on any device, no matter the size.')) . '</div>';
	echo '</div>';
}
endif;

function ravenna_mobile_boxes() {
	 if (!get_theme_mod('header_box_mobile')) {
	 	return 'no-boxes';
	 }
}

/**
 * Remove categories/tags prefix
 */
function ravenna_archive_prefix($title) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
    	$title = single_tag_title( '', false );
  	}
	return $title;
}
add_filter( 'get_the_archive_title', 'ravenna_archive_prefix' );

/**
 * Footer credits
 */
function ravenna_footer_credits() {
	echo '<a href="' . esc_url( __( 'http://wordpress.org/', 'ravenna' ) ) . '" rel="nofollow">';
		printf( __( 'Proudly powered by %s', 'ravenna' ), 'WordPress' );
	echo '</a>';
	echo '<span class="sep"> | </span>';
	printf( esc_html__( 'Theme: %2$s by %1$s.', 'ravenna' ), 'JustFreeThemes', '<a href="http://justfreethemes.com/ravenna" rel="nofollow">Ravenna</a>' );
}
add_action( 'ravenna_footer', 'ravenna_footer_credits' );

/**
 * Site branding
 */
if ( ! function_exists( 'ravenna_branding' ) ) :
function ravenna_branding() {
	if ( get_theme_mod('site_logo') ) :
		echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr(get_bloginfo('name')) . '"><img class="site-logo" src="' . esc_url(get_theme_mod('site_logo')) . '" alt="' . esc_attr(get_bloginfo('name')) . '" /></a>';
	else :
		echo '<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html(get_bloginfo('name')) . '</a></h1>';
		if ( get_bloginfo( 'description' ) ) {
			echo '<h2 class="site-description">' . esc_html(get_bloginfo( 'description' )) . '</h2>';
		}
	endif;
}
endif;

/**
 * Full width single posts
 */
function ravenna_fullwidth_singles($classes) {
	$fullwidth_single = get_theme_mod('fullwidth_single', 0);
	if ( $fullwidth_single && is_singular() ) {
		$classes[] = 'fullwidth-single';
	}
	return $classes;
}
add_filter('body_class', 'ravenna_fullwidth_singles');

/**
 * Full width blog
 */
function ravenna_fullwidth_blog($classes) {
	$fullwidth_blog = get_theme_mod('blog_layout');
	if ( $fullwidth_blog == 'fullwidth' && ( is_home() || is_archive() ) ) {
		$classes[] = 'fullwidth-blog';
	}
	return $classes;
}
add_filter('body_class', 'ravenna_fullwidth_blog');

/**
 * Change the excerpt length
 */
function ravenna_excerpt_length( $length ) {
	$excerpt = get_theme_mod('exc_lenght', '55');
	return $excerpt;
}
add_filter( 'excerpt_length', 'ravenna_excerpt_length', 999 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Styles
 */
require get_template_directory() . '/inc/styles.php';

/**
 * Widgets functions
 */
require get_template_directory() . '/inc/widgets.php';


/**
 *TGM Plugin activation.
 */
require_once get_template_directory() . '/class-tgm-plugin-activation.php';

/**
 * TGMPA register
 */
function ravenna_register_required_plugins() {
		$plugins = array(
			array(
				'name'      => 'WP Product Review',
				'slug'      => 'wp-product-review',
				'required'  => false,
			),

			array(
				'name'      => 'Intergeo Maps - Google Maps Plugin',
				'slug'      => 'intergeo-maps',
				'required'  => false
			),

			array(
				'name'     => 'Pirate Forms',
				'slug' 	   => 'pirate-forms',
				'required' => false
			));

	$config = array(
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'ravenna' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'ravenna' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'ravenna' ),
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'ravenna' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'ravenna' ),
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'ravenna' ),
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'ravenna' ),
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'ravenna' ),
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'ravenna' ),
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'ravenna' ),
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'ravenna' ),
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'ravenna' ),
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'ravenna' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'ravenna' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'ravenna' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'ravenna' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'ravenna' ),
            'nag_type'                        => 'updated'
        )
    );

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'ravenna_register_required_plugins' );
