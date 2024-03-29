<?php

require_once '../../modules/functions.php';

POSTHeader();

$code = 404;
$data = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Getting id and API-KEY
  $token = $_GET['apiKey'] ?? null;
  // Getting data
  $tmp = $_POST;


  // Loading User model
  loadModel('Recipe');

  if (Token::check($token)) {  
    if (Token::validate($token)) {      
      ['title' => $title, 'description' => $description, 'approximatedTime' => $approximatedTime, 'ingridients' => $ingridients, 'userID' => $userID, 'recipeImage' => $recipeImage] = $_POST;

     $ingridientsArr =  explode(',',$ingridients);
      // Validation
      $errors = [];
      
      if (!$title) {
        $errors[] = 'Title  must not be empty';
      } 

      if (!$description) {
        $errors[] = 'Description  must not be empty';
      } 

      if ($approximatedTime < 0) {
        $errors[] = 'Aproximated time  must not be empty';
      }
    
      if (count($ingridientsArr) === 0) {
        $errors[] = 'Ingridients must not be empty';
      }
    
      if (count($errors) === 0) {
          Recipe::setTitle($title);
          Recipe::setDescription($description);
          Recipe::setIngridients($ingridients);
          Recipe::setSlug('recipe-slug');
          Recipe::setAproximatedTime($approximatedTime);
          Recipe::setImage($recipeImage);
          Recipe::setUserID($userID);

          if (Recipe::create()) {
            $data = 'Successfully added new recipe!';
            $code = 201;
          } else {
              $data = 'Err';
              $code = 500;
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
