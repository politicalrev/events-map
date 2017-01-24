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

function tpr_map(inputMarkup) {
	?>
	<div class="event-map-input-wrap">
		<!-- If inpit, then test and insert here otherwise default -->
	</div>
	<?php
}

// Gonna need to think about the best way to do this
function tpr_event_list() {
	 ?>
	<ul class="event-list">
		<li class="event-item"></li>
	</ul>
	<?php
}


function tpr_event_details() {
	 ?>
	 <div class="event-details">
		<ul class="deails-list">
			<li class="event-details-item"></li>
		</ul>
	 </div>
	<?php
}

/**
 * Enqueue scripts and styles.
 */

// Will maybe want to make an option
// wp_enqueue_styles( 'event_styles', get_theme_file_uri('./events.js'), array( 'wp-api'  )  );

// wp_enqueue_script( 'events', get_theme_file_uri('./events.js'), array( 'wp-api'  )  );
// wp_enqueue_script( 'gmap', get_theme_file_uri('./events.js'), array( 'wp-api'  )  );