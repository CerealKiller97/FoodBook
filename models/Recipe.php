<?php

class Recipe extends Model {

  /* Data */
  private static $title;
  private static $description;
  private static $ingridients;
  private static $slug;
  private static $aproximatedTime;
  private static $image;
  private static $userID;

  // Queeries
  public static function all() {
    $sql = "SELECT r.id as recipeID,r.title,r.description,r.ingridients,r.slug,r.approximatedTime,r.image,r.created,
    u.id,u.username 
            FROM " . self::tableName() . " r 
            INNER JOIN user u
            ON r.userID = u.id
            WHERE r.deleted = 0;";
    $stmt = DB::getInstance()->getConnection()->prepare($sql);
    try {
      $stmt->execute();
      $result = $stmt->fetchAll();
    } catch(PDOException $e) {
      echo $e->getMessage();
    }
    // Checking for any result
    return ($stmt->rowCount() > 0) ? $result : false;
  }

  public static function find($id) {
    $sql = "SELECT * FROM " . self::tableName() . " WHERE deleted = 0 AND id = :id;";
    $stmt = DB::getInstance()->getConnection()->prepare($sql);
    try {
      $stmt->execute([':id' => $id]);
      $result = $stmt->fetch();
    } catch(PDOException $e) {
      echo $e->getMessage();
    }
    // Checking for any result
    return ($stmt->rowCount() === 1) ? $result : false;
  }

  public static  function count() {

  } 

  public static  function create() {
    $sql = "INSERT INTO " . self::tableName() . "(id, title, description, ingridients, slug, approximatedTime, image, userID) 
            VALUES(null, :title, :description, :ingridients, :slug, :approximatedTime, :image, :userID);";
    //Binding
    $stmt = DB::getInstance()->getConnection()->prepare($sql);
    $stmt->bindParam(':title', self::$title, PDO::PARAM_STR);
    $stmt->bindParam(':description', self::$description, PDO::PARAM_STR);
    $stmt->bindParam(':ingridients', self::$ingridients, PDO::PARAM_STR);
    $stmt->bindParam(':slug', self::$slug, PDO::PARAM_STR);
    $stmt->bindParam(':approximatedTime', self::$aproximatedTime ,PDO::PARAM_INT);
    $stmt->bindParam(':image', self::$image, PDO::PARAM_STR);
    $stmt->bindParam(':userID', self::$userID, PDO::PARAM_INT);
    try {
      $stmt->execute();
      return ($stmt->rowCount() === 1);
    } catch (PDOException $e) {
      echo $e->getMessage(); 
    }
  } 

  public static  function delete($id) {
    $sql = "UPDATE "  . self::tableName() . " SET deleted = 1 WHERE id = :id;";
    $stmt = DB::getInstance()->getConnection()->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    try {
      $stmt->execute();
      // Checking for any result
      return ($stmt->rowCount() === 1);
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  } 

  public static  function update() {

  } // UPDATE


  public static function user($id) {
    $sql = "SELECT r.id as recipeID,r.title,r.description,r.ingridients,r.slug,r.approximatedTime,r.image,r.created,
    u.id,u.username 
            FROM " . self::tableName() . " r 
            INNER JOIN user u
            ON r.userID = u.id
            WHERE u.id = :id AND r.deleted = 0;";
    $stmt = DB::getInstance()->getConnection()->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    try {
      $stmt->execute();
      $result = $stmt->fetchAll();
    } catch(PDOException $e) {
      echo $e->getMessage();
    }
    // Checking for any result
    return ($stmt->rowCount() > 0) ? $result : false;
  }

  public static function latest() {
    $sql = "SELECT r.id as recipeID,r.title,r.description,r.ingridients,r.slug,r.approximatedTime,r.image,r.created,
    u.id,u.username 
            FROM " .self::tableName() . " r
            INNER JOIN user u
            ON r.userID = u.id
            WHERE r.deleted = 0
            ORDER BY r.created DESC
            LIMIT 0,3;";
    $stmt = DB::getInstance()->getConnection()->prepare($sql);
    try {
      $stmt->execute();
      $result = $stmt->fetchAll();
    } catch(PDOException $e) {
      echo $e->getMessage();
    }
    // Checking for any result
    return ($stmt->rowCount() > 0) ? $result : false;
  }

  public static function paginate($perPage) {
    if (is_int($perPage)) {
      $from = $perPage * 3;
      $to = 3;
      $sql = "SELECT r.id as recipeID,r.title,r.ingridients,r.slug,r.approximatedTime,r.image,r.created,
      u.id,u.username 
              FROM " . self::tableName() . " r
              INNER JOIN user u
              ON r.userID = u.id
              WHERE r.deleted = 0
              LIMIT :perPage , :to;";
    $stmt = DB::getInstance()->getConnection()->prepare($sql);
    $stmt->bindParam(':perPage', $from, PDO::PARAM_INT);
    $stmt->bindParam(':to', $to, PDO::PARAM_INT);
    try {
      $stmt->execute();
      $result = $stmt->fetchAll();
    } catch(PDOException $e) {
      echo $e->getMessage();
    }
    // Checking for any result
    return ($stmt->rowCount() > 0) ? $result : false;
    }
  }

  // Getters

  public static function getTitle() {
    return self::$title;
  }

  public static function getDescription() {
    return self::$description;
  }

  public static function getIngridients() {
    return self::$ingridients;
  }

  public static function getSlug() {
    return self::$slug;
  }

  public function getAproximatedTime() {
    return self::$aproximatedTime;
  }

  public function getImage() {
    return self::$image;
  }

  public function getUserID() {
    return self::$userID;
  }

  // Setters

  public static function setTitle($title) {
    self::$title = $title;
  }

  public static function setDescription($description) {
    self::$description = $description;
  }

  public static function setIngridients($ingridients) {
    self::$ingridients = $ingridients;
  }

  public static function setSlug($slug) {
    self::$slug = $slug;
  }

  public static function setAproximatedTime($aproximatedTime) {
    self::$aproximatedTime = $aproximatedTime;
  }

  public static function setImage($image) {
    self::$image = $image;
  }
  public static function setUserID($userID) {
    self::$userID = $userID;
  }

  public static function tableName() {
    return strtolower(__CLASS__);
  }
}