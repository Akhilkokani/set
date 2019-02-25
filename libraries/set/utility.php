<?php
/** 
 * utility
 * 
 * Consists helping hand functions such as getting date, time,
 * validating user data, generating random data and much more.
 * 
 * @author Akhil Kokani
 * @package SET
 */
class utility {



  /**
   * Gets current date and time.
   * 
   *
   *
   * @package SET
   * @return string
   */
  public function date_and_time (  ) {
    return date ( "y-m-d H:i:s" );
  }



  /**
   * Gets current date.
   * 
   *
   *
   * @package SET
   * @return string
   */
  public function date (  ) {
    return date ( "y-m-d" );
  }



  /**
   * Gets month name from y-m-d format date.
   * 
   *
   *
   * @package SET
   * 
   * @param Date $date
   * @return string
   */
  public function get_month_name_from_date ( $date ) {
    return date (
      'F', 
      strtotime ( (string) $date )
    );
  }



  /**
   * Gets year from y-m-d format date.
   * 
   *
   *
   * @package SET
   * 
   * @param Date $date
   * @return string
   */
  public function get_year_from_date ( $date ) {
    return explode ( "-", $date )[0];
  }



  /**
   * Generates Secure Random Number.
   *
   *
   * @package SET
   *
   * @param string $prefix
   * @param int    $length
   * @return string
   */
  function generate_secure_string ( $prefix = "id_", $length = 25 ) {
    return $prefix . bin2hex ( random_bytes($length) );
  }

  /**
   * Gets Client IP Address
   *
   *
   * @package SET
   *
   * @return String
   */
  function get_client_ip () {
    return file_get_contents ( 'https://api.ipify.org' );
  }



  /**
   * Collect Startup Profile Visit Data
   *
   *
   * @package SET
   * 
   * @param String $connection
   * @param String $startup_id
   */
  function collect_startup_visit_data ( 
    $connection,
    $startup_id
  ) {

    // User's IP Address
    // URL to fetch user info.
    $user_ip_address = file_get_contents('https://api.ipify.org') . "";
    $url = "http://api.ipstack.com/". $user_ip_address ."?access_key=2258c040a4b8d56f4758bfb08daee2de&format=1";
    
    // Fetching user data
    $curl = curl_init();
    curl_setopt ( $curl, CURLOPT_URL, $url );
    curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt ( $curl, CURLOPT_PROXYPORT, 3128 );
    curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, 0 );
    curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
    $response = curl_exec ( $curl );
    curl_close ( $curl );
    $response = json_decode ( $response )->city;

    // Unique Data ID
    $data_id = $this->generate_secure_string ( "data_", 10 );

    // Current date and time
    $data_date = $this->date();

    // Inserting data
    $query_to_add_data = mysqli_query ( 
      $connection,
      " INSERT INTO 
      startup_data_collection (
        data_id, 
        data_ip_address, 
        data_startup_id, 
        data_city, 
        data_collected_date
      ) VALUES (
        '$data_id',
        '$user_ip_address',
        '$startup_id',
        '$response',
        '$data_date'
      ) "
    );

    // Added data record
    if ( $query_to_add_data )
      return true;

    // Could not insert for some reason
    return false;
  }
}