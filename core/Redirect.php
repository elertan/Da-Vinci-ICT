<?php namespace Core;

class Redirect {

	public static function to($url) {
		header('location: ' . $url);
		// use this one for a production server
		//header('location: ../' . $url);
	}

}