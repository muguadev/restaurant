<?php

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$page = explode("/", $uri)[1];
$page = ($page == "") ? "index" : $page;

if (($method == 'GET') && file_exists("app/public/$page.html")) {
  echo file_get_contents("app/public/$page.html");
} elseif ($method == 'GET') {
  http_response_code(404);
  include("app/public/404.html");
  die();
} else {
  echo "Unsupported method";
}
