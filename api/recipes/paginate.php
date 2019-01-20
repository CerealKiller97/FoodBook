<?php

require_once '../../modules/functions.php';

GETHeader();

$code = 403;
$data = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Getting id and API-KEY
  $page = $_GET['page'] ?? 0;
  $token = $_GET['apiKey'] ?? null;
  // Loading Recipe model
  loadModel('Recipe');
  
  if (Token::check($token)) {
    if (Token::validate($token)) {
      $recipes = Recipe::paginate(intval($page));
      if (is_array($recipes)) {
        $data = $recipes;
        $code = 202;
      } else {
        $data = 'No recipe found!';
        $code = 500;
      }
    } 
} else {
  $data = 'Autorization failed!';
  $code = 403;
  }
}
echo json_encode($data);
http_response_code($code);
