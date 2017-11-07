<?php
/**
 * Homepage widget functions
 *
 * @package Ravenna
 */


/**
 * Count widgets
 */
function ravenna_count_widgets($id) {   

	if ( !is_active_sidebar( 'widget-area-' . $id ) )
		return;

    $sidebars_widgets = wp_get_sidebars_widgets();
    $count = (int) count( (array) $sidebars_widgets['widget-area-' . $id] );
    return $count;
}

/**
 * Adds IDs to sections
 */
function ravenna_section_ids($params) {

	global $my_widget_num;
	$this_id = $params[0]['id'];
	$arr_registered_widgets = wp_get_sidebars_widgets();

	if(!$my_widget_num) {
		$my_widget_num = array();
	}

	if(!isset($arr_registered_widgets[$this_id]) || !is_array($arr_registered_widgets[$this_id])) {
		return $params;
	}

	if( isset($my_widget_num[$this_id]) ) {
		$my_widget_num[$this_id] ++;
	} else {
		$my_widget_num[$this_id] = 1;
	}

	$id = 'id="section-' . ($my_widget_num[$this_id]);

	$params[0]['before_widget'] = preg_replace('/id=\"sectionid/', "$id", $params[0]['before_widget'], 1);
		return $params;
}
add_filter('dynamic_sidebar_params','ravenna_section_ids');