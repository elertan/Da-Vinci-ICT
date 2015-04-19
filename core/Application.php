<?php namespace Core;

/**
 * Standard App
 */
class Application {

	private $controller_name;
	private $method_name;
	private $parameters = [];
	private $controller;

	public function __construct() {

		// Has controller
		if (Request::get("url")) {

			$url = trim(Request::get('url'), '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // put URL parts into according properties
            $controller_name = isset($url[0]) ? $url[0] : null;
            $method_name = isset($url[1]) ? $url[1] : "index";

            // remove controller name and action name from the split URL
            unset($url[0], $url[1]);

            // rebase array keys and store the URL parameters
            $parameters = array_values($url);

		} else {
			$controller_name = "index";
			$method_name = "index";
		}

		$controller_name = "\\Controllers\\" . ucfirst($controller_name) . "Controller";

		if (class_exists($controller_name)) {
			$controller = new $controller_name;
		} else {
			View::renderWithoutHeadAndFooter('error/not_found');
			die();
		}

		if (method_exists($controller, $method_name)) {
			if (!empty($parameters)) {
				call_user_func_array([$controller, $method_name], $parameters);	
			} else {
				call_user_func([$controller, $method_name]);
			}
		} else {
			View::renderWithoutHeadAndFooter('error/not_found');
			die();	
		}

	}

}