<?php

/**
 * 
 * Autoloading  model classes
 * 
 * @param  string $class
 * @return arr:object||string
 */

// spl_autoload_register(function ($class) {
//   require_once "models/$class.php";
// });


/* HELPER FUNCTIONS */

/**
 * Get domain
 * 
 * @function getDomain
 * @return string represents an domain URL
 */

function getDomain() {
  return 'foodbook.local';
}


function cleanField($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

/**
 * 
 * Get post key
 * 
 * @param  object $conn respresents instance of database connection
 * @return arr:object||string
 */

function post($key, $default = false) {
  return $_POST[$key] ?? $default;
}

/**
 * 
 * Get post key
 * 
 * @param  object $conn respresents instance of database connection
 * @return arr:object||string
 */

function get($key, $default = false) {
  return $_GET[$key] ?? $default;
}

/**
 * 
 * Checks if user is logged in
 * 
 * @param none
 * @return boolean
 */

function userLoggedIn() {
  return isset($_SESSION['user']); 
}

/**
 * 
 * Checks if admin is logged in
 * 
 * @param none
 * @return boolean
 */

function adminLoggedIn() {
  return ( (userLoggedIn()) && ($_SESSION['user']->role === 'Admin') );
}

/**
 * 
 * Redirection to specific page/path
 * 
 * @param string $path represents relative path from base url
 * @return void
 */

function redirect($path) {
  header('Location:' . getDomain() .'?page='.$path);
}

/**
 * Cleaner die dumping
 * 
 * 
 * @param any $key represents
 * @return void
 */

function dd($var) {
  echo '<pre>';
    print_r($var);
  echo '</pre>';
}

function component($component) {
  require_once "resources/components/$component.php";
}

function view($view) {
  require_once "resources/views/$view.php";
}

function routerView($page) {
  switch ($page) {
    case 'login':
      view('login');
      break;
    
    case 'register':
      view('register');
      break;

    case 'forget':
      view('forget');
      break;
      
    case 'contact':
      view('contact');
      break;  
      
    case 'profile':
      view('profile');
      break;  

    case 'update-recipe':
      view('update-recipe');
      break; 

    case 'logout':
      view('logout');
      break;  

    case 'add-recipe':
      view('add-recipe');
      break; 
      
    case 'recipes':
      view('recipes');
      break;   
      
    case 'recipe':
      view('recipe');
      break;

    default:
      view('home');
      break;
  }
}

/* REGULAR EXPRESSIONS */

/**
 * @function post
 * @param any $key represents
 * @return $key false
 */

function checkFirstName($firstName) {
  $regExp = '/^[A-Z][a-z]{2,20}$/';
  return preg_match($regExp, $firstName);
}

/**
 * @function post
 * @param any $key represents
 * @return boolean
 */

function checkLastName($lastName) {
  $regExp = '/^[A-Z][a-z]{2,20}$/';
  return preg_match($regExp, $lastName);
}

/**
 * @function post
 * @param any $key represents
 * @return boolean
 */

function checkPassword($password) {
  $regExp = '/^[0-9a-zA-Z]{8,}$/';
  return preg_match($regExp, $password);
}

/**
 * @function post
 * @param any $key represents
 * @return boolean
 */

function checkUsername($username) {
  $regExp = '/^[0-9a-zA-Z]{4,}$/';
  return preg_match($regExp, $username);
}

/**
 * Check if email is valid
 * 
 * @function isEmail
 * @return boolean
 */

function checkEmail($email) {
  return  filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
}


/**
 * @function post
 * @param any $key represents
 * @return boolean
 */

function hasErrors() {
  return (isset($_SESSION['errors'])) ? true : false;
}

/**
 * @function post
 * @param any $key represents
 * @return boolean
 */

function isSuccess() {
  return (isset($_SESSION['success'])) ? true : false;  
}

/* API  */

function json() {
  header('Content-type: application/json');
}

function GETHeader() {
  header('Content-type: application/json');
  header('Access-Control-Allow-Origin:' . getDomain());
  header('Access-Control-Allow-Methods: GET');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
}

/**
 * POST header
 * 
 * @function POSTHeader
 * @return void
 */

function POSTHeader() {
  header('Content-type: application/json');
  header('Access-Control-Allow-Origin: '. getDomain());
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
}

function DELETEHeader() {
  header('Content-type: application/json');
  header('Access-Control-Allow-Origin: '. getDomain());
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
}

function validateToken($token) {
  return strlen($token) === 64;
}

/* SESSION HELPERS */

function auth() {
  return $_SESSION['user'];
}


/* MODEL HELPER */


/**
 * Require specific model for API
 * 
 * @function loadModel
 * @return void
 */

function loadModel($model) {
  $models = ['DB', 'Model', 'Token'];
  $models[] = $model;
  foreach($models as $model) {
    require_once "../../models/{$model}.php";
  }
}

function loadModelsForFront() {
  $models = ['DB', 'Model', 'Token'];
  foreach($models as $model) {
    require_once "models/{$model}.php";
  }
}