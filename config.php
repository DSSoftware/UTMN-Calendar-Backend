<?php

require_once "secrets.php";

if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) { $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP']; }

$database = array(
	'login' => DB_LOGIN,
	'password' => DB_PASSWORD,
	'dbname' => DB_NAME,
	'hostname' => DB_HOST,
 	'port' => DB_PORT,
);

$internal_key = INTERNAL_TOKEN;

?>
