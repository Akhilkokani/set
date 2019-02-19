<?php
/**
 * AJAX RESPONSE FILE.
 * Used to recevive AJAX requests, process them, and respond with appropriate result code(s).
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

session_start();
include_once "../libraries/set/set.php";


/** 
 * Login AJAX
 * 
 */
if ( 
  isset($_POST['action']) &&
  $_POST['action'] == "login" &&
  isset($_POST['uname']) &&
  isset($_POST['pwd'])
) {

  // Santising User Inputs
  $username = htmlspecialchars ( $_POST['uname'] );
  $password = htmlspecialchars ( $_POST['pwd'] );

  // Checking whether both username and password exists in DB
  $query_to_check_username_and_password_exists = mysqli_query (
    $connection, 
    " SELECT 
      slno 
    FROM 
      users 
    WHERE 
      user_username = '$username' 
    AND 
      user_password = '$password' 
    LIMIT 
      1 "
  ) or die ( mysqli_error($connection) );

  // User exists in DB
  if ( 
    $query_to_check_username_and_password_exists && 
    mysqli_num_rows ( $query_to_check_username_and_password_exists ) === 1
  ) {

    // Setting Session Variables
    $_SESSION['logged_in'] = true;
    $_SESSION['user_id'] = $user->get_user_id_using_username ( $connection, $username );
    echo "success";
    die();
  }
  // User does not exists in DB
  else {

    echo "invalid_data";
    die();
  }

  echo "unknown";
  die();
}



/** 
 * Sign up
 * 
 */
if ( 
  isset($_POST['action']) &&
  $_POST['action'] == "signup" &&
  isset($_POST['email']) &&
  isset($_POST['uname']) &&
  isset($_POST['pwd'])
) {
  
  // Fetching and Santising Inputs
  $email = htmlspecialchars ( $_POST['email'] );
  $username = htmlspecialchars ( $_POST['uname'] );
  $password = htmlspecialchars ( $_POST['pwd'] );

  // Email is already used
  if (
    $user->check_if_email_exists($connection, $email) ||
    $incubation->check_if_email_exists($connection, $email)
  ) {

    echo "email_used";
    die();
  }

  // Username is already used
  if ( $user->check_if_username_exists($connection, $username) ) {

    echo "uname_used";
    die();
  }

  // Added new user
  if ( $user->add_new_user($connection, $email, $username, $password) ) {
    echo "success";
    die();
  }

  // Unknown Error
  echo "unknown";
  die();
}