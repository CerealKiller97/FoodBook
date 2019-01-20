<?php

require_once '../../modules/functions.php';
GETHeader();
$code = 404;
$data = null;

if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
  $token = $_GET['apiKey'] ?? null;
 
  loadModel('User');

  if (Token::check($token)) {
    if (Token::validate($token)) {
      echo('validan token');
    }
  }
}