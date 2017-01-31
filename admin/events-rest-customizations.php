<?php

/**
 * Recommended Threat Prevention Snippet
 */
defined( 'ABSPATH' ) or die( "Cannot access pages directly." );


add_action( 'rest_api_init', 'tpr_add_event_rest_fields' );
 
function tpr_add_event_rest_fields() {

	// Get Custom Fields and Fiter For Event Specific Defs
	$recent_post = wp_get_recent_posts(array( 'post_type' =>'events', 'numberposts' => 1 ), OBJECT);
	$recent_post_ID = array_values($recent_post)[0] -> ID; 
	$custom_fields = get_post_custom( $recent_post_ID );
	$custom_fields = array_filter( $custom_fields, function($i, $v){
		return strpos($v, 'events');
	}, ARRAY_FILTER_USE_BOTH);

	// Loop and register w/ REST API 
	foreach ( $custom_fields as $attr => $value){
		$type = gettype($attr);

		$tpr_field_schema = array(
	        'description'   =>  'The event\'s' . explode('_', $attr)[2],
	        'type'          =>  $type,
	        'context'       =>  array( 'view', 'edit' )
		);

		$tpr_get_field = function( $object, $field_name ) {
			$my_custom_field = get_post_custom()[explode('tpr', $field_name)[1]];
			foreach ( $my_custom_field as $key => $value ) { return $value; }
        };

		$tpr_update_field = function( $value, $object, $field_name ) {
			return update_post_meta( $object->ID, $field_name, $value );
        };

		register_rest_field(
	        'events',
	        'tpr' . $attr,
	        array(
	            'get_callback'      => $tpr_get_field,
	            'update_callback'   => $tpr_update_field,
	            'schema'            => $tpr_field_schema
	        )
	    );

	}
}