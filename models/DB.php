<?php

class DB {
  //Database paramaters
  private $host = 'localhost';
  private $dbName = 'foodbook';
  private $username = 'root';
  private $password = 'root';
  private static $instance = null;
  private $conn = null;

  private function __construct() {
    $this->connect();
  }

  public function __destruct() {
    $this->conn = null;
  }
  // Singleton
  public static function getInstance() {
    if(self::$instance === null) {
      self::$instance = new DB();
    }
    return self::$instance;
  }
  //Database connection
  public function connect() {
    try {
      $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->username,  $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch (PDOException $e) {
      echo 'Connecting failed, error: ' . $e->getMessage();
    }
    return $this->conn;
  }

  public static function table($table) {
    $sql = "SELECT * FROM $table WHERE deleted = 0;";
    $stmt = self::getInstance()->getConnection()->prepare($sql);
    try {
      $stmt->execute();
      $data = ($stmt->rowCount() > 0) ? $stmt->fetchAll() : false;
    } catch (PDOException $e) {
      $data = $e->getMessage();
    }
    return $data;
  }

  public function getConnection() {
    return $this->conn;
  }
}
