<?php
/*
 * FastForward Framework
 * @author geloma
 */
date_default_timezone_set ("America/Bogota");
require_once "core/config/Config.php";
define('PATH',__DIR__.DIRECTORY_SEPARATOR .'core'.DIRECTORY_SEPARATOR);
define('APP_PATH',PATH.'app'.DIRECTORY_SEPARATOR);
define('CON_PATH',PATH.'config'.DIRECTORY_SEPARATOR);
define('LIB_PATH',PATH.'lib'.DIRECTORY_SEPARATOR);
define('VIE_PATH',__DIR__.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR);
define('CTL_PATH',__DIR__.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR);
define('MDL_PATH',__DIR__.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR);
define('HASH_KEY',md5(rand(0,5)));
load(LIB_PATH);
load(APP_PATH);
load(MDL_PATH);
$cookie = session_get_cookie_params();
$NAME = 'PHPSESSID';
$LIFETIME = $cookie['lifetime'];
$PATH = $cookie['path'];
$DOMAIN = $cookie['domain'];
$SECURE = FALSE;
$HTTP_ONLY = TRUE;
session_set_cookie_params($LIFETIME, $PATH, $DOMAIN, $SECURE, $HTTP_ONLY);
session_name($NAME);
session_start();
session_regenerate_id();
makeRoute($route);
?>
