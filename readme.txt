=== JSM's Non-Breaking Space for French Content ===
Plugin Name: JSM's Non-Breaking Space for French Content
Plugin Slug: nbsp-french
Text Domain: nbsp-french
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://jsmoriss.github.io/nbsp-french/assets/
Tags: non-breaking, french, content, line-break, punctuation, space, new line, line break
Contributors: jsmoriss
Requires PHP: 5.5
Requires At Least: 3.8
Tested Up To: 5.0
Stable Tag: 1.9.0

Adds a non-breaking space between words and punctuation marks to avoid inappropriate line-breaks in French.

== Description ==

This plugin adds non-breaking spaces required by the French language in the content, excerpt, comments, text widget, and WooCommerce short description &mdash; skipping over pre-formatted code blocks, styles and scripts. 

If the `<!--:fr-->` HTML  tag is found (used by some multilingual plugins), non-breaking spaces are added only between the `<!--:fr-->` and `<!--:-->` HTML tags.

There are no plugin settings &mdash; simply *install* and *activate* the plugin.

= Filters for Developers =

**'nbsp_french_add_filters' ( array $filter_names )**

An associative array of filter names (and priority) for the plugin to hook.

<pre>
array(
	'the_title'                     => 10,
	'the_content'                   => 10,
	'the_excerpt'                   => 10,
	'comment_text'                  => 10,
	'widget_title'                  => 10,
	'widget_text'                   => 10,
	'woocommerce_short_description' => 10,
)
</pre>

To hook additional filters, include their names (and priority) in the 'nbsp_french_add_filters' array, or hook them individually in your functions.php:

<pre>
add_filter( 'another_text_filter_name',
	array( 'NbspFrench', 'filter' ), 10, 1 );
</pre>

**'nbsp_french_currencies' ( $regex )**

A regular expression of recognized currency symbols.

== Installation ==

= Automated Install =

1. Go to the wp-admin/ section of your website.
1. Select the *Plugins* menu item.
1. Select the *Add New* sub-menu item.
1. In the *Search* box, enter the plugin name.
1. Click the *Search Plugins* button.
1. Click the *Install Now* link for the plugin.
1. Click the *Activate Plugin* link.

= Semi-Automated Install =

1. Download the plugin ZIP file.
1. Go to the wp-admin/ section of your website.
1. Select the *Plugins* menu item.
1. Select the *Add New* sub-menu item.
1. Click on *Upload* link (just under the Install Plugins page title).
1. Click the *Browse...* button.
1. Navigate your local folders / directories and choose the ZIP file you downloaded previously.
1. Click on the *Install Now* button.
1. Click the *Activate Plugin* link.

== Frequently Asked Questions ==

== Screenshots ==

== Changelog ==

<h3 class="top">Version Numbering</h3>

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes / re-writes or incompatible API changes.
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

<h3>Repositories</h3>

* [GitHub](https://jsmoriss.github.io/nbsp-french/)
* [WordPress.org](https://plugins.trac.wordpress.org/browser/nbsp-french/)

<h3>Changelog / Release Notes</h3>

**Version 1.9.0 (2018/09/26)**

* *New Features*
	* None.
* *Improvements*
	* Added a hook for the 'woocommerce_short_description' filter.
* *Bugfixes*
	* None.
* *Developer Notes*
	* Maintenance release.

== Upgrade Notice ==

= 1.9.0 =

(2018/09/26) Added a hook for the 'woocommerce_short_description' filter.

