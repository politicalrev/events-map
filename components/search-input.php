<?php

/**
 * Recommended Threat Prevention Snippet
 */
defined( 'ABSPATH' ) or die( "I'm sure we'd be friends AFK." );


/**
 * Search Input
 */
function tpr_event_search() {
	?>
	<div class="event-map-input-wrap">
		<input id="tpr-event-search" type="search" placeholder="Search Events">
	</div>
	<?php
}