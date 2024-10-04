<?php

/**
 * Description:	This includes for basic and core configurations.
 * Author:		Joken Villanueva
 * Date Created:	october 27, 2013
 * Revised By:		
 */

//define the core paths
//Define them as absolute peths to make sure that require_once works as expected

//DIRECTORY_SEPARATOR is a PHP Pre-defined constants:
//(\ for windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . 'aplaya');
defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT . DS . 'includes');

// load config file first 
require_once(__DIR__ . '/config.php');
//load basic functions next so that everything after can use them
require_once(__DIR__ . '/functions.php');

//later here where we are going to put our class session
require_once(__DIR__ . '/session.php');

require_once(__DIR__ . '/member.php');

require_once(__DIR__ . '/pagination.php');

require_once(__DIR__ . '/roomtype.php');

require_once(__DIR__ . '/functions.php');

require_once(__DIR__ . '/guest.php');

require_once(__DIR__ . '/reserve.php');

require_once(__DIR__ . '/setting.php');

//Load Core objects
require_once(__DIR__ . '/database.php');


//load database-related classes
