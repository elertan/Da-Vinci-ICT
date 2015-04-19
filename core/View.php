<?php namespace Core;

class View {
	
	public static function renderWithoutHeadAndFooter($filename, $params = []) {
		$data = new \stdClass();
		foreach ($params as $key => $value) {
			$data->{$key} = $value;
		}
		require('../views/' . $filename . '.php');
	}

	public static function render($filename, $params = []) {
		require('../views/template/head.php');
		self::renderWithoutHeadAndFooter($filename, $params);
		require('../views/template/footer.php');
	}

}