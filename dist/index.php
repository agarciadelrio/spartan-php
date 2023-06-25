<?php
session_start();
define('VERSION', '0.0.0');
define('ROOT', __DIR__);
define('DATA',  ROOT . '/data');
define('STAT',  ROOT . '/static');
define('VIEW',  ROOT . '/views');
define('CONT',  VIEW . '/content');
require 'lib/functions.php';
require 'lib/helpers.php';
require 'lib/Page.php';