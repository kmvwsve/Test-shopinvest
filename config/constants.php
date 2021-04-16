<?php
// Define HTTP_SERVER
$SERVER_NAME = isset($_SERVER["HTTP_HOST"])?$_SERVER["HTTP_HOST"]:"localhost";
$SERVER_NAME.= isset($_SERVER["CONTEXT_PREFIX"])?"".$_SERVER["CONTEXT_PREFIX"]:"";

// HTTP / HTTPS
$SERVER_PORT = isset($_SERVER["SERVER_PORT"])?$_SERVER["SERVER_PORT"]:80;
if( (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") || $SERVER_PORT == 443) {
	$HTTP_SERVER = 'https://'.$SERVER_NAME.'/';
} else {
	$HTTP_SERVER = 'http://'.$SERVER_NAME.'/';
}

// Define PATH_IMAGE
$PATH_IMAGE = $HTTP_SERVER."image/product/";
return [
	"HTTP_SERVER" => $HTTP_SERVER,
	"PATH_IMAGE"  => $PATH_IMAGE
];