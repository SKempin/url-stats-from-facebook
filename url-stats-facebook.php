<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wordpress.org/plugins/url-stats-from-facebook/
 * @since             1.0.1
 * @package           URL-Stats-Facebook
 *
 * @wordpress-plugin
 * Plugin Name:       URL Stats from Facebook
 * Plugin URI:        https://github.com/SKempin/url-stats-from-facebook
 * Description:       Easily embed the Facebook like, share and comment counts of any URL via Wordpress shortcodes.
 * Version:           1.0.1
 * Author:            Stephen Kempin
 * Author URI:        http://www.stephenkempin.co.uk/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       URL-Stats-Facebook
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
require plugin_dir_path( __FILE__ ) . 'includes/usf.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_usf() {

	$plugin = new usf();
	$plugin->run();

}
run_usf();


// Add plugin options page
include_once plugin_dir_path( __FILE__ ) . 'admin/partials/usf-admin-display.php';
function usf_settings() {
    add_menu_page('URL Stats FB', 'URL Stats FB', 'administrator', 'usf_settings', 'usf_display_settings',  'dashicons-facebook');
}
add_action('admin_menu', 'usf_settings');


// Query for page statistics
function usf_dataCheck($url, $token) {
    $fbg_response = wp_remote_get( 'https://graph.facebook.com/v2.7/'.$url.'/?fields=about%2Cfan_count%2Ctalking_about_count%2Ccheckins%2Cwere_here_count%2Cposts.limit(1)%2Cratings.limit(1)&access_token='.$token.'');
    if ( is_array( $fbg_response ) && ! is_wp_error( $fbg_response ) ) {
        $headers = $fbg_response['headers']; // array of http header lines
        $body = $fbg_response['body']; // use the content
    }
     $GLOBALS [$fbg_array] = json_decode($body, true);
}

// Get URL option from admin
$page = get_option('usf_page_url');
$token = get_option('token');

// Generate Shortcodes
$shortcode_pageURL = $page;
$shortcode_Token = $token;

usf_dataCheck($shortcode_pageURL, $shortcode_Token);

// likes shortcode
function usf_likes() {
	global $shortcode_pageURL;
            global $shortcode_Token;
            $test3 = usf_dataCheck($shortcode_pageURL, $shortcode_Token);
            var_dump($test3);
	echo '<span class="usf-likes">TEST:'.$test3.'</span>';
}
add_shortcode('usf_likes', 'usf_likes');


// // shares shortcode
// function usf_shares() {
// 	global $shortcode_pageURL;
// 	$counts_array = usf_dataCheck($shortcode_pageURL);
// 	echo '<span class="usf-shares">'.$counts_array[1][1].'</span>';
// }
// add_shortcode('usf_shares', 'usf_shares');


// // comments shortcode
// function usf_comments() {
// 	global $shortcode_pageURL;
// 	$counts_array = usf_dataCheck($shortcode_pageURL);
// 	echo '<span class="usf-comments">'.$counts_array[2][1].'</span>';
// }
// add_shortcode('usf_comments', 'usf_comments');