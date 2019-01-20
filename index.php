<?php
  @session_start();
  require_once 'modules/functions.php';
  loadModelsForFront();
  $conn = DB::getInstance()->getConnection();
  $page = $_GET['page'] ?? 'home';
  require_once 'resources/components/head.php';
  require_once 'resources/components/nav.php';
    routerView($page);
  require_once 'resources/components/footer.php';
  