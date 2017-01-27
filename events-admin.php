<?php

/**
 * Recommended Threat Prevention Snippet
 */
defined( 'ABSPATH' ) or die( "I'm sure we'd be friends AFK." );


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


/**
 * Defines Event Fields for Meta Box
 */
function tpr_events_fields() {
	global $post;

	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'tpr_events_meta_box_nonce' );


	// RETRIEVE CURRENT VALUES:
	// date current value
	$current_date = get_post_meta( $post->ID, '_events_date', true );
	// time current value
	$current_time = get_post_meta( $post->ID, '_events_time', true );
	// locaiton current value
	$current_location = get_post_meta( $post->ID, '_events_location', true );
	// host current value
	$current_host = get_post_meta( $post->ID, '_events_host', true );
	// phone current value
	$current_phone = get_post_meta( $post->ID, '_events_phone', true );
	// org current value
	$current_org = get_post_meta( $post->ID, '_events_org', true );
	// facebook_event current value
	$current_facebook_event = get_post_meta( $post->ID, '_events_facebook_event', true );
	// website current value
	$current_website = get_post_meta( $post->ID, '_events_website', true );
	// facebook current value
	$current_facebook = get_post_meta( $post->ID, '_events_facebook', true );
	// twitter current value
	$current_twitter = get_post_meta( $post->ID, '_events_twitter', true );
	// instagram current value
	$current_instagram = get_post_meta( $post->ID, '_events_instagram', true );
	


	// MARK UP
	?>
	<div>	
		<div class="form-group">
			<label>date</label>
			<div><input type="text" name="date" value="<? echo $current_date; ?>"></div>
		</div>
		<div class="form-group">
			<label>time</label>
			<div><input type="text" name="time" value="<? echo $current_time; ?>"></div>
		</div>
		<div class="form-group">
			<label>location</label>
			<div><input type="text" name="location" value="<? echo $current_location; ?>"></div>
		</div>
		<div class="form-group">
			<label>host</label>
			<div><input type="text" name="host" value="<? echo $current_host; ?>"></div>
		</div>
		<div class="form-group">
			<label>phone</label>
			<div><input type="text" name="phone" value="<? echo $current_phone; ?>"></div>
		</div>
		<div class="form-group">
			<label>org</label>
			<div><input type="text" name="org" value="<? echo $current_org; ?>"></div>
		</div>
		<div class="form-group">
			<label>facebook_event</label>
			<div><input type="text" name="facebook_event" value="<? echo $current_facebook_event; ?>"></div>
		</div>
		<div class="form-group">
			<label>website</label>
			<div><input type="text" name="website" value="<? echo $current_website; ?>"></div>
		</div>
		<div class="form-group">
			<label>facebook</label>
			<div><input type="text" name="facebook" value="<? echo $current_facebook; ?>"></div>
		</div>
		<div class="form-group">
			<label>twitter</label>
			<div><input type="text" name="twitter" value="<? echo $current_twitter; ?>"></div>
		</div>
		<div class="form-group">
			<label>instagram</label>
			<div><input type="text" name="instagram" value="<? echo $current_instagram; ?>"></div>
		</div>
	</div>
	<?php
}


/**
 * Handles Save of Event Fields
 */
function tpr_save_events_meta_boxes_data( $post_id ){
	// verify meta box nonce
	if ( !isset( $_POST['tpr_events_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['tpr_events_meta_box_nonce'], basename( __FILE__ ) ) ){
		return;
	}

	// Checks if autosave and the user's permissions.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){ return; }
	if ( !current_user_can( 'edit_post', $post_id ) ){ return; }


	// Saves the fields
	if ( isset( $_REQUEST['date'] ) ) {
		update_post_meta( $post_id, '_events_date', sanitize_text_field( $_POST['date'] ) );
	}
	if ( isset( $_REQUEST['time']) ) {
		update_post_meta( $post_id, '_events_time', sanitize_text_field( $_POST['time'] ) );
	}
	if ( isset( $_REQUEST['location']) ) {
		update_post_meta( $post_id, '_events_location', sanitize_text_field( $_POST['location'] ) );
	}
	if ( isset( $_REQUEST['host']) ) {
		update_post_meta( $post_id, '_events_host', sanitize_text_field( $_POST['host'] ) );
	}
	if ( isset( $_REQUEST['phone']) ) {
		update_post_meta( $post_id, '_events_phone', sanitize_text_field( $_POST['phone'] ) );
	}
	if ( isset( $_REQUEST['org']) ) {
		update_post_meta( $post_id, '_events_org', sanitize_text_field( $_POST['org'] ) );
	}
	if ( isset( $_REQUEST['facebook_event']) ) {
		update_post_meta( $post_id, '_events_facebook_event', sanitize_text_field( $_POST['facebook_event'] ) );
	}
	if ( isset( $_REQUEST['website']) ) {
		update_post_meta( $post_id, '_events_website', sanitize_text_field( $_POST['website'] ) );
	}
	if ( isset( $_REQUEST['facebook']) ) {
		update_post_meta( $post_id, '_events_facebook', sanitize_text_field( $_POST['facebook'] ) );
	}
	if ( isset( $_REQUEST['twitter']) ) {
		update_post_meta( $post_id, '_events_twitter', sanitize_text_field( $_POST['twitter'] ) );
	}
	if ( isset( $_REQUEST['instagram']) ) {
		update_post_meta( $post_id, '_events_instagram', sanitize_text_field( $_POST['instagram'] ) );
	}
}
add_action( 'save_post_events', 'tpr_save_events_meta_boxes_data', 10, 2 );



