<?php if (!defined('BASE_PATH')) exit('No direct script access allowed');

function getConfig($configName)
{
    switch ($configName) {

        case "app":
            return array(
                "name"    => "appname",
                "version" => "1.0",
            );
            break;

        case "default_lang":
            return "hu";
            break;

        case "menu":
            $menu = array();
            $menu['bal']['default']                  = array('class' => 'main',      'method' => 'index',       'parameters' => array(), 'text' => 'Az otthon');
            $menu['bal']['lakoink']                  = array('class' => 'lakoink',   'method' => 'index',       'parameters' => array(), 'text' => 'Lakóink');
            $menu['bal']['galeria']                  = array('class' => 'galeria',   'method' => 'index',       'parameters' => array(), 'text' => 'Galéria');
            $menu['bal']['kapcsolat']['group']       = array('group' => 'Kapcsolat');
            $menu['bal']['kapcsolat']['elerhetoseg'] = array('class' => 'kapcsolat', 'method' => 'elerhetoseg', 'parameters' => array(), 'text' => 'Elérhetőség');
            $menu['bal']['kapcsolat']['kapcsform']   = array('class' => 'kapcsolat', 'method' => 'uzenet',      'parameters' => array(), 'text' => 'Üzenet küldése');
            $menu['bal']['kapcsolat']['uzenetek']    = array('class' => 'kapcsolat', 'method' => 'uzenetek',    'parameters' => array(), 'text' => 'Üzenetek listája');
            $menu['bal']['orig']                     = array('link'  => 'http://patronushaz.hu',                'parameters' => array(), 'text' => 'Eredeti honlap');

            if (isset($_SESSION['user']['id'])) {
                $menu['jobb']['user']['group']       = array('group' => 'Bejelentkezve: ' . $_SESSION['user']['fullname'] . ' (' . $_SESSION['user']['name'] . ')');
                $menu['jobb']['user']['pictupload']  = array('class' => 'galeria',   'method' => 'upload',      'parameters' => array(), 'text' => 'Képek feltöltése');
                $menu['jobb']['user']['pwchange']    = array('class' => 'user',      'method' => 'pwchange',    'parameters' => array(), 'text' => 'A jelszó módosítása');
                $menu['jobb']['user']['logout']      = array('class' => 'user',      'method' => 'logout',      'parameters' => array(), 'text' => 'Kijelentkezés');
            } else {
                $menu['jobb']['login']               = array('class' => 'user',      'method' => 'login',       'parameters' => array(), 'text' => 'Bejelentkezés');
            }

            return $menu;
            break;

        case "email_based_login":
            return true;
            break;

        case "db":
            return array(
                "driver"   => "mysql",
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
    <script src="<?php echo BASE; ?>assets/jquery360/jquery-3.6.0.min.js"></script>
    <script src="<?php echo BASE; ?>assets/bootstrap4/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <link href="<?php echo BASE; ?>assets/bootstrap4/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
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
    loadStyle('menu');
}

function getHeader()
{
?>
    <header class="section-header">
        <div class="container">
            <img src="<?php echo BASE . 'images/patronus.png' ?>" width="150" alt="">
        </div>
    </header>
<?php
}

function getFooter()
{
?>
    <footer class="section-footer">
        <div class="container text-center">
            Támogatóink:
            <img src="<?php echo BASE . 'images/rsz_21eon_logo700_300.jpg' ?>" width="100" alt="">
            <img src="<?php echo BASE . 'images/leier.png' ?>" width="100" alt="">
            <img src="<?php echo BASE . 'images/cewe.png' ?>" width="100" alt="">
            <img src="<?php echo BASE . 'images/itsh.png' ?>" width="100" alt="">
            <img src="<?php echo BASE . 'images/ozdi_acelmuvek.png' ?>" width="100" alt="">
        </div>
    </footer>
<?php
}

function getActualLink()
{
    return (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

function getHash($string)
{
    return hash('sha512', $string);
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

function loadStyle($style)
{
    if (file_exists(STYLE_PATH . $style . '.css')) {
        echo '<link href="' . BASE . 'styles/' . $style . '.css' . '" rel="stylesheet" type="text/css" />';
    } else {
        trigger_error("CSS file not found: " . $style, E_USER_ERROR);
    }
}

function loadView($view)
{
    if (file_exists(VIEWS_PATH . $view . '.php')) {
        require_once(VIEWS_PATH . $view . '.php');
    } else {
        trigger_error("View not found: " . $view, E_USER_ERROR);
    }
}

function redirect($url)
{
    echo '<script>window.location.href="' . $url . '";</script>';
    exit();
}

function timeNow($formatStr = 'Y-m-d H:i:s')
{
    $dt = new DateTime("now", new DateTimeZone('Europe/Budapest'));
    return $dt->format($formatStr);
}

function callFormValidator($formId, $class, $method)
{
?>
    <script>
        $(function() {
            var Button;
            $('.submitbutton').click(function() {
                Button = $(this).attr('name')
            });

            $("#<?php echo $formId; ?>").submit(function() {

                if (Button == 'backButton') return true;
                document.getElementById("JLLMsgArea").innerHTML = '';

                $('<input />').attr('type', 'hidden')
                    .attr('name', 'button')
                    .attr('value', Button)
                    .appendTo('#<?php echo $formId; ?>');

                $('<input />').attr('type', 'hidden')
                    .attr('name', 'from_url')
                    .attr('value', '<?php echo getActualLink(); ?>')
                    .appendTo('#<?php echo $formId; ?>');

                var currentdate = new Date();
                var timezone_offset_minutes = new Date().getTimezoneOffset();
                timezone_offset_minutes = timezone_offset_minutes == 0 ? 0 : -timezone_offset_minutes;

                var datetime = currentdate.getFullYear() + "-" +
                    (currentdate.getMonth() + 1) + "-" +
                    currentdate.getDate() + " " +
                    currentdate.getHours() + ":" +
                    currentdate.getMinutes() + ":" +
                    currentdate.getSeconds();

                $('<input />').attr('type', 'hidden')
                    .attr('name', 'userTime')
                    .attr('value', datetime)
                    .appendTo('#<?php echo $formId; ?>');

                $('<input />').attr('type', 'hidden')
                    .attr('name', 'userTimeZone')
                    .attr('value', timezone_offset_minutes / 60)
                    .appendTo('#<?php echo $formId; ?>');

                var Fields = $(this).serializeArray();

                $.post('<?php echo BASE . "$class/$method"; ?>', Fields,
                    function(data, status) {
                        console.log(status);
                        console.log(data);

                        if (status == 'success') {

                            var com = data.split('|');

                            if (com[1] == 'redirect') {

                                window.location.replace(com[2]);
                                return;

                            } else if (com[1] == 'redirectpost') {

                                $.redirect(
                                    com[2], JSON.parse(com[3]),
                                    "POST", "_self"
                                );
                                return;

                            } else {
                                document.getElementById("JLLMsgArea").innerHTML += data;
                            }
                        }
                    });

                return false;
            });
        });
    </script>
<?php
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
