<?php
/*
 * Plugin Name: Happy Tails Plugin
 * Plugin URI: http://phoenix.sheridan.on.ca/~ccit2662
 * Description: This is the Happy Tails plugin
 * Author: Tiffany Sam, Daniel Berdusco, Shannon Revie
 * Version: 1.0
 * Author URI: http://phoenix.sheridanc.on.ca/~ccit2662
 */

// Add Self-Closing shortcode. The user can add the code [my_shortcode] to any page to put this plugin specifically on that page. 
function my_shortcode() {
return "<p>I&apos;m a happytailsplugin shortcode coder</p>";
}
add_shortcode( 'my_shortcode', 'my_shortcode' ); 

// Creates an administrative menu in the back end, where the user can customize information in the plugin. 
function tds_happytails_add_admin_menu(  ) { 

	add_menu_page( 'Happy Tails Plugin', 'Happy Tails Plugin', 'manage_options', 'happy_tails_plugin', 'happy_tails_plugin_options_page', 'dashicons-admin-network', 66 );

}

// Registers the plugin.
function tds_happytails_settings_init(  ) { 

	register_setting( 'plugin_page', 'tds_happytails_settings' );
	
	add_settings_section(
		'tds_happytails_plugin_page_section', 
		__( 'Pet description', 'TDS' ), 
		'tds_happytails_settings_section_callback', 
		'plugin_page'
	);
	
// Creates fields in the back end for the user to enter characteristics of the pet. The user can enter these characteristics in the fields and it will be displayed on the site.
// This is the field for inputting the name of the pet	
	add_settings_field( 
		'tds_happytails_text_field_0', 
		__( 'Enter name', 'TDS' ), 
		'tds_happytails_text_field_0_render', 
		'plugin_page', 
		'tds_happytails_plugin_page_section' 
	);

// This is the field for inputting the age of the pet.	
	add_settings_field( 
		'tds_happytails_textarea_field_1', 
		__( 'Enter age', 'TDS' ), 
		'tds_happytails_textarea_field_1_render', 
		'plugin_page', 
		'tds_happytails_plugin_page_section' 
	);

// This is the field for choosing the gender of the pet. There are two options (female or male) that appear as a dropdown menu so the user can only choose one.
	add_settings_field( 
		'tds_happytails_select_field_2', 
		__( 'Choose gender', 'TDS' ), 
		'tds_happytails_select_field_2_render', 
		'plugin_page', 
		'tds_happytails_plugin_page_section' 
	);

// This is the field for inputting the breed of the pet.
	add_settings_field( 
		'tds_happytails_textarea_field_3', 
		__( 'Enter breed', 'TDS' ), 
		'tds_happytails_textarea_field_3_render', 
		'plugin_page', 
		'tds_happytails_plugin_page_section' 
	);

// This is the field for choosing the species of the pet. This appears as a dropdown menu, where the user can select one of the three (cat, dog, fish) options.
	add_settings_field( 
		'tds_happytails_select_field_4', 
		__( 'Choose species', 'TDS' ), 
		'tds_happytails_select_field_4_render', 
		'plugin_page', 
		'tds_happytails_plugin_page_section' 
	);

}

// Prints out the name that the user enters in the back end of the plugin. 
function tds_happytails_text_field_0_render() { 
	// Get the options
	$options = get_option( 'tds_happytails_settings' );
	?>
	<textarea cols="40" rows="5" name="tds_happytails_settings[tds_happytails_text_field_0]"> 
		<?php if (isset($options['tds_happytails_text_field_0'])) echo $options['tds_happytails_text_field_0']; ?>
 	</textarea>
	<?php
}

// Prints out the age that the user enters in the back end of the plugin. 
function tds_happytails_textarea_field_1_render() { 
	// Get the options
	$options = get_option( 'tds_happytails_settings' );
	?>
	<textarea cols="40" rows="5" name="tds_happytails_settings[tds_happytails_textarea_field_1]"> 
		<?php if (isset($options['tds_happytails_textarea_field_1'])) echo $options['tds_happytails_textarea_field_1']; ?>
 	</textarea>
	<?php
}

