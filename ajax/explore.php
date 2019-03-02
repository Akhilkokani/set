<?php
/**
 * AJAX RESPONSE FILE.
 * Used to recevive AJAX requests, process them, and respond with appropriate result code(s) 
 * for explore page only.
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

// Initialising with default values
$total_startups = 256;
$total_ics = 176;
$total_jobs_created = 187;

// Market share
$food_market_share = 30;
$tech_market_share = 12;
$entertainment_market_share = 50;
$education_market_share = 6;
$other_market_share = 2;

// Jobs Created
$jobs_created_in_karnataka = 40;
$jobs_created_in_gujarat = 20;
$jobs_created_in_maharashtra = 30;
$jobs_created_in_uttar_pradesh = 7;
$jobs_created_in_other = 2;

// Incubation Centers
$ics_in_uttar_pradesh = 98;
$ics_in_gujarat = 20;
$ics_in_maharashtra = 43;
$ics_in_goa = 7;
$ics_in_karnataka = 18;

/** 
 * Creating and random data and setting/updating cookie values.
 * 
 */
if ( 
  isset($_POST['action']) &&
  $_POST['action'] == "initiate-data"
) {

  // To store random quantifing values
  $data = array();

  // Random value for states
  $total_startups = rand ( 100, 1000 );
  $total_ics = rand ( 100, 1000 );
  $total_jobs_created = rand ( 100, 1000 );

  // Market share
  $food_market_share = rand ( 1, 30 );
  $tech_market_share = rand ( 1, 12 );
  $entertainment_market_share = rand ( 1, 50 );
  $education_market_share = rand ( 1, 6 );
  $other_market_share = rand ( 1, 2 );

  // Most Job Creating States
  $jobs_created_in_karnataka = rand ( 1, 124 );
  $jobs_created_in_gujarat = rand ( 1, 89 );
  $jobs_created_in_maharashtra = rand ( 1, 456 );
  $jobs_created_in_uttar_pradesh = rand ( 1, 250 );
  $jobs_created_in_other = rand ( 1, 4 );

  // Incubation Centers
  $ics_in_uttar_pradesh = rand ( 1, 98 );
  $ics_in_gujarat = rand ( 1, 20 );
  $ics_in_maharashtra = rand ( 1, 43 );
  $ics_in_goa = rand ( 1, 7 );
  $ics_in_karnataka = rand ( 1, 18 );

  // Storing Data
  $data [ 'startups' ] = $total_startups;
  $data [ 'ics' ] = $total_ics;
  $data [ 'jobs' ] = $total_jobs_created;

  // Storing created data as cookies for futher processing
  setcookie ( "total_startups", $total_startups, time()+60+24*30, "/" );
  setcookie ( "total_ics", $total_startups, time()+60+24*30, "/" );
  setcookie ( "total_jobs", $total_jobs_created, time()+60+24*30, "/" );

  // Market Share
  setcookie ( "food_market_share", $food_market_share, time()+60+24*30, "/" );
  setcookie ( "tech_market_share", $tech_market_share, time()+60+24*30, "/" );
  setcookie ( "entertainment_market_share", $entertainment_market_share, time()+60+24*30, "/" );
  setcookie ( "education_market_share", $education_market_share, time()+60+24*30, "/" );
  setcookie ( "other_market_share", $other_market_share, time()+60+24*30, "/" );

  // Jobs Created
  setcookie ( "jobs_karnataka", $jobs_created_in_karnataka, time()+60+24*30, "/" );
  setcookie ( "jobs_gujarat", $jobs_created_in_gujarat, time()+60+24*30, "/" );
  setcookie ( "jobs_maharashtra", $jobs_created_in_maharashtra, time()+60+24*30, "/" );
  setcookie ( "jobs_uttar_pradesh", $jobs_created_in_uttar_pradesh, time()+60+24*30, "/" );
  setcookie ( "jobs_other", $jobs_created_in_other, time()+60+24*30, "/" );

  // Incubation Centers
  setcookie ( "ics_in_uttar_pradesh", $ics_in_uttar_pradesh, time()+60+24*30, "/" );
  setcookie ( "ics_in_gujarat", $ics_in_gujarat, time()+60+24*30, "/" );
  setcookie ( "ics_in_maharashtra", $ics_in_maharashtra, time()+60+24*30, "/" );
  setcookie ( "ics_in_goa", $ics_in_goa, time()+60+24*30, "/" );
  setcookie ( "ics_in_karnataka", $ics_in_karnataka, time()+60+24*30, "/" );

  // Sending response
  echo json_encode ( $data );
  die();
}



