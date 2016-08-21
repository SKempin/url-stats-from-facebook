<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://wordpress.org/plugins/url-stats-from-facebook/
 * @since      1.0.1
 *
 * @package    URL-Stats-Facebook
 * @subpackage URL-Stats-Facebook/admin/partials
 */


// Admin options page
function usf_display_settings() {

    $page_url = (get_option('usf_page_url') != '') ? get_option('usf_page_url') : 'theanthemics';
        // $access_token = (get_option('at') != '') ? get_option('at') : 'theanthemics';

    // $access_token = (get_option('at') != '');
    $page_stats = usf_dataCheck($page_url);

   // $id = $GLOBALS [$fbg_array]['id'];

    $html = '</pre>
		<div class="wrap"><form action="options.php" method="post" name="options">
		<h1>URL Stats from Facebook</h1>'.$GLOBALS [$fbg_array]['id'].'
				 				<p><strong>Page About:</strong> '.$GLOBALS [$fbg_array] ['about'].'</p>

		' . wp_nonce_field('update-options') . '
		<table class="form-table" width="100%" cellpadding="10">
		<tbody>
		<tr>
		<td scope="row" align="left">
		 <h2><label class="label">Facebook Page ID:</label></h2>
		www.facebook.com/<input type="text" name="usf_page_url" value="' . $page_url . '" /></td>

		<h2><label class="label">access token</label></h2>

		</tr>

		</tbody>
		</table>
		 <input type="hidden" name="action" value="update" />

		 <input type="hidden" name="page_options" value="at" />


		 <input type="hidden" name="page_options" value="usf_page_url" />

		 <input type="submit" name="Submit" value="Update" /></form></div>
		 <hr>
		 <h2>URL Stats:</h2>
		 	<div class="stats-box">

			<p><strong>Fans Count:</strong> '.number_format($GLOBALS [$fbg_array] ['fan_count']).'</p>
			<p><strong>Talking About Count:</strong> '.$GLOBALS [$fbg_array] ['talking_about_count'].'</p>
			<p><strong>Checkins  Count:</strong> '.$GLOBALS [$fbg_array] ['checkins'].'</p>
			<p><strong>Were Here  Count:</strong> '.$GLOBALS [$fbg_array] ['were_here_count'].'</p>

							<p><strong>Last  Status:</strong> '.$GLOBALS [$fbg_array]['posts']['data'][0]['message'].'</p>
							<p><strong>Last  Rating:</strong> '.$GLOBALS [$fbg_array]['ratings']['data'][0]['review_text'].'</p>
														<p><strong>Last  Rating Reviewer:</strong> '.$GLOBALS [$fbg_array]['ratings']['data'][0]['reviewer']['name'].'</p>


		</div>
		<pre>';

  	echo $html;
}

?>