<?php

// The wp_enqueue_style action can be used for both CSS and Javascript files. 
function TDS_Plugin_Styles(){
wp_enqueue_style('plugin-style',
plugins_url('/css/plugin-style.css',
__FILE__));
}
// The following code pulls the stylesheet (style.css) to this page. This allows the CSS information to be located in a different area than the main php page. 
add_action( 'wp_enqueue_scripts',
'TDS_Plugin_Styles' );

//This code sets up the plugin's name. This is needed to program a custom widget.
class TDSContentFilterPlugin extends WP_Plugin {
//This code constructs the plugin as a whole (classes, settings, forms, displays). Plugin actual processes. 
	function __construct() {
		// Adds a class to the plugin and provides a description on the plugin page to describe what the plugin does for the user. These are plugin settings.  
		$plugin_ops = array('classname' => 'tds_content_filter', 'description' => __( 'A way to filter information', 'TDS') );
		// Builds the plugin itself and gives it a name, "Content Filter". This means that it is calling the constructor of the parent class as well. 
		parent::__construct('about_me', __('Content Filter', 'TDS'), $plugin_ops);
	}

