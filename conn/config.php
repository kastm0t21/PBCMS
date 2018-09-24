<body ng<?php

// Database Constant
define('BASE_PATH', "/var/www/emman/adminsite3/conn");
defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
defined('DB_USER') ? null : define("DB_USER", "root");
defined('DB_PASS') ? null : define("DB_PASS", "");
defined('DB_NAME') ? null : define("DB_NAME", "partybargains");

$mysqli  = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
	echo("Failed to connect, the error message is : ". mysqli_connect_error());
	exit();
}-app="app"?>>