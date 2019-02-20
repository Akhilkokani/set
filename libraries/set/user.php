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
   * @param string $connection
   * @param string $email
   * @return boolean
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
   * Gets logged in user's user_id.
   *
   *
   * @package SET
   *
   * @return string
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
   * @param string $connection
   * @param string $user_id
   * @return string
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
   * @param string $connection
   * @param string $user_id
   * @return string
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
   * @param string $connection
   * @param string $user_id
   * @return string
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
   * @param string $connection
   * @param string $user_id
   * @return string
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
   * @param string $connection
   * @param string $user_id
   * @return string
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
   * @param string $connection
   * @param string $user_id
   * @return string
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
   * @param string $connection
   * @param string $user_id
   * @return string
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
   * @param string $connection
   * @param string $user_id
   * @return string
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
   * @param string $connection
   * @param string $user_id
   * @return string
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
   * @param string $connection
   * @param string $user_id
   * @return string
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
   * @param string $connection
   * @param string $user_id
   * @return string
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
   * Add's new user
   *
   *
   * @package SET
   *
   * @param string $connection
   * @param string $email_id
   * @param string $username
   * @param string $password
   * @return boolean
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
   * Updates profile picture id.
   *
   *
   * @package SET
   *
   * @param string $connection
   * @param string $user_id
   * @param string $updated_profile_picture_id
   * @return boolean
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
   * @param string $connection
   * @param string $user_id
   * @param string $updated_name
   * @return boolean
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
   * @param string $connection
   * @param string $user_id
   * @param string $updated_email_id
   * @return boolean
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
   * @param string $connection
   * @param string $user_id
   * @param string $updated_username
   * @return boolean
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
   * @param string $connection
   * @param string $user_id
   * @param string $updated_password
   * @return boolean
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
   * @param string $connection
   * @param string $user_id
   * @param string $updated_profile_description
   * @return boolean
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
   * @param string $connection
   * @param string $user_id
   * @param string $updated_bio
   * @return boolean
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
   * @param string $connection
   * @param string $user_id
   * @param string $updated_link
   * @return boolean
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
   * @param string $connection
   * @param string $user_id
   * @param string $updated_linkedin
   * @return boolean
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
   * @param string $connection
   * @param string $user_id
   * @param string $updated_twitter
   * @return boolean
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
   * @param string $connection
   * @param string $user_id
   * @param string $updated_twitter
   * @return boolean
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
   * @param string $connection
   * @param string $user_id
   * @param string $updated_instagram
   * @return boolean
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
}