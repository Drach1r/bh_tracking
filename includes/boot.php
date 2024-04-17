
<link rel="icon" type="image/x-icon" href="resources/img/iloilo.png">

<?php
session_start();
date_default_timezone_set("Asia/Manila");
$dateNow = date('Y-m-d H:i:s');

include 'staticDir.php';


define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'bh_tracking');
define('APP_ROOT', 'http://localhost/bh_tracking');

try {
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection Failed: ' . $e->getMessage();
    die();
}
$key = bin2hex(random_bytes(64));
$token = hash_hmac('sha256', 'This is for index page', $key);

