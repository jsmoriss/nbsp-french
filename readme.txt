=== JSM's Non-Breaking Space for French Content ===
Plugin Name: JSM's Non-Breaking Space for French Content
Plugin Slug: nbsp-french
Contributors: jsmoriss
Tags: nbsp, french, exclamation, question, interrogation, line-break
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.txt
Requires At Least: 3.0
Tested Up To: 4.5.3
Stable Tag: 1.6.0

Adds a non-breaking space between words and punctuation marks to avoid inappropriate line-breaks in French.

== Description ==

Adds a non-breaking space between words and punctuation marks to avoid inappropriate line-breaks in French. Recognized punctuation:

* !
* ?
* :
* ;
* %
* &laquo;
* &raquo;

The plugin will add non-breaking spaces where appropriate in the content, excerpt, comments, and text widget &mdash; skipping over pre-formatted code blocks and scripts &mdash; and if the `<!--:fr-->` HTML  tag is found, non-breaking spaces are only added between the `<!--:fr-->` and `<!--:-->` HTML tags.

== Installation ==

= Automated Install =

1. Go to the wp-admin/ section of your website
1. Select the *Plugins* menu item
1. Select the *Add New* sub-menu item
1. In the *Search* box, enter the plugin name
1. Click the *Search Plugins* button
1. Click the *Install Now* link for the plugin
1. Click the *Activate Plugin* link

= Semi-Automated Install =

1. Download the plugin archive file
1. Go to the wp-admin/ section of your website
1. Select the *Plugins* menu item
1. Select the *Add New* sub-menu item
1. Click on *Upload* link (just under the Install Plugins page title)
1. Click the *Browse...* button
1. Navigate your local folders / directories and choose the zip file you downloaded previously
1. Click on the *Install Now* button
1. Click the *Activate Plugin* link

== Frequently Asked Questions ==

= Frequently Asked Questions =

* None

== Other Notes ==

= Additional Documentation =

* None

== Screenshots ==

== Changelog ==

= Repositories =

* [GitHub](https://github.com/jsmoriss/nbsp-french)
* [WordPress.org](https://wordpress.org/plugins/nbsp-french/developers/)

= Changelog / Release Notes =

**Version 1.6.0 (2016/01/14)**

* *New Features*
	* Added hooks for 'the_title' and 'widget_title' filters.
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Moved the nbsp_french_filter() function to a NbspFrench::filter() static method.

== Upgrade Notice ==

= 1.6.0 =

2016/01/14 - Added a hook for 'the_title' filter. Moved the nbsp_french_filter() function to a NbspFrench::filter() static method.

