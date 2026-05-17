<?php

/**
* The admin-specific functionality of the plugin.
*
* @link       https://plugin.nl
* @since      1.0.0
*
* @package    Browser_Tab_Title_Reminder
* @subpackage Browser_Tab_Title_Reminder/admin
*/

/**
* The admin-specific functionality of the plugin.
*
* Defines the plugin name, version, and two examples hooks for how to
* enqueue the admin-specific stylesheet and JavaScript.
*
* @package    Browser_Tab_Title_Reminder
* @subpackage Browser_Tab_Title_Reminder/admin
* @author     Tim van Iersel <tim@plugin.nl>
*/
class Browser_Tab_Title_Reminder_Admin {

	/**
	* The version of this plugin.
	*
	* @since    1.0.0
	* @access   private
	* @var      string    $version    The current version of this plugin.
	*/
	private $version;

	/**
	* Initialize the class and set its properties.
	*
	* @since    1.0.0
	* @param      string    $version    The version of this plugin.
	*/
	public function __construct( $version ) {

		$this->version = $version;

	}


	/**
	* Render the settings page for this plugin.
	*
	* @since    1.0.0
	*/

	public function display_plugin_setup_page() {
		include_once( 'partials/browser-tab-title-reminder-admin-display.php' );
	}


	/**
	* Register the administration menu for this plugin into the WordPress Dashboard menu.
	*
	* @since    1.0.0
	*/

	public function add_plugin_admin_menu() {

		add_options_page( 'Change the browser tab title on inactive tab', 'Browser tab title', 'manage_options', 'browser-tab-title-reminder', array($this, 'display_plugin_setup_page')
	);
}

/**
* Add settings action link to the plugins page.
*
* @since    1.0.0
*/

public function add_action_links( $links ) {
	/*
	*  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
	*/
	$settings_link = array(
		'<a href="' . esc_url( admin_url( 'options-general.php?page=browser-tab-title-reminder' ) ) . '">' . esc_html__( 'Settings', 'browser-tab-title-reminder' ) . '</a>',
	);
	return array_merge(  $settings_link, $links );

}


public function options_update() {
	register_setting('browser-tab-title-reminder', 'browser-tab-title-reminder', array($this, 'validate'));
}


public function validate( array $input ) {


	$valid = array();
	if(isset($input['bttr_delay'])){
		$valid['bttr_delay'] = intval($input['bttr_delay']);
	}

	$valid['bttr_title'] = sanitize_text_field($input['bttr_title']);

	return $valid;
}


}
