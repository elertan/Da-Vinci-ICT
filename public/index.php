<?php namespace Core;

// $config = require("config/config.php");

/**
 * Startup class loads all stuff and starts application.
 */
class Startup {

	// Autoloaded folders
	private $loadFolderList = ["core", "controllers", "models"];

	/**
	 * Loads all php files for use.
	 * @return void
	 */
	private function loadFiles() {

		foreach ($this->loadFolderList as $folderName) {
			
			foreach (glob(("../" . $folderName . "/*.php")) as $filename) {
				require($filename);
			}

		}

	}

	/**
	 * Runs all startup stuff.
	 */
	public function __construct() {
		$this->loadFiles();
		new Application();
	}

}

new Startup();
