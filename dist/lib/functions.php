<?php
define('JSONFORMAT', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
define('JSONFORMATDEV', JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);

function toJSON($data, $status=200, $headers=[]) {
  while (ob_get_level()) ob_end_clean();
  header_remove();
  header('Content-type: application/json');
  header('Access-Control-Allow-Origin: *');
  header('Expires: Sun, 01 Jan 1970 00:00:00 GMT');
  header('Cache-Control: no-cache');
  header('Pragma: no-cache');
  foreach($headers as $h) { header($h); }
  http_response_code($status);
  echo json_encode($data, JSONFORMATDEV);
  die;
}

function parseURI() {
  $uri = parse_url( $_SERVER['REQUEST_URI'] );
  $uri['path'] = trim($uri['path'], ' /');
  $uri['crumbs'] = explode('/', $uri['path']);
  $uri['method'] = strtoupper($_SERVER['REQUEST_METHOD']??'GET');
  return (object)$uri;
}

function redirect( $params ) {
  #echo "RED: "; print_r($params);
  header("Location: " . $params['url']);
  die;
}

function send_file( $params ) {
  extract( $params );
  header("Content-type: text/csv; charset=utf-8");
  header("Content-Disposition: inline; filename=$id.$format");
  header('Content-Length: ' . strlen($data));
  header("Pragma: no-cache");
  header("Expires: 0");
  echo $data;
  die;
}

function send_email( $params ) {
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