<?php
use RedBean_Facade as R;
class LoginController extends Controller {
  public function index( $params ) {
    $params['title'] = "Login";
    self::$layout='login';
    self::render( $params );
  }

  public function create( $params ) {
    $user = Model_Users::check_user( $params['name'], $params['password'] );
    if( $user ) {
      $_SESSION['user'] = (object) array(
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email);
      #print_r($_SESSION);
      self::redirect( array( 'url' => '/dashboard') );
    } else {
      session_destroy();
      self::redirect( array( 'url' => '/login') );
    }
  }

  public function destroy( $params ) {
    unset( $_SESSION['user'] );
    session_start();
    session_destroy();
    self::redirect( array( 'url' => '/login') );
  }
}
