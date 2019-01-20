<?php

require_once '../../modules/functions.php';

GETHeader();

$code = 404;
$data = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Getting API-KEY
  $token = $_GET['apiKey'] ?? null;
  // Load User model
  loadModel('User');
  
  if (Token::check($token)) {  
    if (Token::validate($token)) {
      $users = User::all();
      if (is_array($users)) {
        $data = $users;
        $code = 202;
      } else {
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
