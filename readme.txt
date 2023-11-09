=== JSM Non-Breaking Space (nbsp) for French Content ===
Plugin Name: JSM Non-Breaking Space (nbsp) for French Content
Plugin Slug: nbsp-french
Text Domain: nbsp-french
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://jsmoriss.github.io/nbsp-french/assets/
Tags: nbsp; non-breaking, french, content, line-break, punctuation
Contributors: jsmoriss
Requires PHP: 7.2.34
Requires At Least: 5.5
Tested Up To: 6.4.1
Stable Tag: 1.13.0

Adds a non-breaking space between (nbsp) words and punctuation marks to avoid inappropriate line-breaks in French.

== Description ==

This plugin converts spaces to HTML non-breaking space entities (ie. `&nbsp;`) in the content, excerpt, comments, text widget, and WooCommerce short description as required by French language punctuation rules.

If the `<!--:fr-->` HTML  tag is found (used by some multilingual plugins), non-breaking spaces are added only between the `<!--:fr-->` and `<!--:-->` HTML tags.

There are no plugin settings - simply install and activate the plugin.

== Installation ==

== Frequently Asked Questions ==

== Screenshots ==

== Changelog ==

<h3 class="top">Version Numbering</h3>

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes and/or incompatible API changes (ie. breaking changes).
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

<h3>Repositories</h3>

* [GitHub](https://jsmoriss.github.io/nbsp-french/)
* [WordPress.org](https://plugins.trac.wordpress.org/browser/nbsp-french/)

<h3>Changelog / Release Notes</h3>

**Version 1.13.0 (2023/04/21)**

* **New Features**
	* None.
* **Improvements**
	* Added 'svg' to the list of excluded HTML tags (which includes HTML comments, 'pre', 'script', and 'style').
* **Bugfixes**
	* None.
* **Developer Notes**
	* None.
* **Requires At Least**
	* PHP v7.2.34.
	* WordPress v5.5.

== Upgrade Notice ==

= 1.13.0 =

(2023/04/21) Added 'svg' to the list of excluded HTML tags (which includes HTML comments, 'pre', 'script', and 'style').

