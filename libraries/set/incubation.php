<?php
/** 
 * incubation
 * 
 * Consists all functions related to incubation center only.
 * Functions such as checking if user has startup or not,
 * checking if startup is open for hiring and much more...
 * 
 * @author Akhil Kokani
 * @package SET
 */
class incubation {



  /**
   * Adds new incubation center.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $incubation_center_user_id
   * @return Boolean
   */
  function add_new (
    $connection,
    $incubation_center_user_id
  ) {

    // Generating incubation center ID
    $utility = new utility;
    $ic_id = $utility->generate_secure_string ( "ic_", 10 );

    // Adding new incubation center
    $query_to_add_new_incubation_center = mysqli_query ( 
      $connection,
      " INSERT INTO 
      incubation_centers ( 
        incubation_center_id, 
        incubation_center_user_id 
      ) VALUES (
        '$ic_id', 
        '$incubation_center_user_id'
      ) "
    );

    // Added new incubation center
    if ( $query_to_add_new_incubation_center ) {

      // Incubation Center Information ID
      $ic_info_id = $utility->generate_secure_string ( "ic_info_", 10 );

      // Adding new incubation center info records
      $query_to_add_new_incubation_center = mysqli_query (
        $connection,
        " INSERT INTO incubation_centers_info (
          incubation_center_info_id, 
          incubation_center_id
        ) VALUES (
          '$ic_info_id', 
          '$ic_id'
        ) "
      );

      // Added new incubation center info record
      if ( $query_to_add_new_incubation_center )
        return true;
    }

