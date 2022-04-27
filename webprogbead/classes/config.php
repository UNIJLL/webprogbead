<?php

function getConfig($configName)
{
    switch ($configName) {

        case "db":
            return array(
                "server"   => "localhost",
                "username" => "root",
                "password" => "",
                "dbname"   => "webprogbead",
            );
            break;

        default:
            trigger_error("Invalid config name: " . $configName, E_USER_ERROR);
            break;
    }
}

function loadClass($class)
{
    if (!file_exists(SYSTEM_PATH . $class . '.php')) return false;

    if (class_exists($class, false) === false) {
        require_once(SYSTEM_PATH . $class . '.php');
    }

    return true;
}

function getInstance($class, $parameters = NULL)
{
    static $classes = array();
    if (isset($classes[$class])) return $classes[$class];
    if (loadClass($class) === false) return false;

    if (isset($parameters)) {

        $reflection_class = new ReflectionClass($class);
        $classes[$class] = $reflection_class->newInstanceArgs($parameters);
    } else {

        $classes[$class] = new $class();
    }

    return $classes[$class];
}

function myErrorHandler($errno, $errstr)
{
    if (ENVIRONMENT == 'development') {

        return false; // php handler

        // vagy saját hibakezelés
        // echo "<b>*** Error:</b> [$errno] $errstr<br>";

    } else {

        // itt bejegyzés az error logba
        
        // üzenet a felhasználónak
        echo "Szokatlan esemény történt. Kérem, vegye fel a kapcsolatot a rendszergazdával!";
    }

    die();
}

function myException($exception)
{
    if (ENVIRONMENT == 'development') {

        // saját hibakezelés
        $errorInfo = array();
        $errorInfo['msg'] = $exception->getMessage();
        $errorInfo['code'] = $exception->getCode();
        $errorInfo['file'] = $exception->getFile();
        $errorInfo['line'] = $exception->getLine();
        $errorInfo['trace'] = $exception->getTrace();
        $errorInfo['previous'] = $exception->getPrevious();

        $index = '<b>*** Exception: ' . $errorInfo['msg'] . '</b> (' . basename($errorInfo['file']) . ', line ' . $errorInfo['line'] . ')';
        $index = str_replace('\\', '/', $index);

        echo "$index<br>";
        echo str_replace('\\', '/', $exception->getTraceAsString());

    } else {

        // itt bejegyzés az error logba
        
        // üzenet a felhasználónak
        echo "Szokatlan esemény történt. Kérem, vegye fel a kapcsolatot a rendszergazdával!";
    }

    die();
}

set_error_handler("myErrorHandler");
set_exception_handler('myException');
