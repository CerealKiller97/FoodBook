<?php

class Navigation extends Model {
  
    /* Data */
    private static $link;

    public static function all() {
      $sql = "SELECT * FROM self::$table WHERE deleted = 0;";
      // $stmt = $this->conn->prepare($sql);
      // $stmt->execute();
      // $result = $stmt->fetchAll();
      // // Checking for any result
      // return ($stmt->rowCount() > 0) ? $result : false;
    }

    public static function find($id) {

    } // SELECT by ID
    public static function count() {

    } // SELECT count (*)
    public static function create() {

    } // INSERT
    public static function delete($id) {

    } // DELETE --soft
    public static function update() {

    } // UPDATE

    public static function tableName() {
      return strtolower(__CLASS__);
    }

    /**
     * Get the value of link
     */ 
    public static function getLink() {
        return self::link;
    }

    /**
     * Set the value of link
     *
     * @return  self
     */ 
    public static function setLink($link){
        self::$link = $link;
    }
}