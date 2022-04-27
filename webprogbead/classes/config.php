<?php
function getConfig($configName)
{
    switch ($configName) {

        case "app":
            return array(
                "name"    => "appname",
                "version" => "1.0",
            );
            break;

        case "header":
            return array();
            break;

        case "menu":
            $menu = array();
            $menu['bal']['default']                  = array('class' => 'main',      'method' => 'index',       'parameters' => array(), 'text' => 'Főoldal');
            $menu['bal']['lakoink']                  = array('class' => 'lakoink',   'method' => 'index',       'parameters' => array(), 'text' => 'Lakóink');
            $menu['bal']['galeria']                  = array('class' => 'galeria',   'method' => 'index',       'parameters' => array(), 'text' => 'Galéria');
            $menu['bal']['kapcsolat']['group']       = array('group' => 'Kapcsolat');
            $menu['bal']['kapcsolat']['elerhetoseg'] = array('class' => 'kapcsolat', 'method' => 'elerhetoseg', 'parameters' => array(), 'text' => 'Elérhetőség');
            $menu['bal']['kapcsolat']['kapcsform']   = array('class' => 'kapcsolat', 'method' => 'uzenet',      'parameters' => array(), 'text' => 'Üzenet küldése');
            $menu['bal']['kapcsolat']['uzenetek']    = array('class' => 'kapcsolat', 'method' => 'uzenetek',    'parameters' => array(), 'text' => 'Üzenetek listája');
            $menu['bal']['orig']                     = array('link'  => 'http://patronushaz.hu',                'parameters' => array(), 'text' => 'Eredeti honlap');
            $menu['jobb']['login']                   = array('class' => 'user',      'method' => 'login',       'parameters' => array(), 'text' => 'Bejelentkezés');
            return $menu;
            break;

        case "footer":
            return array();
            break;

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

function getHead()
{
?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta name="keywords" content="" /> -->
    <meta name="description" content="description">
    <title><?php getConfig("app")['name']; ?></title>
    <script src="<?php echo BASE; ?>assets/js/jquery/jquery-3.5.1.min.js"></script>
    <script src="<?php echo BASE; ?>assets/js/jquery/jquery-ui.min.js"></script>
    <script src="<?php echo BASE; ?>assets/js/bootstrap441/bootstrap.bundle.min.js" type="text/javascript"></script>
    <link href="<?php echo BASE; ?>assets/js/bootstrap441/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        // jquery ready start
        $(document).ready(function() {
            // jQuery code

            //////////////////////// Prevent closing from click inside dropdown
            $(document).on('click', '.dropdown-menu', function(e) {
                e.stopPropagation();
            });

            // make it as accordion for smaller screens
            if ($(window).width() < 992) {
                $('.dropdown-menu a').click(function(e) {
                    e.preventDefault();
                    if ($(this).next('.submenu').length) {
                        $(this).next('.submenu').toggle();
                    }
                    $('.dropdown').on('hide.bs.dropdown', function() {
                        $(this).find('.submenu').hide();
                    })
                });
            }

        }); // jquery end
    </script>
    <?php
    loadCss('menu');
}

function loadView($view)
{
    if (file_exists(VIEWS_PATH . $view . '.php')) {
        require_once(VIEWS_PATH . $view . '.php');
    } else {
        trigger_error("View not found: " . $view, E_USER_ERROR);
    }
}

function loadCss($css)
{
    if (file_exists(STYLE_PATH . $css . '.css')) {
        ?>
        <link href="<?php echo BASE.'styles/'.$css.'.css'; ?>" rel="stylesheet" type="text/css" />
        <?php
    } else {
        trigger_error("CSS file not found: " . $css, E_USER_ERROR);
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
