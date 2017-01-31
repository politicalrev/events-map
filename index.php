<?php
/**
 * Plugin Name: Bernie Events Map
 * Plugin URI: https://github.com/politicalrev/
 * Description: Register progressive events, display on map, w/ live search using WP REST endpoint 
 * Version: 0.1.1
 * Author: Greg Westneat
 * Author URI: https://github.com/leggomuhgreggo/
 */

/**
 * Recommended Threat Prevention Snippet
 */
defined( 'ABSPATH' ) or die( "Cannot access pages directly." );




/**
 * Define directory
 */
define( 'PLUGIN_DIR', dirname(__FILE__) . '/' );




/**
 * Include the Admin Functionality
 */
include( PLUGIN_DIR . 'admin/index.php');

/**
 * Include Front End Components
 */
include( PLUGIN_DIR . 'components/index.php');




/**
 * Enqueue Scripts
 */
function tpr_add_events_scripts() {
	wp_register_script('events', plugins_url('/assets/events.js', __FILE__), array( 'wp-api', 'jquery' ), '', true);
	wp_enqueue_script('events');
}
add_action( 'wp_enqueue_scripts', 'tpr_add_events_scripts' ); 



/**
 * Enqueue Styles
 */
// function tpr_add_events_styles() {
// 	// wp_register_script('my_amazing_script', plugins_url('amazing_script.js', __FILE__), array('jquery'),'1.1', true);
// 	// wp_enqueue_script('my_amazing_script');
// }
// add_action( 'wp_enqueue_scripts', 'tpr_add_events_styles' ); 
