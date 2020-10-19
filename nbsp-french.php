<?php
/**
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
 * Requires PHP: 5.6
 * Requires At Least: 4.4
 * Tested Up To: 5.5.1
 * Version: 1.12.0-dev.2
 *
 * Version Numbering: {major}.{minor}.{bugfix}[-{stage}.{level}]
 *
 *      {major}         Major structural code changes / re-writes or incompatible API changes.
 *      {minor}         New functionality was added or improved in a backwards-compatible manner.
 *      {bugfix}        Backwards-compatible bug fixes or small improvements.
 *      {stage}.{level} Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).
 *
 * Copyright 2012-2020 Jean-Sebastien Morisset (https://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {

	die( 'These aren\'t the droids you\'re looking for.' );
}

if ( ! class_exists( 'NbspFrench' ) ) {

	class NbspFrench {

		private static $instance = null;

		private static $filters = array(
			'the_title'                     => 10,
			'the_content'                   => 10,
			'the_excerpt'                   => 10,
			'comment_text'                  => 10,
			'widget_title'                  => 10,
			'widget_text'                   => 10,
			'woocommerce_short_description' => 10,
		);

		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'init_textdomain' ) );

			foreach ( apply_filters( 'nbsp_french_add_filters', self::$filters ) as $filter_name => $filter_prio ) {

				add_filter( $filter_name, array( __CLASS__, 'filter' ), $filter_prio );
			}
		}

		public static function &get_instance() {

			if ( null === self::$instance ) {

				self::$instance = new self;
			}

			return self::$instance;
		}

		public function init_textdomain() {

			load_plugin_textdomain( 'nbsp-french', false, 'nbsp-french/languages/' );
		}

		public static function filter( $html ) {

			$fixed_html = '';
			$has_french = $default_is_french = strpos( $html, '<!--:fr-->' ) !== false ? false : true;

			/**
			 * http://character-code.com/currency-html-codes.php.
			 */
			$currencies = apply_filters( 'nbsp_french_currencies', '¤|&curren;|\$|¢|&cent;|£|&pound;|¥|&yen;|₣|&#8355;|€|&euro;' );

			/**
			 * Add newlines before/after HTML comments, pre, script, and style code blocks.
			 */
			$html = preg_replace( '/\r?\n?<(!--|pre|script|style)/i', "\n" . '<$1', $html );
			$html = preg_replace( '/(--|\/pre|\/script|\/style)>\r?\n?/i', '$1>' . "\n", $html );

			/**
			 * Spaces will be replaced by '&nbsp;' in the second set of parentheses (ie. $match[ 2 ]).
			 *
			 * PCRE modifier 'u' is used to treat pattern and subject strings as UTF-8.
			 */
			$pattern = apply_filters( 'nbsp_french_preg_first_second_last', array( 
				'/(«|&laquo;)( )(\w)/u',		// Quotation followed by word.
				'/(\w|\))( )([!\?:;%»]|&raquo;)/u',	// Word or parentheses followed by puntuation.
				'/([\.!\?])( )(»|&raquo;)/u',		// Punctuation followed by quotation.
				'/( \d{1,3})(( \d{3,3})+)([\., ])/u',	// 1 000, 1 000 000, etc.
				'/(\d)( )(' . $currencies . ')/u',	// Number followed by currency symbol.
			) );

			foreach ( preg_split( '/((\r?\n)|(\r\n?))/', $html ) as $line ) {

				if ( ! $has_french && strpos( $line, '<!--:fr-->' ) ) {

					$has_french = $default_is_french = true;

					$fixed_html .= $line . "\n";

					continue;

				} elseif ( $has_french && strpos( $line, '<!--:-->' ) ) {

					$has_french = $default_is_french = false;

					$fixed_html .= $line . "\n";

					continue;

				} elseif ( preg_match( '/(--|\/pre|\/script|\/style)>/i', $line ) ) {

					$has_french = $default_is_french;	// back to default

					$fixed_html .= $line . "\n";

					continue;

				} elseif ( preg_match( '/<(!--|pre|script|style)/i', $line ) ) {

					$has_french = false;

					$fixed_html .= $line . "\n";

					continue;
				}

				if ( $has_french ) {

					$line = preg_replace_callback( $pattern, array( __CLASS__, 'get_first_second_last' ), $line );
				}

				$fixed_html .= $line . "\n";
			}

			return rtrim( $fixed_html );	// Remove last newline character.
		}

		/**
		 * Replace space with non-breaking space in second element.
		 *
		 * Returns first, second, and last elements as a string.
		 */
		private static function get_first_second_last( $match ) {

			$last_num = count( $match ) - 1;

			$second_str = str_replace( ' ', '&nbsp;', $match[ 2 ] );

			return $match[ 1 ] . $second_str . $match[ $last_num ];
		}
	}

        global $nbsp_french;

	$nbsp_french = NbspFrench::get_instance();
}
