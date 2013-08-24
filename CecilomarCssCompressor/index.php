<?php
  /**
* @package    CssCompressor
* @author     Cecil O. Almonte
* @website    http://www.cecilomar.com/projects/csscompressor/
* @copyright  Copyright (C) Cecilomar Design, Inc. 2013
* @license    http://www.gnu.org/licenses/gpl.txt
**/

function str_compress_css( $css, $overwrite_file = true ){
	$code = preg_replace( '/;\s(?=})|\/\*.*\*\/|\s*/s', '', implode( file($css) ) );
	$overwrite_file && file_put_contents( $css, $code );
	return $code;
}

?>