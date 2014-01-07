<?php
require_once 'lib/config_db.php';

final class Application {
  public $url;
  private $session;
  public function __construct() {
    $this->url = parse_url( $_SERVER['REQUEST_URI'] );
    $this->url['path'] = rtrim( $this->url['path'], '/' );
    parse_str( $this->url['query'], $this->url['params'] );
    // auto load classes
    spl_autoload_register(array($this, 'class_loader'));
    $array = str_replace('/','\/',implode( '|', array('/login','/cal/*') ));
    $regexp = '/(' . $array .  ')/';
    if( !preg_match($regexp, $this->url['path']) ) {
      $this->session();
    }
    $this->router();
  }

  private function session() {
    $this->session = new Session;
  }

  private function router() {
    $routes = array(
      'GET' => array(
        'login' => 'LoginController::index',
        ''      => 'HomeController::index',
      ),
      'POST' => array(
        'login' => 'LoginController::create',
      ),
      'PUT' => array(
      ),
      'DELETE' => array(
        'login' => 'LoginController::destroy',
      )
    );
    $request_method = $_SERVER['REQUEST_METHOD'];
    if( $request_method === 'POST' ) {
      $request_method = isset($_POST['_METHOD']) ? $_POST['_METHOD'] : 'POST';
    }
    foreach( $routes[$request_method] as $pattern => $route ) {
      $var_patt = '/:[a-z|_]*/';
      $pat = '/'.str_replace( '/', '\/', $pattern).'$/';
      $pat = preg_replace( $var_patt,'(.*)', $pat );
      if( preg_match( $pat, $this->url['path'], $match ) ) {
        preg_match_all( $var_patt, $pattern, $vars );
        $params = array();
        $ind = 1;
        foreach( $vars[0] as $var ) {
          $params[str_replace(':','',$var)] = $match[$ind++];
        }
        if( $request_method!='GET' ) {
          foreach( $_POST as $v => $k ) {
            $params[$v] = $k;
          }
        }
        $params['_app'] = $this;
        call_user_func($route, $params);
        return;
      }
    }
    echo "ERROR: " . $this->url['path'] . " WITH Request Method " . $request_method . " NOT FOUND";
    die();
  }

  /**
    * class_loader
    */
  public function class_loader( $name ) {
    $classes = array(
        'Session'               => 'lib/session.php',
        'Controller'            => 'lib/controller.php',
        'Helper'                => 'lib/helper.php',
        'HomeController'        => 'app/controllers/home_controller.php',
        'LoginController'       => 'app/controllers/login_controller.php',
      );
    if( isset($classes[$name]) ) require_once $classes[$name];
  }
}
