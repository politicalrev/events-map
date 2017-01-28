<?php

/**
 * Recommended Threat Prevention Snippet
 */

defined( 'ABSPATH' ) or die( "Cannot access pages directly." );


/**
 * Define Directory
 */
define( 'WPADMIN_DIR', dirname(__FILE__) . '/' );

/**
 * Include Admin Files
 */
include( WPADMIN_DIR . 'events-define-post-type.php');
include( WPADMIN_DIR . 'events-meta-box.php');
include( WPADMIN_DIR . 'events-options.php');