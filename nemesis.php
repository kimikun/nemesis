<?php
/*
	Bootstrap
*/

// CORE PATH
define('NEMESIS_PATH', str_replace('\\', '/', str_replace('//', '/', __DIR__)));
define('NEMESIS_PROCESS_PATH', str_replace('//', '/', realpath($_SERVER['SCRIPT_FILENAME']) . '/'));
define('NEMESIS_PROCESS_ROOT', str_replace('//', '/', dirname($_SERVER['SCRIPT_NAME']) . '/'));

// BASE URL
define('NEMESIS_SCHEME', ( isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on' ) ? 'https://' : 'http://');
define('NEMESIS_PORT', (isset($_SERVER['SERVER_PORT']) && (($_SERVER['SERVER_PORT'] != '80' && NEMESIS_SCHEME == 'http://') || ($_SERVER['SERVER_PORT'] != '443' && NEMESIS_SCHEME == 'https://')) && strpos($_SERVER['HTTP_HOST'], ':') === false) ? ':'.$_SERVER['SERVER_PORT'] : '');
define('NEMESIS_HOST', preg_replace('/:'.NEMESIS_PORT.'$/', '', $_SERVER['HTTP_HOST']));
define('NEMESIS_URL', str_replace('\\', '', (trim( urldecode( NEMESIS_SCHEME . NEMESIS_HOST )). str_replace('//', '/', NEMESIS_PROCESS_ROOT.'/'))));

// ERRORS
error_reporting(0);
ini_set('display_errors', 0);

// Include core functions
function core_functions() 
{
	require_once NEMESIS_PATH . 'core/functions.php';
}

// Include bootstrap autoloader
function core_autoloader()
{
	require_once NEMESIS_PATH . 'core/class.Loader.php';
}