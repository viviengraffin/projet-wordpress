<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Ravenna
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function ravenna_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'ravenna_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function ravenna_jetpack_setup
add_action( 'after_setup_theme', 'ravenna_jetpack_setup' );

function ravenna_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function ravenna_infinite_scroll_render