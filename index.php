<?php
session_start();
date_default_timezone_set("Europe/London");
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
define( 'APP_ROOT', rtrim( dirname( __FILE__ ), '/' ) );
define( 'DAY_LEN', 86400 );
require_once 'lib/application.php';
$app = new Application;
