<?php
/*
 * Plugin Name: Happy Tails Plugin
 * Plugin URI: http://phoenix.sheridan.on.ca/~ccit2662
 * Description: This is the Happy Tails plugin
 * Author: Code Diva
 * Version: 1.0
 * Author URI: http://phoenix.sheridanc.on.ca/~ccit2662
 */

// Add Self-Closing Shortcode
function my_shortcode() {
return "<p>I&apos;m a super-awesome
shortcode coder</p>";
}
add_shortcode( 'my_shortcode',
'my_shortcode' ); 
 
function tds_happytails_add_admin_menu(  ) { 

	add_menu_page( 'Happy Tails Plugin', 'Happy Tails Plugin', 'manage_options', 'happy_tails_plugin', 'happy_tails_plugin_options_page', 'dashicons-admin-network', 66 );

}

function tds_happytails_settings_init(  ) { 

	register_setting( 'plugin_page', 'tds_happytails_settings' );
	
	add_settings_section(
		'tds_happytails_plugin_page_section', 
		__( 'Description for the section', 'TDS' ), 
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
		'tds_happytails_text_field_1', 
		__( 'Enter age', 'TDS' ), 
		'tds_happytails_text_field_0_render', 
		'plugin_page', 
		'tds_happytails_plugin_page_section' 
	);

// This is the field for inputting the name of the pet. There are two options (female or male) that appear as radio buttons so the user can only choose one.
	add_settings_field( 
		'tds_happytails_radio_field_2', 
		__( 'Choose gender', 'TDS' ), 
		'tds_happytails_radio_field_2_render', 
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

function tds_happytails_text_field_0_render() { 
	$options = get_option( 'tds_happytails_settings' );
	?>
	<input type="text" name="tds_happytails_settings[tds_happytails_text_field_0]" value="<?php if (isset($options['tds_happytails_text_field_0'])) echo $options['tds_happytails_text_field_0']; ?>">
	<?php
}

function tds_happytails_checkbox_field_1_render() { 
	$options = get_option( 'tds_happytails_settings' );
	?>
	<input type="checkbox" name="tds_happytails_settings[tds_happytails_checkbox_field_1]" <?php if (isset($options['tds_happytails_checkbox_field_1'])) checked( $options['tds_happytails_checkbox_field_1'], 1 ); ?> value="">
	<?php
}

// This shows the radio button values (gender) and tells the plugin to display the value of the chosen radio button in the front end.
function tds_happytails_radio_field_2_render() { 
	$options = get_option( 'tds_happytails_settings' );
	?>
	<input type="radio" name="tds_happytails_settings[tds_happytails_radio_field_2]" value="female"> <?php if (isset($options['tds_happytails_radio_field_2'])) checked( $options['tds_happytails_radio_field_2'], 1 ); ?> value="<?php if (isset($options['tds_happytails_text_field_0'])) echo $options['tds_happytails_radio_field_2']; ?>">
	<?php
}

function tds_happytails_textarea_field_3_render() { 
	$options = get_option( 'tds_happytails_settings' );
	?>
	<textarea cols="40" rows="5" name="tds_happytails_settings[tds_happytails_textarea_field_3]"> 
		<?php if (isset($options['tds_happytails_textarea_field_3'])) echo $options['tds_happytails_textarea_field_3']; ?>
 	</textarea>
	<?php
}

// This shows the three values in the dropdown menu.
function tds_happytails_select_field_4_render() { 
	$options = get_option( 'tds_happytails_settings' );
	?>
	<select name="tds_happytails_settings[tds_happytails_select_field_4]">
		<option value="1" <?php if (isset($options['tds_happytails_select_field_4'])) selected( $options['tds_happytails_select_field_4'], 1 ); ?>>Cat</option>
		<option value="2" <?php if (isset($options['tds_happytails_select_field_4'])) selected( $options['tds_happytails_select_field_4'], 2 ); ?>>Dog</option>
		<option value="3" <?php if (isset($options['tds_happytails_select_field_4'])) selected( $options['tds_happytails_select_field_4'], 3 ); ?>>Fish</option>
	</select>
<?php
}


function tds_happytails_settings_section_callback() { 
	echo __( 'More of a description and detail about the section.', 'TDS' );
}

function happy_tails_plugin_options_page() { 
	?>
	<form action="options.php" method="post">
		
		<h2>Happy Tails Plugin</h2>
		
		<?php
		settings_fields( 'plugin_page' );
		do_settings_sections( 'plugin_page' );
		submit_button();
		?>
		
	</form>
	<?php

}

add_action( 'admin_menu', 'tds_happytails_add_admin_menu' );
add_action( 'admin_init', 'tds_happytails_settings_init' );	


function happy_tails_plugin_callit(){
	$options = get_option( 'tds_happytails_settings' );
	echo '<img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSAfCcSQgVQYMjN9VkGe1cOSHppXtd8uUNcwiyzSlJVrFDBzN954w4T0DI"' . $options['tds_happytails_text_field_0'] . '" />';
	echo '<p>Name: ' . $options['tds_happytails_checkbox_field_1'] . '</p>';
	echo '<p>Age: ' . $options['tds_happytails_radio_field_2'] . '</p>';
	echo '<p>Breed: ' . $options['tds_happytails_textarea_field_3'] . '</p>';
	echo '<p>Size: ' . $options['tds_happytails_select_field_4'] . '</p>';
}	

add_filter('the_content', 'happy_tails_plugin_callit');	


?>