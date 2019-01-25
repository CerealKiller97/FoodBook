<?php
require_once '../../modules/functions.php';
POSTHeader();
$code = 404;
$data = null;

if (($_SERVER['REQUEST_METHOD'] === 'POST')) {
  // Getting id and API-KEY
  $token = $_GET['apiKey'] ?? null;
  // Getting data
  $tmp = (array) json_decode(file_get_contents("php://input"));
  // Loading User model
  loadModel('User');

  if (Token::check($token)) {  
    if (Token::validate($token)) {      
      ['firstname' => $firstname, 'lastname' => $lastname, 'username' => $username, 'email' => $email, 'password' => $password, 'confirm' => $confirm] = $tmp;

      // Validation
      $errors = [];
    
      if (!$firstname) {
        $errors[] = 'First name must not be empty';
      } else if (!checkFirstName($firstname)) {
        $errors[] = 'Invalid first name';
      }
    
      if (!$lastname) {
        $errors[] = 'Last name must not be empty';
      } else if (!checkLastName($lastname)) {
        $errors[] = 'Invalid last name';
      }
    
      if (!$username) {
        $errors[] = 'Username must not be empty';
      } else if (!checkUsername($username)) {
        $errors[] = 'Invalid username';
      }
    
      if (!$email) {
        $errors[] = 'Email must not be empty';
      } else if (!checkEmail($email)) {
        $errors[] = 'Invalid email address';
      }
    
      if (!$password) {
        $errors[] = 'Password must not be empty';
      } else if (!checkPassword($password)) {
        $errors[] = 'Invalid password';
      }
    
      if ($password !== $confirm) {
        $errors[] = 'Passwords do not match';    
      }
    
      if (count($errors) === 0) {
        // token must be generated here
        $token = bin2hex(random_bytes(60));

        User::setFirstName($firstname);
        User::setLastName($lastname);
        User::setUsername($username);
        User::setEmail($email);
        User::setPassword($password);
        User::setToken($token);
        
        if (User::create()) {
            //if (User::mail($email)) {
              $data = 'Successfully registered! Verify your identity';
              $code = 201;
            //}
          } else {
            $data = 'Email unavailable!';
            $code = 409;
          } 
      } else {
        $data = $errors;
        $code = 422;
      }
    }
  } else {
    $data = 'Autorization failed!';
  }
}
echo json_encode($data);
http_response_code($code);
