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

/**
 * Define directory
 */
define( 'PLUGIN_DIR', dirname(__FILE__).'/' );


/**
 * Include the Admin Functionality
 */
include( PLUGIN_DIR . 'events-define-post-type.php');
include( PLUGIN_DIR . 'events-meta-box.php');
include( PLUGIN_DIR . 'events-options.php');


/**
 * Include Components
 */
include( PLUGIN_DIR . '/components/events-list.php');
include( PLUGIN_DIR . '/components/events-map.php');
include( PLUGIN_DIR . '/components/events-search-input.php');
include( PLUGIN_DIR . '/components/events-single-content.php');



/**
 * Enqueue scripts and styles.
 */

// Will maybe want to make an option
// wp_enqueue_styles( 'event_styles', get_theme_file_uri('./events.js'), array( 'wp-api'  )  );

// wp_enqueue_script( 'events', get_theme_file_uri('./events.js'), array( 'wp-api'  )  );
// wp_enqueue_script( 'gmap', get_theme_file_uri('./events.js'), array( 'wp-api'  )  );