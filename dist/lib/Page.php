<?php
require 'Site.php';

class Page {
  static $template = 'default';
  static $view, $title, $content, $uri;

  static function init() {
    self::router();
    echo self::render();
  }

  static function notFound() {
    self::$title = '404';
    self::$content = 'NO ENCONTRADO';
    self::$view = VIEW . '/home/404.php';
  }

  static function home() {
    if(self::$uri->path!='') return FALSE;
    self::$title = 'HOME';
    self::$content = 'EL CONTENIDO DE LA HOME';
    self::$view = VIEW . '/home/home.php';
    return TRUE;
  }

  static function title() {
    if(self::$uri->path!='title') return FALSE;
    self::$title = 'TÍTULO';
    self::$content = (object)[
      'title' => 'EL TÍTULO del Título',
      'description' => 'Esta es la descripción del título'
    ];
    self::$view = VIEW . '/title/title.php';
    return TRUE;
  }

  static function content() {
    $view =  CONT . '/' . self::$uri->path . '.php';
    if(file_exists($view)) {
      self::$view = $view;
      return TRUE;
    }
    $view =  DATA . '/' . self::$uri->path . '.json';
    if(file_exists($view)) {
      self::$content = json_decode(file_get_contents($view));
      self::$title = &self::$content->title;
      self::$view = VIEW . '/home/content.php';
      return TRUE;
    }
    $view =  STAT . '/' . self::$uri->path . '.php';
    if(file_exists($view)) {
      self::$view = $view;
      return TRUE;
    }
    $view =  STAT . '/' . self::$uri->path . '.html';
    if(file_exists($view)) {
      self::$title = 'Static';
      self::$content = (object) [
        'title' => 'Static',
        'content' => file_get_contents($view),
      ];
      self::$view = VIEW . '/home/static.php';
      return TRUE;
    }
    return FALSE;
  }

  static function router() {
    self::$uri = parseURI();
    if(self::home()) return;
    if(self::title()) return;
    if(self::content()) return;
    self::notFound();
  }

  static function render() {
    ob_start();
    require self::$view;
    self::$content = ob_get_clean();
    ob_start();
    require VIEW . '/templates/' . self::$template . '.php';
    return ob_get_clean();
  }
}

Page::init();