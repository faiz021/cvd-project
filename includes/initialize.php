<?php

// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
$environment_testing = false;

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

if($environment_testing){
	defined('SITE_ROOT') ? null :
	define('SITE_ROOT','C:'.DS.'xampp'.DS.'htdocs'.DS.'gym');
}else{
	defined('SITE_ROOT') ? null :
	define('SITE_ROOT', '/kunden/homepages/30/d526055144/htdocs/alphateam'); 

}

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');
// load config file first
require_once(LIB_PATH.DS.'configuration.php');

// load basic functions next so that everything after can use them


// load core objects
//require_once(LIB_PATH.DS.'session.php');
require_once(LIB_PATH.DS.'database.php');
require_once(LIB_PATH.DS.'database_object.php');

// load database-related classes
require_once(LIB_PATH.DS.'user.php');
require_once(LIB_PATH.DS.'patientdata.php');

//load other
require_once(LIB_PATH.DS.'male.php');
require_once(LIB_PATH.DS.'female.php');
require_once(LIB_PATH.DS.'percent.php');
require_once(LIB_PATH.DS.'CholPoints.php');


?>