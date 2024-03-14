<?php
session_start();
date_default_timezone_set("Asia/Manila");
$dateNow = date('Y-m-d H:i:s');

$pdo = null;
define('DB_HOST', 'localhost');
define('DB_USER', 'root');  // Replace with your MySQL username
define('DB_PASSWORD', '');  // Replace with your MySQL password
define('DB_NAME', 'bh_tracking');
define('APP_ROOT', 'http://localhost/bh_tracking/');

try {
	$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	// Log the error instead of displaying it directly on the page in a production environment
	error_log('Connection Failed: ' . $e->getMessage());
	die('Connection Failed');
}
