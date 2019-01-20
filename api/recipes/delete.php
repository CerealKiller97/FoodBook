<?php

require_once '../../modules/functions.php';

DELETEHeader();

$code = 404;
$data = null;

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  $token = $_GET['apiKey'] ?? null;
  $tmp = json_decode(file_get_contents("php://input"));
  $id = $tmp->id ?? null;

  loadModel('Recipe');

  
  if (Token::check($token)) {
    if (Token::validate($token)) {
      $data = Recipe::delete($id) ? 'User deleted' : 'No user found';
      $code = ($data === 'User deleted') ? 204 : 500;
    } 
} else {
    $code = 403;
    $data = 'Autorization failed!';
  }
} 
echo json_encode($data);
http_response_code($code);
