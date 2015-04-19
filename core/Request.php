<?php namespace Core;

class Request {

	/**
	 * Gets the key out of the $_GET
	 * @param  string $key the key used in the url
	 * @return string/false  The value/ false if failed.
	 */
	public static function get($key) { 
		return isset($_GET[$key]) ? $_GET[$key] : false;
	}

}