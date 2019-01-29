<?php

require_once '../../modules/functions.php';

POSTHeader();

$code = 404;
$data = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Getting API-KEY
  $token = htmlspecialchars(strip_tags($_GET['apiKey']))  ?? null;

  require_once '../../models/Token.php';
  
  if (Token::check($token)) {  
    if (Token::validate($token)) {
      ['name' => $name, 'tmp_name' => $tmp_name] = $_FILES['image'];
      
      $newFile = time() . $name;
      $filePATH = '../../images/' . $newFile;

      if (move_uploaded_file($tmp_name, $filePATH)) {
        $filePATHDB = 'images/' . $newFile;
        $data = $filePATHDB;
        $code = 200;
      }
    }
  } else {
    $code = 403;
    $data = 'Authorization failed!';
  }
}
echo json_encode($data);
http_response_code($code);
