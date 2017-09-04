<?php
	// lockdroid.com:3306
	define('DB_HOST','localhost');
	define('DB_USER','website_viewer');
	define('DB_PASS','puph6dE-');
	define('DB_NAME','evangelpca');

	$db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
	$db->setAttribute(PDO::ATTR_PERSISTENT, true);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	date_default_timezone_set('America/Chicago');

?>
