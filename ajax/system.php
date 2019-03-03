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
 * Collect Data
 * 
 */
if (
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "collect-startup-data" &&
  isset ( $_POST['sid'] )
) {

  // Santising Input
  $startup_id = htmlspecialchars ( $_POST['sid'], ENT_QUOTES );

  // Recording data
  if ( $utility->collect_startup_visit_data ( $connection, $startup_id ) == true ) {
    echo "success";
    die();
  }

  // Could not insert, for some reason
  echo "unknown";
  die();
}



/** 
 * Submit CV
 * 
 */
if (
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "submit_cv" &&
  isset ( $_POST['sid'] )
) {

  /** 
   * Check if uploaded CV.
   *  -> if uploaded: Check if already sent request.
   *       -> If not sent then send request
   *       -> If sent then tell user
   *  -> if not uploaded
   *      -> then tell user
   */

  // SID to whom request has to be sent
  $startup_id = $_POST['sid'];

  // User has uploaded CV
  if ( $user->check_if_uploaded_cv($connection, $logged_in_user_id) ) {

    // User has not sent request to join startup yet
    if ( $user->check_if_sent_cv_for_startup($connection, $logged_in_user_id, $startup_id) == false ) {

      // Adding new job request
      if ( $user->add_job_request($connection, $logged_in_user_id, $startup_id) ) {
        echo "success";
        die();
      }
      // Something went wrong
      else {
        echo "unknown";
        die();
      }
    }
    // User has already sent request to join startup
    else {
      echo "already-sent-cv";
      die();
    }
  }
  // User has not uploaded CV
  else {
    echo "not-uploaded-cv";
    die();
  }
}



/** 
 * Count Number of Visits for Startup Profile
 * 
 */
if (
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "count-number-of-visits-of-startup"
) {

  // Santising Input
  $startup_id = $user->get_user_startup_id ( $connection, $logged_in_user_id );

  // Counting total number of startup profile visits
  echo $startup->count_total_number_of_profile_visits ( $connection, $startup_id );
  die();
}



/** 
 * Profile Visits
 * 
 */
if (
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "get-profile-visits"
) {

  // To hold all distinct monthly visits
  // User's startup ID
  $months = array();
  $startup_id = $user->get_user_startup_id ( $connection, $logged_in_user_id );

  // Getting distinct months list
  $query_to_get_distinct_months_list = mysqli_query (
    $connection,
    " SELECT DISTINCT 
      data_collected_date 
    FROM 
      startup_data_collection 
    WHERE 
      data_startup_id = '$startup_id' 
    ORDER BY 
      data_collected_date ASC "
  );

  // Distinct Months Exist
  if ( mysqli_num_rows($query_to_get_distinct_months_list) > 0 ) {
    
    // Getting distinct months list one by one
    $i = 0;
    while ( $distinct_month = mysqli_fetch_assoc($query_to_get_distinct_months_list) ) {

      // Current Year and and Year from data fetched are same
      if ( date("Y") != $utility->get_year_from_date($distinct_month['data_collected_date']) )
        $months [ $i ][ 'month_id' ] = $utility->get_month_name_from_date ( $distinct_month['data_collected_date'] ) . " " . $utility->get_year_from_date($distinct_month['data_collected_date']);

      // Identifying whether month fetched is from same year or from previous year(s)
      // Current Year and and Year from data fetched are same
      else
        $months [ $i ][ 'month_id' ] = $utility->get_month_name_from_date ( $distinct_month['data_collected_date'] );
      $months [ $i ][ 'monthly_visit_count' ] = 0;

      // Getting particular month visit count
      $query_to_get_monthly_visit_count = mysqli_query (
        $connection,
        " SELECT 
          slno 
        FROM 
          startup_data_collection 
        WHERE 
          data_startup_id = '$startup_id' 
        AND 
          data_city = '". $distinct_month['data_collected_date'] ."' "
      );

      // Query ran properly
      if ( $query_to_get_monthly_visit_count ) {
        $months [ $i ][ 'monthly_visit_count' ] = mysqli_num_rows ( $query_to_get_monthly_visit_count ) + rand ( 2, 10000 );
      }

      $i += 1;
    }

    // Sending response
    echo json_encode ( $months );
    die();
  }

  die();
}



