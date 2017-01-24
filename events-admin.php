<?php

/**
 * Recommended Threat Prevention Snippet
 */
defined( 'ABSPATH' ) or die( "I'm sure we'd be friends AFK." );

/**
 * Tags for States
 */
$us_states_territories = array("Alaska","Alabama","Arkansas","American Samoa","Arizona","California","Colorado","Connecticut","District of Columbia","Delaware","Florida","Georgia","Guam","Hawaii","Iowa","Idaho","Illinois","Indiana","Kansas","Kentucky","Louisiana","Massachusetts","Maryland","Maine","Michigan","Minnesota","Missouri","Mississippi","Montana","North Carolina","North Dakota","Nebraska","New Hampshire","New Jersey","New Mexico","Nevada","New York","Ohio","Oklahoma","Oregon","Pennsylvania","Puerto Rico","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Virginia","Virgin Islands","Vermont","Washington","Wisconsin","West Virginia","Wyoming");


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
			'taxonomies'           => $us_states_territories
       	)
    );
}
add_action('init', 'tpr_create_events_posttype');



/**
 * Register Meta Fields Box For Events
 */
function tpr_events_meta_box() {
	add_meta_box( 'event-details', 'Event Details', tpr_events_fields);
}

function tpr_events_fields() {

	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'tpr_events_meta_box_nonce' );


	// RETRIEVE CURRENT VALUES:
	// date current value
	$current_date = get_post_meta( $post->ID, '_event_date', true );
	// time current value
	$current_time = get_post_meta( $post->ID, '_event_time', true );
	// locaiton current value
	$current_location = get_post_meta( $post->ID, '_event_location', true );
	// host current value
	$current_host = get_post_meta( $post->ID, '_event_host', true );
	// phone current value
	$current_phone = get_post_meta( $post->ID, '_event_phone', true );
	// org current value
	$current_org = get_post_meta( $post->ID, '_event_org', true );
	// facebook_event current value
	$current_facebook_event = get_post_meta( $post->ID, '_event_facebook_event', true );
	// website current value
	$current_website = get_post_meta( $post->ID, '_event_website', true );
	// facebook current value
	$current_facebook = get_post_meta( $post->ID, '_event_facebook', true );
	// twitter current value
	$current_twitter = get_post_meta( $post->ID, '_event_twitter', true );
	// instagram current value
	$current_instagram = get_post_meta( $post->ID, '_event_instagram', true );
	


	// MARK UP
	?>
	<div class="inside">
		<label>date</label>
		<p><input type="text" name="date" value="<? echo $current_date; ?>"></p>
	</div>
	<div class="inside">
		<label>time</label>
		<p><input type="text" name="time" value="<? echo $current_time; ?>"></p>
	</div>
	<div class="inside">
		<label>location</label>
		<p><input type="text" name="location" value="<? echo $current_location; ?>"></p>
	</div>
	<div class="inside">
		<label>host</label>
		<p><input type="text" name="host" value="<? echo $current_host; ?>"></p>
	</div>
	<div class="inside">
		<label>phone</label>
		<p><input type="text" name="phone" value="<? echo $current_phone; ?>"></p>
	</div>
	<div class="inside">
		<label>org</label>
		<p><input type="text" name="org" value="<? echo $current_org; ?>"></p>
	</div>
	<div class="inside">
		<label>facebook_event</label>
		<p><input type="text" name="facebook_event" value="<? echo $current_facebook_event; ?>"></p>
	</div>
	<div class="inside">
		<label>website</label>
		<p><input type="text" name="website" value="<? echo $current_website; ?>"></p>
	</div>
	<div class="inside">
		<label>facebook</label>
		<p><input type="text" name="facebook" value="<? echo $current_facebook; ?>"></p>
	</div>
	<div class="inside">
		<label>twitter</label>
		<p><input type="text" name="twitter" value="<? echo $current_twitter; ?>"></p>
	</div>
	<div class="inside">
		<label>instagram</label>
		<p><input type="text" name="instagram" value="<? echo $current_instagram; ?>"></p>
	</div>
	<?php
}


/**
 * Register Meta Fields Box For Events
 */
function tpr_save_event_meta_boxes_data( $post_id ){
	// verify meta box nonce
	if ( !isset( $_POST['tpr_events_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['tpr_events_meta_box_nonce'], basename( __FILE__ ) ) ){
		return;
	}

	// return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}
}
add_action( 'save_post_events', 'tpr_save_event_meta_boxes_data', 10, 2 );