<?php
 @session_start();
 require_once '../../modules/functions.php';

  if (userLoggedIn()) {
    session_destroy();
    unset($_SESSION['user']);
    redirect('login');
  } else {
    header('Location: pera.com');
  }