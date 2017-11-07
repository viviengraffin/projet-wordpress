<?php
/**
 * @package Ravenna
 */

 //Hex to rgba
function ravenna_hex2rgba($color, $opacity = false) {

        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        $rgb =  array_map('hexdec', $hex);
        $opacity = 0.9;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';

        return $output;
}

//Dynamic styles
function ravenna_custom_styles($custom) {

	$custom = '';

	//Sections styling
	$pages = get_pages(array(
		'meta_key' => '_wp_page_template',
		'meta_value' => 'page-templates/page_widgetized.php',
	));
	foreach($pages as $page){
		$id = $page->post_id;
		if ( is_page($id) ) {
			$widget_count = ravenna_count_widgets($id);
			for ($i = 1; $i <= $widget_count; $i++) {
				$bgcolor 		= get_theme_mod( 'section_bg_color_' . $id . '_' . $i);
				$bgimage 		= get_theme_mod( 'section_image_' . $id . '_' . $i);
				$section_color 	= get_theme_mod( 'section_color_' . $id . '_' . $i);
				$top_padding 	= get_theme_mod( 'section_tp_' . $id . '_' . $i,'100');
				$bottom_padding = get_theme_mod( 'section_bp_' . $id . '_' . $i,'100');
				$fullwidth 		= get_theme_mod( 'section_fw_' . $id . '_' . $i);
				$center 		= get_theme_mod( 'section_center_' . $id . '_' . $i);
				$max_width		= get_theme_mod( 'section_mw_' . $id . '_' . $i, '1170');
				$custom 		.= ".home-block:nth-of-type(" . $i . ") { background-color:" . esc_attr($bgcolor) . "}"."\n";
				$custom 		.= ".home-block:nth-of-type(" . $i . "),
									.home-block:nth-of-type(" . $i . ") a,
									.home-block:nth-of-type(" . $i . ") h1,
									.home-block:nth-of-type(" . $i . ") h2,
									.home-block:nth-of-type(" . $i . ") h3,
									.home-block:nth-of-type(" . $i . ") h4,
									.home-block:nth-of-type(" . $i . ") h5,
									.home-block:nth-of-type(" . $i . ") h6 { color:" . esc_attr($section_color) . "}"."\n";
				$custom 		.= ".home-block:nth-of-type(" . $i . ") { background-image:url(" . esc_url($bgimage) . ")}"."\n";
				if ($bgimage) {
					$custom 	.= ".home-block:nth-of-type(" . $i . ") .block-overlay { background-color: rgba(0,0,0,0.6);}"."\n";
				}
				$custom 		.= ".home-block:nth-of-type(" . $i . ") { padding-top:" . intval($top_padding) . "px;}"."\n";
				$custom 		.= ".home-block:nth-of-type(" . $i . ") { padding-bottom:" . intval($bottom_padding) . "px;}"."\n";
				$custom 		.= ".home-block:nth-of-type(" . $i . ") .container { max-width:" . intval($max_width) . "px;}"."\n";
				if ($fullwidth) {
					$custom 	.= ".home-block:nth-of-type(" . $i . ") .container { padding-left:0;padding-right:0;width:100%;max-width: 100%;}"."\n";
				}	
				if ($center) {
					$custom 	.= ".home-block:nth-of-type(" . $i . ") { text-align: center;}"."\n";
				}							
			}
		}
	}

	//Header padding
    $header_top_padding = get_theme_mod( 'header_top_padding', '240' );
    $custom .= ".header-info { padding-top:" . intval($header_top_padding) . "px; }"."\n";
    $header_bottom_padding = get_theme_mod( 'header_bottom_padding', '170' );
    $custom .= ".header-info { padding-bottom:" . intval($header_bottom_padding) . "px; }"."\n";

    //Header boxes mobile
    if (get_theme_mod('header_box_mobile')) {
    	$custom .= "@media only screen and (max-width: 991px) { .header-info .container { display: block; }}"."\n";
    }

	//Primary color
	$primary_color = get_theme_mod( 'primary_color', '#3c5180' );
	if ( $primary_color != '#3c5180' ) {
		$rgba = ravenna_hex2rgba($primary_color, 0.9);
		$custom .= ".site-branding, .header-block { background-color:" . esc_attr($rgba) . "}"."\n";
		$custom .= ".service-icon { border-color:" . esc_attr($primary_color) . "}"."\n";
	}
	$secondary_color = get_theme_mod( 'secondary_color', '#488FE4' );
	if ( $secondary_color != '#488FE4' ) {
		$custom .= ".header-block:hover .header-icon,.entry-title a:hover,.social-menu-widget li:hover a,.social-menu-widget li:hover,.main-navigation a:hover,a,a:hover { color:" . esc_attr($secondary_color) . "}"."\n";
		$custom .= ".preloader-inner,.header-icon,.skill-progress,.social-menu-widget li,.service-icon,.comment-navigation a,.posts-navigation a,.post-navigation a,button,.button,input[type=\"button\"],input[type=\"reset\"],input[type=\"submit\"] { background-color:" . esc_attr($secondary_color) . "}"."\n";
		$custom .= ".social-menu-widget li,.home-block .widget-title span,.home-block .widget-title,.footer-widgets .widget-title,.widget-area .widget-title { border-color:" . esc_attr($secondary_color) . "}"."\n";
	}	
	//Site title
	$site_title = get_theme_mod( 'site_title_color', '#f5f5f5' );
	$custom .= ".site-title a, .site-title a:hover { color:" . esc_attr($site_title) . "}"."\n";
	//Site desc
	$site_desc = get_theme_mod( 'site_desc_color', '#E1E9EF' );
	$custom .= ".site-description { color:" . esc_attr($site_desc) . "}"."\n";
	//Body
	$body_text = get_theme_mod( 'body_text_color', '#8C9DAB' );
	$custom .= "body, .widget a { color:" . esc_attr($body_text) . "}"."\n";
	
	//Fonts
	$body_fonts = get_theme_mod('body_font_family');	
	$headings_fonts = get_theme_mod('headings_font_family');
	if ( $body_fonts !='' ) {
		$custom .= "body, .main-navigation ul ul li { font-family:" . wp_kses_post($body_fonts) . ";}"."\n";
	}
	if ( $headings_fonts !='' ) {
		$custom .= "h1, h2, h3, h4, h5, h6, .main-navigation li, .preloader-inner { font-family:" . wp_kses_post($headings_fonts) . ";}"."\n";
	}
    //Site description
    $site_desc_size = get_theme_mod( 'site_desc_size', '15' );
    if ( $site_desc_size ) {
        $custom .= ".site-description { font-size:" . intval($site_desc_size) . "px; }"."\n";
    }	    	
	//H1 size
	$h1_size = get_theme_mod( 'h1_size' );
	if ( $h1_size ) {
		$custom .= "h1 { font-size:" . intval($h1_size) . "px; }"."\n";
	}
    //H2 size
    $h2_size = get_theme_mod( 'h2_size' );
    if ( $h2_size ) {
        $custom .= "h2 { font-size:" . intval($h2_size) . "px; }"."\n";
    }
    //H3 size
    $h3_size = get_theme_mod( 'h3_size' );
    if ( $h3_size ) {
        $custom .= "h3 { font-size:" . intval($h3_size) . "px; }"."\n";
    }
    //H4 size
    $h4_size = get_theme_mod( 'h4_size' );
    if ( $h4_size ) {
        $custom .= "h4 { font-size:" . intval($h4_size) . "px; }"."\n";
    }
    //H5 size
    $h5_size = get_theme_mod( 'h5_size' );
    if ( $h5_size ) {
        $custom .= "h5 { font-size:" . intval($h5_size) . "px; }"."\n";
    }
    //H6 size
    $h6_size = get_theme_mod( 'h6_size' );
    if ( $h6_size ) {
        $custom .= "h6 { font-size:" . intval($h6_size) . "px; }"."\n";
    }
    //Body size
    $body_size = get_theme_mod( 'body_size' );
    if ( $body_size ) {
        $custom .= "body { font-size:" . intval($body_size) . "px; }"."\n";
    }
    //Section titles
    $section_titles = get_theme_mod( 'section_titles' );
    if ( $section_titles ) {
        $custom .= ".home-block .widget-title { font-size:" . intval($section_titles) . "px; }"."\n";
    }

	//Output all the styles
	wp_add_inline_style( 'ravenna-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'ravenna_custom_styles' );