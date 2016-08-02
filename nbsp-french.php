<?php
/*
 * Plugin Name: JSM's Non-Breaking Space for French Content
 * Plugin URI: http://surniaulula.com/extend/plugins/nbsp-french/
 * Author: JS Morisset
 * Author URI: http://surniaulula.com/
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Description: Adds a non-breaking space between words and punctuation marks to avoid inappropriate line-breaks in French.
 * Requires At Least: 3.0
 * Tested Up To: 4.6
 * Version: 1.6.0-1
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
 * Copyright 2012-2016 Jean-Sebastien Morisset (http://surniaulula.com/)
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

			$prio = apply_filters( 'nbsp_french_filter_priority', 
				( defined( 'NBSP_FRENCH_FILTER_PRIORITY' ) ? 
					NBSP_FRENCH_FILTER_PRIORITY : 10 ) );

			foreach ( array( 
				'the_title',
				'the_content',
				'the_excerpt',
				'comment_text',
				'widget_title',
				'widget_text',
			) as $filter_name ) {
				if ( apply_filters( 'nbsp_french_filter_'.$filter_name, true ) )
					add_filter( $filter_name, array( __CLASS__, 'filter' ), $prio );
			}
		}

		public static function filter( $text ) {
		
			$new_text = '';
			$has_french = strpos( $text, '<!--:fr-->' ) ? false : true;
			$next_is_french = null;
		
			// add newlines before and after script and pre code blocks
			$text = preg_replace( '/\r?\n?<(!--|script|pre)/i', "\n".'<$1', $text );
			$text = preg_replace( '/(--|\/script|\/pre)>\r?\n?/i', '$1>'."\n", $text );
		
			foreach ( preg_split( '/((\r?\n)|(\r\n?))/', $text) as $line) {
		
				if ( $has_french === false && $next_is_french === true ) {
					$has_french = true;
					$next_is_french = null;
				}
			
				// newline is added before and after comments
				if ( $has_french === false && strpos( $line, '<!--:fr-->' ) )
					$has_french = true;
		
				if ( $has_french === true && strpos( $line, '<!--:-->' ) )
					$has_french = false;
		
				if ( $has_french === true && preg_match( '/<(!--|script|pre)/i', $line ) )
					$has_french = false;
				
				if ( $has_french === false && preg_match( '/(--|\/script|\/pre)>/i', $line ) )
					$next_is_french = true;
		
				if ( $has_french === true ) {
		
					$pattern = array( 
						'/(\«) (\w)/',
						'/(\w) (\!|\?|\:|\;|\»|\%)/'
					); ksort($pattern);
		
					$replace = array( 
						'$1&nbsp;$2',
						'$1&nbsp;$2'
					); ksort($replace);
		
					$line = preg_replace( $pattern, $replace, $line);
				}
				$new_text .= $line."\n";
			} 
		
			return rtrim( $new_text );	// remove last newline character
		}
	}

        global $nbsp_french;
	$nbsp_french = NbspFrench::get_instance();
}

?>
