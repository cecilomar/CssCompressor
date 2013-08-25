<?php
  /**
* @package    CssCompressor
* @author     Cecil O. Almonte
* @website    http://www.cecilomar.com/projects/csscompressor/
* @copyright  Copyright (C) Cecilomar Design, Inc. 2013
* @license    http://www.gnu.org/licenses/gpl.txt
**/

// Let's make the client believe that this is actually a CSS file. ////////////////////////////////
header( "Content-type: text/css" );

// To tell the script where is the CSS file use $_REQUEST['css'] or any other way. ////////////////
$css_file = $_REQUEST['css'];

// Edit to make sure that the script can find the real CSS Stylesheet. ////////////////////////////
$css_real_path = '../../'.$css_file;

// The name of the cache file is now the URL encoded path. ////////////////////////////////////////
$cache_real_path = './cache/'.urlencode($css_real_path).'.css';

// Get the contents of the file. //////////////////////////////////////////////////////////////////
if ( file_exists($css_real_path)) {
	$css_contents = file_get_contents($css_real_path);
} else {
	// If it can't read the file will display this message. ///////////////////////////////////////
	echo '/* Could not read the CSS file. */';
	exit;
}

function str_compress_css( $css, $overwrite_file = true ){
	$code = preg_replace( '/;\s(?=})|\/\*.*\*\/|\s*/s', '', implode( file($css) ) );
	$overwrite_file && file_put_contents( $css, $code );
	return $code;
}

// If the cached file does not exists, then it will write a new one. //////////////////////////////
if( filemtime($css_real_path) < filemtime($cache_real_path) ){
	include $cache_real_path;
}else {
	$output = str_compress_css($css_contents);
	file_put_contents($cache_real_path, $output);

	// Here is where it prints the compressed CSS. //////////////////////////////////////////////////
	echo $output;
}


?>