<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
//   //require '../vendor/autoload.php';
// require_once '../src/Exception.php';
// require_once '../src/PHPMailer.php';
// require_once '../src/SMTP.php';

class User extends Model {

  /* Data */
  private static $firstName;
  private static $lastName;
  private static $email;
  private static $username;
  private static $password;
  private static $token;

  // Querries

/**
 * 
 * Gets all users from DB
 * 
 * @param none
 * @return object||boolean
 */

  public static function all() {
    $sql = "SELECT u.id,firstname,lastname,username,email,password,token,active,roleID,u.created,role 
            FROM " . self::tableName() . " u 
            INNER JOIN role r 
            ON u.roleID = r.id
            WHERE u.deleted = 0;";
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
  
  public static function count() {
    $sql = "SELECT COUNT(*) AS count FROM " . self::tableName() . " WHERE deleted = 0;";
    $stmt = DB::getInstance()->getConnection()->prepare($sql);
    try {
      $stmt->execute();
      $result = $stmt->fetch();
    } catch(PDOException $e) {
      echo $e->getMessage();
    }
    // Checking for any result
    return ($stmt->rowCount() === 1) ? $result->count : false;
  } 
  // CREATE USER
  public static function create() {
    $sql = "INSERT INTO " . self::tableName() . "(id, firstname, lastname, username, email, password, token, roleID) 
            VALUES(null, :firstName, :lastName, :username, :email, :password, :token, :role);";
    $password = password_hash(self::$password , PASSWORD_DEFAULT);
    
    $role = 2;
    //Binding
    $stmt = DB::getInstance()->getConnection()->prepare($sql);
    $stmt->bindParam(':firstName', self::$firstName, PDO::PARAM_STR);
    $stmt->bindParam(':lastName', self::$lastName, PDO::PARAM_STR);
    $stmt->bindParam(':username', self::$username, PDO::PARAM_STR);
    $stmt->bindParam(':email', self::$email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password ,PDO::PARAM_STR);
    $stmt->bindParam(':token', self::$token, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_INT);
    try {
      $stmt->execute();
      return ($stmt->rowCount() === 1);
    } catch (PDOException $e) {
      //echo $e->getMessage();
      return false; // email unavailable
    }
  }

  // DELETE USER --soft

  public static function delete($id) {
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

  // UPDATE

  public static function update() {

  } 

  // login statitc
  public static function login($email, $password, $hashedPasswordDB) {
    $sql = "SELECT u.id,firstname,lastname,username,email,password,token,active,roleID,u.created,role 
            FROM " .  self::tableName() . " u INNER JOIN role r
            ON u.roleID = r.id
            WHERE email = :email AND password = :password AND active = 1 AND u.deleted = 0;";
    $stmt = DB::getInstance()->getConnection()->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hashedPasswordDB, PDO::PARAM_STR);
    try {
      $stmt->execute();
      if ($stmt->rowCount() === 1 && password_verify($password, $hashedPasswordDB)) {
        $user = $stmt->fetch();
        return $user;
      } else {
        return false;
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }     
  }

  public static function fetchHashPass($email) {
    $sql = "SELECT * FROM " . self::tableName()  . " WHERE email = :email AND deleted = 0;";
    $stmt = DB::getInstance()->getConnection()->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    try {
      $stmt->execute();
      $hashedPWD = $stmt->fetch();
      if ($hashedPWD) {
        $hashedPWD = $hashedPWD->password;
      } else {
        return false;
      }
      return ($stmt->rowCount() === 1) ? $hashedPWD : false;
    } catch (PDOException $e) {
      echo $e->getMessage();
    } 
  }

  

  // public function mail($email) {
  //   // use require mailer
  //   $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  //   try {
  //       //Server settings
  //       $mail->SMTPDebug = 2;                                 // Enable verbose debug output
  //       $mail->isSMTP();                                      // Set mailer to use SMTP
  //       $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
  //       $mail->SMTPAuth = true;                               // Enable SMTP authentication
  //       $mail->Username = 'webprogramiranje@gmail.com';                 // SMTP username
  //       $mail->Password = 'rocangle';                           // SMTP password
  //       $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  //       $mail->Port = 587;                                    // TCP port to connect to

  //       $mail->SMTPOptions = [
  //         'ssl' =>  [
  //           'verify_peer' => false,
  //           'verify_peer_name' => false,
  //           'allow_self_signed' => true
  //           ]
  //         ];

  //       //Recipients
  //       $mail->setFrom('webprogramiranje@gmail.com', 'FoodBook');
  //       $mail->addAddress($email);

  //       //Content
  //       $mail->isHTML(true);                                  // Set email format to HTML
  //       $mail->Subject = 'Here is the subject';
  //       $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
  //       $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  //       $mail->send();
  //       echo 'Message has been sent';
  //   } catch (Exception $e) {
  //       echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  //   }
  // }

  // Getters

  public static function getFirstName() {
    return self::$firstName;
  }

  public static function getLastName() {
    return self::$lastName;
  }

  public static function getUsername() {
    return self::$username;
  }

  public static function getEmail() {
    return self::$email;
  }

  public static function getPassword() {
    return self::$password;
  }  

  // Setters

  public static function setFirstName($firstName) {
    self::$firstName = $firstName;
  }

  public static function setLastName($lastName) {
    self::$lastName = $lastName;
  }
  
  public static function setEmail($email) {
    self::$email = $email;
  }

  public static function setUsername($username) {
    self::$username = $username;
  }

  public static function setPassword($password) {
    self::$password = $password;
  }

  public static function setToken($token) {
    self::$token = $token;
  }

  public static function tableName() {
    return strtolower(__CLASS__);
  }

}
