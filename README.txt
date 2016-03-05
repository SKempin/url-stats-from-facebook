=== URL Stats from Facebook ===
Contributors: skempin
Tags: facebook, embed, posts, pages, social media, counter, count, counters, statistics, likes, shares, comments, reports, like count, share count, comment count
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Quickly and easily get and embed the number of likes, shares and comments that any URL has had on Facebook. 

== Description ==

URL Stats from Facebook uses the Facebook Graph API to query the stats for any URL (including facebook pages). These can then be individually displayed via shortcodes on your posts/pages or embedding in your Wordpress template files.
 
**Features:**

* Simple interface design, showing the stats for the URL 
* Each stat type is wrapped in `<span>` tags with appropriate class name, for easy CSS styling eg. `<span class="usf-likes">` 
* Shortcodes for embedding in posts and pages
* Compatible with all browsers
* No coding required
 
**Shortcode Examples:**
`[usf_likes]`
`[usf_shares]`
`[usf_comments]`


== Installation ==

1. Upload `url-stats-from-facebook` to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Go to 'URL Stats FB' and set the URL of the page you want to query the number of Facebook likes, shares and comments count for.
1. Place `<?php do_action(usf_likes()); ?>`, `<?php do_action(usf_shares()); ?>` or `<?php do_action(usf_comments()); ?>`
2. Use the shortcodes `[usf_likes]`, `[usf_shares]` and `[usf_comments]` in your pages or posts.

== Frequently Asked Questions ==

= How do I use the plugin? =

Use the shortcodes `[usf_likes]`, `[usf_shares]` and `[usf_comments]` in your pages or posts to output the relevant statistics for the URL set under the 'URL Stats FB' settings.

== Screenshots ==

1. Admin - URL Stats FB

== Changelog ==

= 1.0.1 =
* Updating file naming and shortcodes.

= 1.0 =
* Initial release.

