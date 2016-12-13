=== JSM's Non-Breaking Space for French Content ===
Plugin Name: JSM's Non-Breaking Space for French Content
Plugin Slug: nbsp-french
Text Domain: nbsp-french
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Donate Link: https://www.paypal.me/jsmoriss
Assets URI: https://jsmoriss.github.io/nbsp-french/assets/
Tags: nbsp, french, exclamation, question, interrogation, line-break
Contributors: jsmoriss
Requires At Least: 3.7
Tested Up To: 4.7
Stable Tag: 1.8.0-1

Adds a non-breaking space between words and punctuation marks to avoid inappropriate line-breaks in French.

== Description ==

This plugin will add non-breaking spaces where appropriate in the content, excerpt, comments, and text widget &mdash; skipping over pre-formatted code blocks and scripts &mdash; and if the `<!--:fr-->` HTML  tag is found, non-breaking spaces will be added only between the `<!--:fr-->` and `<!--:-->` HTML tags.

= Recognized Punctuation =

* !
* ?
* :
* ;
* %
* &laquo;
* &raquo;
* Currency symbols and numeric thousands (example: 1 000,10 $).

= Developer Filters =

*'nbsp_french_filter_priority' ( $priority )* &mdash; The default filter priority (default: 10).

*'nbsp_french_add_filters' ( array $names )* &mdash; The default filter list to hook (default: 'the_title', 'the_content', 'the_excerpt', 'comment_text', 'widget_title', 'widget_text' ).

*'nbsp_french_filter_'.$name ( $bool )* &mdash; Hook the filter name (default: true).

*'nbsp_french_currencies' ( $pcre )* &mdash; A list of recognized currencies.

*'nbsp_french_preg_first_second_last' ( array $pattern )* &mdash; An array of patterns to match. Spaces are replaced in the second set of parenthesis, and the returned string corresponds to the first, second, and last set of parenthesis.

To hook additional text filters, include their names in the 'nbsp_french_add_filters' array, or hook them individually in your functions.php file:

<pre>
add_filter( $filter_name, array( 'NbspFrench', 'filter' ) );
</pre>

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

= Version Numbering Scheme =

Version components: `{major}.{minor}.{bugfix}-{stage}{level}`

* {major} = Major code changes / re-writes or significant feature changes.
* {minor} = New features / options were added or improved.
* {bugfix} = Bugfixes or minor improvements.
* {stage}{level} = dev &lt; a (alpha) &lt; b (beta) &lt; rc (release candidate) &lt; # (production).

See [PHP's version_compare()](http://php.net/manual/en/function.version-compare.php) documentation for additional information on "PHP-standardized" version numbering.

= Changelog / Release Notes =

**Version 1.7.2-1 (2016/12/04)**

Maintenance release.

* *New Features*
	* None
* *Improvements*
	* Added support for currency symbols and numeric thousands (example: 1 000,10 $).
* *Bugfixes*
	* None
* *Developer Notes*
	* Added a callback to the preg_replace() function to replace spaces in the second set of parenthesis, and return a string corresponding to the first, second, and last set of parenthesis.
	* Renamed the 'nbsp_french_preg_pattern' filter by 'nbsp_french_preg_first_second_last'.
	* Removed the 'nbsp_french_preg_replace' filter.

**Version 1.7.2-1 (2016/12/04)**

Maintenance release.

* *New Features*
	* None
* *Improvements*
	* Added support for &lt;style&gt;&lt;/style&gt; code blocks.
* *Bugfixes*
	* None
* *Developer Notes*
	* None

== Upgrade Notice ==

= 1.8.0-1 =

(2016/12/13) Added support for currency symbols and numeric thousands (example: 1 000,10 $).

= 1.7.2-1 =

(2016/12/04) Added support for &lt;style&gt;&lt;/style&gt; code blocks.

