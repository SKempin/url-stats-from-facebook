<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://wordpress.org/plugins/url-stats-from-facebook/
 * @since      1.0.1
 *
 * @package    URL-Stats-Facebook
 * @subpackage URL-Stats-Facebook/includes
 */

class usf_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * 
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'plugin-name',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
