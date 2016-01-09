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
 * Tested Up To: 4.4
 * Version: 1.5.3
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

if ( ! defined( 'NBSP_FRENCH_FILTER_PRIORITY' ) )
	define( 'NBSP_FRENCH_FILTER_PRIORITY', 10 );

add_filter( 'the_content', 'nbsp_french_filter',
	NBSP_FRENCH_FILTER_PRIORITY );

add_filter( 'the_excerpt', 'nbsp_french_filter',
	NBSP_FRENCH_FILTER_PRIORITY );

add_filter( 'comment_text', 'nbsp_french_filter',
	NBSP_FRENCH_FILTER_PRIORITY );

add_filter( 'widget_text', 'nbsp_french_filter',
	NBSP_FRENCH_FILTER_PRIORITY );

function nbsp_french_filter( $content ) {

	$new_content = '';
	$has_french = strpos( $content, '<!--:fr-->' ) ? false : true;
	$next_is_french = null;

	// add newlines before and after script and pre code blocks
	$content = preg_replace( '/\r?\n?<(!--|script|pre)/i', "\n".'<$1', $content );
	$content = preg_replace( '/(--|\/script|\/pre)>\r?\n?/i', '$1>'."\n", $content );

	foreach ( preg_split( '/((\r?\n)|(\r\n?))/', $content) as $line) {

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
		$new_content .= $line."\n";
	} 

	return $new_content;
}

?>
