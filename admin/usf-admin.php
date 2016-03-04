<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wordpress.org/plugins/url-stats-from-facebook/
 * @since      1.0.1
 *
 * @package    URL-Stats-Facebook
 * @subpackage URL-Stats-Facebook/admin
 */

class usf_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * 
	 * @access   private
	 * @var      string    $Plugin_Name    The ID of this plugin.
	 */
	private $Plugin_Name;

	/**
	 * The version of this plugin.
	 *
	 * 
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * 
	 * @param      string    $Plugin_Name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Plugin_Name, $version ) {

		$this->Plugin_Name = $Plugin_Name;
		$this->version = $version;
		
		
				// add_action( 'admin_menu', array( &$this, 'add_menu' ) );


	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * 
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->Plugin_Name, plugin_dir_url( __FILE__ ) . 'css/usf-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * 
	 */
	// public function enqueue_scripts() {

	// 	/**
	// 	 * This function is provided for demonstration purposes only.
	// 	 *
	// 	 * An instance of this class should be passed to the run() function
	// 	 * defined in Plugin_Name_Loader as all of the hooks are defined
	// 	 * in that particular class.
	// 	 *
	// 	 * The Plugin_Name_Loader will then create the relationship
	// 	 * between the defined hooks and the functions defined in this
	// 	 * class.
	// 	 */

	// 	wp_enqueue_script( $this->Plugin_Name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-admin.js', array( 'jquery' ), $this->version, false );

	// }
	
	
		

}
