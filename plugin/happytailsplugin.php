<?php
/*
 * Plugin Name: Happy Tails Plugin
 * Plugin URI: http://TDS.com
 * Description: This is my happytails plugin
 * Author: Code Diva
 * Version: 1.0
 * Author URI: http://TDS.com
 */


function tds_happytails_add_admin_menu(  ) { 

	add_menu_page( 'Happy Tails Plugin', 'Happy Tails Plugin', 'manage_options', 'happy_tails_plugin', 'happy_tails_plugin_options_page', 'dashicons-hammer', 66 );

}


function tds_happytails_settings_init(  ) { 

	register_setting( 'plugin_page', 'tds_happytails_settings' );
	
	add_settings_section(
		'tds_happytails_plugin_page_section', 
		__( 'Description for the section', 'TDS' ), 
		'tds_happytails_settings_section_callback', 
		'plugin_page'
	);

	add_settings_field( 
		'tds_happytails_text_field_0', 
		__( 'Enter content into the text box', 'TDS' ), 
		'tds_happytails_text_field_0_render', 
		'plugin_page', 
		'tds_happytails_plugin_page_section' 
	);

	add_settings_field( 
		'tds_happytails_checkbox_field_1', 
		__( 'Check your preference', 'TDS' ), 
		'tds_happytails_checkbox_field_1_render', 
		'plugin_page', 
		'tds_happytails_plugin_page_section' 
	);

	add_settings_field( 
		'tds_happytails_radio_field_2', 
		__( 'Choose an option', 'TDS' ), 
		'tds_happytails_radio_field_2_render', 
		'plugin_page', 
		'tds_happytails_plugin_page_section' 
	);

	add_settings_field( 
		'tds_happytails_textarea_field_3', 
		__( 'Enter content into the text area', 'TDS' ), 
		'tds_happytails_textarea_field_3_render', 
		'plugin_page', 
		'tds_happytails_plugin_page_section' 
	);

	add_settings_field( 
		'tds_happytails_select_field_4', 
		__( 'Choose from the dropdown', 'TDS' ), 
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
	<input type="checkbox" name="tds_happytails_settings[tds_happytails_checkbox_field_1]" <?php if (isset($options['tds_happytails_checkbox_field_1'])) checked( $options['tds_happytails_checkbox_field_1'], 1 ); ?> value="1">
	<?php
}


function tds_happytails_radio_field_2_render() { 
	$options = get_option( 'tds_happytails_settings' );
	?>
	<input type="radio" name="tds_happytails_settings[tds_happytails_radio_field_2]" <?php if (isset($options['tds_happytails_radio_field_2'])) checked( $options['tds_happytails_radio_field_2'], 1 ); ?> value="1">
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


function tds_happytails_select_field_4_render() { 
	$options = get_option( 'tds_happytails_settings' );
	?>
	<select name="tds_happytails_settings[tds_happytails_select_field_4]">
		<option value="1" <?php if (isset($options['tds_happytails_select_field_4'])) selected( $options['tds_happytails_select_field_4'], 1 ); ?>>Option 1</option>
		<option value="2" <?php if (isset($options['tds_happytails_select_field_4'])) selected( $options['tds_happytails_select_field_4'], 2 ); ?>>Option 2</option>
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
	echo '<img src="' . $options['tds_happytails_text_field_0'] . '" />';
	echo '<p>Checkbox: ' . $options['tds_happytails_checkbox_field_1'] . '</p>';
	echo '<p>Radio: ' . $options['tds_happytails_radio_field_2'] . '</p>';
	echo '<p>Textarea: ' . $options['tds_happytails_textarea_field_3'] . '</p>';
	echo '<p>Select: ' . $options['tds_happytails_select_field_4'] . '</p>';
}	

add_filter('the_content', 'happy_tails_plugin_callit');	


?>