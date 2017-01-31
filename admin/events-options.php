<?php

/**
 * Recommended Threat Prevention Snippet
 */
defined( 'ABSPATH' ) or die( "Cannot access pages directly." );

function tpr_options_page_html() {
    // check user capabilities
    if (!current_user_can('manage_options')) { return; }

    echo '<div class="wrap">
        <h1><?= esc_html(get_admin_page_title()); ?></h1>
                <form action="options.php" method="post">';
 // settings_fields('tpr_options');
            // do_settings_sections('tpr');
            // submit_button('Save Settings');
        echo '</form>
    </div>';
};

function tpr_options_page() {
    add_submenu_page(
        'edit.php?post_type=events',
        'Events Options',
        'Events Options',
        'manage_options',
        'event_options',
        'tpr_options_page_html'
    );
};
add_action('admin_menu', 'tpr_options_page');


function tpr_settings_init () {
	add_settings_section( 
	    'gmap-api', 
	    'Google Map API Key', 
	    'settings_section_cb', 
	    'Events Options'
	);
};
add_action('admin_init', 'tpr_settings_init');

function wporg_settings_section_cb() {
    echo '<p>Section Introduction.</p>';
};

