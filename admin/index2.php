<?php
@session_start();
require_once '../modules/functions.php';
if (!adminLoggedIn()) {
  redirect('login');
}
$page = $_GET['page'] ?? null;



echo 'ADMIN';