/** 
 * Startup Categories Market Share Graph.
 * 
 */
if ( 
  isset($_POST['action']) &&
  $_POST['action'] == "startup-categories-market-share"
) {

  // To store random quantifing values
  $data = array();

  // Storing Data
  $data[0]['category_name'] = "Food";
  $data[0]['category_share'] = $_COOKIE['food_market_share'];
  $data[1]['category_name'] = "Technology";
  $data[1]['category_share'] = $_COOKIE['tech_market_share'];
  $data[2]['category_name'] = "Entertainment";
  $data[2]['category_share'] = $_COOKIE['entertainment_market_share'];
  $data[3]['category_name'] = "Education";
  $data[3]['category_share'] = $_COOKIE['education_market_share'];
  $data[4]['category_name'] = "Other";
  $data[4]['category_share'] = $_COOKIE['other_market_share'];

  // Sending response
  echo json_encode ( $data );
  die();
}



/** 
 * Most Job Creating Graphs.
 * 
 */
if ( 
  isset($_POST['action']) &&
  $_POST['action'] == "most-job-creating-states"
) {

  // To store random quantifing values
  $data = array();

  // Storing Data
  $data[0]['state_name'] = "Karnataka";
  $data[0]['jobs_created'] = $_COOKIE['jobs_karnataka'];
  $data[1]['state_name'] = "Gujarat";
  $data[1]['jobs_created'] = $_COOKIE['jobs_gujarat'];
  $data[2]['state_name'] = "Maharashtra";
  $data[2]['jobs_created'] = $_COOKIE['jobs_maharashtra'];
  $data[3]['state_name'] = "Uttar Pradesh";
  $data[3]['jobs_created'] = $_COOKIE['jobs_uttar_pradesh'];
  $data[4]['state_name'] = "Other";
  $data[4]['jobs_created'] = $_COOKIE['jobs_other'];

  // Sending response
  echo json_encode ( $data );
  die();
}



/** 
 * Most Incubation Centers Are In.
 * 
 */
if ( 
  isset($_POST['action']) &&
  $_POST['action'] == "most-incubation-centers-are-in"
) {

  // To store random quantifing values
  $data = array();

  // Storing Data
  $data[0]['ic_state_name'] = "Uttar Pradesh";
  $data[0]['ic_quantity'] = $_COOKIE['ics_in_uttar_pradesh'];
  $data[1]['ic_state_name'] = "Gujarat";
  $data[1]['ic_quantity'] = $_COOKIE['ics_in_gujarat'];
  $data[2]['ic_state_name'] = "Maharashtra";
  $data[2]['ic_quantity'] = $_COOKIE['ics_in_maharashtra'];
  $data[3]['ic_state_name'] = "Goa";
  $data[3]['ic_quantity'] = $_COOKIE['ics_in_goa'];
  $data[4]['ic_state_name'] = "Karnataka";
  $data[4]['ic_quantity'] = $_COOKIE['ics_in_karnataka'];

  // Sending response
  echo json_encode ( $data );
  die();
}



/** 
 * Platform Growth.
 * 
 */
if ( 
  isset($_POST['action']) &&
  $_POST['action'] == "platform-growth"
) {

  // To store random quantifing values
  $data = array();

  // Storing Data
  $data[0]['month'] = "September";
  $data[0]['value'] = rand ( 4, 198 );
  $data[1]['month'] = "October";
  $data[1]['value'] = rand ( 4, 40 );
  $data[2]['month'] = "November";
  $data[2]['value'] = rand ( 4, 61 );
  $data[3]['month'] = "December";
  $data[3]['value'] = rand ( 4, 54 );
  $data[4]['month'] = "January";
  $data[4]['value'] = rand ( 4, 74 );
  $data[5]['month'] = "February";
  $data[5]['value'] = rand ( 23, 323 );

  // Sending response
  echo json_encode ( $data );
  die();
}



/** 
 * Get Exploration With Respect to State
 * 
 */
