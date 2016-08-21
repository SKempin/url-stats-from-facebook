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



//======================================================================
// PLUGIN OPTIONS PAGE
//======================================================================

include_once plugin_dir_path( __FILE__ ) . 'admin/partials/usf-admin-display.php';
function usf_settings() {
    add_menu_page('URL Stats FB', 'URL Stats FB', 'administrator', 'usf_settings', 'usf_display_settings',  'dashicons-facebook');
}
add_action('admin_menu', 'usf_settings');



//======================================================================
// FACEBOOK GRAPH API QUERY
//======================================================================

/* Query for page statistics */
function usf_dataCheck($url, $token) {
    $fbg_response = wp_remote_get( 'https://graph.facebook.com/v2.7/'.$url.'/?fields=about%2Cfan_count%2Ctalking_about_count%2Ccheckins%2Cwere_here_count%2Cposts.limit(1)%2Cratings.limit(1)&access_token='.$token.'');
    if ( is_array( $fbg_response ) && ! is_wp_error( $fbg_response ) ) {
        $headers = $fbg_response['headers']; // array of http header lines
        $body = $fbg_response['body']; // use the content
    }
     $GLOBALS [$fbg_array] = json_decode($body, true);
}

$page = get_option('usf_page_url');
$token = get_option('usf_token');
usf_dataCheck($page, $token);



//======================================================================
// SHORTCODES
//======================================================================

/* fans / likes */
function usf_likes() {
	return '<div class="usf-likes">'.number_format($GLOBALS [$fbg_array] ['fan_count']).'</div>';
}
add_shortcode('usf_likes', 'usf_likes');


/* talking about */
function usf_talking_about() {
    return '<div class="usf-likes">'.number_format($GLOBALS [$fbg_array] ['talking_about_count']).'</div>';
}
add_shortcode('usf_talking_about', 'usf_talking_about');


/* check-ins */
function usf_checkins() {
    return '<div class="usf-likes">'.number_format($GLOBALS [$fbg_array] ['checkins']).'</div>';
}
add_shortcode('usf_checkins', 'usf_checkins');


/* were here */
function usf_were_here() {
    return '<div class="usf-likes">'.number_format($GLOBALS [$fbg_array] ['were_here_count']).'</div>';
}
add_shortcode('usf_were_here', 'usf_were_here');


/* last status */
function usf_last_status() {
    return '<div class="usf-likes">'.$GLOBALS [$fbg_array]['posts']['data'][0]['message'].'</div>';
}
add_shortcode('usf_last_status', 'usf_last_status');


/* last review / rating */
function usf_last_review() {
    return '<div class="usf-likes">'.$GLOBALS [$fbg_array]['ratings']['data'][0]['review_text'].'</div>';
}
add_shortcode('usf_last_review', 'usf_last_review');


/* last reviewer / rater */
function usf_last_reviewer() {
    return '<div class="usf-likes">'.$GLOBALS [$fbg_array]['ratings']['data'][0]['reviewer']['name'].'</div>';
}
add_shortcode('usf_last_reviewer', 'usf_last_reviewer');
