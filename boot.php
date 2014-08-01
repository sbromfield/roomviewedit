<?php
	//error reporting
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	//defines
	define("__mediafiles__", "");
	define("__smartypath__", "");
	define("_SBASE", "");
	define("_BASE", "");
	define("__passwdfile__", "");
	
	//requires
	require_once __smartypath__."\\Smarty.class.php";
	
	
	//template stuff
	$smarty = new Smarty();
	$smarty->setTemplateDir(_SBASE.'\\templates');
	$smarty->setCompileDir(_SBASE.'\\smarty\\compile');
	$smarty->setCacheDir(_SBASE.'\\smarty\\cache');
	$smarty->setConfigDir(_SBASE.'\\smarty\\configs');
	
	//load all controllers
	require_once _BASE."\\controllers\\indexcontroller.php";
	require_once _BASE."\\controllers\\homecontroller.php";
	require_once _BASE."\\controllers\\classlistcontroller.php";
	
	require_once _BASE."\\classes\\auth.php";
	require_once _BASE."\\classes\\editfile.php";
	//test stuff
?>