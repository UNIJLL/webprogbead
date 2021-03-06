<?php
define('BASE', (isset($_SERVER['HTTPS']) ? "https" : "http") . '://' . $_SERVER['HTTP_HOST'] . '/' . explode('/', str_replace($_SERVER['DOCUMENT_ROOT'] . '/', '', $_SERVER['SCRIPT_FILENAME']))[0] . '/');
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/' . explode('/', str_replace($_SERVER['DOCUMENT_ROOT'] . '/', '', $_SERVER['SCRIPT_FILENAME']))[0] . '/');
define('SYSTEM_PATH', BASE_PATH . 'classes/');

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

require_once(SYSTEM_PATH . 'config.php');
$route = explode("/", $_SERVER['REQUEST_URI']);
$class = isset($route[2]) && $route[2] > "" ? $route[2] : "main";
$method = isset($route[3]) && $route[3] > "" ? $route[3] : "index";

$i = 4;
$parameters = array();

while (isset($route[$i]) && $route[$i] > "") {
    $parameters[] = $route[$i++];
}

$obj = getInstance($class);

if (is_object($obj) && method_exists($obj, $method)) {
    call_user_func_array(array($obj, $method), $parameters);
} else {
    echo "page not found";
}
