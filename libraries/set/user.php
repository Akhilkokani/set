<?php
/** 
 * user
 * 
 * Consists all functions realted to user only.
 * Functions such as checking if user has startup or not,
 * checking if user has uploaded profile picture and much more...
 * 
 * @author Akhil Kokani
 * @package SET
 */

class user {

  /**
   * Checks if username exists in DB.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $username
   * @return void
   */
  public function check_if_username_exists ( 
    $connection,
    $username
  ) {

    // Santising
    $username = htmlspecialchars ( $username );

    // Checking if username exists in DB
    $query_to_check_if_username_exists = mysqli_query ( $connection, "SELECT slno FROM users WHERE user_username = '$username' LIMIT 1" );

    // Username exists
    if (
      $query_to_check_if_username_exists && 
      mysqli_num_rows( $query_to_check_if_username_exists ) === 1
    ) {
      return true;
    }

    return false;
  }



  /**
   * Checks whether user has logged in or not.
   *
   *
   * @package SET
   *
   * @return boolean
   */
  function check_if_is_logged_in () {

    if ( 
      isset($_SESSION['logged_in']) &&
      isset($_SESSION['user_id']) &&
      $_SESSION['logged_in'] === true &&
      $_SESSION['user_id'] !== ""
    ) {
      return true;
    } 
    else {
      return false;
    }
  }



  /**
   * Used to get User ID using username
   *
   *
   * @package SET
   *
   * @param String $connection
   * @return void
   */
  function get_user_id_using_username (
    $connection,
    $username
  ) {

    // Santising
    $username = htmlspecialchars ( $username );

    // Fetching user id from DB
    $query_to_get_user_id_from_db = mysqli_query (
      $connection, 
      " SELECT 
        user_id 
      FROM 
        users 
      WHERE 
        user_username = '$username' 
      LIMIT 
        1 "
    ) or die ( mysqli_error($connection) );

    // User ID Fetched
    if ( 
      $query_to_get_user_id_from_db && 
      mysqli_num_rows($query_to_get_user_id_from_db) === 1
    ) {

      return mysqli_fetch_array ( $query_to_get_user_id_from_db, MYSQLI_ASSOC )["user_id"];
    }

    // User ID not fetched
    return "";
  }
}