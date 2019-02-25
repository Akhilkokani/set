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
   * @return Boolean
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
   * @return Boolean
   */
  function check_if_user_is_logged_in () {

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
   * Checks whether user email id exists in users table.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $email
   * @return Boolean
   */
  function check_if_email_exists (
    $connection,
    $email
  ) {

    // Checking if email exists in DB
    $query_to_check_if_email_exists = mysqli_query ( $connection, " SELECT slno FROM users WHERE user_email_id = '$email' LIMIT 1 " );

    // Query ran properly
    // Email exists
    if ( 
      $query_to_check_if_email_exists && 
      mysqli_num_rows($query_to_check_if_email_exists) === 1
    ) {
      return true;
    }

    // Email does not exists
    return false;
  }



  /**
   * Checks whether user is listed as investor or not.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return Boolean
   */
  function check_if_investor (
    $connection,
    $user_id
  ) {

    // Checking if user is investor or not
    $query_to_check_if_user_is_investor = mysqli_query (
      $connection,
      " SELECT 
        slno 
      FROM 
        user_info 
      WHERE 
        user_info_user_id = '$user_id' 
      AND 
        user_info_is_a_investor = 1 
      LIMIT 
        1 "
    );

    // User is investor
    if ( mysqli_num_rows($query_to_check_if_user_is_investor) === 1 )
      return true;

    // User is investor or
    // Could not find user row, for some reason
    return false;
  }



  /**
   * Checks whether user is listed as investor for particular startup.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @param String $sid
   * @return Boolean
   */
  function check_if_investor_for_startup (
    $connection,
    $user_id,
    $sid
  ) {

    // Checking if user is investor or not
    $query_to_check_if_user_is_investor_in_startup = mysqli_query (
      $connection,
      " SELECT 
        slno 
      FROM 
        startup_investor_details 
      WHERE 
        startup_investor_user_id = '$user_id' 
      AND 
        startup_investor_startup_id = '$sid'
      LIMIT 
        1 "
    );

    // User is investor
    if ( mysqli_num_rows($query_to_check_if_user_is_investor_in_startup) === 1 )
      return true;

    // Could not find user row, for some reason
    return false;
  }



  /**
   * Checks whether user has uploaded his/her CV for applying jobs.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return Boolean
   */
  function check_if_uploaded_cv (
    $connection,
    $user_id
  ) {

    // Checking whether user has uploaded cv or not
    $query_to_check_if_user_has_uploaded_cv = mysqli_query (
      $connection,
      " SELECT 
        user_cv_id 
      FROM 
        user_info 
      WHERE 
        user_info_user_id = '$user_id' 
      LIMIT 
        1 "
    );

    // User Record Found
    if ( mysqli_num_rows($query_to_check_if_user_has_uploaded_cv) === 1 ) {

      // Fetching user cv id
      $user_cv_id = mysqli_fetch_array ( $query_to_check_if_user_has_uploaded_cv, MYSQLI_ASSOC )["user_cv_id"];
      if ( $user_cv_id !== NULL )
        return true;
    }

    // User has not uploaded cv or
    // User record not found
    return false;
  }



  /**
   * Checks whether user has been listed in any of startup team members list.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return Boolean
   */
  function check_if_listed_in_startup_team (
    $connection,
    $user_id
  ) {

    // Checking if user is listed in one of startup team members list
    $query_to_check_if_user_is_listed_in_startup_team = mysqli_query ( 
      $connection,
      " SELECT 
        slno 
      FROM 
        startup_team_member_details 
      WHERE 
        startup_team_member_user_id = '$user_id' 
      LIMIT 
        1 "
    );

    // User is listed in one startup team members list
    if ( mysqli_num_rows($query_to_check_if_user_is_listed_in_startup_team) == 1 )
      return true;

    // User is not listed or
    return false;
  }



  /**
   * Checks whether user has sent their CV to a particular startup.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @param String $startup_id
   * @return Boolean
   */
  function check_if_sent_cv_for_startup (
    $connection,
    $user_id,
    $startup_id
  ) {

    // Checking whether user has sent CV to startup
    $query_to_checK_if_user_has_sent_cv_for_startup = mysqli_query (
      $connection,
      " SELECT 
        slno 
      FROM 
        jobs_applied 
      WHERE 
        job_applied_startup_id = '$startup_id' 
      AND 
        job_applier_user_id = '$user_id' 
      LIMIT 
        1 "
    );

    // User has sent their CV
    if ( mysqli_num_rows($query_to_checK_if_user_has_sent_cv_for_startup) == 1 )
      return true;
    
    // Could not check, for some reason
    return false;
  }



  /**
   * Checks whether user has incubation center or not
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return Boolean
   */
  function check_if_user_has_incubation_center (
    $connection,
    $user_id
  ) {

    // Checking whether user has incubation center or not
    $query_to_check_whether_user_has_incubation_center = mysqli_query (
      $connection,
      " SELECT 
        slno 
      FROM 
        incubation_centers 
      WHERE 
        incubation_center_user_id = '$user_id' 
      LIMIT 
        1 "
    );

    // User has incubation center
    if ( mysqli_num_rows($query_to_check_whether_user_has_incubation_center) == 1 )
      return true;

    // User does not has incubation center or
    // System error
    return false;
  }



  /**
   * Checks whether user has their own startup or not
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return Boolean
   */
  function check_if_user_has_startup (
    $connection,
    $user_id
  ) {

    // Checking whether user has startup or not
    $query_to_check_whether_user_has_startup = mysqli_query (
      $connection,
      " SELECT 
        slno 
      FROM 
        startups 
      WHERE 
        startup_user_id = '$user_id' 
      LIMIT 
        1 "
    );

    // User has startup
    if ( mysqli_num_rows($query_to_check_whether_user_has_startup) == 1 )
      return true;

    // User does not has startup or
    // System error
    return false;
  }



  /**
   * Counts number of jobs user has applied in different startups.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return Integer
   */
  function count_number_of_jobs_applied (
    $connection,
    $user_id
  ) {

    // Counting number of jobs applied by user
    $query_to_count_number_of_jobs_applied = mysqli_query (
      $connection,
      " SELECT 
        slno 
      FROM 
        jobs_applied 
      WHERE 
        job_applier_user_id = '$user_id' "
    );

    // Returning total number of jobs applied
    if ( $query_to_count_number_of_jobs_applied )
      return mysqli_num_rows($query_to_count_number_of_jobs_applied);

    // Could not get total number of jobs for some reason
    return 0;
  }



  /**
   * Counts total number of startups user has invested.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return Integer
   */
  function count_number_of_startups_invested (
    $connection,
    $user_id
  ) {

    // Counting number of startups user has invested
    $query_to_count_number_of_startups_user_has_invested = mysqli_query (
      $connection,
      " SELECT 
        slno 
      FROM 
        startup_investor_details 
      WHERE 
        startup_investor_user_id = '$user_id' "
    );

    // Counted number of startups invested by user
    if ( $query_to_count_number_of_startups_user_has_invested )
      return mysqli_num_rows($query_to_count_number_of_startups_user_has_invested);

    // Could not find for some reason
    return 0;
  }



  /**
   * Gets logged in user's user_id.
   *
   *
   * @package SET
   *
   * @return String
   */
  function get_logged_in_user_id() {

    // User is logged in
    if ( $this->check_if_user_is_logged_in() ) {
      return $_SESSION['user_id'];
    }

    // User is not logged in
    return null;
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
    );

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



  /**
   * Get's startup ID where user is working.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return String
   */
  function get_startup_id_where_user_is_working (
    $connection,
    $user_id
  ) {

    // Getting startup id where user is working
    $query_to_get_startup_id_where_user_is_working = mysqli_query (
      $connection,
      " SELECT 
        startup_team_member_startup_id
      FROM 
        startup_team_member_details 
      WHERE 
        startup_team_member_user_id = '$user_id'
      LIMIT 
        1 "
    );

    // Found startup ID
    if ( mysqli_num_rows($query_to_get_startup_id_where_user_is_working) === 1 )
      return mysqli_fetch_array($query_to_get_startup_id_where_user_is_working)['startup_team_member_startup_id'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Get's User's Startup ID
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return String
   */
  function get_user_startup_id (
    $connection,
    $user_id
  ) {

    // Getting startup id where user is working
    $query_to_get_user_startup_id = mysqli_query (
      $connection,
      " SELECT 
        startup_id
      FROM 
        startups 
      WHERE 
        startup_user_id = '$user_id'
      LIMIT 
        1 "
    );

    // Found user's startup ID
    if ( mysqli_num_rows($query_to_get_user_startup_id) === 1 )
      return mysqli_fetch_array ( $query_to_get_user_startup_id )['startup_id'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Get's User's Incubation Center ID
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return String
   */
  function get_user_incubation_center_id (
    $connection,
    $user_id
  ) {

    // Getting inubation center id where user is working
    $query_to_get_user_ic_id = mysqli_query (
      $connection,
      " SELECT 
        incubation_center_id
      FROM 
        incubation_centers
      WHERE 
        incubation_center_user_id = '$user_id'
      LIMIT 
        1 "
    );

    // Found user's Incubation Center ID
    if ( mysqli_num_rows($query_to_get_user_ic_id) === 1 )
      return mysqli_fetch_array ( $query_to_get_user_ic_id )['incubation_center_id'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Get's user profile picture id.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return String
   */
  function get_profile_picture_id (
    $connection,
    $user_id
  ) {

    // Fetching user profile picture id from DB
    $query_to_get_user_profile_picture_id = mysqli_query (
      $connection, 
      " SELECT 
        user_info_profile_pic_id
      FROM 
        user_info
      WHERE 
        user_info_user_id = '$user_id' 
      LIMIT 
        1 "
    );

    // User Profile Pic ID Fetched
    if ( mysqli_num_rows($query_to_get_user_profile_picture_id) === 1 ) {

      return mysqli_fetch_array ( $query_to_get_user_profile_picture_id, MYSQLI_ASSOC )["user_info_profile_pic_id"];
    }

    // User Profile Picture ID not fetched
    return null;
  }



  /**
   * Gets user's name.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return String
   */
  function get_name (
    $connection,
    $user_id
  ) {

    // Querying to get user's name
    $query_to_get_user_name = mysqli_query (
      $connection,
      " SELECT 
        user_name 
      FROM 
        user_info 
      WHERE 
        user_info_user_id = '$user_id' 
      LIMIT 
        1 "
    );

    // Got user's name, returning it
    if ( $query_to_get_user_name ) {
      return mysqli_fetch_array($query_to_get_user_name)["user_name"];
    }

    // Could not find user's name
    return null;
  }



  /**
   * Gets user email id.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return String
   */
  function get_user_email_id (
    $connection,
    $user_id
  ) {

    // Fetching user email id from DB
    $query_to_get_user_email_id = mysqli_query (
      $connection, 
      " SELECT 
        user_email_id 
      FROM 
        users 
      WHERE 
        user_id = '$user_id' 
      LIMIT 
        1 "
    );

    // User Email ID Found and Returning it
    if ( mysqli_num_rows($query_to_get_user_email_id) === 1 ) {

      return mysqli_fetch_array($query_to_get_user_email_id, MYSQLI_ASSOC)['user_email_id'];
    }

    return null;
  }



  /**
   * Get Username.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return String
   */
  function get_user_username (
    $connection,
    $user_id
  ) {

    // Fetching user 'email id' from DB
    $query_to_get_user_username = mysqli_query (
      $connection, 
      " SELECT 
        user_username 
      FROM 
        users 
      WHERE 
        user_id = '$user_id' 
      LIMIT 
        1 "
    );

    // User 'username' Found and Returning it
    if ( mysqli_num_rows($query_to_get_user_username) === 1 ) {

      return mysqli_fetch_array($query_to_get_user_username, MYSQLI_ASSOC)['user_username'];
    }

    return null;
  }



  /**
   * Gets user password.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return String
   */
  function get_user_password (
    $connection,
    $user_id
  ) {

    // Fetching user's password from DB
    $query_to_get_user_password = mysqli_query ( 
      $connection, 
      " SELECT 
        user_password 
      FROM 
        users 
      WHERE 
        user_id = '$user_id' 
      LIMIT 
        1 "
    ) or die ( mysqli_error($connection) );
    
    // Password fetched and returning it
    if ( mysqli_num_rows($query_to_get_user_password) === 1 ) {
      return mysqli_fetch_array ( $query_to_get_user_password )["user_password"];
    }

    // Password could not be fetched
    return null;
  }



  /**
   * Gets User Profile Description.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return String
   */
  function get_profile_description (
    $connection,
    $user_id
  ) {

    // Fetching user's bio
    $query_to_get_user_bio = mysqli_query (
      $connection,
      " SELECT 
        user_profile_description 
      FROM 
         user_info
      WHERE 
        user_info_user_id = '$user_id' 
      LIMIT 
        1 "
    );

    // Fetched bio properly, returning it
    if ( $query_to_get_user_bio ) {
      return mysqli_fetch_array ( $query_to_get_user_bio )["user_profile_description"];
    }

    // Could not fetch user bio
    return null;
  }



  /**
   * Gets User Bio.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return String
   */
  function get_user_bio (
    $connection,
    $user_id
  ) {

    // Fetching user's bio
    $query_to_get_user_bio = mysqli_query (
      $connection,
      " SELECT 
        user_complete_story 
      FROM 
         user_info
      WHERE 
        user_info_user_id = '$user_id' 
      LIMIT 
        1 "
    );

    // Fetched bio properly, returning it
    if ( $query_to_get_user_bio ) {
      return mysqli_fetch_array ( $query_to_get_user_bio )["user_complete_story"];
    }

    // Could not fetch user bio
    return null;
  }



  /**
   * Gets User Link.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return String
   */
  function get_user_link (
    $connection,
    $user_id
  ) {

    // Querying to get user profile link
    $query_to_get_user_link = mysqli_query (
      $connection,
      " SELECT 
        user_official_link 
      FROM 
         user_info
      WHERE 
        user_info_user_id = '$user_id' 
      LIMIT 
        1 "
    );

    // Fetched bio properly, returning it
    if ( $query_to_get_user_link ) {
      return mysqli_fetch_array ( $query_to_get_user_link )["user_official_link"];
    }

    // Could not fetch user profile link
    return null;
  }



  /**
   * Gets User LinkedIn.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return String
   */
  function get_user_linkedin (
    $connection,
    $user_id
  ) {

    // Querying to get user profile link
    $query_to_get_user_link = mysqli_query (
      $connection,
      " SELECT 
        user_linkedin_link 
      FROM 
         user_info
      WHERE 
        user_info_user_id = '$user_id' 
      LIMIT 
        1 "
    );

    // Fetched bio properly, returning it
    if ( $query_to_get_user_link ) {
      return mysqli_fetch_array ( $query_to_get_user_link )["user_linkedin_link"];
    }

    // Could not fetch user profile link
    return null;
  }



  /**
   * Gets User Twitter.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return String
   */
  function get_user_twitter (
    $connection,
    $user_id
  ) {

    // Querying to get user profile link
    $query_to_get_user_link = mysqli_query (
      $connection,
      " SELECT 
        user_twitter_id 
      FROM 
         user_info
      WHERE 
        user_info_user_id = '$user_id' 
      LIMIT 
        1 "
    );

    // Fetched bio properly, returning it
    if ( $query_to_get_user_link ) {
      return mysqli_fetch_array ( $query_to_get_user_link )["user_twitter_id"];
    }

    // Could not fetch user profile link
    return null;
  }



  /**
   * Gets User Facebook.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return String
   */
  function get_user_facebook (
    $connection,
    $user_id
  ) {

    // Querying to get user profile link
    $query_to_get_user_link = mysqli_query (
      $connection,
      " SELECT 
        user_facebook_id 
      FROM 
         user_info
      WHERE 
        user_info_user_id = '$user_id' 
      LIMIT 
        1 "
    );

    // Fetched bio properly, returning it
    if ( $query_to_get_user_link ) {
      return mysqli_fetch_array ( $query_to_get_user_link )["user_facebook_id"];
    }

    // Could not fetch user profile link
    return null;
  }



  /**
   * Gets User Instagram.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return String
   */
  function get_user_instagram (
    $connection,
    $user_id
  ) {

    // Querying to get user profile link
    $query_to_get_user_link = mysqli_query (
      $connection,
      " SELECT 
        user_instagram_id 
      FROM 
         user_info
      WHERE 
        user_info_user_id = '$user_id' 
      LIMIT 
        1 "
    );

    // Fetched bio properly, returning it
    if ( $query_to_get_user_link ) {
      return mysqli_fetch_array ( $query_to_get_user_link )["user_instagram_id"];
    }

    // Could not fetch user profile link
    return null;
  }



  /**
   * Get's user CV ID.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return Boolean
   */
  function get_cv_id (
    $connection,
    $user_id
  ) {

    // Getting user CV ID from DB
    $query_to_get_user_cv_id = mysqli_query ( 
      $connection,
      " SELECT 
        user_cv_id 
      FROM 
        user_info 
      WHERE 
        user_info_user_id = '$user_id' 
      LIMIT 
        1 "
    );

    // User Row Found
    if ( mysqli_num_rows($query_to_get_user_cv_id) === 1 )
      //  User CV ID
      return mysqli_fetch_array ( $query_to_get_user_cv_id, MYSQLI_ASSOC )["user_cv_id"];

    // User Row not found or
    // System Error
    return null;
  }



  /**
   * Add's new user
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $email_id
   * @param String $username
   * @param String $password
   * @return Boolean
   */
  function add_new_user ( 
    $connection,
    $email_id,
    $username,
    $password
  ) {

    // Secure Unique ID for User
    $utility = new utility();
    $user_id = $utility->generate_secure_string ( "user_", 20 );

    // Adding new user in 'users' table
    $query_add_new_user = mysqli_query (
      $connection,
      " INSERT INTO  
      users ( 
        user_id, 
        user_username, 
        user_password, 
        user_email_id 
      ) VALUES ( 
        '$user_id',
        '$username',
        '$password',
        '$email_id'
      ) "
    );

    // Added user record in 'users' table
    if ( $query_add_new_user ) {

      // Secure Unique ID for 'user_info' table
      $user_info_id = $utility->generate_secure_string ( "user_info_", 20 );

      // Adding new user in 'user_info' table
      $query_add_new_user = mysqli_query (
        $connection,
        " INSERT INTO  
        user_info ( 
          user_info_id, 
          user_info_user_id
        ) VALUES ( 
          '$user_info_id',
          '$user_id'
        ) "
      );

      // Added user record in 'user_info' table
      if ( $query_add_new_user ) {
        return true;
      } else
        return false;
    }

    return false;
  }



  /**
   * Adds new job request
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $uid
   * @param String $sid
   * @return Boolean
   */
  function add_job_request (
    $connection,
    $uid,
    $sid
  ) {

    // Generating new job request id
    $utility = new utility;
    $job_request_id = $utility->generate_secure_string ( "jreqid_", 10 );

    // Adding new job request
    $query_to_add_new_job_request = mysqli_query (
      $connection,
      " INSERT INTO jobs_applied (
          job_applied_id, 
          job_applier_user_id, 
          job_applied_startup_id
        ) VALUES ( 
          '$job_request_id', 
          '$uid', 
          '$sid' 
        ) "
    );

    // Added new job request
    if ( $query_to_add_new_job_request )
      return true;

    // Something went wrong
    return false;
  }



  /**
   * Updates Investor Status
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @param Integer $investor_status
   * @return Boolean
   */
  function update_investor_status (
    $connection,
    $user_id,
    $investor_status
  ) {

    // Santising
    $investor_status = (int) $investor_status;

    // Updating investor status
    $query_to_update_investor_status = mysqli_query (
      $connection,
      " UPDATE 
        user_info 
      SET 
        user_info_is_a_investor = $investor_status 
      WHERE 
        user_info_user_id = '$user_id' 
      LIMIT 
        1 "
    );

    // Updated investor status
    if ( $query_to_update_investor_status )
      return true;

    // Could not update for some reason
    return false;
  }



  /**
   * Updates profile picture id.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @param String $updated_profile_picture_id
   * @return Boolean
   */
  function update_profile_picture_id (
    $connection,
    $user_id,
    $updated_profile_picture_id
  ) {

    // Updating profile picture id
    $query_to_update_profile_picture_id = mysqli_query (
      $connection, 
      " UPDATE 
        user_info 
      SET 
        user_info_profile_pic_id = '$updated_profile_picture_id' 
      WHERE 
        user_info_user_id = '$user_id' 
      LIMIT 
        1 "
    );

    // Updated correctly
    if ( $query_to_update_profile_picture_id ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates User's Name.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @param String $updated_name
   * @return Boolean
   */
  function update_name ( 
    $connection,
    $user_id,
    $updated_name
  ) {

    // Trying to update name
    $query_to_update_name = mysqli_query ( 
      $connection, 
      " UPDATE
          user_info
        SET
          user_name = '$updated_name'
        WHERE
          user_info_user_id = '$user_id'
        LIMIT
          1 "
    );

    // Updated name successfully
    if ( $query_to_update_name ) {
      return true;
    }

    return false;
  }



  /**
   * Updates Email ID.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @param String $updated_email_id
   * @return Boolean
   */
  function update_email_id (
    $connection,
    $user_id,
    $updated_email_id
  ) {

    // Query to update email id
    $query_to_update_email_id = mysqli_query (
      $connection, 
      " UPDATE 
        users 
      SET 
        user_email_id = '$updated_email_id'
      WHERE
        user_id = '$user_id'
      LIMIT
        1 "
    );

    // Query ran succesfully
    if ( $query_to_update_email_id )
      return true;

    // Error while updating
    return false;
  }



  /**
   * Updates Username.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @param String $updated_username
   * @return Boolean
   */
  function update_username (
    $connection,
    $user_id,
    $updated_username
  ) {

    // Query to update username
    $query_to_update_username = mysqli_query (
      $connection, 
      " UPDATE 
        users 
      SET 
        user_username = '$updated_username'
      WHERE
        user_id = '$user_id'
      LIMIT
        1 "
    );

    // Query ran succesfully
    if ( $query_to_update_username )
      return true;

    // Error while updating
    return false;
  }



  /**
   * Updates Password.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @param String $updated_password
   * @return Boolean
   */
  function update_password (
    $connection,
    $user_id,
    $updated_password
  ) {

    // Query to update username
    $query_to_update_password = mysqli_query (
      $connection, 
      " UPDATE 
        users 
      SET 
        user_password = '$updated_password'
      WHERE
        user_id = '$user_id'
      LIMIT
        1 "
    );

    // Query ran succesfully
    if ( $query_to_update_password )
      return true;

    // Error while updating
    return false;
  }



  /**
   * Updates user's profile description.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @param String $updated_profile_description
   * @return Boolean
   */
  function update_profile_description (
    $connection,
    $user_id,
    $updated_profile_description
  ) {

    // Querying to update user profile description
    $query_to_update_description  = mysqli_query (
      $connection, 
      " UPDATE 
          user_info 
        SET 
          user_profile_description = '$updated_profile_description' 
        WHERE 
          user_info_user_id = '$user_id' 
        LIMIT 
          1 "
    );

    // Updated user's bio successfully
    if ( $query_to_update_description ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates user's bio.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @param String $updated_bio
   * @return Boolean
   */
  function update_bio (
    $connection,
    $user_id,
    $updated_bio
  ) {

    // Querying to update user bio
    $query_to_update_bio  = mysqli_query (
      $connection, 
      " UPDATE 
          user_info 
        SET 
          user_complete_story = '$updated_bio' 
        WHERE 
          user_info_user_id = '$user_id' 
        LIMIT 
          1 "
    );

    // Updated user's bio successfully
    if ( $query_to_update_bio ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates Profile Link.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @param String $updated_link
   * @return Boolean
   */
  function update_link (
    $connection,
    $user_id,
    $updated_link
  ) {

    // Querying to update user link
    $query_to_update_link  = mysqli_query (
      $connection, 
      " UPDATE 
          user_info 
        SET 
          user_official_link = '$updated_link' 
        WHERE 
          user_info_user_id = '$user_id' 
        LIMIT 
          1 "
    );

    // Updated user's link successfully
    if ( $query_to_update_link ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates LinkedIn Username.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @param String $updated_linkedin
   * @return Boolean
   */
  function update_linkedin (
    $connection,
    $user_id,
    $updated_linkedin
  ) {

    // Querying to update user link
    $query_to_update_linkedin  = mysqli_query (
      $connection, 
      " UPDATE 
          user_info 
        SET 
          user_linkedin_link = '$updated_linkedin' 
        WHERE 
          user_info_user_id = '$user_id' 
        LIMIT 
          1 "
    );

    // Updated user's linkedin successfully
    if ( $query_to_update_linkedin ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates Twitter Username.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @param String $updated_twitter
   * @return Boolean
   */
  function update_twitter (
    $connection,
    $user_id,
    $updated_twitter
  ) {

    // Querying to update user link
    $query_to_update_twitter = mysqli_query (
      $connection, 
      " UPDATE 
          user_info 
        SET 
          user_twitter_id = '$updated_twitter' 
        WHERE 
          user_info_user_id = '$user_id' 
        LIMIT 
          1 "
    );

    // Updated user's twitter successfully
    if ( $query_to_update_twitter ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates Facebook Username.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @param String $updated_twitter
   * @return Boolean
   */
  function update_facebook (
    $connection,
    $user_id,
    $updated_facebook
  ) {

    // Querying to update user link
    $query_to_update_facebook = mysqli_query (
      $connection, 
      " UPDATE 
          user_info 
        SET 
          user_facebook_id = '$updated_facebook' 
        WHERE 
          user_info_user_id = '$user_id' 
        LIMIT 
          1 "
    );

    // Updated user's facebook successfully
    if ( $query_to_update_facebook ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates Instagram Username.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @param String $updated_instagram
   * @return Boolean
   */
  function update_instagram (
    $connection,
    $user_id,
    $updated_instagram
  ) {

    // Querying to update user link
    $query_to_update_instagram = mysqli_query (
      $connection, 
      " UPDATE 
          user_info 
        SET 
          user_instagram_id = '$updated_instagram' 
        WHERE 
          user_info_user_id = '$user_id' 
        LIMIT 
          1 "
    );

    // Updated user's instagram successfully
    if ( $query_to_update_instagram ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates User CV ID.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return Boolean
   */
  function update_cv_id (
    $connection,
    $user_id,
    $cv_id
  ) {

    // Updating CV ID
    if ( $cv_id != NULL )
      $query_to_update_cv_id = mysqli_query ( 
        $connection,
        " UPDATE 
          user_info 
        SET 
          user_cv_id  = '$cv_id' 
        WHERE 
          user_info_user_id = '$user_id' 
        LIMIT 
          1 "
      );
    else
      $query_to_update_cv_id = mysqli_query ( 
        $connection,
        " UPDATE 
          user_info 
        SET 
          user_cv_id  = NULL
        WHERE 
          user_info_user_id = '$user_id'
        LIMIT 
          1 "
      );

    // Updated Successfully
    if ( $query_to_update_cv_id )
      return true;

    // Could not update
    return false;
  }



  /**
   * Removes User CV from DB and File System.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @param String $cv_source
   * @return Boolean
   */
  function remove_cv (
    $connection,
    $user_id,
    $cv_source
  ) {

    // Getting user's CV Id
    $cv_id_to_remove = $this->get_cv_id($connection, $user_id);

    // CV is uploaded
    if ( $cv_id_to_remove !== NULL && $cv_id_to_remove != "" ) {
      
      // CV to remove exists in file system
      if ( file_exists($cv_source . $cv_id_to_remove) ) {

        unlink ( $cv_source . $cv_id_to_remove );
        $this->update_cv_id ( $connection, $user_id, NULL );
        return true;
      } 
      else return false;
    }

    return true;
  }



  /**
   * Removes a particular Job Application.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $job_application_id
   * @return Boolean
   */
  function remove_job_application (
    $connection,
    $user_id,
    $job_application_id
  ) {

    // Santising
    $job_application_id = htmlspecialchars ( $job_application_id );

    // Removing job application
    $query_to_remove_job_application = mysqli_query (
      $connection,
      " DELETE FROM 
        jobs_applied 
      WHERE 
        job_applied_id = '$job_application_id'
      AND
        job_applier_user_id = '$user_id'
      LIMIT 
        1 "
    );

    // Removed job application
    if ( $query_to_remove_job_application )
      return true;

    // Could not remove job application for some reason
    return false;
  }



  /**
   * Removes user from startup team member list.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return String
   */
  function remove_from_startup_team (
    $connection,
    $user_id
  ) {

    // Removing user from startup team member list
    $query_to_remove_user_from_startup_team_list = mysqli_query (
      $connection,
      " DELETE FROM 
        startup_team_member_details 
      WHERE 
        startup_team_member_user_id = '$user_id' "
    );

    // Removed user from startup team member list
    if ( $query_to_remove_user_from_startup_team_list )
      return true;

    // Could not remove for some reason
    return false;
  }
}