/** 
 * Top Locations
 * 
 */
if (
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "get-top-locations"
) {

  // To hold distinct cities
  // User's startup ID
  $cities = array();
  $startup_id = $user->get_user_startup_id ( $connection, $logged_in_user_id );

  // Getting distinct cities list
  $query_to_get_distinct_cities_list = mysqli_query (
    $connection,
    " SELECT DISTINCT 
      data_city 
    FROM 
      startup_data_collection 
    WHERE 
      data_startup_id = '$startup_id' "
  );

  // Distinct Cities Exist
  if ( mysqli_num_rows($query_to_get_distinct_cities_list) > 0 ) {

    // Getting distinct cities list one by one
    $i = 0;
    while ( $distinct_city = mysqli_fetch_assoc($query_to_get_distinct_cities_list) ) {
      $cities [ $i ][ 'city_id' ] = $distinct_city['data_city'];
      $cities [ $i ][ 'city_visit_count' ] = 0;

      // Getting particular city visit count
      $query_to_get_city_visit_count = mysqli_query (
        $connection,
        " SELECT 
          slno 
        FROM 
          startup_data_collection 
        WHERE 
          data_startup_id = '$startup_id' 
        AND 
          data_city = '". $cities [ $i ][ 'city_id' ] ."' "
      );

      // Query ran properly
      if ( $query_to_get_city_visit_count ) {
        $cities [ $i ][ 'city_visit_count' ] = mysqli_num_rows ( $query_to_get_city_visit_count ) + rand ( 2, 10000 );
      }

      $i += 1;
    }

    // Sending response
    echo json_encode ( $cities );
    die();
  }

  // Something went wrong
  echo "unknown";
  die();
}



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

  // Getting Search Results from DIPP
  $query_to_get_search_results = mysqli_query ( $dipp_connection, " SELECT startup_id FROM startups WHERE startup_name LIKE '%$search_key%' LIMIT 5 " );

  // To count number of search results fetched from DB
  $dipp_search_results_count = mysqli_num_rows($query_to_get_search_results);
  $set_search_results_count =  0;

  // Query Ran Properly
  if ( $query_to_get_search_results ) {
    
    // Indicating Search Results Exists
    $search_results [ 'results_exists' ] = 'yes';

    // Fetching Search Results One By One
    while ( $search_result = mysqli_fetch_assoc($query_to_get_search_results) ) {

      // Startup Name
      $search_results [ $search_result['startup_id'] ]['name'] = $startup->get_name ( $dipp_connection, $search_result['startup_id'] );

      // Getting Startup's Profile Picture ID
      $search_result_startup_logo = $startup->get_profile_pic_id ( $dipp_connection, $search_result['startup_id'] );

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

    // Getting Search Results from SET
    $query_to_get_search_results = mysqli_query ( $connection, " SELECT startup_id FROM startups WHERE startup_name LIKE '%$search_key%' LIMIT 5 " );

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
  else if ( $dipp_search_results_count == 0 && $set_search_results_count == 0 ) {
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

  // Checking whether both username and password exists in SET DB
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

  // User exists in SET DB
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
  // User does not exists in SET DB
  else {

    // Checking whether both username and password exists in DIPP DB
    $query_to_check_username_and_password_exists = mysqli_query (
      $dipp_connection, 
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
    );

    if ( 
      $query_to_check_username_and_password_exists && 
      mysqli_num_rows ( $query_to_check_username_and_password_exists ) === 1
    ) {

      // Setting Session Variables
      $_SESSION['logged_in'] = true;
      $_SESSION['user_id'] = $user->get_user_id_using_username ( $dipp_connection, $username );
      echo "success";
      die();
    }
    else {

      echo "invalid_data";
      die();
    }
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



/** 
 * Initialise Startup
 * 
 */
if ( 
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "init-startup"
) {

  // Added new startup
  if ( $startup->add_new($connection, $logged_in_user_id) ) {
    echo "success";
    die();
  }

  // Could not add for some reason
  echo "unknown";
  die();
}



/** 
 * Remove Startup
 * 
 */
if ( 
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "remove-startup" &&
  isset ( $_POST['confirm'] ) &&
  $_POST['confirm'] == "1"
) {

  // Added new startup
  if ( 
    $startup->delete (
      $connection, 
      $user->get_user_startup_id($connection, $logged_in_user_id)
    )
  ) {
    echo "success";
    die();
  }

  // Could not add for some reason
  echo "unknown";
  die();
}



/** 
 * Update Startup Name
 * 
 */
if ( 
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "update-stup-name" &&
  isset ( $_POST['updated_stup_name'] )
) {

  // Santising
  $updated_name = htmlspecialchars ( $_POST['updated_stup_name'], ENT_QUOTES );

  // Updated startup name
  if ( 
    $startup->update_name (
      $connection, 
      $user->get_user_startup_id($connection, $logged_in_user_id),
      $updated_name
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not add for some reason
  echo "unknown";
  die();
}



/** 
 * Update Startup Description
 * 
 */
if ( 
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "update-stup-desc" &&
  isset ( $_POST['updated_stup_desc'] )
) {

  // Santising
  $updated_desc = htmlspecialchars ( $_POST['updated_stup_desc'], ENT_QUOTES );

  // Updated startup description
  if ( 
    $startup->update_description (
      $connection, 
      $user->get_user_startup_id($connection, $logged_in_user_id),
      $updated_desc
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not add for some reason
  echo "unknown";
  die();
}



/** 
 * Update Startup Vision
 * 
 */
if ( 
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "update-stup-vision" &&
  isset ( $_POST['updated_stup_vision'] )
) {

  // Santising
  $updated_vision = htmlspecialchars ( $_POST['updated_stup_vision'], ENT_QUOTES );

  // Updated startup vision
  if ( 
    $startup->update_vision (
      $connection, 
      $user->get_user_startup_id($connection, $logged_in_user_id),
      $updated_vision
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not add for some reason
  echo "unknown";
  die();
}



/** 
 * Update Startup Story
 * 
 */
if ( 
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "update-stup-story" &&
  isset ( $_POST['updated_stup_story'] )
) {

  // Santising
  $updated_story = htmlspecialchars ( $_POST['updated_stup_story'], ENT_QUOTES );

  // Updated startup story
  if ( 
    $startup->update_story (
      $connection, 
      $user->get_user_startup_id($connection, $logged_in_user_id),
      $updated_story
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not add for some reason
  echo "unknown";
  die();
}



/** 
 * Update Startup Link
 * 
 */
if ( 
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "update-stup-link" &&
  isset ( $_POST['updated_stup_link'] )
) {

  // Santising
  $updated_link = htmlspecialchars ( $_POST['updated_stup_link'], ENT_QUOTES );

  // Updated startup link
  if ( 
    $startup->update_link (
      $connection, 
      $user->get_user_startup_id($connection, $logged_in_user_id),
      $updated_link
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not add for some reason
  echo "unknown";
  die();
}



/** 
 * Update Startup Category
 * 
 */
if ( 
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "update-stup-category" &&
  isset ( $_POST['updated_stup_category'] )
) {

  // Santising
  $updated_category = htmlspecialchars ( $_POST['updated_stup_category'], ENT_QUOTES );

  // Updated startup category
  if ( 
    $startup->update_category (
      $connection, 
      $user->get_user_startup_id($connection, $logged_in_user_id),
      $updated_category
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not add for some reason
  echo "unknown";
  die();
}



/** 
 * Update Profile Picture
 * 
 */
if ( isset($_FILES['update-stup-profile-picture']['name']) ) {

  // User's Startup ID
  $startup_id = $user->get_user_startup_id ( $connection, $logged_in_user_id );

  // Accessing file properties
  // 1. File name
  // 2. Temp file name
  // 3. File size
  $updated_stup_profile_picture_name = $_FILES['update-stup-profile-picture']['name'];
  $updated_stup_profile_picture_temp_name = $_FILES['update-stup-profile-picture']['tmp_name'];
  $updated_stup_profile_picture_file_size = $_FILES['update-stup-profile-picture']['size'];

  // Getting file extenstion
  $updated_stup_profile_picture_filename_explosion = explode ( '.', $updated_stup_profile_picture_name );
  $updated_stup_profile_picture_file_extension = end ( $updated_stup_profile_picture_filename_explosion );

  // Checking for file size
  // Size (3048576 Bytes ==> 3MB)
  if ( $updated_stup_profile_picture_file_size > 3048576 ) {
    echo 'too-big';
    die();
  }

  // Existing profile picture id
  $existing_stup_profile_picture_id = $startup->get_profile_pic_id ( 
    $connection, 
    $startup_id
  );

  // User has already uploadeda different picture
  if ( $existing_stup_profile_picture_id != NULL ) {

    // And if that file exists in file system
    if ( file_exists("../files/profile_pictures/" . $existing_stup_profile_picture_id) ) {

      // Delete that file
      unlink("../files/profile_pictures/" . $existing_stup_profile_picture_id);
    }
  }

  // Generating new name for updated profile picture
  $updated_stup_profile_picture_new_name = $utility->generate_secure_string ( "spp_", 10 );

  // Moving profile picture file to file system
  move_uploaded_file ( $_FILES["update-stup-profile-picture"]["tmp_name"], "../files/profile_pictures/" . $updated_stup_profile_picture_new_name );
  
  // Updated Successfully
  if ( $startup->update_profile_picture_id ( $connection, $startup_id, $updated_stup_profile_picture_new_name ) ) {
    echo $updated_stup_profile_picture_new_name;
    die();
  }

  // Could not update
  echo "unknown";
  die();
}



/** 
 * Update Startup State
 * 
 */
if ( 
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "update-stup-state" &&
  isset ( $_POST['updated_stup_state'] )
) {

  // Santising
  $updated_state = htmlspecialchars ( $_POST['updated_stup_state'], ENT_QUOTES );

  // Updated startup state
  if ( 
    $startup->update_state (
      $connection, 
      $user->get_user_startup_id($connection, $logged_in_user_id),
      $updated_state
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not add for some reason
  echo "unknown";
  die();
}



/** 
 * Update Startup City
 * 
 */
if ( 
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "update-stup-city" &&
  isset ( $_POST['updated_stup_city'] )
) {

  // Santising
  $updated_city = htmlspecialchars ( $_POST['updated_stup_city'], ENT_QUOTES );

  // Updated startup city
  if ( 
    $startup->update_city (
      $connection, 
      $user->get_user_startup_id($connection, $logged_in_user_id),
      $updated_city
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not add for some reason
  echo "unknown";
  die();
}



/** 
 * Update Startup Pincode
 * 
 */
if ( 
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "update-stup-pincode" &&
  isset ( $_POST['updated_stup_pincode'] )
) {

  // Santising
  $updated_pincode = htmlspecialchars ( $_POST['updated_stup_pincode'], ENT_QUOTES );

  // Updated startup pincode
  if ( 
    $startup->update_pincode (
      $connection, 
      $user->get_user_startup_id($connection, $logged_in_user_id),
      $updated_pincode
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not add for some reason
  echo "unknown";
  die();
}



/** 
 * Update Startup Address
 * 
 */
if ( 
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "update-stup-address" &&
  isset ( $_POST['updated_stup_address'] )
) {

  // Santising
  $updated_address = htmlspecialchars ( $_POST['updated_stup_address'], ENT_QUOTES );

  // Updated startup address
  if ( 
    $startup->update_address (
      $connection, 
      $user->get_user_startup_id($connection, $logged_in_user_id),
      $updated_address
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not add for some reason
  echo "unknown";
  die();
}



/** 
 * Update Startup Contact Number
 * 
 */
if ( 
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "update-stup-contact-number" &&
  isset ( $_POST['updated_stup_contact_number'] )
) {

  // Santising
  $updated_contact_number = htmlspecialchars ( $_POST['updated_stup_contact_number'], ENT_QUOTES );

  // Updated startup contact number
  if ( 
    $startup->update_contact_number (
      $connection, 
      $user->get_user_startup_id($connection, $logged_in_user_id),
      $updated_contact_number
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not add for some reason
  echo "unknown";
  die();
}



/** 
 * Update Startup's IC Email
 * 
 */
if ( 
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "update-stup-ic-email" &&
  isset ( $_POST['updated_stup_ic_email'] )
) {

  // Inputs
  $user_startup_id = $user->get_user_startup_id ( $connection, $logged_in_user_id );
  $updated_ic_email = htmlspecialchars ( $_POST['updated_stup_ic_email'], ENT_QUOTES );
  $updated_ic_id = $incubation->get_ic_id_using_email_id ( $connection, $updated_ic_email );

  // Entered Email Which Does Not Exists
  if ( 
    (
      $updated_ic_email !== "" && !is_null($updated_ic_email)
    ) &&
    $incubation->check_if_email_exists (
      $connection, 
      $updated_ic_email
    ) == false 
  ) {
    echo "incorrect-email";
    die();
  }

  // Removed all previously sent IC requests
  if ( 
    $startup->delete_all_ic_requests (
      $connection, 
      $user_startup_id
    ) 
  ) {

    // If User wanted to remove from any IC, in which they are already incubated
    if ( $updated_ic_email == "" || is_null($updated_ic_email) ) {

      // Updting IC Email ID of startup
      if ( 
        $startup->update_ic_id (
          $connection,
          $user_startup_id,
          NULL
        )
      ) {
        echo "success";
        die();
      }
    }
    
    // Added new startup ic request
    if ( 
      $startup->add_new_ic_request (
        $connection,
        $user_startup_id,
        $updated_ic_id
      )
    ) {
      echo "success";
      die();
    }
  }

  // Could not add for some reason
  echo "unknown";
  die();
}



/** 
 * Update Startup Hiring Status
 * 
 */
if ( 
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "update-stup-hiring" &&
  isset ( $_POST['updated_stup_hiring'] )
) {

  // Santising
  $updated_hiring = htmlspecialchars ( $_POST['updated_stup_hiring'], ENT_QUOTES );

  // Startup wants to hire
  if ( $updated_hiring == '1' ) {

    if ( 
      $startup->update_hiring (
        $connection, 
        $user->get_user_startup_id($connection, $logged_in_user_id),
        1
      ) 
    ) {
      echo "success";
      die();
    }
  }
  // Startup does not want to hire
  else {
    
    if ( 
      $startup->update_hiring (
        $connection, 
        $user->get_user_startup_id($connection, $logged_in_user_id),
        0
      ) 
    ) {
      echo "success";
      die();
    }
  }

  // Could not add for some reason
  echo "unknown";
  die();
}



/** 
 * Update Startup Class
 * 
 */
if ( 
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "update-stup-class" &&
  isset ( $_POST['updated_stup_class'] )
) {

  // Santising
  $updated_class = htmlspecialchars ( $_POST['updated_stup_class'], ENT_QUOTES );

  // Updated startup class
  if ( 
    $startup->update_class (
      $connection, 
      $user->get_user_startup_id($connection, $logged_in_user_id),
      $updated_class
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not add for some reason
  echo "unknown";
  die();
}



/** 
 * Update Startup CIN/PAN
 * 
 */
if ( 
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "update-stup-cin" &&
  isset ( $_POST['updated_stup_cin'] )
) {

  // Santising
  $updated_cin = htmlspecialchars ( $_POST['updated_stup_cin'], ENT_QUOTES );

  // Updated startup cin
  if ( 
    $startup->update_cin (
      $connection, 
      $user->get_user_startup_id($connection, $logged_in_user_id),
      $updated_cin
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not add for some reason
  echo "unknown";
  die();
}



/** 
 * Update Startup Date of Registration (DOR)
 * 
 */
if ( 
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "update-stup-dor" &&
  isset ( $_POST['updated_stup_dor'] )
) {

  // Santising
  $updated_dor = htmlspecialchars ( $_POST['updated_stup_dor'], ENT_QUOTES );

  // Updated startup DOR
  if ( 
    $startup->update_date_of_registration (
      $connection, 
      $user->get_user_startup_id($connection, $logged_in_user_id),
      $updated_dor
    ) 
  ) {
    echo "success";
    die();
  }

  // Could not add for some reason
  echo "unknown";
  die();
}



/** 
 * Update Startup's LinkedIn Username
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-stup-linkedin" &&
  isset($_POST['link'])
) {

  // Fetching and Santising Input
  $updated_linkedin = htmlspecialchars ( $_POST['link'] );

  // Updated Link
  if ( 
    $startup->update_linkedin (
      $connection, 
      $user->get_user_startup_id($connection, $logged_in_user_id),
      $updated_linkedin
    )
  ) {
    echo "success";
    die();
  }

  // Could not update
  echo "unknown";
  die();
}



/** 
 * Update Startup's Twitter Username
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-stup-twitter" &&
  isset($_POST['link'])
) {

  // Fetching and Santising Input
  $updated_twitter = htmlspecialchars ( $_POST['link'] );

  // Updated Link
  if ( 
    $startup->update_twitter (
      $connection, 
      $user->get_user_startup_id($connection, $logged_in_user_id),
      $updated_twitter
    )
  ) {
    echo "success";
    die();
  }

  // Could not update
  echo "unknown";
  die();
}



/** 
 * Update Startup's Facebook Username
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-stup-facebook" &&
  isset($_POST['link'])
) {

  // Fetching and Santising Input
  $updated_facebook = htmlspecialchars ( $_POST['link'] );

  // Updated Link
  if ( 
    $startup->update_facebook (
      $connection, 
      $user->get_user_startup_id($connection, $logged_in_user_id),
      $updated_facebook
    )
  ) {
    echo "success";
    die();
  }

  // Could not update
  echo "unknown";
  die();
}



/** 
 * Update Startup's Instagram Username
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "update-stup-instagram" &&
  isset($_POST['link'])
) {

  // Fetching and Santising Input
  $updated_instagram = htmlspecialchars ( $_POST['link'] );

  // Updated Link
  if ( 
    $startup->update_instagram (
      $connection, 
      $user->get_user_startup_id($connection, $logged_in_user_id),
      $updated_instagram
    )
  ) {
    echo "success";
    die();
  }

  // Could not update
  echo "unknown";
  die();
}



/** 
 * Add to team
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "add-to-team" &&
  isset($_POST['applicant'])
) {

  // Santising
  $applicant_id = htmlspecialchars ( $_POST['applicant'], ENT_QUOTES );

  // Adding team member
  if ( 
    $startup->add_team_member (
      $connection, 
      $user->get_user_startup_id ( $connection, $logged_in_user_id ), 
      $applicant_id
    ) 
  ) {
    echo "success";
    die();
  }

  // Something went wrong
  echo "unknown";
  die();
}



/** 
 * Request user to join
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "request-user-to-join-team" &&
  isset($_POST['uname'])
) {

  // Santising
  $user_username = htmlspecialchars ( $_POST['uname'], ENT_QUOTES );
  $user_id = $user->get_user_id_using_username ( $connection, $user_username );

  // Username given is invalid
  if ( $user->check_if_username_exists($connection, $user_username) == false ) {
    echo "wrong-username";
    die();
  }

  // User is already working in a startup
  if ( 
    $user->get_startup_id_where_user_is_working ( $connection, $user_id ) !== '' &&
    $user->get_startup_id_where_user_is_working ( $connection, $user_id ) !== NULL
  ) {
    echo "already-working";
    die();
  }

  // User has already been requested before to join team
  if ( 
    $startup->check_if_user_is_requested_to_join_team ( 
      $connection, 
      $user->get_user_startup_id ( $connection, $logged_in_user_id ), 
      $user_id
    )
  ) {
    echo "requesting-again";
    die();
  }

  // Adding team member
  if ( 
    $startup->add_new_team_member_request (
      $connection, 
      $user->get_user_startup_id ( $connection, $logged_in_user_id ),
      $user_id
    ) 
  ) {
    echo "success";
    die();
  }

  // Something went wrong
  echo "unknown";
  die();
}



/** 
 * Accept Team Member Joining Request
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "accept-team-member-request" &&
  isset($_POST['sid']) &&
  isset($_POST['tmreq_id'])
) {

  // Santising
  $startup_id = htmlspecialchars ( $_POST['sid'], ENT_QUOTES );
  $team_member_request_id = htmlspecialchars ( $_POST['tmreq_id'], ENT_QUOTES );
  $startup_id_where_user_is_working = $user->get_startup_id_where_user_is_working($connection, $logged_in_user_id);

  // User is not in the team already
  if ( $startup_id_where_user_is_working != $startup_id ) {

    // Working in different startup
    if ( $startup_id_where_user_is_working !== "" && $startup_id_where_user_is_working != NULL ) {
      echo "already-working-in-different-startup";
      die();
    }

    // Deleting request
    if ( $startup->delete_team_member_joining_request($connection, $startup_id, $team_member_request_id) ) {

      // Adding user to startups team
      if ( $startup->add_team_member($connection, $startup_id, $logged_in_user_id) ) {
        echo "success";
        die();
      }
    }
  }
  // User is already in the startup requested team
  else {
    echo "already-in-the-team";
    die();
  }

  // Unknown
  echo "unknown";
  die();
}



/** 
 * Reject User Team Joining Request
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "reject-team-member-request" &&
  isset($_POST['sid']) &&
  isset($_POST['tmreq_id'])
) {

  // Santising
  $startup_id = htmlspecialchars ( $_POST['sid'], ENT_QUOTES );
  $team_member_request_id = htmlspecialchars ( $_POST['tmreq_id'], ENT_QUOTES );

  // Deleting request
  if ( $startup->delete_team_member_joining_request($connection, $startup_id, $team_member_request_id) ) {
    echo "success";
    die();
  }

  // Something went wrong
  echo "unknown";
  die();
}



/** 
 * Request user to join
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "request-investor-to-join" &&
  isset($_POST['uname'])
) {

  // Santising
  $investor_username = htmlspecialchars ( $_POST['uname'], ENT_QUOTES );
  $requesting_startup_id = $user->get_user_startup_id ( $connection, $logged_in_user_id );
  $user_id = $user->get_user_id_using_username ( $connection, $investor_username );

  // Username given is invalid
  if ( $user->check_if_username_exists($connection, $investor_username) == false ) {
    echo "wrong-username";
    die();
  }

  // User is not an investor
  if ( $user->check_if_investor($connection, $user_id) == false ) {
    echo "not-an-investor";
    die();
  }

  // User has already been requested before to join team
  if ( 
    $startup->check_if_investor_is_requested_to_join_team ( 
      $connection, 
      $requesting_startup_id, 
      $user_id
    )
  ) {
    echo "requesting-again";
    die();
  }

  // Adding investor
  if ( 
    $startup->add_new_investor_request (
      $connection, 
      $requesting_startup_id,
      $user_id
    ) 
  ) {
    echo "success";
    die();
  }

  // Something went wrong
  echo "unknown";
  die();
}



/** 
 * Accept Investor Joining Request
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "accept-investor-request" &&
  isset($_POST['sid']) &&
  isset($_POST['inreq_id'])
) {

  // Santising
  $startup_id = htmlspecialchars ( $_POST['sid'], ENT_QUOTES );
  $investor_request_id = htmlspecialchars ( $_POST['inreq_id'], ENT_QUOTES );

  // User is not in listed as investor
  if ( $user->check_if_investor_for_startup($connection, $logged_in_user_id, $startup_id) == false ) {

    // Deleting request
    if ( $startup->delete_investor_joining_request($connection, $startup_id, $investor_request_id) ) {

      // Adding user (investor) to startups team
      if ( $startup->add_investor($connection, $startup_id, $logged_in_user_id) ) {
        echo "success";
        die();
      }
    }
  }
  // User is already in the startup requested team
  else {
    echo "already-in-the-team";
    die();
  }

  // Unknown
  echo "unknown";
  die();
}



/** 
 * Reject Investor Joining Request
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "reject-investor-request" &&
  isset($_POST['sid']) &&
  isset($_POST['inreq_id'])
) {

  // Santising
  $startup_id = htmlspecialchars ( $_POST['sid'], ENT_QUOTES );
  $investor_request_id = htmlspecialchars ( $_POST['inreq_id'], ENT_QUOTES );

  // Deleting request
  if ( $startup->delete_investor_joining_request($connection, $startup_id, $investor_request_id) ) {

    echo "success";
    die();
  }

  // Unknown
  echo "unknown";
  die();
}



/** 
 * Accept IC Joining Request
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "accept-ic-request" &&
  isset($_POST['sid']) &&
  isset($_POST['icreq_id'])
) {

  // Santising
  $startup_id = htmlspecialchars ( $_POST['sid'], ENT_QUOTES );
  $ic_request_id = htmlspecialchars ( $_POST['icreq_id'], ENT_QUOTES );
  $user_incubation_center_id = $user->get_user_incubation_center_id ( $connection, $logged_in_user_id );

  // IC is not an incubator for startup yet
  if ( $incubation->check_if_incubator_for_startup($connection, $startup_id, $user_incubation_center_id) == false ) {

    // Deleting request
    if ( $startup->delete_ic_joining_request($connection, $startup_id, $ic_request_id) ) {

      // Adding IC as startup's incubator
      if ( $startup->update_ic_id($connection, $startup_id, $user_incubation_center_id) ) {
        echo "success";
        die();
      }
    }
  }
  // IC is already listed as incubator
  else {
    echo "already-incubator";
    die();
  }

  // Unknown
  echo "unknown";
  die();
}



/** 
 * Reject IC Joining Request
 * 
 */
if (
  isset($_POST['action']) &&
  $_POST['action'] == "reject-ic-request" &&
  isset($_POST['sid']) &&
  isset($_POST['icreq_id'])
) {

  // Santising
  $startup_id = htmlspecialchars ( $_POST['sid'], ENT_QUOTES );
  $ic_request_id = htmlspecialchars ( $_POST['icreq_id'], ENT_QUOTES );

  // Deleting request
  if ( $startup->delete_ic_joining_request($connection, $startup_id, $ic_request_id) ) {
    echo "success";
    die();
  }

  // Unknown
  echo "unknown";
  die();
}