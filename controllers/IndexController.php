<?php namespace Controllers;

use \Core\Controller as Controller;
use \Core\Redirect as Redirect;

class IndexController extends Controller {

	public function index() {
		Redirect::to('home');
	}

}