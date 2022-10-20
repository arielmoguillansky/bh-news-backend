<?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: access");
  header("Access-Control-Allow-Methods: GET,POST");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  header("Content-type: application/json; charset=UTF-8");

  spl_autoload_register('autoloader');

  function autoloader($class) {
    include_once '../controller/' . $class . '.php';
  };
  $controller = new ArticleController();
  $res= $controller->getArticles();
  echo json_encode($res);

?>