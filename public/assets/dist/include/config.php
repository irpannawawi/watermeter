<?php 
define("dbName", "smartwatermeter"); 
define("dbUser", "root"); 
define("dbPass", ""); 
define("dbHost", "localhost"); 
define("webName", "smartwatermeter"); 

$root = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$root .= "://".$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
define("base_url", $root); 
session_start();