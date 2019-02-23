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
 * Search
 * 
 */
if (
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "search" &&
  isset ( $_POST['key'] )
) {

  // Santising Input
  $search_key = htmlspecialchars ( $_POST['key'], ENT_QUOTES );

  // Be Default Indicating Search Results Do Not Exist
  $search_results [ 'results_exists' ] = 'no';

  // Input Is Empty
  if ( strlen($search_key) == 0 ) {
    echo json_encode ( $search_results );
    die();
  }

  // Getting Search Results
  $query_to_get_search_results = mysqli_query ( $connection, " SELECT startup_id FROM startups WHERE startup_name LIKE '%$search_key%' LIMIT 5 " );

  // Query Ran Properly
  if ( $query_to_get_search_results && mysqli_num_rows($query_to_get_search_results) > 0 ) {
    
    // Indicating Search Results Exists
    $search_results [ 'results_exists' ] = 'yes';

    // Fetching Search Results One By One
    while ( $search_result = mysqli_fetch_assoc($query_to_get_search_results) ) {

      // Startup Name
      $search_results [ $search_result['startup_id'] ]['name'] = $startup->get_name ( $connection, $search_result['startup_id'] );

      // Getting Startup's Profile Picture ID
      $search_result_startup_logo = $startup->get_profile_pic_id ( $connection, $search_result['startup_id'] );

      // Startup Owner has not uploaded custom profile picture
      if ( $search_result_startup_logo == "" || is_null($search_result_startup_logo) ) {
        $search_result_startup_logo = "./images/default_startup_icon.png";
      }
      // Startup Owner has uploaded custom profile picture
      else {
        $search_result_startup_logo = "./files/profile_pictures/" . $search_result_startup_logo;
      }

      // Startup Logo
      $search_results [ $search_result['startup_id'] ]['logo'] = $search_result_startup_logo;
    }

    // Sending Results
    echo json_encode ( $search_results );
    die();
  }
  else {
    $search_results [ 'results_exists' ] = 'no';
    echo json_encode ( $search_results );
    die();
  }

  // Unknown Error
  $search_results [ 'results_exists' ] = 'unknown';
  echo json_encode ( $search_results );
  die();
}



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
 * Update Profile Picture
 * 
 */
