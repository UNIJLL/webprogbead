<?php
define('BASE', (isset($_SERVER['HTTPS']) ? "https" : "http") . '://' . $_SERVER['HTTP_HOST'] . '/' . explode('/', str_replace($_SERVER['DOCUMENT_ROOT'] . '/', '', $_SERVER['SCRIPT_FILENAME']))[0] . '/');
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/' . explode('/', str_replace($_SERVER['DOCUMENT_ROOT'] . '/', '', $_SERVER['SCRIPT_FILENAME']))[0] . '/');
define('SYSTEM_PATH', BASE_PATH . 'classes/');
define('VIEWS_PATH', BASE_PATH . 'views/');
define('STYLE_PATH', BASE_PATH . 'styles/');
define('LANG_PATH', BASE_PATH . 'langfiles/');
define('PICT_PATH', BASE_PATH . 'pictures/');

define('ENVIRONMENT', 'development');
// define('ENVIRONMENT', 'production');

switch (ENVIRONMENT) {
    case 'development':
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        break;

    case 'production':
        error_reporting(E_ALL & ~E_NOTICE);
        ini_set('display_errors', 0);
        break;

    default:
        trigger_error("The application environment is not set correctly.", E_USER_ERROR);
}

@session_start();
require_once(SYSTEM_PATH . 'config.php');
if (!isset($_SESSION['lang'])) $_SESSION['lang'] = getConfig('default_lang');
getInstance('lang')->loadLang('base');

$route = explode("/", $_SERVER['REQUEST_URI']);
$route = array_values(array_filter($route, function ($value) {
    return !is_null($value) && $value !== '' && $value !== 'index.php';
}));

define("TASK_CLASS", isset($route[1]) ? $route[1] : "main");
define("TASK_METHOD", isset($route[2]) ? $route[2] : "index");

$i = 3;
$parameters = array();

while (isset($route[$i])) {
    $parameters[] = $route[$i++];
}

$obj = getInstance(TASK_CLASS);

if (is_object($obj) && method_exists($obj, TASK_METHOD)) {
    call_user_func_array(array($obj, TASK_METHOD), $parameters);
} else {
    loadView('error404');
}
