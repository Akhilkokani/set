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
   
}