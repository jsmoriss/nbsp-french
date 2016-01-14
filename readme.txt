=== JSM's Non-Breaking Space for French Content ===
Plugin Name: JSM's Non-Breaking Space for French Content
Plugin Slug: nbsp-french
Contributors: jsmoriss
Tags: nbsp, french, exclamation, question, interrogation, line-break
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.txt
Requires At Least: 3.0
Tested Up To: 4.4
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

*Automated Install*

1. Go to the wp-admin/ section of your website
1. Select the *Plugins* menu item
1. Select the *Add New* sub-menu item
1. In the *Search* box, enter the plugin name
1. Click the *Search Plugins* button
1. Click the *Install Now* link for the plugin
1. Click the *Activate Plugin* link

*Semi-Automated Install*

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

== Changelog ==

= Version 1.6.0 (2016/01/14) =

* **New Features**
	* Added a hook for 'the_title' filter.
* **Improvements**
	* *None*
* **Bugfixes**
	* *None*
* **Developer Notes**
	* Moved the nbsp_french_filter() function to a NbspFrench::filter() static method.

= Version 1.5.2 =

= Version 1.5.3 (2016/01/08) =

* **New Features**
	* *None*
* **Improvements**
	* Updated the plugin name and assets (icons and banner).
* **Bugfixes**
	* *None*
* **Developer Notes**
	* *None*

= Version 1.5.2 =

* **New Features**
	* Added support for an optional NBSP_FRENCH_FILTER_PRIORITY constant to change the default filter hook priority (default is 10).
* **Improvements**
	* *None*
* **Bugfixes**
	* *None*
* **Developer Notes**
	* *None*

== Upgrade Notice ==

= 1.6.0 =

2016/01/14 - Added a hook for 'the_title' filter. Moved the nbsp_french_filter() function to a NbspFrench::filter() static method.

= 1.5.3 =

2016/01/08 - Updated the plugin name and assets (icons and banner).