    // Could not add, for some reason
    return false;
  }



  /**
   * Counts total number of startups under the incubation center.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @return Integer
   */
  function count_number_of_startups_incubated (
    $connection,
    $ic_id
  ) {

    // Counting
    $query_to_count_number_of_startups_incubated = mysqli_query (
      $connection,
      " SELECT 
        slno 
      FROM 
        startups_info 
      WHERE 
        startup_incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Query ran properly
    if ( $query_to_count_number_of_startups_incubated ) {
      return mysqli_num_rows ( $query_to_count_number_of_startups_incubated );
    }

    // Could not count for some reason
    return 0;
  }



  /**
   * Deletes Entire Incubation Center.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $incubation_center_id
   * @param String $profile_picture_source
   * @return Boolean
   */
  function delete (
    $connection,
    $incubation_center_id,
    $profile_picture_source
  ) {

    // Deletes IC profile picture
    $this->delete_profile_picture ( $connection, $incubation_center_id, $profile_picture_source );

    // Removing IC from all startups who have listed as IC
    $query_to_delete_ic = mysqli_query (
      $connection,
      " UPDATE 
        startups_info 
      SET 
        startup_incubation_center_id = NULL 
      WHERE 
        startup_incubation_center_id = '$incubation_center_id' "
    );

    // Removed IC from startup IC list
    if ( $query_to_delete_ic ) {

      // Query to delete incubation center info. record
      $query_to_delete_ic = mysqli_query (
        $connection,
        " DELETE FROM 
          incubation_centers_info 
        WHERE 
          incubation_center_id = '$incubation_center_id' 
        LIMIT 
          1 "
      );

      // Deleted IC info. record
      if ( $query_to_delete_ic ) {

        // Deleting incubation center record
        $query_to_delete_ic = mysqli_query ( 
          $connection,
          " DELETE FROM 
            incubation_centers 
          WHERE 
            incubation_center_id = '$incubation_center_id' 
          LIMIT 
            1 "
        );

        // Deleted incubation center record
        if ( $query_to_delete_ic )
          return true;
      }
    }

    // Could not delete/remove for some reason
    return false;
  }



  /**
   * Delete's Incubation Center Profile Picture.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @return Boolean
   */
  function delete_profile_picture (
    $connection,
    $ic_id,
    $profile_picture_source
  ) {

    // Profile Picture
    $ic_profile_picture = $this->get_profile_pic_id($connection, $ic_id);

    // Profile Picture Exists in File System
    if ( $ic_profile_picture !== NULL )
      if ( file_exists($profile_picture_source . $ic_profile_picture) ) {
        unlink ( $profile_picture_source . $ic_profile_picture );
      }

    // Updating profile picture
    $this->update_ic_profile_picture_id ( $connection, $ic_id, NULL );
  }



  /**
   * Checks whether email exists in incubation_centers table
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
    $query_to_check_if_email_exists = mysqli_query ( $connection, " SELECT slno FROM incubation_centers WHERE incubation_center_email_id = '$email' LIMIT 1 " );

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
   * Get's incubation center Id.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return String
   */
  function get_id (
    $connection,
    $user_id
  ) {

    // Getting incubation center id
    $query_to_get_incubation_center_id = mysqli_query (
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

    // Found incubation center id
    if ( mysqli_num_rows($query_to_get_incubation_center_id) == 1 )
      return mysqli_fetch_array ( $query_to_get_incubation_center_id )['incubation_center_id'];

    // Could not find incubation center id
    // or System Error
    return NULL;
  }



  /**
   * Get's profile pictur id.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $incubation_center_id
   * @return String
   */
  function get_profile_pic_id (
    $connection,
    $incubation_center_id
  ) {

    // Getting incubation center profile picture Id
    $query_to_get_ic_profile_pic_id = mysqli_query (
      $connection,
      " SELECT 
        incubation_center_profile_pic_id 
      FROM 
        incubation_centers 
      WHERE 
        incubation_center_id = '$incubation_center_id' 
      LIMIT 
        1 "
    );

    // Found incubation center profile picture id
    if ( mysqli_num_rows($query_to_get_ic_profile_pic_id) == 1 )  
      return mysqli_fetch_array ( $query_to_get_ic_profile_pic_id )['incubation_center_profile_pic_id'];

    // Could not find for some reason
    return NULL;
  }



  /**
   * Gets Name.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @return String
   */
  function get_name (
    $connection,
    $ic_id
  ) {

    // Query to get IC Name
    $query_to_get_ic_name = mysqli_query (
      $connection,
      " SELECT 
        incubation_center_name 
      FROM 
        incubation_centers 
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_ic_name )
      return mysqli_fetch_assoc ( $query_to_get_ic_name )['incubation_center_name'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Gets Email.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @return String
   */
  function get_email (
    $connection,
    $ic_id
  ) {

    // Query to get IC Email
    $query_to_get_ic_email = mysqli_query (
      $connection,
      " SELECT 
        incubation_center_email_id 
      FROM 
        incubation_centers 
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_ic_email )
      return mysqli_fetch_assoc ( $query_to_get_ic_email )['incubation_center_email_id'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Gets Description.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @return String
   */
  function get_description (
    $connection,
    $ic_id
  ) {

    // Query to get IC Description
    $query_to_get_ic_desc = mysqli_query (
      $connection,
      " SELECT 
        incubation_center_description 
      FROM 
        incubation_centers_info
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_ic_desc )
      return mysqli_fetch_assoc ( $query_to_get_ic_desc )['incubation_center_description'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Gets Story.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @return String
   */
  function get_story (
    $connection,
    $ic_id
  ) {

    // Query to get IC Story
    $query_to_get_ic_story = mysqli_query (
      $connection,
      " SELECT 
        incubation_center_complete_story 
      FROM 
        incubation_centers_info
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_ic_story )
      return mysqli_fetch_assoc ( $query_to_get_ic_story )['incubation_center_complete_story'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Gets Link.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @return String
   */
  function get_link (
    $connection,
    $ic_id
  ) {

    // Query to get IC Link
    $query_to_get_ic_link = mysqli_query (
      $connection,
      " SELECT 
        incubation_center_official_link 
      FROM 
        incubation_centers_info
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_ic_link )
      return mysqli_fetch_assoc ( $query_to_get_ic_link )['incubation_center_official_link'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Gets Registration Number.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @return String
   */
  function get_reg_no (
    $connection,
    $ic_id
  ) {

    // Query to get IC Reg. No.
    $query_to_get_ic_reg_no = mysqli_query (
      $connection,
      " SELECT 
        incubation_center_registration_number_id 
      FROM 
        incubation_centers_info
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_ic_reg_no )
      return mysqli_fetch_assoc ( $query_to_get_ic_reg_no )['incubation_center_registration_number_id'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Gets State ID.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @return String
   */
  function get_state_id (
    $connection,
    $ic_id
  ) {

    // Query to get IC State ID
    $query_to_get_ic_state_id = mysqli_query (
      $connection,
      " SELECT 
        incubation_center_state_id 
      FROM 
        incubation_centers_info
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_ic_state_id )
      return mysqli_fetch_assoc ( $query_to_get_ic_state_id )['incubation_center_state_id'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Gets Pincode.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @return String
   */
  function get_pincode (
    $connection,
    $ic_id
  ) {

    // Query to get IC Pincode
    $query_to_get_ic_pincode = mysqli_query (
      $connection,
      " SELECT 
        incubation_center_pincode 
      FROM 
        incubation_centers_info
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_ic_pincode )
      return mysqli_fetch_assoc ( $query_to_get_ic_pincode )['incubation_center_pincode'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Gets State Name.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @return String
   */
  function get_state (
    $connection,
    $ic_id
  ) {

    // Gettting state id
    $state_id_of_ic = $this->get_state_id ( $connection, $ic_id );

    // Query to get IC State
    $query_to_get_ic_state_name = mysqli_query (
      $connection,
      " SELECT 
        state_text 
      FROM 
        states
      WHERE 
        state_id = '$state_id_of_ic' 
      LIMIT 
        1 "
    );

    // Found IC State Record
    if ( $query_to_get_ic_state_name )
      return mysqli_fetch_assoc ( $query_to_get_ic_state_name )['state_text'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Gets City ID.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @return String
   */
  function get_city_id (
    $connection,
    $ic_id
  ) {

    // Query to get IC City ID
    $query_to_get_ic_city_id = mysqli_query (
      $connection,
      " SELECT 
        incubation_center_city_id 
      FROM 
        incubation_centers_info
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_ic_city_id )
      return mysqli_fetch_assoc ( $query_to_get_ic_city_id )['incubation_center_city_id'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Gets City Name.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @return String
   */
  function get_city (
    $connection,
    $ic_id
  ) {

    // Gettting city id
    $city_id_of_ic = $this->get_city_id ( $connection, $ic_id );

    // Query to get IC City
    $query_to_get_ic_city_name = mysqli_query (
      $connection,
      " SELECT 
        city_text 
      FROM 
        cities
      WHERE 
        city_id = '$city_id_of_ic' 
      LIMIT 
        1 "
    );

    // Found IC State Record
    if ( $query_to_get_ic_city_name )
      return mysqli_fetch_assoc ( $query_to_get_ic_city_name )['city_text'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Gets Address.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @return String
   */
  function get_address (
    $connection,
    $ic_id
  ) {

    // Query to get IC Address
    $query_to_get_ic_address = mysqli_query (
      $connection,
      " SELECT 
        incubation_center_address 
      FROM 
        incubation_centers_info
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_ic_address )
      return mysqli_fetch_assoc ( $query_to_get_ic_address )['incubation_center_address'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Gets Contact Number.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @return String
   */
  function get_contact_number (
    $connection,
    $ic_id
  ) {

    // Query to get IC Contact Number
    $query_to_get_ic_contact_number = mysqli_query (
      $connection,
      " SELECT 
        incubation_center_contact_number 
      FROM 
        incubation_centers_info
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_ic_contact_number )
      return mysqli_fetch_assoc ( $query_to_get_ic_contact_number )['incubation_center_contact_number'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Gets LinkedIn.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @return String
   */
  function get_linkedin (
    $connection,
    $ic_id
  ) {

    // Query to get IC LinkedIn
    $query_to_get_ic_linkedin = mysqli_query (
      $connection,
      " SELECT 
        incubation_center_linkedin_id 
      FROM 
        incubation_centers_info
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_ic_linkedin )
      return mysqli_fetch_assoc ( $query_to_get_ic_linkedin )['incubation_center_linkedin_id'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Gets Twitter.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @return String
   */
  function get_twitter (
    $connection,
    $ic_id
  ) {

    // Query to get IC Twitter
    $query_to_get_ic_twitter = mysqli_query (
      $connection,
      " SELECT 
        incubation_center_twitter_id 
      FROM 
        incubation_centers_info
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_ic_twitter )
      return mysqli_fetch_assoc ( $query_to_get_ic_twitter )['incubation_center_twitter_id'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Gets Facebook.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @return String
   */
  function get_facebook (
    $connection,
    $ic_id
  ) {

    // Query to get IC Facebook
    $query_to_get_ic_facebook = mysqli_query (
      $connection,
      " SELECT 
        incubation_center_facebook_id 
      FROM 
        incubation_centers_info
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_ic_facebook )
      return mysqli_fetch_assoc ( $query_to_get_ic_facebook )['incubation_center_facebook_id'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Gets Instagram.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @return String
   */
  function get_instagram (
    $connection,
    $ic_id
  ) {

    // Query to get IC Instagram
    $query_to_get_ic_instagram = mysqli_query (
      $connection,
      " SELECT 
        incubation_center_instagram_id 
      FROM 
        incubation_centers_info
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_ic_instagram )
      return mysqli_fetch_assoc ( $query_to_get_ic_instagram )['incubation_center_instagram_id'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Updates IC Name.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @param String $updated_ic_name
   * @return Boolean
   */
  function update_name (
    $connection,
    $ic_id,
    $updated_ic_name
  ) {

    // Updating IC name
    $query_to_update_ic_name = mysqli_query (
      $connection,
      " UPDATE 
        incubation_centers 
      SET 
        incubation_center_name = '$updated_ic_name' 
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Updated IC name
    if ( $query_to_update_ic_name )
      return true;

    // Could not update, for some reason
    return false;
  }



  /**
   * Updates IC Email.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @param String $updated_ic_email
   * @return Boolean
   */
  function update_email (
    $connection,
    $ic_id,
    $updated_ic_email
  ) {

    // Updating IC email
    $query_to_update_ic_email = mysqli_query (
      $connection,
      " UPDATE 
        incubation_centers
      SET 
        incubation_center_email_id = '$updated_ic_email' 
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Updated IC email
    if ( $query_to_update_ic_email )
      return true;

    // Could not update, for some reason
    return false;
  }



  /**
   * Updates IC Description.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @param String $updated_ic_description
   * @return Boolean
   */
  function update_description (
    $connection,
    $ic_id,
    $updated_ic_description
  ) {

    // Updating IC description
    $query_to_update_ic_desc = mysqli_query (
      $connection,
      " UPDATE 
        incubation_centers_info
      SET 
        incubation_center_description = '$updated_ic_description' 
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Updated IC description
    if ( $query_to_update_ic_desc )
      return true;

    // Could not update, for some reason
    return false;
  }



  /**
   * Updates IC Story.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @param String $updated_ic_story
   * @return Boolean
   */
  function update_story (
    $connection,
    $ic_id,
    $updated_ic_story
  ) {

    // Updating IC story
    $query_to_update_ic_story = mysqli_query (
      $connection,
      " UPDATE 
        incubation_centers_info
      SET 
        incubation_center_complete_story = '$updated_ic_story' 
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Updated IC story
    if ( $query_to_update_ic_story )
      return true;

    // Could not update, for some reason
    return false;
  }



  /**
   * Updates IC Link.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @param String $updated_ic_link
   * @return Boolean
   */
  function update_link (
    $connection,
    $ic_id,
    $updated_ic_link
  ) {

    // Updating IC link
    $query_to_update_ic_link = mysqli_query (
      $connection,
      " UPDATE 
        incubation_centers_info
      SET 
        incubation_center_official_link = '$updated_ic_link' 
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Updated IC link
    if ( $query_to_update_ic_link )
      return true;

    // Could not update, for some reason
    return false;
  }



  /**
   * Updates IC Link.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @param String $updated_ic_reg_no
   * @return Boolean
   */
  function update_registration_number (
    $connection,
    $ic_id,
    $updated_ic_reg_no
  ) {

    // Updating IC Reg. No.
    $query_to_update_ic_reg_no = mysqli_query (
      $connection,
      " UPDATE 
        incubation_centers_info
      SET 
        incubation_center_registration_number_id = '$updated_ic_reg_no' 
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Updated IC Reg. No.
    if ( $query_to_update_ic_reg_no )
      return true;

    // Could not update, for some reason
    return false;
  }



  /**
   * Updates State.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @param String $state_id
   * @return Boolean
   */
  function update_state (
    $connection,
    $ic_id,
    $state_id
  ) {

    // Updating state
    $query_to_update_state = mysqli_query (
      $connection,
      " UPDATE 
        incubation_centers_info 
      SET 
        incubation_center_state_id = '$state_id' 
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_state )
      return true;

    // Could not update for some reason
    return false;
  }



  /**
   * Updates City.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @param String $city_id
   * @return Boolean
   */
  function update_city (
    $connection,
    $ic_id,
    $city_id
  ) {

    // Updating state
    $query_to_update_city = mysqli_query (
      $connection,
      " UPDATE 
        incubation_centers_info 
      SET 
        incubation_center_city_id = '$city_id' 
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_city )
      return true;

    // Could not update for some reason
    return false;
  }



  /**
   * Updates Pincode.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @param String $pincode
   * @return Boolean
   */
  function update_pincode (
    $connection,
    $ic_id,
    $pincode
  ) {

    // Updating pincode
    $query_to_update_pincode = mysqli_query (
      $connection,
      " UPDATE 
        incubation_centers_info 
      SET 
        incubation_center_pincode = '$pincode' 
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_pincode )
      return true;

    // Could not update for some reason
    return false;
  }



  /**
   * Updates Address.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @param String $address
   * @return Boolean
   */
  function update_address (
    $connection,
    $ic_id,
    $address
  ) {

    // Updating address
    $query_to_update_address = mysqli_query (
      $connection,
      " UPDATE 
        incubation_centers_info 
      SET 
        incubation_center_address = '$address' 
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_address )
      return true;

    // Could not update for some reason
    return false;
  }



  /**
   * Updates Contact Number.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @param String $contact_number
   * @return Boolean
   */
  function update_contact_number (
    $connection,
    $ic_id,
    $contact_number
  ) {

    // Updating contact number
    $query_to_update_contact_number = mysqli_query (
      $connection,
      " UPDATE 
        incubation_centers_info 
      SET 
        incubation_center_contact_number = '$contact_number' 
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_contact_number )
      return true;

    // Could not update for some reason
    return false;
  }



  /**
   * Updates LinkedIn.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @param String $linkedin
   * @return Boolean
   */
  function update_linkedin (
    $connection,
    $ic_id,
    $linkedin
  ) {

    // Updating linkedin
    $query_to_update_linkedin = mysqli_query (
      $connection,
      " UPDATE 
        incubation_centers_info 
      SET 
        incubation_center_linkedin_id = '$linkedin' 
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_linkedin )
      return true;

    // Could not update for some reason
    return false;
  }



  /**
   * Updates Twitter.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @param String $twitter
   * @return Boolean
   */
  function update_twitter (
    $connection,
    $ic_id,
    $twitter
  ) {

    // Updating linkedin
    $query_to_update_twitter = mysqli_query (
      $connection,
      " UPDATE 
        incubation_centers_info 
      SET 
        incubation_center_twitter_id = '$twitter' 
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_twitter )
      return true;

    // Could not update for some reason
    return false;
  }



  /**
   * Updates Facebook.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @param String $facebook
   * @return Boolean
   */
  function update_facebook (
    $connection,
    $ic_id,
    $facebook
  ) {

    // Updating facebook
    $query_to_update_facebook = mysqli_query (
      $connection,
      " UPDATE 
        incubation_centers_info 
      SET 
        incubation_center_facebook_id = '$facebook' 
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_facebook )
      return true;

    // Could not update for some reason
    return false;
  }



  /**
   * Updates Instagram.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $ic_id
   * @param String $instagram
   * @return Boolean
   */
  function update_instagram (
    $connection,
    $ic_id,
    $instagram
  ) {

    // Updating instagram
    $query_to_update_instagram = mysqli_query (
      $connection,
      " UPDATE 
        incubation_centers_info 
      SET 
        incubation_center_instagram_id = '$instagram' 
      WHERE 
        incubation_center_id = '$ic_id' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_instagram )
      return true;

    // Could not update for some reason
    return false;
  }



  /**
   * Updates incubation center with new profile picture id.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $incubation_center_id
   * @param String $updated_profile_picture_id
   * @return Boolean
   */
  function update_ic_profile_picture_id (
    $connection,
    $incubation_center_id,
    $updated_profile_picture_id
  ) {

    if ( $updated_profile_picture_id !== NULL ) {

      // Updating profile picture ID
      $query_to_update_profile_picture_id = mysqli_query (
        $connection,
        " UPDATE 
          incubation_centers 
        SET 
          incubation_center_profile_pic_id = '$updated_profile_picture_id' 
        WHERE 
          incubation_center_id = '$incubation_center_id'
        LIMIT 
          1 "
      );
    } else {

      // Updating profile picture ID
      $query_to_update_profile_picture_id = mysqli_query (
        $connection,
        " UPDATE 
          incubation_centers 
        SET 
          incubation_center_profile_pic_id = NULL
        WHERE 
          incubation_center_id = '$incubation_center_id'
        LIMIT 
          1 "
      );
    }

    // Updated incubation center profile picture id 
    if ( $query_to_update_profile_picture_id ) {
      return true;
    }

    // Could not update for some reason
    return false;
  }
}