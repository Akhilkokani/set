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

// User ID of who is currently logged in
$logged_in_user_id = $user->get_logged_in_user_id();

/** 
 * Sign In
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
 * Sign Up
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



/** 
 * Update User's Name
 * 
 */
if ( 
  isset($_POST['action']) &&
  $_POST['action'] == "update-name" &&
  isset($_POST['name'])
) {

  // Fetching user's updated name
  $updated_name = htmlspecialchars ( $_POST['name'] );

  // Trying to update user's name
  if ( $user->update_name($connection, $logged_in_user_id, $updated_name) ) {
    echo "success";
    die();
  }
  
  echo "unknown";
  die();
}



/** 
 * Update User Email ID
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-email" &&
  isset($_POST['email'])
) {

  // Santising user input
  $updated_email_id = htmlspecialchars ( $_POST['email'] );

  // Email is already used
  if ( 
    $user->check_if_email_exists($connection, $updated_email_id) ||
    $incubation->check_if_email_exists($connection, $updated_email_id)
  ) {
    echo "email-used";
    die();
  }

  // Successfully updates user email id
  if ( $user->update_email_id($connection, $logged_in_user_id, $updated_email_id) ) {

    echo "success";
    die();
  }

  echo "unknown";
  die();
}



/** 
 * Update User Username
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-username" &&
  isset($_POST['username'])
) {

  // Santising user input
  $updated_username = htmlspecialchars ( $_POST['username'] );

  // Username is already taken
  if ( $user->check_if_username_exists($connection, $updated_username) ) {
    echo "uname-used";
    die();
  }

  // Successfully updated username
  if ( $user->update_username($connection, $logged_in_user_id, $updated_username) ) {

    echo "success";
    die();
  }

  echo "unknown";
  die();
}



/** 
 * Check Current Password
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "check-current-pwd" &&
  isset($_POST['current_password'])
) {

  // Santising user input
  $current_password = htmlspecialchars ( $_POST['current_password'] );

  // Password matches against password present in DB
  if ( $current_password === $user->get_user_password($connection, $logged_in_user_id) ) {
    echo "success";
    die();
  }
  // Password did not match
  else {
    echo "no_match";
    die();
  }

  echo "unknown";
  die();
}



/** 
 * Update User Password
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-pwd" &&
  isset($_POST['updated_password'])
) {

  // Santising user input
  $updated_password = htmlspecialchars ( $_POST['updated_password'] );

  // Password updated in DB
  if ( $user->update_password($connection, $logged_in_user_id, $updated_password) ) {
    echo "success";
    die();
  }

  echo "unknown";
  die();
}



/** 
 * Update User's Bio
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-bio" &&
  isset($_POST['bio'])
) {

  // Fetching and Santising Input
  $updated_bio = htmlspecialchars ( $_POST['bio'] );

  // Updated Bio
  if ( $user->update_bio($connection, $logged_in_user_id, $updated_bio) ) {
    echo "success";
    die();
  }

  // Could not update
  echo "unknown";
  die();
}