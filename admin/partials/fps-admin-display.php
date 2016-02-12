<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Facebook-Page-Stats
 * @subpackage Facebook-Page-Stats/admin/partials
 */


// Admin options page
function fps_display_settings() {

    $page_url = (get_option('fps_page_url') != '') ? get_option('fps_page_url') : 'www.domain.co.uk';
    $page_stats = dataCheck($page_url);

    $html = '</pre>
		<div class="wrap"><form action="options.php" method="post" name="options">
		<h1>Facebook Page Stats</h1>
		' . wp_nonce_field('update-options') . '
		<table class="form-table" width="100%" cellpadding="10">
		<tbody>
		<tr>
		<td scope="row" align="left">
		 <h2><label class="label">Page URL:</label></h2>
		<input type="text" name="fps_page_url" value="' . $page_url . '" /></td>
		</tr>
		
		</tbody>
		</table>
		 <input type="hidden" name="action" value="update" />
		
		 <input type="hidden" name="page_options" value="fps_page_url" />
		
		 <input type="submit" name="Submit" value="Update" /></form></div>
		 <hr>
		 <h2>Page Stats:</h2>
		 	<div class="stats-box">
			<p><strong>Like Count:</strong> '.$page_stats[0][1].'</p>
			<p><strong>Share Count:</strong> '.$page_stats[1][1].'</p>
			<p><strong>Comments Count:</strong> '.$page_stats[2][1].'</p>
		</div>
		<pre>';

  	echo $html;
}

?>