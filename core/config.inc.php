<?php
/**
 * LiveFrame - www.nsslive.net
 *	
 * Main Config file
 * 
 * revision updates:
 *	6 - Vars class added
 *	5 - DB class information added
 *		BaseTemplate path moved to index.php
 */
 
session_start();

error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 'on');

define('CORE_PATH', dirname(__FILE__) );
define('CACHE_PATH', CORE_PATH . '/cache');
define('CLASS_PATH', CORE_PATH . '/classes');
define('MODULES_PATH', CORE_PATH . '/modules');
define('TEMPLATES_PATH', CORE_PATH . '/templates');

include CORE_PATH . '/site_config.inc.php';

define('LIB_PATH', SITE_ROOT.'/lib');
define('SKINS_PATH', LIB_PATH.'/skins/' . CURRENT_SKIN);
define('CACHE_TIMEOUT', 24); //hours

// Include all dependencies
include CLASS_PATH . '/DB.class.php';
include CLASS_PATH . '/MainController.class.php';
include CLASS_PATH . '/ModuleBase.class.php';
/*include CLASS_PATH . '/SQL.class.php';
include CLASS_PATH . '/MySQL.class.php';
include CLASS_PATH . '/MySQLi.class.php';*/
include CLASS_PATH . '/SessionManager.class.php';
include CLASS_PATH . '/TemplateSet.class.php';
include CLASS_PATH . '/Vars.class.php';

if(DBASE_NAME != '')
{
	DB::init();
	DB::connect();
}

MainController::loadModules();
?>