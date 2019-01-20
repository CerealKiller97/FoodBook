<?php

@session_start();

require_once '../../modules/functions.php';

POSTHeader();

$code = 404;
$data = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  // Getting id and API-KEY
  $token = $_GET['apiKey'] ?? null;
  // Loading User model
  loadModel('User');

  if (Token::check($token)) {
    if (Token::validate($token)) {
      $tmp = (array) json_decode(file_get_contents("php://input"));
      ['email' => $email, 'password' => $password] = $tmp;
      $hashedPasswordDB = User::fetchHashPass($email);  
      $user = User::login($email, $password, $hashedPasswordDB);
      if (is_object($user)) {
        $data = 'Valid credentials';
        $_SESSION['user'] = $user;
        $code = 202;
      } else {
        $data = 'Invalid credentials'; // or deleted ?
        $code = 401;
      }
    }
  } else {
    $data = 'Autorization FAILED!';
    $code = 403;
  }
}
echo json_encode($data);
http_response_code($code);
