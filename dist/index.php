<?php
session_start();
date_default_timezone_set("Atlantic/Canary");
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
define('VERSION', '0.0.0');
define('ROOT', __DIR__);
define('DATA',  ROOT . '/data');
define('STAT',  ROOT . '/static');
define('VIEW',  ROOT . '/views');
define('CONT',  VIEW . '/content');
require 'lib/functions.php';
require 'lib/helpers.php';
require 'lib/Page.php';