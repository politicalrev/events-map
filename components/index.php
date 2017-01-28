<?php

/**
 * Recommended Threat Prevention Snippet
 */
defined( 'ABSPATH' ) or die( "Cannot access pages directly." );


/**
 * Define Directory
 */
define( 'COMPONENTS_DIR', dirname(__FILE__) . '/' );

/**
 * Include Components
 */
include( COMPONENTS_DIR . 'events-list/index.php');
include( COMPONENTS_DIR . 'events-map/index.php');
include( COMPONENTS_DIR . 'events-search/index.php');
include( COMPONENTS_DIR . 'events-details-box/index.php');