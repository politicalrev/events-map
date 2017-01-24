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
defined( 'ABSPATH' ) or die( "I'm sure we'd be friends AFK." );

function tpr_map() {
	?>
	<div class="event-map"></div>
	<?php
}

function tpr_event_list() {
	 ?>
	<ul class="event-list">
		<li class="event-item"></li>
	</ul>
	<?php
}

function tpr_event_details() {
	 ?>
	<ul class="event-list">
		<li class="event-item"></li>
	</ul>
	<?php
}

/**
 * Enqueue scripts and styles.
 */
wp_enqueue_script( 'events', get_theme_file_uri('./events.js'), array( 'wp-api'  )  );
// wp_enqueue_script( 'gmap', get_theme_file_uri('./events.js'), array( 'wp-api'  )  );