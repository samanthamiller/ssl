<?php

$GLOBALS['document_root'] = dirname(__FILE__);

session_start();

$controller = 'index';

if(isset($_GET['controller']) && is_file('controller/' . $_GET['controller'] . '.php')){
	$controller = $_GET['controller'];
}

require 'controller/' . $controller . '.php';