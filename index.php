<?php
	error_reporting(E_ALL);

	if (version_compare(phpversion(), '5.1.0', '<') == true) { die ('PHP5.1 Only'); }

	define ('DIRSEP', DIRECTORY_SEPARATOR);

	$site_path = realpath(dirname(__FILE__) . DIRSEP) . DIRSEP;

	define('site_path', $site_path);
	
	require ($site_path . 'includes' . DIRSEP . 'startup.php');
	
	$router = new Router($registry);
	
	$registry->set('router', $router);
	
  $db = new PDO('mysql:host=localhost;dbname=iwantbrand', 'root', '', array(
    PDO::ATTR_PERSISTENT => true
  ));

	$registry->set('db', $db);
	
	$template = new Template($registry);
	
	$registry->set('template', $template);
	
	$router->setPath (site_path . 'controllers');
	
	$router->delegate();
?>