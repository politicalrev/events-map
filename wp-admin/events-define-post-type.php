<?php

/**
 * Recommended Threat Prevention Snippet
 */
defined( 'ABSPATH' ) or die( "Cannot access pages directly." );


/**
 * Register Events Custom Post Type
 */
function tpr_create_events_posttype() {
	register_post_type('Events',
		array(
           'labels'      => array(
           		'name'               => 'Events',
				'singular_name'      => 'Event',
				'add_new'            => 'Add New Event',
				'add_new_item'       => 'Add New Event',
				'edit_item'          => 'Edit Event',
				'new_item'           => 'Add New Event',
				'view_item'          => 'View Event',
				'search_items'       => 'Search Event',
				'not_found'          => 'No events found',
				'not_found_in_trash' => 'No event',
				'menu_name'          => 'Events'
           	),
			'public'               => true,
			'has_archive'          => true,
			'show_in_menu'         => true,
			'menu_position'        => 20,
			'menu_icon'            => 'dashicons-calendar',
			'register_meta_box_cb' => 'tpr_events_meta_box',
			'show_in_rest'         => true,
       	)
    );
}
add_action('init', 'tpr_create_events_posttype', 11);

/**
 * Meta Box Callback for Post Type
 */
function tpr_events_meta_box() {
	add_meta_box( 'event-details', 'Event Details', 'tpr_events_fields', null, 'side');
}


