<?php
/**
 * CodeIgniter 3 - Clean index.php
 * PHP 8.2 / 8.3 Safe
 */

/*
|--------------------------------------------------------------------------
| APPLICATION ENVIRONMENT
|--------------------------------------------------------------------------
|
| Use: development | testing | production
|
*/

define('ENVIRONMENT', 'production');


/*
|--------------------------------------------------------------------------
| ERROR REPORTING (FIXED FOR PHP 8+)
|--------------------------------------------------------------------------
*/

switch (ENVIRONMENT)
{
    case 'development':
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    break;

    case 'testing':
    case 'production':
        error_reporting(0);   // hide all warnings/deprecated
        ini_set('display_errors', 0);
    break;

    default:
        header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
        echo 'Environment not set correctly.';
        exit(1);
}


/*
|--------------------------------------------------------------------------
| SYSTEM DIRECTORY
|--------------------------------------------------------------------------
*/

$system_path = 'system';


/*
|--------------------------------------------------------------------------
| APPLICATION DIRECTORY
|--------------------------------------------------------------------------
*/

$application_folder = 'application';


/*
|--------------------------------------------------------------------------
| VIEW DIRECTORY
|--------------------------------------------------------------------------
*/

$view_folder = '';


// ---------------------------------------------------------------
// DO NOT CHANGE BELOW
// ---------------------------------------------------------------

if (defined('STDIN'))
{
    chdir(dirname(__FILE__));
}

if (($_temp = realpath($system_path)) !== FALSE)
{
    $system_path = $_temp.DIRECTORY_SEPARATOR;
}
else
{
    $system_path = rtrim($system_path, '/\\').DIRECTORY_SEPARATOR;
}

if ( ! is_dir($system_path))
{
    exit("System folder path not correct.");
}

define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('BASEPATH', $system_path);
define('FCPATH', dirname(__FILE__).DIRECTORY_SEPARATOR);
define('SYSDIR', basename(BASEPATH));


if (is_dir($application_folder))
{
    $application_folder = realpath($application_folder).DIRECTORY_SEPARATOR;
}
else
{
    exit("Application folder path not correct.");
}

define('APPPATH', $application_folder);


if ($view_folder === '')
{
    $view_folder = APPPATH.'views';
}

define('VIEWPATH', realpath($view_folder).DIRECTORY_SEPARATOR);


/*
|--------------------------------------------------------------------------
| BOOTSTRAP
|--------------------------------------------------------------------------
*/

require_once BASEPATH.'core/CodeIgniter.php';
