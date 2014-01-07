<?php

abstract class Controller {
  static $layout='application';
  public function render( $params ) {
    list(, $caller) = debug_backtrace(false);
    $controller = str_replace('_controller','',strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $caller['class'])));
    $action = $caller['function'];
    $view = APP_ROOT . "/app/views/$controller/$action.php";
    extract( $params );
    ob_start();
    require $view;
    $yield_body = ob_get_clean();
    require "app/views/layouts/" . static::$layout . ".php";
  }

  public function render_rn( $params ) {
    list(, $caller) = debug_backtrace(false);
    $controller = str_replace('_controller','',strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $caller['class'])));
    $action = $caller['function'];
    $view = APP_ROOT . "/app/views/$controller/$action.php";
    extract( $params );
    ob_start();
    require $view;
    $yield_body = ob_get_clean();
    ob_start();
    require "app/views/layouts/" . static::$layout . ".php";
    $tmp = ob_get_clean();
    $tmp = str_replace( "\n", "\r\n", $tmp );
    echo $tmp;
    die();
  }

  public function redirect( $params ) {
    #echo "RED: "; print_r($params);
    header("Location: " . $params['url']);
    die;
  }

  public function send_file( $params ) {
    extract( $params );
    header("Content-type: text/csv; charset=utf-8");
    header("Content-Disposition: inline; filename=$id.$format");
    header('Content-Length: ' . strlen($data));
    header("Pragma: no-cache");
    header("Expires: 0");
    echo $data;
    die;
  }

  public function send_email( $params ) {
    extract( $params );
    $headers = "From: $from" . "\r\n" .
       "Reply-To: $reply_to" . "\r\n" .
       'X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $subject = "=?utf-8?B?".base64_encode($subject)."?=";
/*
    if (mail($to, $subject, $body, $headers)) {
      $_SESSION['send_email'] = array('status' => 'OK');
    } else {
      $_SESSION['send_email'] = array('status' => 'ERROR');
    }
    header("Location: " . $_SERVER['HTTP_REFERER'] );
*/
    echo $body;
    die;
  }

  // from http://wezfurlong.org/blog/2006/nov/http-post-from-php-without-curl
  function do_post_request($url, $data, $optional_headers = null) {
    $params = array('http' => array(
                'method' => 'POST',
                'content' => $data
              ));
    if ($optional_headers !== null) {
      $params['http']['header'] = $optional_headers;
    }
    $ctx = stream_context_create($params);
    $fp = @fopen($url, 'rb', false, $ctx);
    if (!$fp) {
      throw new Exception("Problem with $url, $php_errormsg");
    }
    $response = @stream_get_contents($fp);
    if ($response === false) {
      throw new Exception("Problem reading data from $url, $php_errormsg");
    }
    return $response;
  }
}
