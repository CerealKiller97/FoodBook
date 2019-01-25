<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use League\OAuth2\Client\Provider\Google;
  
  require '../vendor/autoload.php';

  class Mailer {
    private $email;
    private static $serverMail = 'stefan@infiniteloopdev.com';
    private static $mailPassword = 'rocangle';
      
    public function __construct($email) {
      $this->email = htmlspecialchars(strip_tags($email));
    }
    
    public function sendMail() {
      $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
      try {
          //Server settings
          $mail->SMTPDebug = 0;                                 // Enable verbose debug output
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.yandex.com';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = self::$serverMail;                 
          $mail->Password = self::$mailPassword;                           // SMTP password
          $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 465;                                    // TCP port to connect to

          //Recipients
          $mail->setFrom(self::$serverMail, 'Foodbook');
          $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient

          //Attachments
          $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
          $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

          //Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'Foodbook verification email';
          $mail->Body    = '<h1>Some text</h1>';

          $mail->send();
          echo 'Message has been sent';
      } catch (Exception $e) {
          echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      }
    }
  }