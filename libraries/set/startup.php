<?php
/** 
 * startup
 * 
 * Consists all functions realted to startup only.
 * Functions such as calculating total team members in startup,
 * checking if startup is open for hiring and much more...
 * 
 * @author Akhil Kokani
 * @package SET
 */
class startup {



  /**
   * Adds new Startup.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $user_id
   * @return Boolean
   */
  function add_new (
    $connection,
    $user_id
  ) {

    // Generating secure startup id
    $utility = new utility;
    $startup_id = $utility->generate_secure_string ( "sid_", 10 );

    // Adding new startup
    $query_to_add_new_startup = mysqli_query (
      $connection,
      " INSERT INTO startups ( 
        startup_id, 
        startup_user_id, 
        startup_name 
      ) VALUES ( 
        '$startup_id',
        '$user_id',
        '' 
      ) "
    );

    // Added new startup
    if ( $query_to_add_new_startup ) {

      // Adding record in startups_info table
      $query_to_add_new_startup = mysqli_query (
        $connection,
        " INSERT INTO startups_info ( 
          startup_id 
        ) VALUES ( 
          '$startup_id' 
        ) "
      );

      // Added record in startups_info table
      if ( $query_to_add_new_startup )
        return true;
    }

    // Something went wrong
    return false;
  }



  /**
   * Adds user to a startup team member.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $user_id
   * @return Boolean
   */
  function add_team_member (
    $connection,
    $sid,
    $user_id
  ) {

    // Generating secure team member id
    $utility = new utility;
    $team_member_id = $utility->generate_secure_string ( "team_mem_", 10 );

    // Deleting user's job application if user has applied through job
    $this->delete_job_application_of ( $connection, $sid, $user_id );

    // Adding new startup
    $query_to_add_new_team_member = mysqli_query (
      $connection,
      " INSERT INTO startup_team_member_details ( 
        startup_team_member_id, 
        startup_team_member_user_id, 
        startup_team_member_startup_id
      ) VALUES ( 
        '$team_member_id',
        '$user_id',
        '$sid' 
      ) "
    );

    // Added new team member
    if ( $query_to_add_new_team_member ) {
      return true;
    }

    // Something went wrong
    return false;
  }



  /**
   * Adds user to a startup team member.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $user_id
   * @return Boolean
   */
  function add_investor (
    $connection,
    $sid,
    $user_id
  ) {

    // Generating secure investor ID
    $utility = new utility;
    $investor_id = $utility->generate_secure_string ( "investor_", 10 );

    // Adding new startup
    $query_to_add_new_investor = mysqli_query (
      $connection,
      " INSERT INTO startup_investor_details ( 
        startup_investor_id, 
        startup_investor_user_id, 
        startup_investor_startup_id
      ) VALUES ( 
        '$investor_id',
        '$user_id',
        '$sid' 
      ) "
    );

    // Added new investor
    if ( $query_to_add_new_investor ) {
      return true;
    }

    // Something went wrong
    return false;
  }



  /**
   * Adds new IC Request.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $ic_id
   * @return Boolean
   */
  function add_new_ic_request (
    $connection,
    $sid,
    $ic_id
  ) {

    // Generating secure startup IC request id
    $utility = new utility;
    $ic_request_id = $utility->generate_secure_string ( "ic_request_", 10 );

    // Adding new IC request
    $query_to_add_new_ic_request = mysqli_query (
      $connection,
      " INSERT INTO startup_incubation_center_requests ( 
        startup_incubation_center_request_id, 
        startup_incubation_center_request_by_startup_id, 
        startup_incubation_center_request_to_ic_id 
      ) VALUES ( 
        '$ic_request_id',
        '$sid',
        '$ic_id'
      ) "
    );

    // Added
    if ( $query_to_add_new_ic_request ) {
      return true;
    }

    // Something went wrong
    return false;
  }



  /**
   * Adds new Team Member Request.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $uid
   * @return Boolean
   */
  function add_new_team_member_request (
    $connection,
    $sid,
    $uid
  ) {

    // Generating secure startup IC request id
    $utility = new utility;
    $team_member_request_id = $utility->generate_secure_string ( "tm_request_", 10 );

    // Adding new IC request
    $query_to_add_new_team_member_request = mysqli_query (
      $connection,
      " INSERT INTO startup_team_member_requests ( 
        team_member_request_id, 
        team_member_request_for_user_id, 
        team_member_request_by_startup_id 
      ) VALUES ( 
        '$team_member_request_id',
        '$uid',
        '$sid'
      ) "
    );

    // Added
    if ( $query_to_add_new_team_member_request ) {
      return true;
    }

    // Something went wrong
    return false;
  }



  /**
   * Adds new Investor Request.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $uid
   * @return Boolean
   */
  function add_new_investor_request (
    $connection,
    $sid,
    $uid
  ) {

    // Generating secure startup IC request id
    $utility = new utility;
    $investor_request_id = $utility->generate_secure_string ( "in_request_", 10 );

    // Adding new investor request
    $query_to_add_new_investor_request = mysqli_query (
      $connection,
      " INSERT INTO startup_investor_requests ( 
        startup_investor_request_id, 
        startup_investor_request_for_user_id, 
        startup_investor_request_by_startup_id 
      ) VALUES ( 
        '$investor_request_id',
        '$uid',
        '$sid'
      ) "
    );

    // Added
    if ( $query_to_add_new_investor_request ) {
      return true;
    }

    // Something went wrong
    return false;
  }



  /**
   * Checks whether user has already been requested to join team.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $uid
   * @return Boolean
   */
  function check_if_user_is_requested_to_join_team (
    $connection,
    $sid,
    $uid
  ) {

    // Checking is user has already been requested to join team
    $query_to_check_if_user_is_requested_to_join_team = mysqli_query (
      $connection,
      " SELECT 
        slno 
      FROM 
        startup_team_member_requests
      WHERE 
        team_member_request_for_user_id = '$uid'
      AND
        team_member_request_by_startup_id = '$sid'
      LIMIT
        1 "
    );

    // Found record
    if ( mysqli_num_rows($query_to_check_if_user_is_requested_to_join_team) == 1 )
      return true;

    // Could not find count for some reason
    return 0;
  }



  /**
   * Checks whether investor has already been requested to join team.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $uid
   * @return Boolean
   */
  function check_if_investor_is_requested_to_join_team (
    $connection,
    $sid,
    $uid
  ) {

    // Checking is user has already been requested to join team
    $query_to_check_if_investor_is_requested_to_join_team = mysqli_query (
      $connection,
      " SELECT 
        slno 
      FROM 
        startup_investor_requests
      WHERE 
        startup_investor_request_for_user_id = '$uid'
      AND
        startup_investor_request_by_startup_id = '$sid'
      LIMIT
        1 "
    );

    // Found record
    if ( mysqli_num_rows($query_to_check_if_investor_is_requested_to_join_team) == 1 )
      return true;

    // Could not find count for some reason
    return 0;
  }



  /**
   * Counts total number of startups open for hiring.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @return Integer
   */
  function count_total_open_for_hiring (
    $connection
  ) {

    // Counting number of startups open for hiring
    $query_to_count_number_of_startups_for_hiring = mysqli_query (
      $connection,
      " SELECT 
        slno 
      FROM 
        startups_info
      WHERE 
        startup_is_hiring = 1 "
    );

    // Found number of startups hiring
    if ( $query_to_count_number_of_startups_for_hiring )
      return mysqli_num_rows($query_to_count_number_of_startups_for_hiring);

    // Could not find count for some reason
    return 0;
  }



  /**
   * Counts total number of visits for startup profile.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @return Integer
   */
  function count_total_number_of_profile_visits (
    $connection,
    $sid
  ) {

    // Query to count number of profile visits
    $query_to_count_total_profile_visits = mysqli_query ( 
      $connection,
      " SELECT 
        slno 
      FROM 
        startup_data_collection 
      WHERE 
        data_startup_id = '$sid' "
    );

    // Query ran properly
    if ( $query_to_count_total_profile_visits ) {
      return mysqli_num_rows ( $query_to_count_total_profile_visits );
    }

    // Something went wrong
    return NULL;
  }



  /**
   * Counts total number of job applications received by a startup.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @return Integer
   */
  function count_number_of_job_applications_received (
    $connection,
    $sid
  ) {

    // Query to count number of job applications received
    $query_to_count_total_job_applications_received = mysqli_query ( 
      $connection,
      " SELECT 
        slno 
      FROM 
        jobs_applied 
      WHERE 
        job_applied_startup_id = '$sid' "
    );

    // Query ran properly
    if ( $query_to_count_total_job_applications_received ) {
      return mysqli_num_rows ( $query_to_count_total_job_applications_received );
    }

    // Something went wrong
    return NULL;
  }



  /**
   * Delete's Startup Data.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $profile_picture_source
   * @return Boolean
   */
  function delete (
    $connection,
    $sid
  ) {

    // Deleting startup info. record
    $query_to_delete_startup = mysqli_query (
      $connection,
      " DELETE FROM 
        startups_info 
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Deleted startup info. record
    if ( $query_to_delete_startup ) {
    
      // Deleting startup
      $query_to_delete_startup = mysqli_query (
        $connection,
        " DELETE FROM 
          startups 
        WHERE 
          startup_id = '$sid' 
        LIMIT 
          1 "
      );

      // Deleted startup
      if ( $query_to_delete_startup )
        return true;
    }

    // Could not delete for some reason
    return false;
  }



  /**
   * Deletes all incubation center requests.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @return Boolean
   */
  function delete_all_ic_requests (
    $connection,
    $sid
  ) {

    // Removing all IC requests
    $query_to_remove_all_ic_requests = mysqli_query (
      $connection,
      " DELETE FROM 
        startup_incubation_center_requests 
      WHERE 
        startup_incubation_center_request_by_startup_id = '$sid' "
    ) or die (mysqli_error($connection));

    // Deleted all requests
    if ( $query_to_remove_all_ic_requests ) {
      return true;
    }

    // Could not delete
    return false;
  }



  /**
   * Deletes a particular job applicant request of user.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $applicant_id
   * @return Boolean
   */
  function delete_job_application_of (
    $connection,
    $sid,
    $applicant_id
  ) {

    // Deleting user job application
    $query_to_delete_job_application_of_user = mysqli_query (
      $connection,
      " DELETE FROM 
        jobs_applied 
      WHERE 
        job_applier_user_id = '$applicant_id' 
      AND 
        job_applied_startup_id = '$sid' "
    );

    // Query ran properly
    if ( $query_to_delete_job_application_of_user ) {
      return true;
    }

    // Something went wrong
    return false;
  }



  /**
   * Deletes a particular team member joining request created by startup
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $team_member_request_id
   * @return Boolean
   */
  function delete_team_member_joining_request (
    $connection,
    $sid,
    $team_member_request_id
  ) {

    // Deleting team member joining request
    $query_to_delete_team_member_joining_request = mysqli_query (
      $connection,
      " DELETE FROM 
        startup_team_member_requests
      WHERE 
        team_member_request_id = '$team_member_request_id' 
      AND 
        team_member_request_by_startup_id = '$sid' "
    );

    // Query ran properly
    if ( $query_to_delete_team_member_joining_request ) {
      return true;
    }

    // Something went wrong
    return false;
  }



  /**
   * Deletes a particular investor joining request created by startup
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $investor_request_id
   * @return Boolean
   */
  function delete_investor_joining_request (
    $connection,
    $sid,
    $investor_request_id
  ) {

    // Deleting team member joining request
    $query_to_delete_investor_joining_request = mysqli_query (
      $connection,
      " DELETE FROM 
        startup_investor_requests
      WHERE 
        startup_investor_request_id = '$investor_request_id' 
      AND 
        startup_investor_request_by_startup_id = '$sid' "
    );

    // Query ran properly
    if ( $query_to_delete_investor_joining_request ) {
      return true;
    }

    // Something went wrong
    return false;
  }



  /**
   * Deletes a particular incubation center joining request created by startup
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $ic_request_id
   * @return Boolean
   */
  function delete_ic_joining_request (
    $connection,
    $sid,
    $ic_request_id
  ) {

    // Deleting IC joining request
    $query_to_delete_ic_joining_request = mysqli_query (
      $connection,
      " DELETE FROM 
        startup_incubation_center_requests
      WHERE 
        startup_incubation_center_request_id = '$ic_request_id' 
      AND 
        startup_incubation_center_request_by_startup_id = '$sid' "
    );

    // Query ran properly
    if ( $query_to_delete_ic_joining_request ) {
      return true;
    }

    // Something went wrong
    return false;
  }



  /**
   * Gets startup owner ID.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @return Boolean
   */
  function get_owner_id (
    $connection,
    $sid
  ) {

    // Getting owner ID
    $query_to_get_startup_owner_id = mysqli_query (
      $connection,
      " SELECT
        startup_user_id 
      FROM
        startups
      WHERE 
        startup_id = '$sid'
      LIMIT 
        1 "
    );

    // Got owner id
    if ( $query_to_get_startup_owner_id ) {
      return mysqli_fetch_assoc ( $query_to_get_startup_owner_id )['startup_user_id'];
    }

    // Could not delete
    return NULL;
  }



  /**
   * Get's Startup Name.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $startup_id
   * @return String
   */
  function get_name (
    $connection,
    $startup_id
  ) {

    // Getting startup name
    $query_to_get_startup_name = mysqli_query (
      $connection,
      " SELECT 
        startup_name 
      FROM 
        startups 
      WHERE 
        startup_id = '$startup_id' 
      LIMIT 
        1 "
    );

    if ( mysqli_num_rows($query_to_get_startup_name) > 0 )
      return mysqli_fetch_array ( $query_to_get_startup_name )['startup_name'];

    return NULL;
  }



  /**
   * Get's Startups Profile Picture ID.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $startup_id
   * @return String
   */
  function get_profile_pic_id (
    $connection,
    $startup_id
  ) {
    
    // Getting startup profile picutre ID
    $query_to_get_startup_profile_pic_id = mysqli_query (
      $connection,
      " SELECT 
        startup_logo_id 
      FROM 
        startups 
      WHERE 
        startup_id = '$startup_id' 
      LIMIT 
        1 "
    );

    // Returning profile picture id
    if ( $query_to_get_startup_profile_pic_id )
      return mysqli_fetch_array ( $query_to_get_startup_profile_pic_id )['startup_logo_id'];

    // Could not fetch startup profile picture ID for some reason
    return NULL;
  }



  /**
   * Get's Startup Vision
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $startup_id
   * @return String
   */
  function get_vision (
    $connection,
    $startup_id
  ) {

    // Getting startup vision
    $query_to_get_startup_vision = mysqli_query ( 
      $connection,
      " SELECT 
        startup_vision 
      FROM 
        startups_info 
      WHERE 
        startup_id = '$startup_id' 
      LIMIT 
        1 "
    );

    // Found startup vision
    if ( mysqli_num_rows($query_to_get_startup_vision) )
      return mysqli_fetch_array ( $query_to_get_startup_vision )['startup_vision'];

    return NULL;
  }



  /**
   * Get's Startup Description
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $startup_id
   * @return String
   */
  function get_description (
    $connection,
    $startup_id
  ) {

    // Getting startup description
    $query_to_get_startup_description = mysqli_query ( 
      $connection,
      " SELECT 
        startup_description
      FROM 
        startups_info 
      WHERE 
        startup_id = '$startup_id' 
      LIMIT 
        1 "
    );

    // Found startup vision
    if ( mysqli_num_rows($query_to_get_startup_description) )
      return mysqli_fetch_array ( $query_to_get_startup_description )['startup_description'];

    // Startup Vision
    return NULL;
  }



  /**
   * Get's Startup Story
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $startup_id
   * @return String
   */
  function get_story (
    $connection,
    $startup_id
  ) {

    // Getting startup story
    $query_to_get_startup_story = mysqli_query ( 
      $connection,
      " SELECT 
        startup_complete_story
      FROM 
        startups_info 
      WHERE 
        startup_id = '$startup_id' 
      LIMIT 
        1 "
    );

    // Found startup story
    if ( mysqli_num_rows($query_to_get_startup_story) )
      return mysqli_fetch_array ( $query_to_get_startup_story )['startup_complete_story'];

    // Could not find
    return NULL;
  }



  /**
   * Get's Startup Category
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $startup_id
   * @return String
   */
  function get_category (
    $connection,
    $startup_id
  ) {

    // Getting startup category
    $query_to_get_startup_category = mysqli_query ( 
      $connection,
      " SELECT 
        startup_category_id
      FROM 
        startups_info 
      WHERE 
        startup_id = '$startup_id' 
      LIMIT 
        1 "
    );

    // Found startup category
    if ( mysqli_num_rows($query_to_get_startup_category) ) {

      $startup_category_id = mysqli_fetch_array ( $query_to_get_startup_category )['startup_category_id'];

      // Identifying which category it is and returning appropriate text
      switch ( $startup_category_id ) {
        case 'technology':
          return "Technology";
          break;

        case 'food':
          return "Food";
          break;

        case 'education':
          return "Education";
          break;

        case 'entertainment':
          return "Entertainment";
          break;
        
        default:
          return "Not Avaiable";
          break;
      }
    }

    // Could not find
    return NULL;
  }



  /**
   * Get's Startup Class
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $startup_id
   * @return String
   */
  function get_class (
    $connection,
    $startup_id
  ) {

    // Getting startup class
    $query_to_get_startup_class = mysqli_query ( 
      $connection,
      " SELECT 
        startup_class_id
      FROM 
        startups_info 
      WHERE 
        startup_id = '$startup_id' 
      LIMIT 
        1 "
    );

    // Found startup category
    if ( mysqli_num_rows($query_to_get_startup_class) ) {

      // Startup Class ID
      $startup_class_id = mysqli_fetch_array ( $query_to_get_startup_class )['startup_class_id'];

      // Identifying which class it is and returning appropriate text
      switch ( $startup_class_id ) {
        case 'private_limited':
          return "Private Limited";
          break;

        case 'partnership':
          return "Partnership";
          break;

        case 'proprietary':
          return "Proprietary";
          break;
        
        default:
          return "Not Avaiable";
          break;
      }
    }

    // Could not find
    return NULL;
  }



  /**
   * Get's Startup Date of Birth 
   * i.e. Date of Registration only but in formatted way.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $startup_id
   * @return String
   */
  function get_date_of_birth (
    $connection,
    $startup_id
  ) {

    // Getting startup dob
    $query_to_get_startup_dob = mysqli_query ( 
      $connection,
      " SELECT 
        startup_date_of_registration
      FROM 
        startups_info 
      WHERE 
        startup_id = '$startup_id' 
      LIMIT 
        1 "
    );

    // Found startup category
    if ( mysqli_num_rows($query_to_get_startup_dob) ) {

      // Startup DOB
      $startup_dob = mysqli_fetch_array ( $query_to_get_startup_dob )['startup_date_of_registration'];
      $startup_dob = explode ( "-", $startup_dob );

      // Formatting DOB in, DD MONTH_TEXT, YYYY (12 May, 2017)
      return $startup_dob[0] . " " . date ( "F", mktime(0, 0, 0, $startup_dob[1], 10) ) . ", " . $startup_dob[2];
    }

    // Could not find
    return NULL;
  }



  /**
   * Get's Startup Link
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $startup_id
   * @return String
   */
  function get_link (
    $connection,
    $startup_id
  ) {

    // Getting startup link
    $query_to_get_startup_link = mysqli_query ( 
      $connection,
      " SELECT 
        startup_official_link
      FROM 
        startups_info 
      WHERE 
        startup_id = '$startup_id' 
      LIMIT 
        1 "
    );

    // Found startup story
    if ( mysqli_num_rows($query_to_get_startup_link) )
      return mysqli_fetch_array ( $query_to_get_startup_link )['startup_official_link'];

    // Could not find
    return NULL;
  }



  /**
   * Get's Startup Pincode
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $startup_id
   * @return String
   */
  function get_pincode (
    $connection,
    $startup_id
  ) {

    // Getting startup pincode
    $query_to_get_startup_pincode = mysqli_query ( 
      $connection,
      " SELECT 
        startup_pincode
      FROM 
        startups_info 
      WHERE 
        startup_id = '$startup_id' 
      LIMIT 
        1 "
    );

    // Found startup pincode
    if ( mysqli_num_rows($query_to_get_startup_pincode) )
      return mysqli_fetch_array ( $query_to_get_startup_pincode )['startup_pincode'];

    // Could not find
    return NULL;
  }



  /**
   * Get's Startup Address
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $startup_id
   * @return String
   */
  function get_address (
    $connection,
    $startup_id
  ) {

    // Getting startup address
    $query_to_get_startup_address = mysqli_query ( 
      $connection,
      " SELECT 
        startup_address
      FROM 
        startups_info 
      WHERE 
        startup_id = '$startup_id' 
      LIMIT 
        1 "
    );

    // Found startup address
    if ( mysqli_num_rows($query_to_get_startup_address) )
      return mysqli_fetch_array ( $query_to_get_startup_address )['startup_address'];

    // Could not find
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
    $sid
  ) {

    // Query to get Startup State ID
    $query_to_get_state_id = mysqli_query (
      $connection,
      " SELECT 
        startup_state_id 
      FROM 
        startups_info
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_state_id )
      return mysqli_fetch_assoc ( $query_to_get_state_id )['startup_state_id'];

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
   * @param String $sid
   * @return String
   */
  function get_state (
    $connection,
    $sid
  ) {

    // Gettting state id
    $state_id = $this->get_state_id ( $connection, $sid );

    // Query to get Startup Name
    $query_to_get_sid_state_name = mysqli_query (
      $connection,
      " SELECT 
        state_text 
      FROM 
        states
      WHERE 
        state_id = '$state_id' 
      LIMIT 
        1 "
    );

    // Found IC State Record
    if ( $query_to_get_sid_state_name )
      return mysqli_fetch_assoc ( $query_to_get_sid_state_name )['state_text'];

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
   * @param String $sid
   * @return String
   */
  function get_city_id (
    $connection,
    $sid
  ) {

    // Query to get Startup City ID
    $query_to_get_city_id = mysqli_query (
      $connection,
      " SELECT 
        startup_city_id 
      FROM 
        startups_info
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_city_id )
      return mysqli_fetch_assoc ( $query_to_get_city_id )['startup_city_id'];

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
   * @param String $sid
   * @return String
   */
  function get_city (
    $connection,
    $sid
  ) {

    // Getting city id
    $city_id = $this->get_city_id ( $connection, $sid );

    // Query to get IC City
    $query_to_get_city_name = mysqli_query (
      $connection,
      " SELECT 
        city_text 
      FROM 
        cities
      WHERE 
        city_id = '$city_id' 
      LIMIT 
        1 "
    );

    // Found Startup City Record
    if ( $query_to_get_city_name )
      return mysqli_fetch_assoc ( $query_to_get_city_name )['city_text'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Get's Startup Contact Number
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $startup_id
   * @return String
   */
  function get_contact_number (
    $connection,
    $startup_id
  ) {

    // Getting startup contact number
    $query_to_get_startup_contact_number = mysqli_query ( 
      $connection,
      " SELECT 
        startup_contact_number
      FROM 
        startups_info 
      WHERE 
        startup_id = '$startup_id' 
      LIMIT 
        1 "
    );

    // Found startup contact number
    if ( mysqli_num_rows($query_to_get_startup_contact_number) )
      return mysqli_fetch_array ( $query_to_get_startup_contact_number )['startup_contact_number'];

    // Could not find
    return NULL;
  }



  /**
   * Get's Startup's IC Email ID
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $startup_id
   * @return String
   */
  function get_ic_email (
    $connection,
    $startup_id
  ) {

    // Getting startup IC email ID
    $query_to_get_startup_ic_email = mysqli_query ( 
      $connection,
      " SELECT 
        startup_incubation_center_id
      FROM 
        startups_info 
      WHERE 
        startup_id = '$startup_id' 
      LIMIT 
        1 "
    );

    // Found startup IC Email ID
    if ( mysqli_num_rows($query_to_get_startup_ic_email) )
      $incubation = new incubation;
      return $incubation->get_email ( $connection, mysqli_fetch_array ( $query_to_get_startup_ic_email )['startup_incubation_center_id'] );

    // Could not find
    return NULL;
  }



  /**
   * Get's Startup's Hiring Status
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $startup_id
   * @return String
   */
  function get_hiring (
    $connection,
    $startup_id
  ) {

    // Getting startup IC email ID
    $query_to_get_startup_hiring_status = mysqli_query ( 
      $connection,
      " SELECT 
        startup_is_hiring
      FROM 
        startups_info 
      WHERE 
        startup_id = '$startup_id' 
      LIMIT 
        1 "
    );

    // Found startup IC Email ID
    if ( mysqli_num_rows($query_to_get_startup_hiring_status) )
      return mysqli_fetch_array ( $query_to_get_startup_hiring_status )['startup_is_hiring'];

    // Could not find
    return NULL;
  }



  /**
   * Get's Startup's CIN or PAN
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $startup_id
   * @return String
   */
  function get_cin_or_pan (
    $connection,
    $startup_id
  ) {

    // Getting startup CIN or PAN
    $query_to_get_startup_cin_or_pan = mysqli_query ( 
      $connection,
      " SELECT 
        startup_cin_or_pan_id
      FROM 
        startups_info 
      WHERE 
        startup_id = '$startup_id' 
      LIMIT 
        1 "
    );

    // Found startup IC CIN or PAN
    if ( mysqli_num_rows($query_to_get_startup_cin_or_pan) )
      return mysqli_fetch_array ( $query_to_get_startup_cin_or_pan )['startup_cin_or_pan_id'];

    // Could not find
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
    $sid
  ) {

    // Query to get IC LinkedIn
    $query_to_get_startup_linkedin = mysqli_query (
      $connection,
      " SELECT 
        startup_linkedin_id 
      FROM 
        startups_info
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_startup_linkedin )
      return mysqli_fetch_assoc ( $query_to_get_startup_linkedin )['startup_linkedin_id'];

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
   * @param String $sid
   * @return String
   */
  function get_twitter (
    $connection,
    $sid
  ) {

    // Query to get IC Twitter
    $query_to_get_startup_twitter = mysqli_query (
      $connection,
      " SELECT 
        startup_twitter_id 
      FROM 
        startups_info
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_startup_twitter )
      return mysqli_fetch_assoc ( $query_to_get_startup_twitter )['startup_twitter_id'];

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
   * @param String $sid
   * @return String
   */
  function get_facebook (
    $connection,
    $sid
  ) {

    // Query to get IC Facebook
    $query_to_get_startup_facebook = mysqli_query (
      $connection,
      " SELECT 
        startup_facebook_id 
      FROM 
        startups_info
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_startup_facebook )
      return mysqli_fetch_assoc ( $query_to_get_startup_facebook )['startup_facebook_id'];

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
   * @param String $sid
   * @return String
   */
  function get_instagram (
    $connection,
    $sid
  ) {

    // Query to get IC Instagram
    $query_to_get_startup_instagram = mysqli_query (
      $connection,
      " SELECT 
        startup_instagram_id 
      FROM 
        startups_info
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Found IC Record
    if ( $query_to_get_startup_instagram )
      return mysqli_fetch_assoc ( $query_to_get_startup_instagram )['startup_instagram_id'];

    // Could not find, for some reason
    return NULL;
  }



  /**
   * Updates Startup Name
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $name
   * @return Boolean
   */
  function update_name (
    $connection,
    $sid,
    $name
  ) {

    // Updating Name
    $query_to_update_startup_name = mysqli_query ( 
      $connection,
      " UPDATE 
        startups 
      SET 
        startup_name = '$name' 
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_startup_name ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates Startup Vision
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $vision
   * @return Boolean
   */
  function update_vision (
    $connection,
    $sid,
    $vision
  ) {

    // Updating Vision
    $query_to_update_startup_vision = mysqli_query ( 
      $connection,
      " UPDATE 
        startups_info 
      SET 
        startup_vision = '$vision' 
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_startup_vision ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates Startup Description
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $description
   * @return Boolean
   */
  function update_description (
    $connection,
    $sid,
    $description
  ) {

    // Updating Description
    $query_to_update_startup_description = mysqli_query ( 
      $connection,
      " UPDATE 
        startups_info 
      SET 
        startup_description = '$description' 
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_startup_description ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates Startup Story
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $story
   * @return Boolean
   */
  function update_story (
    $connection,
    $sid,
    $story
  ) {

    // Updating Story
    $query_to_update_startup_story = mysqli_query ( 
      $connection,
      " UPDATE 
        startups_info 
      SET 
        startup_complete_story = '$story' 
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_startup_story ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates Startup Link
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $link
   * @return Boolean
   */
  function update_link (
    $connection,
    $sid,
    $link
  ) {

    // Updating Link
    $query_to_update_startup_link = mysqli_query ( 
      $connection,
      " UPDATE 
        startups_info 
      SET 
        startup_official_link = '$link' 
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_startup_link ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates Startup Category
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $category
   * @return Boolean
   */
  function update_category (
    $connection,
    $sid,
    $category
  ) {

    // Updating Category
    $query_to_update_startup_category = mysqli_query ( 
      $connection,
      " UPDATE 
        startups_info 
      SET 
        startup_category_id = '$category' 
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_startup_category ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates Profile Picture ID
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $profile_picture_id
   * @return Boolean
   */
  function update_profile_picture_id (
    $connection,
    $sid,
    $profile_picture_id
  ) {

    // Updating Profile Picture ID
    $query_to_update_startup_profile_picture_id = mysqli_query ( 
      $connection,
      " UPDATE 
        startups
      SET 
        startup_logo_id = '$profile_picture_id' 
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_startup_profile_picture_id ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates State
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $state
   * @return Boolean
   */
  function update_state (
    $connection,
    $sid,
    $state
  ) {

    // Updating State
    $query_to_update_startup_state = mysqli_query ( 
      $connection,
      " UPDATE 
        startups_info
      SET 
        startup_state_id = '$state' 
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_startup_state ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates City
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $city
   * @return Boolean
   */
  function update_city (
    $connection,
    $sid,
    $city
  ) {

    // Updating City
    $query_to_update_startup_city = mysqli_query ( 
      $connection,
      " UPDATE 
        startups_info
      SET 
        startup_city_id = '$city' 
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_startup_city ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates Pincode
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $pincode
   * @return Boolean
   */
  function update_pincode (
    $connection,
    $sid,
    $pincode
  ) {

    // Updating Pincode
    $query_to_update_startup_pincode = mysqli_query ( 
      $connection,
      " UPDATE 
        startups_info
      SET 
        startup_pincode = '$pincode' 
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_startup_pincode ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates Address
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $address
   * @return Boolean
   */
  function update_address (
    $connection,
    $sid,
    $address
  ) {

    // Updating Address
    $query_to_update_startup_address = mysqli_query ( 
      $connection,
      " UPDATE 
        startups_info
      SET 
        startup_address = '$address' 
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_startup_address ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates Contact Number
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $contact_number
   * @return Boolean
   */
  function update_contact_number (
    $connection,
    $sid,
    $number
  ) {

    // Updating Contact Number
    $query_to_update_startup_contact_number = mysqli_query ( 
      $connection,
      " UPDATE 
        startups_info
      SET 
        startup_contact_number = '$number' 
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_startup_contact_number ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates Startup's IC's ID.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $ic_email
   * @return Boolean
   */
  function update_ic_id (
    $connection,
    $sid,
    $ic_id
  ) {

    // IC ID is NULL
    if ( $ic_id === NULL ) {

      // Updating IC ID
      $query_to_update_startup_ic_id = mysqli_query ( 
        $connection,
        " UPDATE 
          startups_info
        SET 
          startup_incubation_center_id = NULL 
        WHERE 
          startup_id = '$sid' 
        LIMIT 
          1 "
      ) or die (mysqli_error($connection));
    }
    else {

      // Updating IC ID
      $query_to_update_startup_ic_id = mysqli_query ( 
        $connection,
        " UPDATE 
          startups_info
        SET 
          startup_incubation_center_id = '$ic_id' 
        WHERE 
          startup_id = '$sid' 
        LIMIT 
          1 "
      ) or die (mysqli_error($connection));
    }

    // Updated
    if ( $query_to_update_startup_ic_id ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates Startup's IC's ID.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $hiring
   * @return Boolean
   */
  function update_hiring (
    $connection,
    $sid,
    $hiring
  ) {

    // Updating Startup Hiring Status
    $query_to_update_startup_hiring = mysqli_query ( 
      $connection,
      " UPDATE 
        startups_info
      SET 
        startup_is_hiring = $hiring
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_startup_hiring ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates Startup's Class.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $class
   * @return Boolean
   */
  function update_class (
    $connection,
    $sid,
    $class
  ) {

    // Updating Startup Class
    $query_to_update_startup_class = mysqli_query ( 
      $connection,
      " UPDATE 
        startups_info
      SET 
        startup_class_id = '$class'
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_startup_class ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates Startup's CIN.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $cin
   * @return Boolean
   */
  function update_cin (
    $connection,
    $sid,
    $cin
  ) {

    // Updating Startup CIN
    $query_to_update_startup_cin = mysqli_query ( 
      $connection,
      " UPDATE 
        startups_info
      SET 
        startup_cin_or_pan_id = '$cin'
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_startup_cin ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates Startup's Date of Registration.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $dor
   * @return Boolean
   */
  function update_date_of_registration (
    $connection,
    $sid,
    $dor
  ) {

    // Updating Startup DOR
    $query_to_update_startup_dor = mysqli_query ( 
      $connection,
      " UPDATE 
        startups_info
      SET 
        startup_date_of_registration = '$dor'
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_startup_dor ) {
      return true;
    }

    // Could not update
    return false;
  }



  /**
   * Updates LinkedIn.
   *
   *
   * @package SET
   *
   * @param String $connection
   * @param String $sid
   * @param String $linkedin
   * @return Boolean
   */
  function update_linkedin (
    $connection,
    $sid,
    $linkedin
  ) {

    // Updating linkedin
    $query_to_update_linkedin = mysqli_query (
      $connection,
      " UPDATE 
        startups_info 
      SET 
        startup_linkedin_id = '$linkedin' 
      WHERE 
        startup_id = '$sid' 
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
   * @param String $sid
   * @param String $twitter
   * @return Boolean
   */
  function update_twitter (
    $connection,
    $sid,
    $twitter
  ) {

    // Updating linkedin
    $query_to_update_twitter = mysqli_query (
      $connection,
      " UPDATE 
        startups_info 
      SET 
        startup_twitter_id = '$twitter' 
      WHERE 
        startup_id = '$sid' 
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
   * @param String $sid
   * @param String $facebook
   * @return Boolean
   */
  function update_facebook (
    $connection,
    $sid,
    $facebook
  ) {

    // Updating facebook
    $query_to_update_facebook = mysqli_query (
      $connection,
      " UPDATE 
        startups_info 
      SET 
        startup_facebook_id = '$facebook' 
      WHERE 
        startup_id = '$sid' 
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
   * @param String $sid
   * @param String $instagram
   * @return Boolean
   */
  function update_instagram (
    $connection,
    $sid,
    $instagram
  ) {

    // Updating instagram
    $query_to_update_instagram = mysqli_query (
      $connection,
      " UPDATE 
        startups_info 
      SET 
        startup_instagram_id = '$instagram' 
      WHERE 
        startup_id = '$sid' 
      LIMIT 
        1 "
    );

    // Updated
    if ( $query_to_update_instagram )
      return true;

    // Could not update for some reason
    return false;
  }
}