if ( isset($_FILES['update-profile-picture']['name']) ) {

  // Accessing file properties
  // 1. File name
  // 2. Temp file name
  // 3. File size
  $updated_profile_picture_name = $_FILES['update-profile-picture']['name'];
  $updated_profile_picture_temp_name = $_FILES['update-profile-picture']['tmp_name'];
  $updated_profile_picture_file_size = $_FILES['update-profile-picture']['size'];

  // Getting file extenstion
  $updated_profile_picture_filename_explosion = explode ( '.', $updated_profile_picture_name );
  $updated_profile_picture_file_extension = end ( $updated_profile_picture_filename_explosion );

  // Checking for file size
  // Size (3048576 Bytes ==> 3MB)
  if ( $updated_profile_picture_file_size > 3048576 ) {
    echo 'too-big';
    die();
  }

  // Existing profile picture id
  $existing_profile_picture_id = $user->get_profile_picture_id ( $connection, $logged_in_user_id );

  // User has already uploadeda different picture
  if ( $existing_profile_picture_id != NULL ) {

    // And if that file exists in file system
    if ( file_exists("../files/profile_pictures/" . $existing_profile_picture_id) ) {

      // Delete that file
      unlink("../files/profile_pictures/" . $existing_profile_picture_id);
    }
  }

  // Generating new name for updated profile picture
  $updated_profile_picture_new_name = $utility->generate_secure_string ( "upp_", 10 );

  // Moving profile picture file to file system
  move_uploaded_file ( $_FILES["update-profile-picture"]["tmp_name"], "../files/profile_pictures/" . $updated_profile_picture_new_name );
  
  // Updated Successfully
  if ( $user->update_profile_picture_id ( $connection, $logged_in_user_id, $updated_profile_picture_new_name ) ) {
    echo $updated_profile_picture_new_name;
    die();
  }

  // Could not update
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
 * Update User's Profile Description
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-description" &&
  isset($_POST['description'])
) {

  // Fetching and Santising Input
  $updated_decsription = htmlspecialchars ( $_POST['description'] );

  // Updated Bio
  if ( $user->update_profile_description($connection, $logged_in_user_id, $updated_decsription) ) {
    echo "success";
    die();
  }

  // Could not update
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



/** 
 * Update User's Website/App Link
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-link" &&
  isset($_POST['link'])
) {

  // Fetching and Santising Input
  $updated_link = htmlspecialchars ( $_POST['link'] );

  // Updated Link
  if ( $user->update_link($connection, $logged_in_user_id, $updated_link) ) {
    echo "success";
    die();
  }

  // Could not update
  echo "unknown";
  die();
}



/** 
 * Update User's LinkedIn Username
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-linkedin" &&
  isset($_POST['link'])
) {

  // Fetching and Santising Input
  $updated_linkedin = htmlspecialchars ( $_POST['link'] );

  // Updated Link
  if ( $user->update_linkedin($connection, $logged_in_user_id, $updated_linkedin) ) {
    echo "success";
    die();
  }

  // Could not update
  echo "unknown";
  die();
}



/** 
 * Update User's Twitter Username
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-twitter" &&
  isset($_POST['link'])
) {

  // Fetching and Santising Input
  $updated_twitter = htmlspecialchars ( $_POST['link'] );

  // Updated Link
  if ( $user->update_twitter($connection, $logged_in_user_id, $updated_twitter) ) {
    echo "success";
    die();
  }

  // Could not update
  echo "unknown";
  die();
}



/** 
 * Update User's Facebook Username
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-facebook" &&
  isset($_POST['link'])
) {

  // Fetching and Santising Input
  $updated_facebook = htmlspecialchars ( $_POST['link'] );

  // Updated Link
  if ( $user->update_facebook($connection, $logged_in_user_id, $updated_facebook) ) {
    echo "success";
    die();
  }

  // Could not update
  echo "unknown";
  die();
}



/** 
 * Update User's Instagram Username
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-instagram" &&
  isset($_POST['link'])
) {

  // Fetching and Santising Input
  $updated_instagram = htmlspecialchars ( $_POST['link'] );

  // Updated Link
  if ( $user->update_instagram($connection, $logged_in_user_id, $updated_instagram) ) {
    echo "success";
    die();
  }

  // Could not update
  echo "unknown";
  die();
}



/** 
 * Updating User CV
 * 
 */
if ( isset($_FILES['update-cv']['name']) ) {

  // Accessing file properties
  // 1. File name
  // 2. Temp file name
  // 3. File size
  $updated_cv_name = $_FILES['update-cv']['name'];
  $updated_cv_temp_name = $_FILES['update-cv']['tmp_name'];
  $updated_cv_file_size = $_FILES['update-cv']['size'];

  // Getting file extenstion
  $updated_cv_filename_explosion = explode ( '.', $updated_cv_name );
  $updated_cv_file_extension = end ( $updated_cv_filename_explosion );

  // Checking for file size
  // Size (15048576 Bytes ==> 15MB)
  if ( $updated_cv_file_size > 15048576 ) {
    echo 'too-big';
    die();
  }

  // Existing cv id
  $existing_cv_id = $user->get_cv_id ( $connection, $logged_in_user_id );

  // User has already uploaded different CV before
  if ( $existing_cv_id != NULL ) {

    // And if that file exists in file system
    if ( file_exists("../files/cv/" . $existing_cv_id) ) {

      // Delete that file
      unlink("../files/cv/" . $existing_cv_id);
    }
  }

  // Generating new name for CV
  $cv_new_name = $utility->generate_secure_string ( "ucv_", 10 );

  // Moving CV file to file system
  move_uploaded_file ( $_FILES["update-cv"]["tmp_name"], "../files/cv/" . $cv_new_name );
  
  // Updated Successfully
  if ( $user->update_cv_id ( $connection, $logged_in_user_id, $cv_new_name ) ) {
    echo "success";
    die();
  }

  // Could not update
  echo "unknown";
  die();
}



/** 
 * Remove User CV
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "remove-cv" &&
  isset($_POST['confirm_remove']) &&
  $_POST['confirm_remove'] == 1
) {

  // Removing CV from DB and File System
  if ( $user->remove_cv ($connection, $logged_in_user_id, "../files/cv/") ) {
    echo "success";
    die();
  }

  // Could not remove, for some reason
  echo "unknown";
  die();
}



/** 
 * Remove Job Application
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "remove-job-application" &&
  $_POST['id']
) {

  // Removed job application
  if ( $user->remove_job_application ($connection, $logged_in_user_id, $_POST['id']) )
    echo "success";
    die();

  // Could not remove job application
  echo "unknown";
  die();
}



/** 
 * Remove from work
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "remove-from-work" &&
  isset($_POST['confirm']) &&
  $_POST['confirm'] == 1
) {

  // Removed from startup team member list
  if ( $user->remove_from_startup_team($connection, $logged_in_user_id) )
    echo "success";
    die();

  // System error
  echo "unknown";
  die();
}



/** 
 * Make me investor
 * 
 */
if ( 
  isset($_POST['action']) &&
  $_POST['action'] == "make-investor"
) {

  // Updated investor status of user
  if ( $user->update_investor_status($connection, $logged_in_user_id, 1) )
    echo "success";
    die();

  // Server Error
  echo "unknown";
  die();
}



/** 
 * Remove as investor
 * 
 */
if ( 
  isset($_POST['action']) &&
  $_POST['action'] == "remove-as-investor" &&
  isset($_POST['confirm']) &&
  $_POST['confirm'] == 1
) {

  // Updated investor status of user
  if ( $user->update_investor_status($connection, $logged_in_user_id, 0) )
    echo "success";
    die();

  // Server Error
  echo "unknown";
  die();
}



/** 
 * Initialise new incubation center
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "init-new-ic"
) {

  // Added new IC
  if ( $incubation->add_new($connection, $logged_in_user_id) )
    echo "success";
    die();

  // Could not add new IC
  echo "unknown";
  die();
}



/** 
 * Delete incubation center
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "remove-ic"
) {

  // Added new IC
  if ( 
    $incubation->delete (
      $connection, 
      $incubation->get_id($connection, $logged_in_user_id),
      "../files/profile_pictures/"
    ) 
  ) {
    echo "success";
    die(); 
  }

  // Could not add new IC
  echo "unknown";
  die();
}



/** 
 * Update Profile Picture
 * 
 */
if ( isset($_FILES['update-ic-profile-picture']['name']) ) {

  // User's IC ID
  $incubation_center_id = $incubation->get_id ( $connection, $logged_in_user_id );

  // Accessing file properties
  // 1. File name
  // 2. Temp file name
  // 3. File size
  $updated_ic_profile_picture_name = $_FILES['update-ic-profile-picture']['name'];
  $updated_ic_profile_picture_temp_name = $_FILES['update-ic-profile-picture']['tmp_name'];
  $updated_ic_profile_picture_file_size = $_FILES['update-ic-profile-picture']['size'];

  // Getting file extenstion
  $updated_ic_profile_picture_filename_explosion = explode ( '.', $updated_ic_profile_picture_name );
  $updated_ic_profile_picture_file_extension = end ( $updated_ic_profile_picture_filename_explosion );

  // Checking for file size
  // Size (3048576 Bytes ==> 3MB)
  if ( $updated_ic_profile_picture_file_size > 3048576 ) {
    echo 'too-big';
    die();
  }

  // Existing profile picture id
  $existing_ic_profile_picture_id = $incubation->get_profile_pic_id ( 
    $connection, 
    $incubation_center_id
  );

  // User has already uploadeda different picture
  if ( $existing_ic_profile_picture_id != NULL ) {

    // And if that file exists in file system
    if ( file_exists("../files/profile_pictures/" . $existing_ic_profile_picture_id) ) {

      // Delete that file
      unlink("../files/profile_pictures/" . $existing_ic_profile_picture_id);
    }
  }

  // Generating new name for updated profile picture
  $updated_ic_profile_picture_new_name = $utility->generate_secure_string ( "icpp_", 10 );

  // Moving profile picture file to file system
  move_uploaded_file ( $_FILES["update-ic-profile-picture"]["tmp_name"], "../files/profile_pictures/" . $updated_ic_profile_picture_new_name );
  
  // Updated Successfully
  if ( $incubation->update_ic_profile_picture_id ( $connection, $incubation_center_id, $updated_ic_profile_picture_new_name ) ) {
    echo $updated_ic_profile_picture_new_name;
    die();
  }

  // Could not update
  echo "unknown";
  die();
}



/** 
 * Update Incubation Center Name.
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-ic-name" &&
  isset($_POST['updated_ic_name'])
) {

  // Santising
  $updated_ic_name = htmlspecialchars ( $_POST['updated_ic_name'] );

  // Updated incubation center name
  if ( 
    $incubation->update_name (
      $connection,
      $incubation->get_id ($connection, $logged_in_user_id),
      $updated_ic_name
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not update for some reason
  echo "unknown";
  die();
}



/** 
 * Update Incubation Center Email.
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-ic-email" &&
  isset($_POST['updated_ic_email'])
) {

  // Santising
  $updated_ic_email = htmlspecialchars ( $_POST['updated_ic_email'] );

  // Email is already being used
  if ( 
    $incubation->check_if_email_exists ( $connection, $updated_ic_email ) ||
    $user->check_if_email_exists ( $connection, $updated_ic_email )
  ) {
    echo "email-used";
    die();
  }

  // Updated incubation center email
  if ( 
    $incubation->update_email (
      $connection,
      $incubation->get_id ($connection, $logged_in_user_id),
      $updated_ic_email
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not update for some reason
  echo "unknown";
  die();
}



/** 
 * Update Incubation Center Description.
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-ic-desc" &&
  isset($_POST['updated_ic_desc'])
) {

  // Santising
  $updated_ic_desc = htmlspecialchars ( $_POST['updated_ic_desc'], ENT_QUOTES );

  // Updated incubation center description
  if ( 
    $incubation->update_description (
      $connection,
      $incubation->get_id ($connection, $logged_in_user_id),
      $updated_ic_desc
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not update for some reason
  echo "unknown";
  die();
}



/** 
 * Update Incubation Center Story.
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-ic-story" &&
  isset($_POST['updated_ic_story'])
) {

  // Santising
  $updated_ic_story = htmlspecialchars ( $_POST['updated_ic_story'] );

  // Updated incubation center story
  if ( 
    $incubation->update_story (
      $connection,
      $incubation->get_id ($connection, $logged_in_user_id),
      $updated_ic_story
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not update for some reason
  echo "unknown";
  die();
}



/** 
 * Update Incubation Center Link.
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-ic-link" &&
  isset($_POST['updated_ic_link'])
) {

  // Santising
  $updated_ic_link = htmlspecialchars ( $_POST['updated_ic_link'] );

  // Updated incubation center link
  if ( 
    $incubation->update_link (
      $connection,
      $incubation->get_id ($connection, $logged_in_user_id),
      $updated_ic_link
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not update for some reason
  echo "unknown";
  die();
}



/** 
 * Update Incubation Center Reg. No.
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-ic-reg" &&
  isset($_POST['updated_ic_reg'])
) {

  // Santising
  $updated_ic_reg = htmlspecialchars ( $_POST['updated_ic_reg'] );

  // Updated incubation center reg. no.
  if ( 
    $incubation->update_registration_number (
      $connection,
      $incubation->get_id ($connection, $logged_in_user_id),
      $updated_ic_reg
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not update for some reason
  echo "unknown";
  die();
}



/** 
 * Update Incubation Center State
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-ic-state" &&
  isset($_POST['updated_ic_state'])
) {

  // Santising
  $updated_ic_state = htmlspecialchars ( $_POST['updated_ic_state'] );

  // Updated incubation center state
  if ( 
    $incubation->update_state (
      $connection,
      $incubation->get_id ($connection, $logged_in_user_id),
      $updated_ic_state
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not update for some reason
  echo "unknown";
  die();
}



/** 
 * Update Incubation Center City
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-ic-city" &&
  isset($_POST['updated_ic_city'])
) {

  // Santising
  $updated_ic_city = htmlspecialchars ( $_POST['updated_ic_city'] );

  // Updated incubation center city
  if ( 
    $incubation->update_city (
      $connection,
      $incubation->get_id ($connection, $logged_in_user_id),
      $updated_ic_city
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not update for some reason
  echo "unknown";
  die();
}



/** 
 * Update Incubation Center Pincode
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-ic-pcode" &&
  isset($_POST['updated_ic_pcode'])
) {

  // Santising
  $updated_ic_pincode = htmlspecialchars ( $_POST['updated_ic_pcode'] );

  // Updated incubation center pincode
  if ( 
    $incubation->update_pincode (
      $connection,
      $incubation->get_id ($connection, $logged_in_user_id),
      $updated_ic_pincode
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not update for some reason
  echo "unknown";
  die();
}




/** 
 * Update Incubation Center Address
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-ic-addr" &&
  isset($_POST['updated_ic_address'])
) {

  // Santising
  $updated_ic_address = htmlspecialchars ( $_POST['updated_ic_address'] );

  // Updated incubation center address
  if ( 
    $incubation->update_address (
      $connection,
      $incubation->get_id ($connection, $logged_in_user_id),
      $updated_ic_address
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not update for some reason
  echo "unknown";
  die();
}



/** 
 * Update Incubation Center Contact Number
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-ic-cnct-num" &&
  isset($_POST['updated_ic_contact_num'])
) {

  // Santising
  $updated_ic_contact_num = htmlspecialchars ( $_POST['updated_ic_contact_num'] );

  // Updated incubation center address
  if ( 
    $incubation->update_contact_number (
      $connection,
      $incubation->get_id ($connection, $logged_in_user_id),
      $updated_ic_contact_num
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not update for some reason
  echo "unknown";
  die();
}



/** 
 * Update Incubation Center LinkedIn
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-ic-linkedin" &&
  isset($_POST['updated_ic_lkdin'])
) {

  // Santising
  $updated_ic_linkedin = htmlspecialchars ( $_POST['updated_ic_lkdin'] );

  // Updated incubation center linkedin
  if ( 
    $incubation->update_linkedin (
      $connection,
      $incubation->get_id ($connection, $logged_in_user_id),
      $updated_ic_linkedin
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not update for some reason
  echo "unknown";
  die();
}



/** 
 * Update Incubation Center Twitter
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-ic-twitter" &&
  isset($_POST['updated_ic_twtr'])
) {

  // Santising
  $updated_ic_twitter = htmlspecialchars ( $_POST['updated_ic_twtr'] );

  // Updated incubation center twitter
  if ( 
    $incubation->update_twitter (
      $connection,
      $incubation->get_id ($connection, $logged_in_user_id),
      $updated_ic_twitter
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not update for some reason
  echo "unknown";
  die();
}



/** 
 * Update Incubation Center Facebook
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-ic-facebook" &&
  isset($_POST['updated_ic_fb'])
) {

  // Santising
  $updated_ic_facebook = htmlspecialchars ( $_POST['updated_ic_fb'] );

  // Updated incubation center facebook
  if ( 
    $incubation->update_facebook (
      $connection,
      $incubation->get_id ($connection, $logged_in_user_id),
      $updated_ic_facebook
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not update for some reason
  echo "unknown";
  die();
}



/** 
 * Update Incubation Center Instagram
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-ic-instagram" &&
  isset($_POST['updated_ic_ig'])
) {

  // Santising
  $updated_ic_instagram = htmlspecialchars ( $_POST['updated_ic_ig'] );

  // Updated incubation center instagram
  if ( 
    $incubation->update_instagram (
      $connection,
      $incubation->get_id ($connection, $logged_in_user_id),
      $updated_ic_instagram
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not update for some reason
  echo "unknown";
  die();
}