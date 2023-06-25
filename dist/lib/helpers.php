<?php

function W($wdg, $arguments=[]) {
  if(count($arguments)) { extract($arguments, EXTR_OVERWRITE); }
  ob_start();
  require(ROOT. "/widgets/$wdg.php");
  return ob_get_clean();
}