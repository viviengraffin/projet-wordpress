<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Ravenna
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="preloader">
    <div class="preloader-inner">
    	<?php $preloader = get_theme_mod('preloader_text', 'LOADING&hellip;'); ?>
    	<?php echo esc_html($preloader); ?>
    </div>
</div>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ravenna' ); ?></a>

	<header id="masthead" class="site-header clearfix" role="banner">
		<div class="col-md-4 col-sm-3"></div>
		<div class="site-branding col-md-4 col-sm-6">
			<?php ravenna_branding(); ?>
		</div><!-- .site-branding -->
		<div class="col-md-5"></div>
		<nav id="site-navigation" class="main-navigation col-md-3" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
		<nav class="mobile-nav col-md-8 col-sm-6"></nav>
	</header><!-- #masthead -->

	<?php if ( get_header_image() && ( get_theme_mod('front_header_type' ,'image') == 'image' && is_front_page() || get_theme_mod('site_header_type', 'image') == 'image' && !is_front_page() ) ) : ?>
	<div class="header-image parallax">
		<div class="header-info <?php echo ravenna_mobile_boxes(); ?>">
			<div class="container">
				<?php ravenna_header_boxes(); ?>
			</div>			
		</div>
	</div>
	<?php endif; ?>	

	<div id="content" class="site-content">
	<?php if ( !is_page_template('page-templates/page_widgetized.php') ) : ?>
	<div class="container">
	<?php endif; ?>
