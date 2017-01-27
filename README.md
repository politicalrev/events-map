# EVENTS MAP

**In Progress**

This is a plugin to power an events feature. It leverages a custom post-type of "events" and uses the posts under that type to represent events. The events leverages the WP REST API to query items under the events post-type so people can find events based on search terms.

## Installation

Open your plugin directory, and git clone this repo. Activate the plugin in WP Admin.

You should be able to register events as new "posts" under the Events post-type

Alternatively, you could use the WP REST API to post new events using MOCK_DATA.json as seed data.

For ease of use I thought it'd be best to include front-end components as functions like this:

`if(function_exists('tpr_map')){ tpr_map(); }`. 

Components at this point are: Map, Search Input, Event List, and Event Details (for the details page) 

Still lots to do. Please consult the issues for info or holler on TPR slack. Thanks!
