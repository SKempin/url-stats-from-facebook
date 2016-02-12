<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Facebook URL Stats
 *
 * @wordpress-plugin
 * Plugin Name:       Facebook URL Stats
 * Plugin URI:        https://github.com/SKempin/Plugin_Name
 * Description:       Easily embed the Facebook like, share and comment counts of any URL, using Wordpress shortcodes.
 * Version:           1.0.0
 * Author:            Stephen Kempin
 * Author URI:        http://www.stephenkempin.co.uk/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       facebook-URL-stats
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
// function activate_Plugin_Name() {
// 	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-activator.php';
// 	Plugin_Name_Activator::activate();
// }

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
// function deactivate_Plugin_Name() {
// 	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-deactivator.php';
// 	Plugin_Name_Deactivator::deactivate();
// }

// register_activation_hook( __FILE__, 'activate_Plugin_Name' );
// register_deactivation_hook( __FILE__, 'deactivate_Plugin_Name' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/fus.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_Plugin_Name() {

	$plugin = new Plugin_Name();
	$plugin->run();

}
run_Plugin_Name();



// Add plugin options page
include_once plugin_dir_path( __FILE__ ) . 'admin/partials/fus-admin-display.php';
function fus_settings() {
    add_menu_page('FB URL Stats', 'FB URL Stats', 'administrator', 'fus_settings', 'fus_display_settings',  'dashicons-facebook');
}
add_action('admin_menu', 'fus_settings');



// Query for page statistics
function dataCheck($url) {

    // get JSON file 
    $fql_string = file_get_contents("https://graph.facebook.com/fql?q=SELECT%20url,%20normalized_url,%20share_count,%20like_count,%20comment_count,%20total_count,%20commentsbox_count,%20comments_fbid,%20click_count%20FROM%20link_stat%20WHERE%20url=%22{$url}%22");
    $GLOBALS [$decoded_json] = json_decode($fql_string);
  
    // set data types to query
    $typesCount = array('like_count', 'share_count', 'comment_count');
    
    // run query function in loop
    foreach ($typesCount as $value) {
    	// query data type and format integer
    	$result = number_format((int) $GLOBALS [$decoded_json]->data[0]->$value, 0, ', ', ', '); 
     	// add values to counts array
        $counts_array[] = [$value, $result];
    }
    
    // return counts array
    return $counts_array;
 
}


// Get URL option from admin
$page = get_option('fus_page_url');


// Generate Shortcodes
$shortcode_pageURL = $page;
// likes shortcode 
function fus_likes() {
	global $shortcode_pageURL;
	$counts_array = dataCheck($shortcode_pageURL);
	echo '<span class="fb-likes">'.$counts_array[0][1].'</span>';
}
add_shortcode('likes', 'fus_likes');


// shares shortcode 
function fus_shares() {
	global $shortcode_pageURL;
	$counts_array = dataCheck($shortcode_pageURL);
	echo '<span class="fb-shares">'.$counts_array[1][1].'</span>';	
}
add_shortcode('shares', 'fus_shares');


// comments shortcode
function fus_comments() {
	global $shortcode_pageURL;
	$counts_array = dataCheck($shortcode_pageURL);
	echo '<span class="fb-comments">'.$counts_array[2][1].'</span>';
}
add_shortcode('comments', 'fus_comments');