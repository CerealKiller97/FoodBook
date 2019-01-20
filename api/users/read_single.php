<?php

require_once '../../modules/functions.php';

GETHeader();

$code = 403;
$data = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Getting id and API-KEY
  $id = $_GET['id'] ?? null;
  $token = $_GET['apiKey'] ?? null;
  // Loading User model
  loadModel('User');
  
  if (Token::check($token)) {
    if (Token::validate($token)) {
      $data = User::find($id);
      if (is_object($data)) {
        $data = $data;
        $code = 202;
      } else {
        $data = 'No user found!';
        $code = 500;
      }
    } 
} else {
    $data = 'Autorization failed!';
  }
}
echo json_encode($data);
http_response_code($code);
