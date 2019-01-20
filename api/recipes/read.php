<?php

require_once '../../modules/functions.php';

GETHeader();

$code = 404;
$data = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Getting API-KEY
  $token = $_GET['apiKey'] ?? null;
  // Load User model
  loadModel('Recipe');
  
  if (Token::check($token)) {  
    if (Token::validate($token)) {
      $recipes = Recipe::all();
      if (count($recipes)) {
        $data = $recipes;
        $code = 202;
      } else {
        $data = 'No recipes';
        $code = 500;
      }   
    }
  } else {
    $code = 403;
    $data = 'Authorization failed!';
  }
}
echo json_encode($data);
http_response_code($code);
