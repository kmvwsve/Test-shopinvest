<?php
// Define HTTP_SERVER
$SERVER_NAME = $_SERVER["HTTP_HOST"];
$SERVER_NAME.= isset($_SERVER["CONTEXT_PREFIX"])?"".$_SERVER["CONTEXT_PREFIX"]:"";

// HTTP / HTTPS
if( (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") || $_SERVER['SERVER_PORT'] == 443) {
	define('HTTP_SERVER', 'https://'.$SERVER_NAME.'/');
} else {
	define('HTTP_SERVER', 'http://'.$SERVER_NAME.'/');
}

// Define PATH_IMAGE
define('PATH_IMAGE', HTTP_SERVER."image/product/");