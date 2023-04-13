=== JSM's Non-Breaking Space (nbsp) for French Content ===
Plugin Name: JSM's Non-Breaking Space (nbsp) for French Content
Plugin Slug: nbsp-french
Text Domain: nbsp-french
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://jsmoriss.github.io/nbsp-french/assets/
Tags: nbsp; non-breaking, french, content, line-break, punctuation
Contributors: jsmoriss
Requires PHP: 7.2
Requires At Least: 5.5
Tested Up To: 6.2.0
Stable Tag: 1.12.1

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

**Version 1.12.1 (2022/12/13)**

* **New Features**
	* None.
* **Improvements**
	* None.
* **Bugfixes**
	* None.
* **Developer Notes**
	* Fix to exclude possible HTML tag style attribute values like `style="display:none !important;"`.
* **Requires At Least**
	* PHP v7.2.
	* WordPress v5.5.

**Version 1.12.0 (2020/10/20)**

* **New Features**
	* None.
* **Improvements**
	* Added a non-breaking-space between parentheses and punctuation.
* **Bugfixes**
	* None.
* **Developer Notes**
	* None.
* **Requires At Least**
	* PHP v7.2.
	* WordPress v5.2.

== Upgrade Notice ==

= 1.12.1 =

(2022/12/13) Fix to exclude possible HTML tag style attribute values like `style="display:none !important;"`.

= 1.12.0 =

(2020/10/20) Added a non-breaking-space between parentheses and punctuation.

