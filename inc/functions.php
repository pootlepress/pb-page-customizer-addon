<?php
/**
 * Created by PhpStorm.
 * User: shramee
 * Date: 2/7/15
 * Time: 6:50 PM
 */

function ppb_pc_page_settings_fields() {

	$fields = array();

	$fields['background'] = array(
		'name' => __( 'Background Color', 'pootlepage' ),
		'type' => 'color',
	);

	$fields['background_image'] = array(
		'name' => __( 'Background Image', 'pootlepage' ),
		'type' => 'upload',
	);

	$fields['background_image_repeat'] = array(
		'name' => __( 'Background Image Repeat', 'pootlepage' ),
		'type' => 'checkbox',
	);

	$fields['background_image_position'] = array(
		'name'    => __( 'Background Image Position', 'pootlepage' ),
		'type'    => 'select',
		'options' => array(
			''              => 'default',
			'top left'      => 'top left',
			'top center'    => 'top center',
			'top right'     => 'top right',
			'center left'   => 'center left',
			'center center' => 'center center',
			'center right'  => 'center right',
			'bottom left'   => 'bottom left',
			'bottom center' => 'bottom center',
			'bottom right'  => 'bottom right'
		)
	);

	$fields['background_image_attachment'] = array(
		'name'    => __( 'Background Attachment', 'pootlepage' ),
		'type'    => 'select',
		'options' => array(
			''       => 'default',
			'scroll' => 'scroll',
			'fixed'  => 'fixed'
		)
	);

	$fields['remove_sidebar'] = array(
		'name' => __( 'Remove Sidebar', 'pootlepage' ),
		'type' => 'checkbox',
	);

	$fields['full_width'] = array(
		'name' => __( 'Make page go full width', 'pootlepage' ),
		'type' => 'checkbox',
	);

	$fields['keep_content_at_site_width'] = array(
		'name' => __( 'Keep content at site width', 'pootlepage' ),
		'type' => 'checkbox',
	);

	return $fields;
}

function ppb_pc_hide_elements_fields() {

	$fields = array();

	$fields['hide_logo_strapline'] = array(
		'name' => __( 'Hide logo/strapline', 'pootlepage' ),
		'type' => 'checkbox',
	);

	$fields['hide_header'] = array(
		'name' => __( 'Hide header', 'pootlepage' ),
		'type' => 'checkbox',
	);

	$fields['hide_main_navigation'] = array(
		'name' => __( 'Hide main navigation', 'pootlepage' ),
		'type' => 'checkbox',
	);

	$fields['hide_page_title'] = array(
		'name' => __( 'Hide page title', 'pootlepage' ),
		'type' => 'checkbox',
	);

	$fields['hide_footer_widgets'] = array(
		'name' => __( 'Hide footer widgets', 'pootlepage' ),
		'type' => 'checkbox',
	);

	$fields['hide_footer'] = array(
		'name' => __( 'Hide footer', 'pootlepage' ),
		'type' => 'checkbox',
	);

	return $fields;
}
