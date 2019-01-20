<?php
 abstract class Model {
  /* Properties */
  protected $id;
  protected $deleted;
  protected $created;
  
  /* Basic querries */
  public static abstract function all(); // SELECT *
  public static abstract function find($id); // SELECT by ID
  public static abstract function count(); // SELECT count (*)
  public static abstract function create(); // INSERT
  public static abstract function delete($id); // DELETE --soft
  public static abstract function update(); // UPDATE

  public abstract static function tableName();
}
