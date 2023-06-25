<?php
#phpinfo(); die;
$fn = __DIR__ . '/dist' . $_SERVER['SCRIPT_NAME'];
if(file_exists($fn)) {
  return false;
}
require './dist/index.php';

