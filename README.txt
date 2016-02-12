=== Plugin Name ===
Contributors: skempin
Tags: facebook, embed, posts, pages, social media
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily embed the Facebook like, share and comment counts of any URL, using Wordpress shortcodes.

== Description ==

This plugin uses Facebook Query Language (FQL) on the FB API to query the number of likes, shares and comments any URL has had on Facebook.

== Installation ==

1. Upload `Plugin_Name` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Set the URL of the page you want to query the number of Facebook likes, shares and comments count for
1. Place `<?php do_action('fps_likes()'); ?>` in your templates
1. Use the shortcodes ['fps_likes'], ['fps_shares'] and ['fps_comments'] in your pages or posts

== Frequently Asked Questions ==

= How do I use the plugin? =

Use the shortcodes ['fps_likes'], ['fps_shares'] and ['fps_comments'] in your pages or posts to output the relevant statistics for the URL set in the admin area.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
(or jpg, jpeg, gif).
2. This is the second screen shot

== Changelog ==

= 1.0 =
* Initial release.