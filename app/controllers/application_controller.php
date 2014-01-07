<?php
require_once 'vendor/autoload.php';
use RedBean_Facade as R;
R::setup('mysql:host=127.0.0.1;dbname=cal.dev','root','');
session_cache_limiter(false);
session_start();
class ApplicationController {
  static $app;
  public function init() {
    \Slim\Slim::registerAutoloader();
    self::$app = new \Slim\Slim();
    self::$app->config(array(
      'mode' => 'development',
      'debug' => true,
      'templates.path' => 'app/views'
    ));
    self::$app->get('/', array(HomeController,'index'));
    self::$app->get('/agents', array(AgentsController,'index'));
    self::$app->get('/agents/new', array(AgentsController,'new_item'));
    self::$app->put('/agents', array(AgentsController,'update'));
    self::$app->get('/agents/:id/edit', array(AgentsController,'edit'));
    self::$app->get('/agents/:id', array(AgentsController,'show'));
    self::$app->post('/agents', array(AgentsController,'create'));
    self::$app->post('/pepo', array(HomeController,'index'));

  }
}

require_once 'app/controllers/home_controller.php';
require_once 'app/controllers/agents_controller.php';

ApplicationController::init();

/*
$app->get('/hello/:id', function ($id) {

    $post = R::load('posts',$id); //Retrieve
    echo "Hello, $post->text";
});

$app->get('/foox', function () use ($app) {
    $app->render('foo.php'); // <-- SUCCESS
});
 */
