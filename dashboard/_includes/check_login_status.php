<?php
/**
 * Login Check System.
 *
 * Checks whether user has logged in or not. 
 * If not logged in, system redirects user to homepage.
 *
 *
 *
 *
 * @author Akhil Kokani <akhilkokani@gmail.com>
 * @package package_name
 */

if ( 
  !isset($_SESSION['logged_in']) ||
  !isset($_SESSION['user_id']) ||
  $_SESSION['logged_in'] !== true ||
  $_SESSION['user_id'] == ""
) {
  header("Location: ../../");
  die();
}

// User ID of user who has logged in
$logged_in_user_id = $_SESSION['user_id'];