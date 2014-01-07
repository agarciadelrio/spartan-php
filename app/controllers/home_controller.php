<?php
class HomeController extends Controller {
  public function index( $params ) {
    $params['title'] = "Inicio";
    self::render( $params );
  }
}
