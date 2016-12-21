<?php
/*
 * Plugin Name: JSM's Non-Breaking Space for French Content
 * Text Domain: nbsp-french
 * Domain Path: /languages
 * Plugin URI: https://surniaulula.com/extend/plugins/nbsp-french/
 * Assets URI: https://jsmoriss.github.io/nbsp-french/assets/
 * Author: JS Morisset
 * Author URI: https://surniaulula.com/
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Description: Adds a non-breaking space between words and punctuation marks to avoid inappropriate line-breaks in French.
 * Requires At Least: 3.7
 * Tested Up To: 4.7
 * Version: 1.8.1-1
 *
 * Version Components: {major}.{minor}.{bugfix}-{stage}{level}
 *
 *	{major}		Major code changes / re-writes or significant feature changes.
 *	{minor}		New features / options were added or improved.
 *	{bugfix}	Bugfixes or minor improvements.
 *	{stage}{level}	dev < a (alpha) < b (beta) < rc (release candidate) < # (production).
 *
 * See PHP's version_compare() documentation at http://php.net/manual/en/function.version-compare.php.
 * 
 * This script is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 3 of the License, or (at your option) any later
 * version.
 * 
 * This script is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU General Public License for more details at
 * http://www.gnu.org/licenses/.
 * 
 * Copyright 2012-2016 Jean-Sebastien Morisset (https://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'NbspFrench' ) ) {

	class NbspFrench {

		protected static $instance = null;

		public static function &get_instance() {
			if ( self::$instance === null )
				self::$instance = new self;
			return self::$instance;
		}

		public function __construct() {
			foreach ( apply_filters( 'nbsp_french_add_filters', array( 
				'the_title' => 10,
				'the_content' => 10,
				'the_excerpt' => 10,
				'comment_text' => 10,
				'widget_title' => 10,
				'widget_text' => 10,
			) ) as $filter_name => $filter_prio )
				add_filter( $filter_name, array( __CLASS__, 'filter' ), $filter_prio );
		}

		public static function filter( $text ) {
			$new_text = '';
			$has_french = $default = strpos( $text, '<!--:fr-->' ) !== false ? false : true;

			// http://character-code.com/currency-html-codes.php
			$currencies = apply_filters( 'nbsp_french_currencies',
				'¤|&curren;|\$|¢|&cent;|£|&pound;|¥|&yen;|₣|&#8355;|€|&euro;' );

			// add newlines before / after HTML comments, pre, script, and style code blocks
			$text = preg_replace( '/\r?\n?<(!--|pre|script|style)/i', "\n".'<$1', $text );
			$text = preg_replace( '/(--|\/pre|\/script|\/style)>\r?\n?/i', '$1>'."\n", $text );
		
			$pattern = apply_filters( 'nbsp_french_preg_first_second_last', array( 
				'/(«|&laquo;)( )(\w)/u',		// quotation followed by word
				'/(\w)( )([!\?:;%»]|&raquo;)/u',	// word followed by puntuation
				'/([\.!\?])( )(»|&raquo;)/u',		// punctuation followed by quotation
				'/( \d{1,3})(( \d{3,3})+)([\., ])/u',	// 1 000, 1 000 000, etc.
				'/(\d)( )('.$currencies.')/u',		// number followed by currency symbol
			) );
		
			foreach ( preg_split( '/((\r?\n)|(\r\n?))/', $text) as $line) {
		
				if ( ! $has_french && strpos( $line, '<!--:fr-->' ) ) {
					$has_french = $default = true;
					$new_text .= $line."\n";
					continue;
				} elseif ( $has_french && strpos( $line, '<!--:-->' ) ) {
					$has_french = $default = false;
					$new_text .= $line."\n";
					continue;
				} elseif ( preg_match( '/(--|\/pre|\/script|\/style)>/i', $line ) ) {
					$has_french = $default;	// back to default
					$new_text .= $line."\n";
					continue;
				} elseif ( preg_match( '/<(!--|pre|script|style)/i', $line ) ) {
					$has_french = false;
					$new_text .= $line."\n";
					continue;
				}
		
				if ( $has_french )
					$line = preg_replace_callback( $pattern, 
						array( __CLASS__, 'get_first_second_last' ), $line );

				$new_text .= $line."\n";
			}

			return rtrim( $new_text );	// remove last newline character
		}

		// replace space with non-breaking space in second element
		// returns first, second, and last elements as a string
		private static function get_first_second_last( $match ) {
			$last_num = count( $match ) - 1;
			$second_str = str_replace( ' ', '&nbsp;', $match[2] );
			return $match[1].$second_str.$match[$last_num];
		}
	}

        global $nbsp_french;
	$nbsp_french = NbspFrench::get_instance();
}

?>
