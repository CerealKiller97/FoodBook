<?php

class Token {

  /**
   * Generate a CSRF token
   * 
   * @function token
   * @return string
  */

  public static function generate() {
    $token =  bin2hex(random_bytes(32));
    return "<input type='hidden' id='csrf_token' value='{$token}'/>";
  }

 /**
   * Validate a CSRF token
   * 
   * @function token
   * @return string
  */

  public static function validate($token) {
    return strlen($token) === 64;
  }

  /**
   * Check if token is set
   * 
   * @function token
   * @return string
  */

  public static function check($token) {
    return $token ?? null;
  }

  
}