// Shows the gender that the user chose in the back end of the plugin. 
function tds_happytails_select_field_2_render() { 
	// Get the options
	$options = get_option( 'tds_happytails_settings' );
	?>
	<select name="tds_happytails_settings[tds_happytails_select_field_2]">
		<option value="Male" <?php if (isset($options['tds_happytails_select_field_4'])) selected( $options['tds_happytails_select_field_4'], 1 ); ?>>Male</option>
		<option value="Female" <?php if (isset($options['tds_happytails_select_field_4'])) selected( $options['tds_happytails_select_field_4'], 2 ); ?>>Female</option>
	</select>
<?php
}

// Prints out the breed that the user enters in the back end of the plugin. 
function tds_happytails_textarea_field_3_render() { 
	// Get the options
	$options = get_option( 'tds_happytails_settings' );
	?>
	<textarea cols="40" rows="5" name="tds_happytails_settings[tds_happytails_textarea_field_3]"> 
		<?php if (isset($options['tds_happytails_textarea_field_3'])) echo $options['tds_happytails_textarea_field_3']; ?>
 	</textarea>
	<?php
}

// Shows the species that the user chose in the back end of the plugin. 
function tds_happytails_select_field_4_render() { 
	// Get the options
	$options = get_option( 'tds_happytails_settings' );
	?>
	<select name="tds_happytails_settings[tds_happytails_select_field_4]">
		<option value="Cat" <?php if (isset($options['tds_happytails_select_field_4'])) selected( $options['tds_happytails_select_field_4'], 1 ); ?>>Cat</option>
		<option value="Dog" <?php if (isset($options['tds_happytails_select_field_4'])) selected( $options['tds_happytails_select_field_4'], 2 ); ?>>Dog</option>
		<option value="Fish" <?php if (isset($options['tds_happytails_select_field_4'])) selected( $options['tds_happytails_select_field_4'], 3 ); ?>>Fish</option>
	</select>
<?php
}

function tds_happytails_settings_section_callback() { 
	echo __( 'Enter information about the pet here.', 'TDS' );
}

// This is the options page menu for the happy tails plugin page. It creates the form for all the options and it displays the heading "Happy Tails Plugin". 
function happy_tails_plugin_options_page() { 
	?>
	<form action="options.php" method="post">
		
		<h2>Happy Tails Plugin</h2>
		
		<?php
		// Creates the "save changes" button on the administration (options) page. 
		settings_fields( 'plugin_page' );
		do_settings_sections( 'plugin_page' );
		submit_button();
		?>
		
	</form>
	<?php

}

/* Initialize the menu and settings */ 
add_action( 'admin_menu', 'tds_happytails_add_admin_menu' );
add_action( 'admin_init', 'tds_happytails_settings_init' );	

// These are all the options that appear on the front end of the website.
function happy_tails_plugin_callit(){
	$options = get_option( 'tds_happytails_settings' );
	echo '<img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSAfCcSQgVQYMjN9VkGe1cOSHppXtd8uUNcwiyzSlJVrFDBzN954w4T0DI"' . $options['tds_happytails_text_field_0'] . '" />';
	echo '<p>Name: ' . $options['tds_happytails_text_field_0'] . '</p>';
	echo '<p>Age: ' . $options['tds_happytails_textarea_field_1'] . '</p>';
	echo '<p>Gender: ' . $options['tds_happytails_select_field_2'] . '</p>';
	echo '<p>Breed: ' . $options['tds_happytails_textarea_field_3'] . '</p>';
	echo '<p>Species: ' . $options['tds_happytails_select_field_4'] . '</p>';
}	

// Filters the content
add_filter('the_content', 'happy_tails_plugin_callit');	


?>
