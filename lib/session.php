<?php
class Session {
  public function __construct() {
    if( !isset($_SESSION['user']) ) {    
      session_destroy();
      header('Location: /login');
      die();
    }
  }
}
