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
}