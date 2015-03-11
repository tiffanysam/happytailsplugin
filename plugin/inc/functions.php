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

// Creates the function
function my_super_awesome_plugin(){
	ADD THE CODE FOR YOUR PLUGIN
	HERE.
}

// Activates the function
add_action( 'hook_name',
'your_function', [priority], [args]
);

// Activates the function in the content area
add_action( 'wp_content',
'happy_tails_plugin');
