<?php namespace Controllers;

use \Core\Controller as Controller;
use \Core\View as View;

class HomeController extends Controller {

	public function index() {
		View::render('home/index', [
			'currentDate' => getdate()
		]);
	}

}