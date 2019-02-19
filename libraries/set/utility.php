<?php
/** 
 * utility
 * 
 * Consists helping hand functions such as getting date, time,
 * validating user data, generating random data and much more.
 * 
 * @author Akhil Kokani
 * @package SET
 */
class utility {

  /**
   * Generates Secure Random Number.
   *
   *
   * @package SET
   *
   * @param string $prefix
   * @param int    $length
   * @return string
   */
  function generate_secure_string ( $prefix = "id_", $length = 25 ) {
    return $prefix . bin2hex ( random_bytes($length) );
  }
}