if ( 
  isset ( $_POST['action'] ) &&
  $_POST['action'] == "state-exploration" &&
  isset ( $_POST['scope'] )
) {

  // Getting state name at which data has to be processed
  // Default Distinct Cities
  // Array to hold response code
  $state = str_replace ( " ", "", strtolower($_POST['scope']) );
  $cities = ['City 1', 'City 2', 'City 3', 'City 4', 'Other'];
  $data = array();

  // Identifying the state and updating cities list
  switch ( $state ) {
    case 'karnataka':
      $cities = [ 'Belgaum', 'Bangalore', 'Mysuru', 'Tumkur', 'Other' ];
      break;
  
    case 'uttarpradesh':
      $cities = [ 'Kanpur', 'Lucknow', 'Varanasi', 'Prayagraj', 'Other' ];
      break;

    case 'jammuandkashmir':
      $cities = [ 'Srinagar', 'Leh', 'Gulmarg', 'Pahalgam', 'Other' ];
      break;
  }

  // 0th index is for Quantifying Data Section
  $data[0]['total_startups'] = rand ( 1, $_COOKIE['total_startups'] );
  $data[0]['total_ics'] = rand ( 1, (int) $_COOKIE['total_ics']/2 );
  $data[0]['total_jobs_created'] = rand ( 1, (int) $_COOKIE['total_jobs']/2 );

  // 1st Index is for Startup Categories Market Share (SCMS)
  $data[1][0]['category_name'] = "Food";
  $data[1][0]['category_share'] = $_COOKIE['food_market_share'];
  $data[1][1]['category_name'] = "Technology";
  $data[1][1]['category_share'] = $_COOKIE['tech_market_share'];
  $data[1][2]['category_name'] = "Entertainment";
  $data[1][2]['category_share'] = $_COOKIE['entertainment_market_share'];
  $data[1][3]['category_name'] = "Education";
  $data[1][3]['category_share'] = $_COOKIE['education_market_share'];
  $data[1][4]['category_name'] = "Other";
  $data[1][4]['category_share'] = $_COOKIE['other_market_share'];

  // 2nd Index is used for Most Jobs Creating Cities
  $data[2][0]['state_name'] = $cities[0];
  $data[2][0]['jobs_created'] = $_COOKIE['jobs_karnataka'] / 2;
  $data[2][1]['state_name'] = $cities[1];
  $data[2][1]['jobs_created'] = $_COOKIE['jobs_gujarat'] / 2;
  $data[2][2]['state_name'] = $cities[2];
  $data[2][2]['jobs_created'] = $_COOKIE['jobs_maharashtra'] / 2;
  $data[2][3]['state_name'] = $cities[3];
  $data[2][3]['jobs_created'] = $_COOKIE['jobs_uttar_pradesh'] / 2;
  $data[2][4]['state_name'] = $cities[4];
  $data[2][4]['jobs_created'] = $_COOKIE['jobs_other'] / 2;

  // 3rd Index is used for Most Incubation Centers are in
  $data[3][0]['ic_state_name'] = $cities[0];
  $data[3][0]['ic_quantity'] = rand ( 1, 124 );
  $data[3][1]['ic_state_name'] = $cities[1];
  $data[3][1]['ic_quantity'] = rand ( 1, 89 );
  $data[3][2]['ic_state_name'] = $cities[2];
  $data[3][2]['ic_quantity'] = rand ( 1, 456 );
  $data[3][3]['ic_state_name'] = $cities[3];
  $data[3][3]['ic_quantity'] = rand ( 1, 250 );
  $data[3][4]['ic_state_name'] = $cities[4];
  $data[3][4]['ic_quantity'] = rand ( 1, 4 );

  // 4th Index is used for Platform Growth with Respect to City
  $data[4][0]['month'] = "September";
  $data[4][0]['value'] = rand ( 4, 198 );
  $data[4][1]['month'] = "October";
  $data[4][1]['value'] = rand ( 4, 40 );
  $data[4][2]['month'] = "November";
  $data[4][2]['value'] = rand ( 4, 61 );
  $data[4][3]['month'] = "December";
  $data[4][3]['value'] = rand ( 4, 54 );
  $data[4][4]['month'] = "January";
  $data[4][4]['value'] = rand ( 4, 74 );
  $data[4][5]['month'] = "February";
  $data[4][5]['value'] = rand ( 23, 323 );

  // Sending Reponse Back
  echo json_encode ( $data );
  die();
}