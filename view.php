<?php
/**
 * Used to view different types of profiles such as user profile, 
 * startup profile, incubation center profile, and investor profile.
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

// SET Library
include_once "./libraries/set/set.php";

// By default nobody's profile can be shown
$profileToShow = NULL;

// Startup profile to be shown
if ( isset ($_GET['sid']) ) {
  $profileToShow = "startup";
  $startup_id = htmlspecialchars ( $_GET['sid'], ENT_QUOTES );
  $profileName = $startup->get_name ( $connection, $startup_id );
}

// Incubation Center profile to be shown
else if ( isset ($_GET['icid']) ) {
  $profileToShow = "incubation"; 
  $incubcation_center_id = htmlspecialchars ( $_GET['icid'], ENT_QUOTES );
  $profileName = $incubation->get_name ( $connection, $incubcation_center_id );
}

// User profile to be shown
else if ( isset ($_GET['uid']) ) {
  $profileToShow = "user";
  $username = htmlspecialchars ( $_GET['uid'], ENT_QUOTES );
  $user_id = $user->get_user_id_using_username ( $connection, $username );
  $profileName = $user->get_name ( $connection, $user_id );
}

// Redirect user to homepage
else {

  header ( "Location: ./" );
  die();
}

// Starting Session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="CodeManiacs">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title><?php echo $profileName; ?> - Startup Ecosystem Tracker | CodeManiacs</title>

  <link rel="icon" href="./images/favicon.jpg">
  <link rel="stylesheet" href="./styles/prix.css">
  <link rel="stylesheet" href="./styles/all-page.css">
  <link rel="stylesheet" href="./styles/view.css">

  <script src="./scripts/jquery.js"></script>
  <script src="./scripts/set.js"></script>
  <script src="./scripts/view.js"></script>
</head>
<body>

  <div class="header">
    <div class="header-content disp-flex" style="margin:auto; max-width:1000px;">
      <div class="nav-menu-logo-wrap">
        <div class="nav-menu-logo">
          <svg version="1.1" id="nav-menu-header-logo" onclick="document.location.href = './';" xmlns="http:www.w3.org/2000/svg" xmlns:xlink="http:www.w3.org/1999/xlink" viewBox="0 0 643.7 209.3" xml:space="preserve">
            <style type="text/css">
              .st0{fill:#006BFD;}
              .st1{fill:#79B2FE;}
              .st2{fill:#2F86FE;}
              .st3{fill:#4E98FE;}
              .st4{fill:#529BFE;}
              .st5{fill:#8FBEFE;}
              .st6{fill:#2883FE;}
              .st7{fill:#9FC8FE;}
              .st8{fill:#60A3FE;}
              .st9{fill:#FEFEFE;}
              .st10{fill:#0071FE;}
              .st11{fill:#0072FE;}
              .st12{fill:#006CFE;}
            </style>
            <g>
              <path class="st0" d="M111.1,0.2c1,0.5,2.1,0.3,3.1,0.4c20.2,1.9,38.3,8.9,54.4,21.3c13.6,10.4,24,23.5,31.2,39
                c0.5,1.1,1,1.5,2.3,1.5c146.7,0,293.3,0,440,0c0.5,0,1,0,1.6,0c0.1,0.5-0.3,0.8-0.5,1.1c-19.4,27.6-38.7,55.2-58.1,82.9
                c-0.5,0.8-1.1,1.1-2,1.1c-127.1,0-254.1,0-381.2,0c-1.1,0-1.5,0.4-1.9,1.3c-14.3,29.7-37.3,48.9-69.1,57.6
                c-6.4,1.7-12.9,2.7-19.5,3.1c-0.5,0.2-0.9,0-1.4,0.1c-0.5,0-0.9,0-1.4,0c-0.6,0.1-1.2-0.1-1.7,0.1c-1.3,0-2.6,0-3.8,0
                c-0.6-0.3-1.1-0.1-1.7-0.1c-0.5,0-0.9,0-1.4,0c-0.5,0-0.9,0-1.4,0c-8.1,0-15.9-1.7-23.6-3.9c-10.4-3.1-20.1-7.7-29.1-13.8
                c-6.4-4.4-12.3-9.4-17.6-15.1c-7.6-8.1-13.8-17.2-18.5-27.3c-4.5-9.7-7.5-19.9-8.9-30.5c-0.3-2.4-0.2-4.8-0.6-7.1
                c0-0.2,0-0.3,0-0.5c0.3-0.5,0.1-1.1,0.1-1.7c-0.1-0.6,0.1-1.1-0.1-1.7c0-1.6,0-3.2,0-4.8c0.3-0.6,0.1-1.3,0.1-1.9
                c-0.1-0.7,0.1-1.4-0.1-2.1c0-0.2,0-0.5,0-0.7c0.3-1.7,0.2-3.5,0.4-5.2c0.7-6.1,1.9-12.1,3.6-18c1.9-6.3,4.3-12.3,7.3-18.1
                C15.3,49.7,19.8,43,25,36.8c8-9.3,17.3-17.1,27.9-23.1C64.2,7.3,76.1,3.1,88.9,1.1c3-0.5,6-0.7,9.1-0.8c0.2,0,0.5,0.1,0.7-0.1
                c0.5,0,1,0,1.4,0c0.6,0.2,1.3,0.2,1.9,0c1.9,0,3.8,0,5.8,0c0.6,0.2,1.3,0.2,1.9,0C110.2,0.2,110.6,0.2,111.1,0.2z"/>
              <path class="st1" d="M0.2,98.9c0.5,0.7,0.1,1.4,0.2,2.1c-0.1,0.1-0.1,0.1-0.2,0C0.2,100.3,0.2,99.6,0.2,98.9z"/>
              <path class="st2" d="M0.2,101c0.1,0,0.1,0,0.2,0c0,0.7,0.2,1.3-0.2,1.9C0.2,102.3,0.2,101.7,0.2,101z"/>
              <path class="st3" d="M109.7,0.2c-0.6,0.4-1.3,0.3-1.9,0C108.4,0.2,109,0.2,109.7,0.2z"/>
              <path class="st3" d="M102,0.2c-0.6,0.3-1.3,0.4-1.9,0C100.7,0.2,101.4,0.2,102,0.2z"/>
              <path class="st4" d="M0.2,107.8c0.4,0.5,0.2,1.1,0.2,1.7c-0.1,0.1-0.1,0.1-0.2,0C0.2,108.9,0.2,108.3,0.2,107.8z"/>
              <path class="st5" d="M0.2,109.4c0.1,0,0.1,0,0.2,0c-0.1,0.6,0.3,1.2-0.2,1.7C0.2,110.6,0.2,110,0.2,109.4z"/>
              <path class="st6" d="M101.3,209.3c0.6,0.1,1.2-0.2,1.7,0.2c-0.6,0-1.1,0-1.7,0C101.2,209.5,101.2,209.4,101.3,209.3
                C101.2,209.3,101.2,209.3,101.3,209.3z"/>
              <path class="st6" d="M106.8,209.5c0.5-0.5,1.1-0.2,1.7-0.2c0.1,0.1,0.1,0.1,0.1,0.2c0,0-0.1,0.1-0.1,0.1
                C107.9,209.5,107.4,209.5,106.8,209.5z"/>
              <path class="st7" d="M98.4,209.5c0-0.1,0-0.1,0-0.2c0.5,0,1,0,1.4,0c0.1,0,0.1,0.1,0.1,0.1c0,0.1-0.1,0.1-0.1,0.1
                C99.4,209.5,98.9,209.5,98.4,209.5z"/>
              <path class="st8" d="M99.8,209.5c0-0.1,0-0.1,0-0.2c0.5,0,1,0,1.4,0c0,0.1,0,0.1,0,0.2C100.8,209.5,100.3,209.5,99.8,209.5z"/>
              <path class="st8" d="M108.5,209.5c0-0.1,0-0.1,0-0.2c0.5,0,1,0,1.4,0c0.1,0.1,0.1,0.1,0.1,0.1c0,0-0.1,0.1-0.1,0.1
                C109.4,209.5,109,209.5,108.5,209.5z"/>
              <path class="st7" d="M109.9,209.5c0-0.1,0-0.1,0-0.2c0.5,0,1,0,1.4,0c0,0.1,0,0.1,0,0.2C110.9,209.5,110.4,209.5,109.9,209.5z"/>
              <path class="st9" d="M197.8,105c0,51.2-41.6,92.8-92.8,92.7c-51.3,0-92.8-41.6-92.7-92.9c0-51.1,41.6-92.6,92.8-92.6
                C156.2,12.3,197.8,53.8,197.8,105z"/>
              <path class="st9" d="M414.4,106.2c1.2,0.6,2.3,1.2,3.2,2c2.7,2.3,3.3,5.4,3.6,8.7c0.2,3.4,0,6.8,0.2,10.2c0.1,1.6,0.6,3.1,1.9,4.1
                c0.6,0.4,0.5,1,0.4,1.5c-0.1,0.5-0.7,0.3-1,0.3c-3.7,0-7.4,0-11,0c-0.8,0-1-0.3-1.2-0.9c-0.8-3-1.1-6-1-9.1c0-1.8,0-3.7-0.2-5.5
                c-0.4-4.1-2.1-6.1-6.3-6.2c-4.2-0.2-8.4,0-12.6-0.1c-0.9,0-0.7,0.6-0.7,1.1c0,5.5,0,11,0,16.6c0,1.1,0,2.2,0,3.4
                c0,0.6-0.1,0.9-0.8,0.9c-3.3,0-6.6,0-10,0c-0.6,0-0.8-0.2-0.7-0.8c0-0.2,0-0.4,0-0.6c0-17.8,0-35.5,0-53.3c0-1.1,0.3-1.3,1.4-1.3
                c8.8,0,17.5,0,26.3,0c4.3,0,8.4,0.8,11.8,3.8c6.5,5.7,7,16.9,1.1,22.7C417.5,104.8,416.1,105.5,414.4,106.2z"/>
              <path class="st9" d="M231.3,115.7c1.6,0,3.2,0,4.8,0c0.6,0,0.9,0.2,1,0.8c1,5.2,3.8,7.7,9.2,8.1c3.2,0.3,6.3,0.2,9.4-0.8
                c2.4-0.8,4.2-2.1,4.8-4.7c0.7-2.9-0.3-5-3-6.3c-2.8-1.4-5.9-2-8.9-2.6c-4.2-0.9-8.4-1.8-12.5-3.3c-6.7-2.5-9.6-7.2-9.6-14.3
                c0-7.5,5-14,12.3-16c6.9-1.9,13.8-2,20.5,0.9c5.6,2.4,9.3,6.4,10.5,12.6c0.7,3.5,0.7,3.5-2.9,3.5c-2.4,0-4.8,0-7.2,0
                c-0.5,0-0.8,0-0.9-0.6c-0.6-5.4-4.6-7.4-9.4-7.8c-2.6-0.2-5.3-0.2-7.8,0.9c-1.8,0.8-3.3,1.9-4,3.9c-1,2.9,0.2,5.5,3.1,6.7
                c2.4,1,5,1.5,7.5,2.2c4.7,1.2,9.5,2,14,3.6c5.4,2,8.9,5.6,9.5,11.5c0.9,8.7-3.1,15.6-11.4,18.5c-8.5,3-17.2,2.8-25.4-1.2
                c-5.9-2.8-9-7.8-9.5-14.4c-0.1-0.9,0.1-1.4,1.2-1.3C228.3,115.8,229.8,115.7,231.3,115.7z"/>
              <path class="st9" d="M526.3,96c0,5.9,0.1,11.8,0,17.8c0,2.7-0.4,5.3-1.2,7.9c-1.8,5.9-5.7,9.6-11.5,11.4
                c-6.2,1.9-12.5,1.9-18.8,0.2c-7.7-2.1-11.9-7.4-13-15.2c-0.4-2.5-0.5-5-0.5-7.5c0-10.8,0-21.5,0-32.3c0-1,0.2-1.3,1.2-1.3
                c3.2,0.1,6.4,0.1,9.6,0c1.1,0,1.2,0.3,1.2,1.3c0,11.1,0,22.2,0,33.4c0,2,0.2,3.9,0.6,5.8c0.9,3.9,3.3,6.1,7.2,6.7
                c2.1,0.3,4.2,0.3,6.3-0.1c3.3-0.7,5.4-2.8,6.3-6.1c0.5-2,0.7-4,0.7-6.1c0-11.2,0-22.5,0-33.7c0-0.9,0.2-1.2,1.2-1.2
                c3.2,0.1,6.4,0.1,9.6,0c1,0,1.3,0.2,1.3,1.2C526.3,84.2,526.3,90.1,526.3,96C526.3,96,526.3,96,526.3,96z"/>
              <path class="st9" d="M370.8,133c-4.1,0-8.1,0-12.1,0c-0.7,0-0.8-0.4-0.9-0.9c-1-3.2-2.1-6.4-3-9.6c-0.2-0.8-0.6-1-1.4-1
                c-6.2,0-12.3,0-18.5,0c-0.7,0-1,0.2-1.3,0.9c-1,3.2-2.1,6.4-3.2,9.7c-0.2,0.5-0.3,0.9-1,0.9c-3.8,0-7.6,0-11.4,0
                c-0.2-0.4,0-0.6,0.1-0.9c6.4-18,12.9-36.1,19.3-54.1c0.2-0.6,0.5-0.9,1.2-0.9c3.8,0,7.7,0,11.5,0c0.6,0,1,0.1,1.2,0.8
                c6.4,18.1,12.8,36.3,19.2,54.4C370.6,132.4,370.7,132.6,370.8,133z"/>
              <path class="st9" d="M537.6,105c0-8.9,0-17.8,0-26.8c0-0.9,0.2-1.2,1.2-1.2c8.1,0,16.2,0,24.2,0c2.8,0,5.6,0.6,8.1,1.8
                c5.5,2.5,8.1,7.1,8.7,13c0.3,2.8,0.2,5.7-0.3,8.5c-1.3,6.8-5.2,10.6-12.1,12c-2.4,0.5-4.9,0.6-7.4,0.6c-3.2,0.1-6.3,0.1-9.5,0
                c-0.9,0-1.2,0.2-1.2,1.2c0,5.8,0,11.7,0,17.5c0,1-0.1,1.4-1.3,1.3c-3.1-0.1-6.2-0.1-9.4,0c-0.9,0-1.1-0.2-1.1-1.1
                C537.6,122.9,537.6,113.9,537.6,105z"/>
              <path class="st9" d="M446.2,110c0-7.2,0-14.4,0-21.6c0-1-0.2-1.4-1.3-1.3c-4.8,0.1-9.5,0-14.3,0.1c-1.1,0-1.3-0.3-1.3-1.3
                c0.1-2.6,0.1-5.2,0-7.8c0-0.8,0.2-0.9,0.9-0.9c14.5,0,29,0,43.6,0c0.7,0,1,0.1,1,0.9c0,2.7-0.1,5.4,0,8.2c0,0.9-0.3,1-1.1,1
                c-4.8,0-9.7,0-14.5,0c-1,0-1.3,0.3-1.3,1.3c0,14.4,0,28.9,0,43.3c0,1.1-0.2,1.4-1.4,1.4c-3.2-0.1-6.3-0.1-9.5,0c-0.9,0-1-0.2-1-1.1
                C446.2,124.6,446.2,117.3,446.2,110z"/>
              <path class="st9" d="M292.3,109.9c0-7.2,0-14.5,0-21.7c0-1-0.3-1.2-1.2-1.2c-4.8,0-9.7,0-14.5,0c-0.9,0-1.2-0.2-1.1-1.1
                c0.1-2.7,0-5.4,0-8c0-0.7,0.2-0.9,0.9-0.9c14.6,0,29.1,0,43.7,0c0.8,0,0.9,0.2,0.9,0.9c0,2.7,0,5.4,0,8c0,0.9-0.3,1.1-1.1,1.1
                c-4.7,0-9.4,0-14.2,0c-1.8,0-1.6-0.2-1.6,1.5c0,14.4,0,28.7,0,43.1c0,1.1-0.3,1.4-1.4,1.3c-3.1-0.1-6.2-0.1-9.2,0
                c-1,0-1.3-0.2-1.3-1.2C292.3,124.5,292.3,117.2,292.3,109.9z"/>
              <path class="st10" d="M100.9,149.1c-0.5-0.2-0.7-0.7-1-1.1c-3.9-4.7-7.8-9.3-11.7-14c-0.5-0.6-0.7-1-0.1-1.8
                c4.7-6.8,5.5-14,1.8-21.4c-3.7-7.4-10-11.3-18.3-11.4c-5.6-0.1-11.1,0-16.7,0c-2.5,0-4.2,1.7-4.2,4.2c0,5.5,0,11,0,16.6
                c0.1,15.1,16,25.1,29.6,18.5c0.8-0.4,1.3-0.4,1.9,0.4c6,7.2,12,14.5,18.1,21.7c1.3,1.5,0.6,3.2,0.8,4.8c0,0.4-0.5,0.4-0.8,0.4
                c-10.9,1.2-20.1,5.8-27.6,13.8c-0.6,0.6-1,0.3-1.5,0.1c-6.9-3.1-13.3-7.1-19.1-12.1c-14.9-12.8-24.2-28.8-27.8-48.1
                c-7.9-43.2,20.2-85.2,63.3-94.5c43.9-9.6,87.2,18,97.4,61.9c8.7,37.7-10.7,76.8-46.1,92.9c-0.8,0.4-1.2,0.3-1.8-0.4
                c-7.4-7.7-16.4-12.2-27-13.4c-0.9-0.1-1.1-0.3-1.1-1.2c0-10.8,0-21.5,0-32.3c0-0.7,0.2-1.2,0.7-1.7c6.1-7.3,12.2-14.6,18.3-21.9
                c0.5-0.6,0.9-0.7,1.7-0.3c13,6.3,28.2-2.2,29.6-16.6c0.1-1.1,0.2-2.2,0.2-3.2c0-5,0-10.1,0-15.1c0-2.7-1.7-4.4-4.3-4.4
                c-5.6,0-11.3-0.2-16.9,0c-8.3,0.3-14.5,4.2-18.1,11.7c-3.6,7.3-2.7,14.5,1.9,21.2c0.3,0.4,0.8,0.7,0.2,1.4
                c-4.3,5.1-8.6,10.3-13,15.5c-0.3-0.4-0.2-0.9-0.2-1.3c-0.1-4,0.2-8.1-0.4-12.1c-0.9-6.1-3.3-11.5-7.1-16.3
                c-0.6-0.8-1.5-1.5-1.7-2.4c-0.2-0.9,1-1.6,1.5-2.4c4.2-6.9,4.8-14,1-21.1c-3.8-7.1-9.9-10.8-18-11c-5.6-0.1-11.1,0-16.7,0
                c-2.7,0-4.2,1.6-4.2,4.3c0,5.5-0.1,11,0,16.6c0.2,14.9,15.3,24.7,29,18.8c0.8-0.3,1.2-0.2,1.7,0.4c3,3.7,5.5,7.7,6.5,12.4
                c0.4,1.8,0.6,3.5,0.6,5.4c0,12.8,0,25.5,0,38.3C101,148.6,101.2,148.9,100.9,149.1z"/>
              <path class="st11" d="M129.6,183.1c-15.9,5.3-35.1,4.8-49.1,0C92.2,171.1,115.1,169.3,129.6,183.1z"/>
              <path class="st11" d="M143.9,76.9c2.2,0,4.3,0,6.5,0c0.6,0,1,0,1,0.8c-0.1,4.5,0.3,9-0.2,13.5c-0.8,7.9-8.7,13.2-16.3,10.9
                c-1.2-0.4-1.2-0.4-0.4-1.4c2.3-2.7,4.6-5.5,6.8-8.2c1.2-1.5,1.4-3.2,0.6-4.7c-0.8-1.4-2.3-2.1-4-1.9c-1.1,0.2-2,0.8-2.7,1.7
                c-2.2,2.7-4.5,5.4-6.7,8.1c-0.9,1-0.9,1-1.5-0.1c-4.1-8.1,1.4-17.9,10.4-18.6C139.6,76.9,141.8,77,143.9,76.9
                C143.9,77,143.9,76.9,143.9,76.9z"/>
              <path class="st11" d="M58.5,114.5c0-2.2,0-4.3,0-6.5c0-0.7,0.2-0.9,0.9-0.9c4,0,8-0.1,12,0c9.7,0.3,15.6,10,11.5,18.5
                c-0.6,1.3-0.6,1.3-1.5,0.2c-2.3-2.8-4.6-5.5-6.9-8.3c-1.1-1.3-2.5-1.8-4.2-1.4c-1.6,0.4-2.5,1.5-2.8,3.1c-0.2,1.3,0.3,2.4,1.1,3.4
                c2.3,2.7,4.5,5.5,6.8,8.2c0.6,0.7,0.7,1-0.3,1.3c-8,2.5-16.3-3.4-16.6-11.8C58.5,118.5,58.5,116.5,58.5,114.5
                C58.5,114.5,58.5,114.5,58.5,114.5z"/>
              <path class="st11" d="M79,60.2c2.5,0.2,5.6-0.3,8.6,0.5c7.9,2.2,11.7,11.6,7.6,18.7c-0.5,0.8-0.7,0.8-1.3,0.1
                c-2.2-2.9-4.4-5.7-6.6-8.6c-1-1.3-2.3-2-4-1.7c-3,0.5-4.3,3.8-2.4,6.3c2.2,2.9,4.4,5.9,6.7,8.7c0.7,0.8,0.4,1-0.5,1.3
                c-8,2-15.7-3.7-16.1-12c-0.2-4.2,0-8.3-0.1-12.5c0-0.7,0.3-0.9,0.9-0.8C74.2,60.2,76.3,60.2,79,60.2z"/>
              <path class="st12" d="M398.1,86.8c2.2,0.1,4.9-0.3,7.5,0.2c3.1,0.6,4.7,2.4,5.2,5.5c0.1,0.7,0.2,1.5,0.1,2.3
                c-0.2,4.7-2.4,6.8-7.6,6.9c-4.3,0.1-8.6,0.1-12.8,0.1c-0.7,0-0.9-0.2-0.9-0.9c0-4.4,0-8.7,0-13.1c0-0.8,0.2-1,1-1
                C393,86.8,395.3,86.8,398.1,86.8z"/>
              <path class="st12" d="M344.3,90c1,3.2,2,6.1,2.9,9c1.3,3.9,2.5,7.9,3.8,11.8c0.2,0.7,0.2,0.9-0.6,0.9c-4.1,0-8.2,0-12.4,0
                c-0.6,0-0.9,0-0.6-0.8C339.7,104.1,341.9,97.2,344.3,90z"/>
              <path class="st12" d="M549.3,95c0-2.4,0-4.8,0-7.2c0-0.7,0.1-1,0.9-1c3.6,0,7.1,0,10.7,0c5.2,0.1,7.9,3.5,7.4,9
                c-0.5,4.8-2.9,7.1-7.7,7.3c-3.5,0.1-6.9,0.1-10.4,0.1c-0.6,0-0.8-0.2-0.8-0.8C549.4,99.9,549.3,97.5,549.3,95z"/>
            </g>
          </svg>
        </div>
      </div>
      <div class="search-box-wrap">
        <div class="search-box">
          <div class="search-box-contents-splitter disp-flex">
            <div class="search-icon vert-center">
              <svg version="1.1" id="search-icon" xmlns="http:www.w3.org/2000/svg" xmlns:xlink="http:www.w3.org/1999/xlink" x="0px" y="0px"
                width="15px" viewBox="0 0 512 512" xml:space="preserve">
                <path d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3
                  c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2
                  c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2
                  c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z"/>
              </svg>
            </div>
            <div class="search-text-box-wrap">
              <input type="text" title="Search Startups..." id="search_box" placeholder="Search..." name="search-tbox" class="search-tbox">
            </div>
          </div>

          <?php // Search Results Panel ==> ?>
          <div class="search-results-wrap" id="search-results" style="display:none;">
            <div class="search-results">
              <!-- 
              Results Are Displayed Using JS by building DOM Nodes Dynamically.
              @see search.js for more information. -->
            </div>
          </div>
          <?php // <== Search Results Panel ?>
        </div>
      </div>
      <div class="header-actions-wrap">
        <div class="header-actions">

          <?php // When user is not signed in ==>
          if ( $user->check_if_user_is_logged_in() === false ) { ?>
          <div class="disp-flex">
            <span style="flex:1;"></span>
            <div class="header-action signin-action-wrap">
              <button title="Sign In" class="prix-secondary-btn">Sign In</button>
            </div>
            <div class="header-action signup-action-wrap">
              <button title="Sign Up">Sign Up</button>
            </div>
          </div>
          <?php } else {
          // When user is already signed in ==> ?>
          <div class="already-signed-in-wrap">
            <div class="disp-flex">
              <div class="notification-icon-wrap vert-center" style="margin-left: auto; margin-right: 2em;">
                <div style="height: 40px; cursor: pointer;" class="notification-icon" title="0 New Notifications">
                  <svg version="1.1" class="vert-center" xmlns="http://www.w3.org/2000/svg" style="fill: #7d7d7d;" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    width="21px" height="21px" viewBox="0 0 512 512" xml:space="preserve">
                    <g>
                      <path d="M381.7,225.9c0-97.6-52.5-130.8-101.6-138.2c0-0.5,0.1-1,0.1-1.6c0-12.3-10.9-22.1-24.2-22.1c-13.3,0-23.8,9.8-23.8,22.1
                        c0,0.6,0,1.1,0.1,1.6c-49.2,7.5-102,40.8-102,138.4c0,113.8-28.3,126-66.3,158h384C410.2,352,381.7,339.7,381.7,225.9z"/>
                      <path d="M256.2,448c26.8,0,48.8-19.9,51.7-43H204.5C207.3,428.1,229.4,448,256.2,448z"/>
                    </g>
                  </svg>
                </div>
              </div>

              <?php
              // User Profile Picture
              $user_profile_picture = $user->get_profile_picture_id ( $connection, $user->get_logged_in_user_id() );

              // Default Profile Picture
              if ( $user_profile_picture == "" || is_null($user_profile_picture) )
                $user_profile_picture = "./images/default_user_profile_picture.png";
              
              // Rebuilding profile picture source, because, user has uploaded custom profile picture
              else
                $user_profile_picture = "./files/profile_pictures/" . $user_profile_picture;
              ?>
              <div class="user-profile-pic-wrap vert-center">
                <img style="border-radius: 100px;" src="<?php echo $user_profile_picture; ?>" width="40" height="40" class="user-profile-pic">
              </div>
            </div>
            <?php } ?>

            <div class="user-signed-in-actions-wrap">
              <div class="user-signed-in-actions">
                <a href="./dashboard/" class="user-signed-in-action">
                  Dashboard
                </a>
                <a href="./signout" class="user-signed-in-action">
                  Sign Out
                </a>
              </div>
            </div>
          </div>
          <?php // <== When user is already signed in ?>
        </div>
      </div>
    </div>
  </div>

  <div class="profile-wrap startup-profile-wrap">
    <div class="profile startup-profile">

      <?php if ( $profileToShow == "startup" ) { ?>
      <script>
        // Collecting data regaring user visit
        view.collect ( '<?php echo $_GET['sid']; ?>' );
      </script>
      <!-- Profile Picture, Name, Description, Link -->
      <div class="profile-header-wrap">
        <div class="profile-header">
          <div class="profile-header-content-splitter disp-flex">
            <div class="profile-picture-wrap">
              <div class="profile-picture vert-center">
                <?php
                // Default profile picture
                $startup_profile_picture = "./images/default_startup_icon_dark.png";

                // Custom profile picture
                if ( $startup->get_profile_pic_id($connection, $startup_id) !== "" && $startup->get_profile_pic_id($connection, $startup_id) !== NULL ) {
                  $startup_profile_picture = "./files/profile_pictures/" . $startup->get_profile_pic_id($connection, $startup_id);
                }
                ?>
                <img src="<?php echo $startup_profile_picture; ?>" width="150" height="150" alt="Profile Picture">
              </div>
            </div>
            <div class="profile-name-desc-wrap">
              <div class="profile-name">
                <h2><?php echo $startup->get_name ( $connection, $startup_id ); ?></h2>
              </div>
              <div class="profile-desc">
                <p><?php echo $startup->get_description ( $connection, $startup_id ); ?></p>
                <!-- <p>Profile Description. Pasture he invited mr company shyness. But when shot real her. Chamber her observe visited removal six sending himself boy.</p> -->
              </div>
              <div class="profile-link">
                <a href="https://<?php echo $startup->get_link ( $connection, $startup_id ); ?>" target="_blank"><?php echo $startup->get_link ( $connection, $startup_id ); ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Profile Tabs -->
      <div class="profile-tabs-wrap">
        <div class="profile-tabs startup-profile-tabs disp-flex">
          <div class="tab about-tab active" title="About" onclick="activate_tab('about-tab', 'startup-profile-tabs', 'startup-about-tab')">
            <div class="tab-content disp-flex">
              <div class="tab-icon-wrap">
                <svg class="vert-center" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  width="20px" height="20px" viewBox="0 0 512 512" xml:space="preserve">
                  <g>
                    <path d="M256,48C141.1,48,48,141.1,48,256c0,114.9,93.1,208,208,208c114.9,0,208-93.1,208-208C464,141.1,370.9,48,256,48z
                      M260.3,366c-9.4,0-17-7.5-17-16.9c0-9.3,7.6-16.8,17-16.8c9.4,0,17,7.5,17,16.8C277.3,358.5,269.7,366,260.3,366z M294.1,250.7
                      c-22.8,22.5-22.2,27.4-23.3,53.3h-19c1.1-28.5,7.5-43.7,30.1-64.5c11-10.3,19.4-22.7,19.4-38.1c0-23.6-19.4-39.9-42.6-39.9
                      c-32.4,0-48.5,16.4-47.9,46.4H192c0.3-42,24.4-62.1,67.6-62.1c33,0,60.4,20.4,60.4,54.6C320,222.3,309.3,236.6,294.1,250.7z"/>
                  </g>
                </svg>
              </div>
              <div class="tab-name-wrap">
                <span class="vert-center">About</span>
              </div>
            </div>
          </div>
          <div class="tab team-tab" title="Team &amp; Leadership" onclick="activate_tab('team-tab', 'startup-profile-tabs', 'startup-team-tab')">
            <div class="tab-content disp-flex">
              <div class="tab-icon-wrap">
                <svg class="vert-center" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  width="20px" height="20px" viewBox="0 0 512 512" xml:space="preserve">
                  <g>
                    <path d="M349.2,334.8C360.5,338.7,338,330.9,349.2,334.8L349.2,334.8z"/>
                    <path d="M349.2,334.8c-13.5-4.7-28.1-5-41.6-9.7c-4.1-1.4-12.2-3.1-13.9-7.8c-1.6-4.6-1.6-10-1.9-14.8c-0.2-3.8-0.3-7.6-0.3-11.4
                      c0-2.5,6.4-7.8,7.8-10.1c5.4-9,5.9-21.1,6.9-31.3c8.7,2.4,9.8-13.7,11.3-18.6c1.1-3.4,7.8-26.8-2.6-23.6c2.5-4.4,3.5-9.8,4.2-14.7
                      c2-12.8,2.8-26.8-1.1-39.3c-8.1-26-33-40.6-59.3-41.4c-26.7-0.9-53.5,11.9-63.5,37.8c-4.8,12.6-4.4,26.3-2.8,39.5
                      c0.7,6,1.7,12.7,4.7,18.1c-9.7-2.9-4.5,17.7-3.4,21.3c1.6,5.1,3,23.4,12.1,20.9c0.8,8.1,1.7,16.4,3.9,24.3
                      c1.5,5.3,4.6,9.8,8.2,13.9c1.8,2,2.7,2.2,2.6,4.8c-0.1,7.8,0.1,16.2-1.9,23.8c-2,7.6-18.7,10.8-25.4,12.2
                      c-18,3.7-34.6,5.4-49.6,16.6C126.1,358.2,117,378.3,117,400c83.3,0,166.6,0,249.9,0c9.4,0,18.7,0,28.1,0
                      C395,370.5,377.2,344.5,349.2,334.8z"/>
                    <path d="M143.3,322.5c0.6-0.3,1.2-0.6,1.6-0.8c-0.3,0.1-0.6,0.3-0.8,0.4C143.8,322.2,143.6,322.3,143.3,322.5z"/>
                    <path d="M143.3,322.5c-3.4,1.7-7.5,3.8,0.8-0.4c3-1.5,2.4-1.2,0.8-0.4c6.8-3.2,14.1-4,21.4-4.7c2.8-0.3,4.1-2.2,2-4.9
                      c-4-5.1-17.8-6.1-23.6-8.4c-3.6-1.4-4.6-2.7-4.9-6.7c-0.1-1.8-1.1-9.8,0.3-11.1c1-1,7.3-0.6,8.7-0.8c5.7-0.7,11.5-1.9,16.9-4
                      c2.3-0.9,4.5-2,6.5-3.4c2.4-1.8-1.8-6.2-2.9-8.6c-3.4-7.5-4.9-15.7-5.4-23.9c-1-16.1,1.5-32.3-1.5-48.3
                      c-4.5-24.5-23.4-36.8-47.5-36.8c-14.9,0-29.6,5.1-37.9,18.1c-9.2,14.3-8.7,32.1-8.2,48.4c0.3,9.3,0.7,18.7-0.6,28
                      c-0.6,4-1.5,7.9-2.9,11.7c-1.1,2.9-6.7,10.1-4.5,11.6c8.3,5.9,22.3,7.9,32.3,7.1c0.3,4.9,1.2,11.2-0.6,15.8
                      c-2.8,7.2-23.7,9.1-30,11.2C45,317.8,32,332,32,352c18.3,0,36.5,0,54.8,0c8.2,0,16.4,0,24.7,0c1.3,0,6.3-9.3,7.7-10.8
                      C126,333.7,134.3,327.2,143.3,322.5z"/>
                    <path d="M449.3,311.9c-8.1-2.6-23.7-3.4-29.5-10.4c-2.9-3.5-1.3-12.4-1-16.6c4.4,0.4,9.2-0.3,13.7-0.9c4.1-0.6,8.1-1.4,12-2.8
                      c1.8-0.7,3.6-1.4,5.3-2.4c3.9-2.3,2.1-2.7,0.1-6.1c-10.9-18.3-6-41.5-6.5-61.6c-0.4-16.7-4.8-35-20-44.4c-13.7-8.5-34-8.8-48.7-2.8
                      c-42.4,17-17.4,73.2-31.9,105.4c-2.5,5.4-6.1,7.3,0.2,10.5c3.5,1.8,7.3,3,11.1,3.9c5.8,1.4,11.8,2.2,17.8,2.4c1,0,0.3,12.6,0,13.9
                      c-1.1,4.9-11.8,6.3-15.8,7.4c-4.1,1.1-10.9,1.4-12.9,5.7c-3,6.4,9.9,4.8,13.1,5.4c10.3,1.9,19.4,7.6,27.4,14.1
                      c6,4.9,14.1,11.5,16.3,19.5c26.7,0,53.5,0,80.2,0C480,332,466.9,317.7,449.3,311.9z"/>
                  </g>
                </svg>
              </div>
              <div class="tab-name-wrap">
                <span class="vert-center">Team</span>
              </div>
            </div>
          </div>
          <div class="tab contact-tab" title="Address &amp; Contact Details" onclick="activate_tab('contact-tab', 'startup-profile-tabs', 'startup-contact-tab')">
            <div class="tab-content disp-flex">
              <div class="tab-icon-wrap">
                <svg class="vert-center" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  width="20px" height="20px" viewBox="0 0 512 512" xml:space="preserve">
                  <g>
                    <polygon points="256,320 192,320 192,256 320,128 64,128 64,432 384,432 384,192 	"/>
                    <polygon points="387.927,91.74 208,271.651 208,304 240.216,304 420.261,124.016 	"/>
                    <path d="M444.213,80.312l-12.465-12.466C429.084,65.467,425.556,64,421.746,64c-3.812,0-7.304,1.468-9.929,3.85L399.666,80
                      l0.08,0.08l11.293,11.293l21.02,21.02l12.15-12.15c2.383-2.625,3.791-6.117,3.791-9.929C448,86.504,446.592,82.975,444.213,80.312z
                      "/>
                  </g>
                </svg>
              </div>
              <div class="tab-name-wrap">
                <span class="vert-center">Contact</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Profile Tab Content -->
      <div class="startup-profile-tab-content-wrap profile-tab-content-wrap">
        <div class="startup-profile-tab-content">
          <!-- About Tab Content -->
          <div class="profile-tab-content about-tab-content" id="startup-about-tab">
            <div class="disp-flex">
              <div class="left-side-wrap">
                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>Our Vision</span>
                  </div>
                  <div class="tab-para-wrap">
                    <p><?php echo $startup->get_vision ( $connection, $startup_id ); ?></p>
                    <!-- <p>This is the startup vision. Far quitting dwelling graceful the likewise received building. An fact so to that show am shed sold cold.</p> -->
                  </div>
                </div>
                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>Our Story</span>
                  </div>
                  <div class="tab-para-wrap">
                    <p><?php echo htmlspecialchars_decode ( $startup->get_story($connection, $startup_id), ENT_QUOTES ); ?></p>
                    <!-- <p>
                      This is the startup story. Far quitting dwelling graceful the likewise received building. An fact so to that show am shed sold cold. 
                      <br><br>Unaffected remarkably get yet introduced excellence terminated led. Result either design saw she esteem and. On ashamed no inhabit ferrars it ye besides resolve. Own judgment directly few trifling. <br><br>Elderly as pursuit at regular do parlors. Rank what has into fond she. Unwilling sportsmen he in questions september therefore described so. Attacks may set few believe moments was. Reasonably how possession shy way introduced age inquietude. Missed he engage no exeter of. Still tried means we aware order among on. <br><br>Eldest father can design tastes did joy settle. Roused future he ye an marked. Arose mr rapid in so vexed words. Gay welcome led add lasting chiefly say looking.</p> -->
                  </div>
                </div>
              </div>
              <div class="right-side-wrap">
                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>Category</span>
                  </div>
                  <div class="tab-para-wrap">
                    <p><?php echo $startup->get_category ( $connection, $startup_id ); ?></p>
                  </div>
                </div>

                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>Class</span>
                  </div>
                  <div class="tab-para-wrap">
                    <p><?php echo $startup->get_class ( $connection, $startup_id ); ?></p>
                  </div>
                </div>

                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>Date of Birth</span>
                  </div>
                  <div class="tab-para-wrap">
                    <p><?php echo $startup->get_date_of_birth ( $connection, $startup_id ); ?></p>
                    <!-- <p>19 December, 2017</p> -->
                  </div>
                </div>
                
                <?php 
                // IC ID of where startup is incubated
                $incubated_center = $incubation->get_ic_id_using_email_id ( $connection, $startup->get_ic_email($connection, $startup_id) );
                if ( $incubated_center !== "" && $incubated_center !== NULL ) { ?>
                  <div class="tab-block-wrap">
                    <div class="tab-title-wrap">
                      <span>Incubated In</span>
                    </div>
                    <div class="tab-para-wrap">
                      <a href="./view?icid=<?php echo $incubated_center; ?>"><?php echo $incubation->get_name($connection, $incubated_center); ?></a>
                    </div>
                  </div>
                  <?php
                } ?>

                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>Social</span>
                  </div>
                  <div class="tab-para-wrap">
                    <div class="disp-flex">
                      <a class="social-icon-wrap" href="https://www.linkedin.com/in/<?php echo $startup->get_linkedin ( $connection, $startup_id ); ?>" title="LinkedIn" target="_blank">
                        <svg version="1.1" class="social-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="20px" height="20px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                          <g>
                            <path d="M417.2,64H96.8C79.3,64,64,76.6,64,93.9v321.1c0,17.4,15.3,32.9,32.8,32.9h320.3c17.6,0,30.8-15.6,30.8-32.9V93.9
                              C448,76.6,434.7,64,417.2,64z M183,384h-55V213h55V384z M157.4,187H157c-17.6,0-29-13.1-29-29.5c0-16.7,11.7-29.5,29.7-29.5
                              c18,0,29,12.7,29.4,29.5C187.1,173.9,175.7,187,157.4,187z M384,384h-55v-93.5c0-22.4-8-37.7-27.9-37.7
                              c-15.2,0-24.2,10.3-28.2,20.3c-1.5,3.6-1.9,8.5-1.9,13.5V384h-55V213h55v23.8c8-11.4,20.5-27.8,49.6-27.8
                              c36.1,0,63.4,23.8,63.4,75.1V384z"/>
                          </g>
                        </svg>
                      </a>
                      <a class="social-icon-wrap" title="Twitter" href="https://www.twitter.com/<?php echo $startup->get_twitter ( $connection, $startup_id ); ?>" target="_blank">
                        <svg version="1.1" class="social-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="20px" height="20px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                          <path d="M492,109.5c-17.4,7.7-36,12.9-55.6,15.3c20-12,35.4-31,42.6-53.6c-18.7,11.1-39.4,19.2-61.5,23.5
                          C399.8,75.8,374.6,64,346.8,64c-53.5,0-96.8,43.4-96.8,96.9c0,7.6,0.8,15,2.5,22.1c-80.5-4-151.9-42.6-199.6-101.3
                          c-8.3,14.3-13.1,31-13.1,48.7c0,33.6,17.2,63.3,43.2,80.7C67,210.7,52,206.3,39,199c0,0.4,0,0.8,0,1.2c0,47,33.4,86.1,77.7,95
                          c-8.1,2.2-16.7,3.4-25.5,3.4c-6.2,0-12.3-0.6-18.2-1.8c12.3,38.5,48.1,66.5,90.5,67.3c-33.1,26-74.9,41.5-120.3,41.5
                          c-7.8,0-15.5-0.5-23.1-1.4C62.8,432,113.7,448,168.3,448C346.6,448,444,300.3,444,172.2c0-4.2-0.1-8.4-0.3-12.5
                          C462.6,146,479,129,492,109.5z"/>
                        </svg>
                      </a>
                      <a class="social-icon-wrap" title="Facebook" href="https://www.facebook.com/<?php echo $startup->get_facebook ( $connection, $startup_id ); ?>" target="_blank">
                        <svg version="1.1" class="social-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="20px" height="20px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                          <path d="M288,192v-38.1c0-17.2,3.8-25.9,30.5-25.9H352V64h-55.9c-68.5,0-91.1,31.4-91.1,85.3V192h-45v64h45v192h83V256h56.4l7.6-64
	                        H288z"/>
                        </svg>
                      </a>
                      <a class="social-icon-wrap" title="Instagram" href="https://www.instagram.com/<?php echo $startup->get_instagram ( $connection, $startup_id ); ?>" target="_blank">
                        <svg version="1.1" class="social-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="20px" height="20px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                          <g>
                            <circle cx="256" cy="255.833" r="80"/>
                          </g>
                          <g>
                            <path d="M177.805,176.887c21.154-21.154,49.279-32.929,79.195-32.929s58.041,11.837,79.195,32.991
                              c13.422,13.422,23.011,29.551,28.232,47.551H448.5v-113c0-26.51-20.49-47-47-47h-288c-26.51,0-49,20.49-49,47v113h85.072
                              C154.794,206.5,164.383,190.309,177.805,176.887z M416.5,147.7c0,7.069-5.73,12.8-12.8,12.8h-38.4c-7.069,0-12.8-5.73-12.8-12.8
                              v-38.4c0-7.069,5.73-12.8,12.8-12.8h38.4c7.069,0,12.8,5.73,12.8,12.8V147.7z"/>
                            <path d="M336.195,335.279c-21.154,21.154-49.279,32.679-79.195,32.679s-58.041-11.462-79.195-32.616
                              c-21.115-21.115-32.759-49.842-32.803-78.842H64.5v143c0,26.51,22.49,49,49,49h288c26.51,0,47-22.49,47-49v-143h-79.502
                              C368.955,285.5,357.311,314.164,336.195,335.279z"/>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Team Tab Content -->
          <div class="profile-tab-content about-tab-content" id="startup-team-tab" style="display:none;">
            <div class="disp-flex">
              <div class="left-side-wrap">
                <div class="tab-block-wrap startup-founders-wrap">
                  <div class="tab-title-wrap">
                    <span>Creator</span>
                  </div>
                  <div class="tab-grid-wrap">
                    <?php 
                    // ID of User who is owner of Startup
                    $startup_owner_id = $startup->get_owner_id ( $connection, $startup_id );

                    // Owners profile picture ID
                    $startup_owner_profile_picture = $user->get_profile_picture_id ( $connection, $startup_owner_id );

                    // Default profile picture
                    if ( $startup_owner_profile_picture == "" || is_null($startup_owner_profile_picture) ) {
                      $startup_owner_profile_picture = "./images/default_user_profile_picture.png";
                    }
                    // Custom profile picture
                    else {
                      $startup_owner_profile_picture = "./files/profile_pictures/" . $startup_owner_profile_picture;
                    }
                    ?>
                    <a class="grid-item" href="./view?uid=<?php echo $user->get_user_username ( $connection, $startup_owner_id ); ?>">
                      <div class="image-wrap">
                        <img style="border-radius: 100px;" src="<?php echo $startup_owner_profile_picture; ?>" width="64" height="64" alt="User Profile Picture">
                      </div>
                      <div class="tab-text-wrap">
                        <span><?php echo $user->get_name ( $connection, $startup_owner_id ); ?></span>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="tab-block-wrap startup-team-wrap">
                  <div class="tab-title-wrap">
                    <span>Team</span>
                  </div>
                  <div class="tab-grid-wrap">
                    <?php
                    $query_to_get_team_details = mysqli_query ( 
                      $connection, 
                      " SELECT 
                        startup_team_member_user_id 
                      FROM 
                        startup_team_member_details 
                      WHERE 
                        startup_team_member_startup_id = '$startup_id' "
                    );

                    // Team members exist
                    if ( mysqli_num_rows($query_to_get_team_details) > 0 ) {

                      // Getting team member details one by one
                      while ( $team_member = mysqli_fetch_assoc($query_to_get_team_details) ) {
                        
                        // Team member ID
                        $team_member_id = $team_member['startup_team_member_user_id'];

                        // Default profile picture
                        if ( 
                          $user->get_profile_picture_id($connection, $team_member_id) == ""  ||
                          $user->get_profile_picture_id($connection, $team_member_id) == NULL
                        ) {
                          $team_member_profile_picture_id = "./images/default_user_profile_picture.png";
                        }
                        // Custom profile picture
                        else {
                          $team_member_profile_picture_id = "./files/profile_pictures/" . $user->get_profile_picture_id ( $connection, $team_member_id );
                        } ?>
                        <a class="grid-item" href="./view?uid=<?php echo $team_member_id; ?>">
                          <div class="image-wrap">
                            <img style="border-radius: 100px;" src="<?php echo $team_member_profile_picture_id; ?>" width="64" height="64" alt="User Profile Picture">
                          </div>
                          <div class="tab-text-wrap">
                            <span><?php echo $user->get_name ( $connection, $team_member_id ); ?></span>
                          </div>
                        </a>
                        <?php
                      } // Getting team member details one by one END
                    } // Team members exist END ?>
                  </div>
                </div>
                <div class="tab-block-wrap startup-investors-wrap">
                  <div class="tab-title-wrap">
                    <span>Investor</span>
                  </div>
                  <div class="tab-grid-wrap">
                  <?php
                    $query_to_get_investor_details = mysqli_query ( 
                      $connection, 
                      " SELECT 
                        startup_investor_user_id 
                      FROM 
                        startup_investor_details 
                      WHERE 
                        startup_investor_startup_id = '$startup_id' "
                    );

                    // Investors exist
                    if ( mysqli_num_rows($query_to_get_investor_details) > 0 ) {

                      // Getting investor details one by one
                      while ( $team_member = mysqli_fetch_assoc($query_to_get_investor_details) ) {
                        
                        // Investor ID
                        $investor_id = $team_member['startup_investor_user_id'];

                        // Default profile picture
                        if ( 
                          $user->get_profile_picture_id($connection, $investor_id) == ""  ||
                          $user->get_profile_picture_id($connection, $investor_id) == NULL
                        ) {
                          $investor_profile_picture_id = "./images/default_user_profile_picture.png";
                        }
                        // Custom profile picture
                        else {
                          $investor_profile_picture_id = "./files/profile_pictures/" . $user->get_profile_picture_id ( $connection, $investor_id );
                        } ?>
                        <a class="grid-item" href="./view?uid=<?php echo $user->get_user_username ( $connection, $investor_id ); ?>">
                          <div class="image-wrap">
                            <img style="border-radius: 100px;" src="<?php echo $investor_profile_picture_id; ?>" width="64" height="64" alt="Investor Profile Picture">
                          </div>
                          <div class="tab-text-wrap">
                            <span><?php echo $user->get_name ( $connection, $investor_id ); ?></span>
                          </div>
                        </a>
                        <?php
                      } // Getting investor details one by one END
                    } // Team members exist END ?>
                  </div>
                </div>
              </div>
              <div class="right-side-wrap">
                <div class="tab-block-wrap startup-founders-wrap">
                  <div class="tab-title-wrap">
                    <span>Are We Hiring?</span>
                  </div>
                  <div class="tab-para-wrap">
                    <?php
                    if ( $startup->get_hiring($connection, $startup_id) == 1 ) { ?>        
                      <?php 
                      // User is logged in
                      // User is viewing their own startup profile
                      if ( 
                        $user->check_if_user_is_logged_in() && 
                        $user->get_user_startup_id (
                          $connection, 
                          $user->get_logged_in_user_id()
                        ) == $startup_id
                      ) { ?>
                        <p style="font-size:14px; white-space:inherit;">
                          Yes
                        </p>
                        <?php 
                      } 
                      // User is not logged 
                      else if ( $user->check_if_user_is_logged_in() == false ) { ?>
                        <p style="font-size:14px; white-space:inherit;">
                          Yes
                        </p>
                        <?php 
                      } else { ?>
                        <script>
                          function submit_cv () {
                            set.show_system_notification ( "Working...", "", -1 );
                            $.ajax({
                              cache: false,
                              type: "POST",
                              url: "./ajax/system",
                              data: {
                                action: "submit_cv",
                                sid: '<?php echo $startup_id; ?>'
                              },
                              success: function ( data ) {
                                
                                if ( data == "success" ) {
                                  set.show_system_notification ( "Success!", "", 2500 );
                                  return;
                                }
                                else if ( data == "already-sent-cv" ) {
                                  set.show_system_notification ( "You have already sent your CV! No need to send again.", "", 2500 );
                                  return;
                                }
                                else if ( data == "not-uploaded-cv" ) {
                                  set.show_system_notification ( "It seems that you've not uploaded your CV yet.<br>Try uploading your CV first and then try sending your CV.", "danger", 5000 );
                                  return;
                                }
                                else {
                                  set.show_system_notification ( data, "danger", 2500 );
                                  return;
                                }
                              }
                            })
                          }
                        </script>
                        <p style="font-size:14px; white-space:inherit;">
                          Yes
                          <a id="submit_cv" onclick="submit_cv();" style="font-size:12px; margin-left:5px;" title="Click to submit your CV directly to the Startup">Submit Your CV</a>
                        </p>
                      <?php } ?>
                      
                      <?php 
                    } else { ?>
                      <p style="font-size:14px; white-space: inherit;">
                        No
                      </p>
                      <?php
                    } // Startup is hiring END ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Contact Tab Content -->
          <div class="profile-tab-content contact-tab-content" id="startup-contact-tab" style="display:none;">
            <div class="disp-flex">
              <div class="left-side-wrap">
                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>Address</span>
                  </div>
                  <div class="tab-para-wrap">
                    <p><?php echo $startup->get_address ( $connection, $startup_id ); ?></p>
                  </div>
                </div>
                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>Contact Number</span>
                  </div>
                  <div class="tab-para-wrap">
                    <p><?php echo $startup->get_contact_number ( $connection, $startup_id ); ?></p>
                  </div>
                </div>
                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>State</span>
                  </div>
                  <div class="tab-para-wrap">
                    <p><?php echo $startup->get_state ( $connection, $startup_id ); ?></p>
                  </div>
                </div>
                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>City</span>
                  </div>
                  <div class="tab-para-wrap">
                    <p><?php echo $startup->get_city ( $connection, $startup_id ); ?></p>
                  </div>
                </div>
                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>Pincode</span>
                  </div>
                  <div class="tab-para-wrap">
                    <p><?php echo $startup->get_pincode ( $connection, $startup_id ); ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } else if ( $profileToShow == "incubation" ) { ?>
      
      <?php
        // Default IC Profile Picture Source
        $incubcation_center_profile_picture_source = $incubation->get_profile_pic_id ( $connection, $incubcation_center_id );

        // Default profile picture
        if ( $incubcation_center_profile_picture_source == "" || is_null($incubcation_center_profile_picture_source) ) {
          $incubcation_center_profile_picture_source = "./images/default_startup_icon_dark.png";
        }
        // Custom profile picture
        else {
          $incubcation_center_profile_picture_source = "./files/profile_pictures/" . $incubcation_center_profile_picture_source;
        }
      ?>
      <!-- Profile Picture, Name, Description, Link -->
      <div class="profile-header-wrap">
        <div class="profile-header">
          <div class="profile-header-content-splitter disp-flex">
            <div class="profile-picture-wrap">
              <div class="profile-picture vert-center">
                <img src="<?php echo $incubcation_center_profile_picture_source; ?>" width="150" height="150" alt="Profile Picture">
              </div>
            </div>
            <div class="profile-name-desc-wrap">
              <div class="profile-name">
                <h2><?php echo $incubation->get_name ( $connection, $incubcation_center_id ); ?></h2>
              </div>
              <div class="profile-desc">
                <p><?php echo $incubation->get_description ( $connection, $incubcation_center_id ); ?></p>
                <!-- <p>Profile Description. Pasture he invited mr company shyness. But when shot real her. Chamber her observe visited removal six sending himself boy.</p> -->
              </div>
              <div class="profile-link">
                <a href="https://<?php echo $incubation->get_link ( $connection, $incubcation_center_id ); ?>" target="_blank"><?php echo $incubation->get_link ( $connection, $incubcation_center_id ); ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Profile Tabs -->
      <div class="profile-tabs-wrap">
        <div class="profile-tabs incubation-profile-tabs disp-flex">
          <div class="tab about-tab active" title="About" onclick="activate_tab('about-tab', 'incubation-profile-tabs', 'incubation-about-tab')">
            <div class="tab-content disp-flex">
              <div class="tab-icon-wrap">
                <svg class="vert-center" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  width="20px" height="20px" viewBox="0 0 512 512" xml:space="preserve">
                  <g>
                    <path d="M256,48C141.1,48,48,141.1,48,256c0,114.9,93.1,208,208,208c114.9,0,208-93.1,208-208C464,141.1,370.9,48,256,48z
                      M260.3,366c-9.4,0-17-7.5-17-16.9c0-9.3,7.6-16.8,17-16.8c9.4,0,17,7.5,17,16.8C277.3,358.5,269.7,366,260.3,366z M294.1,250.7
                      c-22.8,22.5-22.2,27.4-23.3,53.3h-19c1.1-28.5,7.5-43.7,30.1-64.5c11-10.3,19.4-22.7,19.4-38.1c0-23.6-19.4-39.9-42.6-39.9
                      c-32.4,0-48.5,16.4-47.9,46.4H192c0.3-42,24.4-62.1,67.6-62.1c33,0,60.4,20.4,60.4,54.6C320,222.3,309.3,236.6,294.1,250.7z"/>
                  </g>
                </svg>
              </div>
              <div class="tab-name-wrap">
                <span class="vert-center">About</span>
              </div>
            </div>
          </div>
          <div class="tab startups-tab" title="Startups Incubated" onclick="activate_tab('startups-tab', 'incubation-profile-tabs', 'incubation-startup-tab')">
            <div class="tab-content disp-flex">
              <div class="tab-icon-wrap">
                <svg class="vert-center" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  width="20px" height="20px" viewBox="0 0 512 512" xml:space="preserve">
                  <g>
                    <path d="M393.267,238.088l-0.231,10.404c-0.814,11.65-3.797,31.912-14.102,54.736c3.251-15.208,4.978-30.982,4.978-47.164
                      c0-12.096-0.958-23.968-2.799-35.544c-15.091-94.901-89.626-169.923-184.138-185.518C185.706,32.285,179.048,32,179.048,32
                      c0.238,0.281,0.465,0.562,0.7,0.844c39.458,47.181,44.1,96.656,37.744,131.85c-2.281,12.629-5.978,23.421-9.991,31.605
                      c0,0,3.359-13.911,3.035-29.72c-0.293-14.234-3.572-30.006-14.986-38.552c3.497,18.378-0.752,33.501-9.121,47.729
                      C161.69,217.808,101,249.386,96,327.408v3.836c0,53.692,25.624,98.979,68.719,125.012c-6.85-12.344-14.964-35.207-8.733-60.151
                      c3.998,23.669,9.951,36.045,20.879,51.756c8.153,11.721,19.104,19.269,33.095,24.934S238.995,480,255.889,480
                      c55.809,0,105.228-28.567,133.845-71.952l0.267,0.061v-0.007c16-25.254,26.1-55.5,26.1-88.019
                      C416.1,290.112,407.596,262.071,393.267,238.088z"/>
                  </g>
                </svg>
              </div>
              <div class="tab-name-wrap">
                <span class="vert-center">Startups</span>
              </div>
            </div>
          </div>
          <div class="tab contact-tab" title="Address &amp; Contact Details" onclick="activate_tab('contact-tab', 'incubation-profile-tabs', 'incubation-contact-tab')">
            <div class="tab-content disp-flex">
              <div class="tab-icon-wrap">
                <svg class="vert-center" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  width="20px" height="20px" viewBox="0 0 512 512" xml:space="preserve">
                  <g>
                    <polygon points="256,320 192,320 192,256 320,128 64,128 64,432 384,432 384,192 	"/>
                    <polygon points="387.927,91.74 208,271.651 208,304 240.216,304 420.261,124.016 	"/>
                    <path d="M444.213,80.312l-12.465-12.466C429.084,65.467,425.556,64,421.746,64c-3.812,0-7.304,1.468-9.929,3.85L399.666,80
                      l0.08,0.08l11.293,11.293l21.02,21.02l12.15-12.15c2.383-2.625,3.791-6.117,3.791-9.929C448,86.504,446.592,82.975,444.213,80.312z
                      "/>
                  </g>
                </svg>
              </div>
              <div class="tab-name-wrap">
                <span class="vert-center">Contact</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Profile Tab Content -->
      <div class="startup-profile-tab-content-wrap profile-tab-content-wrap">
        <div class="startup-profile-tab-content">
          <!-- About Tab Content -->
          <div class="profile-tab-content incubation-tab-content" id="incubation-about-tab">
            <div class="disp-flex">
              <div class="left-side-wrap">
                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>Our Story</span>
                  </div>
                  <div class="tab-para-wrap">
                    <p><?php echo $incubation->get_story ( $connection, $incubcation_center_id ); ?></p>
                    <!-- <p>
                      This is the startup story. Far quitting dwelling graceful the likewise received building. An fact so to that show am shed sold cold. 
                      <br><br>Unaffected remarkably get yet introduced excellence terminated led. Result either design saw she esteem and. On ashamed no inhabit ferrars it ye besides resolve. Own judgment directly few trifling. <br><br>Elderly as pursuit at regular do parlors. Rank what has into fond she. Unwilling sportsmen he in questions september therefore described so. Attacks may set few believe moments was. Reasonably how possession shy way introduced age inquietude. Missed he engage no exeter of. Still tried means we aware order among on. <br><br>Eldest father can design tastes did joy settle. Roused future he ye an marked. Arose mr rapid in so vexed words. Gay welcome led add lasting chiefly say looking.</p> -->
                  </div>
                </div>
              </div>
              <div class="right-side-wrap">
                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>Registration Number</span>
                  </div>
                  <div class="tab-para-wrap">
                    <!-- <p>123-654-789-01</p> -->
                    <p><?php echo $incubation->get_reg_no ( $connection, $incubcation_center_id ); ?></p>
                  </div>
                </div>

                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>Contact Number</span>
                  </div>
                  <div class="tab-para-wrap">
                    <!-- <p>0831-2442255</p> -->
                    <p><?php echo $incubation->get_contact_number ( $connection, $incubcation_center_id ); ?></p>
                  </div>
                </div>

                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>Social</span>
                  </div>
                  <div class="tab-para-wrap">
                    <div class="disp-flex">
                      <a class="social-icon-wrap" title="LinkedIn" href="https://www.linkedin.com/in/<?php echo $incubation->get_linkedin ( $connection, $incubcation_center_id ); ?>/" target="_blank">
                        <svg version="1.1" class="social-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="20px" height="20px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                          <g>
                            <path d="M417.2,64H96.8C79.3,64,64,76.6,64,93.9v321.1c0,17.4,15.3,32.9,32.8,32.9h320.3c17.6,0,30.8-15.6,30.8-32.9V93.9
                              C448,76.6,434.7,64,417.2,64z M183,384h-55V213h55V384z M157.4,187H157c-17.6,0-29-13.1-29-29.5c0-16.7,11.7-29.5,29.7-29.5
                              c18,0,29,12.7,29.4,29.5C187.1,173.9,175.7,187,157.4,187z M384,384h-55v-93.5c0-22.4-8-37.7-27.9-37.7
                              c-15.2,0-24.2,10.3-28.2,20.3c-1.5,3.6-1.9,8.5-1.9,13.5V384h-55V213h55v23.8c8-11.4,20.5-27.8,49.6-27.8
                              c36.1,0,63.4,23.8,63.4,75.1V384z"/>
                          </g>
                        </svg>
                      </a>
                      <a class="social-icon-wrap" title="Twitter" href="https://www.twitter.com/<?php echo $incubation->get_twitter ( $connection, $incubcation_center_id ); ?>" target="_blank">
                        <svg version="1.1" class="social-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="20px" height="20px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                          <path d="M492,109.5c-17.4,7.7-36,12.9-55.6,15.3c20-12,35.4-31,42.6-53.6c-18.7,11.1-39.4,19.2-61.5,23.5
                          C399.8,75.8,374.6,64,346.8,64c-53.5,0-96.8,43.4-96.8,96.9c0,7.6,0.8,15,2.5,22.1c-80.5-4-151.9-42.6-199.6-101.3
                          c-8.3,14.3-13.1,31-13.1,48.7c0,33.6,17.2,63.3,43.2,80.7C67,210.7,52,206.3,39,199c0,0.4,0,0.8,0,1.2c0,47,33.4,86.1,77.7,95
                          c-8.1,2.2-16.7,3.4-25.5,3.4c-6.2,0-12.3-0.6-18.2-1.8c12.3,38.5,48.1,66.5,90.5,67.3c-33.1,26-74.9,41.5-120.3,41.5
                          c-7.8,0-15.5-0.5-23.1-1.4C62.8,432,113.7,448,168.3,448C346.6,448,444,300.3,444,172.2c0-4.2-0.1-8.4-0.3-12.5
                          C462.6,146,479,129,492,109.5z"/>
                        </svg>
                      </a>
                      <a class="social-icon-wrap" title="Facebook" href="https://www.facebook.com/<?php echo $incubation->get_facebook ( $connection, $incubcation_center_id ); ?>" target="_blank">
                        <svg version="1.1" class="social-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="20px" height="20px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                          <path d="M288,192v-38.1c0-17.2,3.8-25.9,30.5-25.9H352V64h-55.9c-68.5,0-91.1,31.4-91.1,85.3V192h-45v64h45v192h83V256h56.4l7.6-64
	                        H288z"/>
                        </svg>
                      </a>
                      <a class="social-icon-wrap" title="Instagram" href="https://www.instagram.com/<?php echo $incubation->get_instagram ( $connection, $incubcation_center_id ); ?>" target="_blank">
                        <svg version="1.1" class="social-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="20px" height="20px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                          <g>
                            <circle cx="256" cy="255.833" r="80"/>
                          </g>
                          <g>
                            <path d="M177.805,176.887c21.154-21.154,49.279-32.929,79.195-32.929s58.041,11.837,79.195,32.991
                              c13.422,13.422,23.011,29.551,28.232,47.551H448.5v-113c0-26.51-20.49-47-47-47h-288c-26.51,0-49,20.49-49,47v113h85.072
                              C154.794,206.5,164.383,190.309,177.805,176.887z M416.5,147.7c0,7.069-5.73,12.8-12.8,12.8h-38.4c-7.069,0-12.8-5.73-12.8-12.8
                              v-38.4c0-7.069,5.73-12.8,12.8-12.8h38.4c7.069,0,12.8,5.73,12.8,12.8V147.7z"/>
                            <path d="M336.195,335.279c-21.154,21.154-49.279,32.679-79.195,32.679s-58.041-11.462-79.195-32.616
                              c-21.115-21.115-32.759-49.842-32.803-78.842H64.5v143c0,26.51,22.49,49,49,49h288c26.51,0,47-22.49,47-49v-143h-79.502
                              C368.955,285.5,357.311,314.164,336.195,335.279z"/>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Startups Tab Content -->
          <div class="profile-tab-content incubation-tab-content" id="incubation-startup-tab" style="display:none; margin-bottom: 25em;">
            <div class="disp-flex">
              <div class="left-side-wrap" style="width:100%;">
                <!-- If no startups have been incubated -->
                <?php if ( $incubation->count_number_of_startups_incubated($connection, $incubcation_center_id) == 0 ) { ?>
                <div class="tab-block-wrap">
                  <div class="no-startups-incubated" style="fill: #ddd; color: #8e8e8e;">
                    <div>
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        width="125px" height="125px" viewBox="0 0 512 512" style="display:block;margin:auto;" xml:space="preserve">
                        <path d="M383.1,257.4c0.6-5.4,0.9-10,0.9-13.8c0-19.6-3.3-19.7-16-19.7h-75.5c7.3-12,11.5-24.4,11.5-37c0-37.9-57.3-56.4-57.3-88
                          c0-11.7,5.1-21.3,9.3-34.9c-26.5,7-47.4,33.5-47.4,61.6c0,48.3,56.3,48.7,56.3,84.8c0,4.5-1.4,8.5-2.1,13.5h-55.9
                          c0.8-3,1.3-6.2,1.3-9.3c0-22.8-39.1-33.9-39.1-52.8c0-7,1-12.8,3.2-21c-12.9,5.1-28.3,20-28.3,36.8c0,26.7,31.9,29.3,36.8,46.3H80
                          c-12.7,0-16,0.1-16,19.7c0,19.6,7.7,61.3,28.3,111c20.6,49.7,44.4,71.6,61.2,86.2l0.1-0.2c5.1,4.6,11.8,7.3,19.2,7.3h102.4
                          c7.4,0,14.1-2.7,19.2-7.3l0.1,0.2c9-7.8,20-17.8,31.4-32.9c4.7,2,9.8,3.7,15.4,5c8.4,2,16.8,3,24.8,3c24,0,45.6-9.2,60.8-25.8
                          c13.4-14.6,21.1-34.4,21.1-54.2C448,297,420,264.5,383.1,257.4z M366.1,384.2c-8.6,0-15.6-1.2-22.1-4.2c4-8,7.9-15.9,11.7-25.1
                          c10.1-24.4,17.1-47,21.6-65.8c22,4.3,38.7,23.8,38.7,47.1C416,358.9,398.8,384.2,366.1,384.2z"/>
                      </svg>
                    </div>
                    <div style="color: dimgrey; text-align: center;">
                      <h2>No Content Here</h2>
                    </div>
                    <div style="text-align: center;">
                      <p>No Startups have been incubated yet.</p>
                    </div>
                  </div>
                </div>
                <?php } else { ?>
                <div class="tab-block-wrap startup-investors-wrap">
                  <div class="tab-title-wrap" style="margin-bottom: 2em;">
                    <span>Startups Incubated</span>
                  </div>
                  <div class="tab-grid-wrap">
                    <?php 
                    $query_to_get_startups_incubated = mysqli_query (
                      $connection, " SELECT startup_id FROM startups_info WHERE startup_incubation_center_id = '$incubcation_center_id' "
                    );

                    // Query ran properly
                    if ( $query_to_get_startups_incubated ) {

                      // Fetching startups incubated one by one
                      while ( $startup_incubated = mysqli_fetch_assoc($query_to_get_startups_incubated) ) {

                        // Default Startup Profile Picture Source
                        $incubated_startup_profile_picture_source = $startup->get_profile_pic_id ( $connection, $startup_incubated['startup_id'] );

                        // Default profile picture
                        if ( $incubated_startup_profile_picture_source == "" || is_null($incubcation_center_profile_picture_source) ) {
                          $incubated_startup_profile_picture_source = "./images/default_startup_icon_dark.png";
                        }
                        // Custom profile picture
                        else {
                          $incubated_startup_profile_picture_source = "./files/profile_pictures/" . $startup->get_profile_pic_id ( $connection, $startup_incubated['startup_id'] );
                        }

                        ?>
                        <a class="grid-item" href="./view?sid=<?php echo $startup_incubated['startup_id']; ?>">
                          <div class="image-wrap">
                            <img style="border-radius: 100px;" src="<?php echo $incubated_startup_profile_picture_source; ?>" width="64" height="64" alt="User Profile Picture">
                          </div>
                          <div class="tab-text-wrap">
                            <span><?php echo $startup->get_name ( $connection, $startup_incubated['startup_id'] ) ?></span>
                          </div>
                        </a>
                        <?php
                      } // Fetching startups incubated one by one END
                    } // Query ran properly END ?>
                  </div>
                </div>
                <?php } // Count of number of startups incubated END ?>
              </div>
            </div>
          </div>

          <!-- Contact Tab Content -->
          <div class="profile-tab-content incubation-tab-content" id="incubation-contact-tab" style="display:none;">
            <div class="disp-flex">
              <div class="left-side-wrap">
                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>Address</span>
                  </div>
                  <div class="tab-para-wrap">
                    <!-- <p>House No. 1590, Ramteerth Nagar 2nd Cross, Kanabargi Road.</p> -->
                    <p><?php echo $incubation->get_address ( $connection, $incubcation_center_id ); ?></p>
                  </div>
                </div>
                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>Contact Number</span>
                  </div>
                  <div class="tab-para-wrap">
                    <p><?php echo $incubation->get_contact_number ( $connection, $incubcation_center_id ); ?></p>
                  </div>
                </div>
                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>State</span>
                  </div>
                  <div class="tab-para-wrap">
                    <p><?php echo $incubation->get_state ( $connection, $incubcation_center_id ); ?></p>
                  </div>
                </div>
                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>City</span>
                  </div>
                  <div class="tab-para-wrap">
                    <p><?php echo $incubation->get_city ( $connection, $incubcation_center_id ); ?></p>
                  </div>
                </div>
                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>Pincode</span>
                  </div>
                  <div class="tab-para-wrap">
                    <p><?php echo $incubation->get_pincode ( $connection, $incubcation_center_id ); ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } else if ( $profileToShow == "user" ) { ?>
      
      <?php
      // Default User Profile Picture Source
      $user_profile_picture_source = $user->get_profile_picture_id ( $connection, $user_id );

      // Default profile picture
      if ( $user_profile_picture_source == "" || is_null($user_profile_picture_source) ) {
        $user_profile_picture_source = "./images/default_startup_icon_dark.png";
      }
      // Custom profile picture
      else {
        $user_profile_picture_source = "./files/profile_pictures/" . $user_profile_picture_source;
      }
    ?>
      <!-- Profile Picture, Name, Description, Link -->
      <div class="profile-header-wrap">
        <div class="profile-header">
          <div class="profile-header-content-splitter disp-flex">
            <div class="profile-picture-wrap">
              <div class="profile-picture vert-center">
                <img src="<?php echo $user_profile_picture_source; ?>" width="150" height="150">
              </div>
            </div>
            <div class="profile-name-desc-wrap">
              <div class="profile-name">
                <h2><?php echo $user->get_name ( $connection, $user_id ); ?></h2>
              </div>
              <div class="profile-desc">
                <p style="white-space: pre-line;"><?php echo $user->get_profile_description ( $connection, $user_id ); ?></p>
              </div>
              <div class="profile-link">
                <a href="https://<?php echo $user->get_user_link ( $connection, $user_id ); ?>" target="_blank"><?php echo $user->get_user_link ( $connection, $user_id ); ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Profile Tab Content -->
      <div class="user-profile-tab-content-wrap profile-tab-content-wrap" style="margin-top:5em;">
        <div class="user-profile-tab-content">
          <div class="profile-tab-content user-tab-content">
            <div class="disp-flex">
              <div class="left-side-wrap">
                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>My Story</span>
                  </div>
                  <div class="tab-para-wrap">
                    <!-- <p>
                      This is the startup story. Far quitting dwelling graceful the likewise received building. An fact so to that show am shed sold cold. 
                      <br><br>Unaffected remarkably get yet introduced excellence terminated led. Result either design saw she esteem and. On ashamed no inhabit ferrars it ye besides resolve. Own judgment directly few trifling. <br><br>Elderly as pursuit at regular do parlors. Rank what has into fond she. Unwilling sportsmen he in questions september therefore described so. Attacks may set few believe moments was. Reasonably how possession shy way introduced age inquietude. Missed he engage no exeter of. Still tried means we aware order among on. <br><br>Eldest father can design tastes did joy settle. Roused future he ye an marked. Arose mr rapid in so vexed words. Gay welcome led add lasting chiefly say looking.</p> -->
                    <p><?php echo $user->get_user_bio ( $connection, $user_id ); ?></p>
                  </div>
                </div>
              </div>
              <div class="right-side-wrap">
                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>Am I Investor?</span>
                  </div>
                  <div class="tab-para-wrap">
                    <?php if ( $user->check_if_investor($connection, $user_id) ) { ?>
                      <p>Yes</p>
                    <?php } else { ?>
                      <p>No</p>
                    <?php } ?>
                  </div>
                </div>
                
                <?php if ( $user->check_if_user_has_startup($connection, $user_id) ) { ?>
                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>My Startup</span>
                  </div>
                  <div class="tab-para-wrap">
                    <a href="./view?sid=<?php echo $user->get_user_startup_id ( $connection, $user_id ); ?>"><?php echo $startup->get_name ( $connection, $user->get_user_startup_id($connection, $user_id) ); ?></a>
                  </div>
                </div>
                <?php } ?>

                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>Email ID</span>
                  </div>
                  <div class="tab-para-wrap">
                    <p><?php echo $user->get_user_email_id ( $connection, $user_id ); ?></p>
                  </div>
                </div>

                <div class="tab-block-wrap">
                  <div class="tab-title-wrap">
                    <span>Social</span>
                  </div>
                  <div class="tab-para-wrap">
                    <div class="disp-flex">
                      <a class="social-icon-wrap" title="LinkedIn" href="https://www.linkedin.com/in/<?php echo $user->get_user_linkedin ( $connection, $user_id ); ?>" target="_blank">
                        <svg version="1.1" class="social-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="20px" height="20px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                          <g>
                            <path d="M417.2,64H96.8C79.3,64,64,76.6,64,93.9v321.1c0,17.4,15.3,32.9,32.8,32.9h320.3c17.6,0,30.8-15.6,30.8-32.9V93.9
                              C448,76.6,434.7,64,417.2,64z M183,384h-55V213h55V384z M157.4,187H157c-17.6,0-29-13.1-29-29.5c0-16.7,11.7-29.5,29.7-29.5
                              c18,0,29,12.7,29.4,29.5C187.1,173.9,175.7,187,157.4,187z M384,384h-55v-93.5c0-22.4-8-37.7-27.9-37.7
                              c-15.2,0-24.2,10.3-28.2,20.3c-1.5,3.6-1.9,8.5-1.9,13.5V384h-55V213h55v23.8c8-11.4,20.5-27.8,49.6-27.8
                              c36.1,0,63.4,23.8,63.4,75.1V384z"/>
                          </g>
                        </svg>
                      </a>
                      <a class="social-icon-wrap" title="Twitter" href="https://www.twitter.com/<?php echo $user->get_user_twitter ( $connection, $user_id ); ?>" target="_blank">
                        <svg version="1.1" class="social-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="20px" height="20px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                          <path d="M492,109.5c-17.4,7.7-36,12.9-55.6,15.3c20-12,35.4-31,42.6-53.6c-18.7,11.1-39.4,19.2-61.5,23.5
                          C399.8,75.8,374.6,64,346.8,64c-53.5,0-96.8,43.4-96.8,96.9c0,7.6,0.8,15,2.5,22.1c-80.5-4-151.9-42.6-199.6-101.3
                          c-8.3,14.3-13.1,31-13.1,48.7c0,33.6,17.2,63.3,43.2,80.7C67,210.7,52,206.3,39,199c0,0.4,0,0.8,0,1.2c0,47,33.4,86.1,77.7,95
                          c-8.1,2.2-16.7,3.4-25.5,3.4c-6.2,0-12.3-0.6-18.2-1.8c12.3,38.5,48.1,66.5,90.5,67.3c-33.1,26-74.9,41.5-120.3,41.5
                          c-7.8,0-15.5-0.5-23.1-1.4C62.8,432,113.7,448,168.3,448C346.6,448,444,300.3,444,172.2c0-4.2-0.1-8.4-0.3-12.5
                          C462.6,146,479,129,492,109.5z"/>
                        </svg>
                      </a>
                      <a class="social-icon-wrap" title="Facebook" href="https://www.facebook.com/<?php echo $user->get_user_facebook ( $connection, $user_id ); ?>" target="_blank">
                        <svg version="1.1" class="social-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="20px" height="20px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                          <path d="M288,192v-38.1c0-17.2,3.8-25.9,30.5-25.9H352V64h-55.9c-68.5,0-91.1,31.4-91.1,85.3V192h-45v64h45v192h83V256h56.4l7.6-64
	                        H288z"/>
                        </svg>
                      </a>
                      <a class="social-icon-wrap" title="Instagram" href="https://www.instagram.com/<?php echo $user->get_user_instagram ( $connection, $user_id ); ?>" target="_blank">
                        <svg version="1.1" class="social-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="20px" height="20px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                          <g>
                            <circle cx="256" cy="255.833" r="80"/>
                          </g>
                          <g>
                            <path d="M177.805,176.887c21.154-21.154,49.279-32.929,79.195-32.929s58.041,11.837,79.195,32.991
                              c13.422,13.422,23.011,29.551,28.232,47.551H448.5v-113c0-26.51-20.49-47-47-47h-288c-26.51,0-49,20.49-49,47v113h85.072
                              C154.794,206.5,164.383,190.309,177.805,176.887z M416.5,147.7c0,7.069-5.73,12.8-12.8,12.8h-38.4c-7.069,0-12.8-5.73-12.8-12.8
                              v-38.4c0-7.069,5.73-12.8,12.8-12.8h38.4c7.069,0,12.8,5.73,12.8,12.8V147.7z"/>
                            <path d="M336.195,335.279c-21.154,21.154-49.279,32.679-79.195,32.679s-58.041-11.462-79.195-32.616
                              c-21.115-21.115-32.759-49.842-32.803-78.842H64.5v143c0,26.51,22.49,49,49,49h288c26.51,0,47-22.49,47-49v-143h-79.502
                              C368.955,285.5,357.311,314.164,336.195,335.279z"/>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>

  <footer>
    <div class="creators-info">
      <span class="vert-center">Designed & Developed by CodeManiacs for SIH 2019</span>
    </div>
    <div class="footer-set-logo">
      <svg version="1.1" style="width: 110px; cursor:pointer;" onclick="document.location.href = './';" xmlns="http:www.w3.org/2000/svg" xmlns:xlink="http:www.w3.org/1999/xlink" viewBox="0 0 643.7 209.3" xml:space="preserve">
        <style type="text/css">
          .st00{fill:#a9a9a9;}
          .st01{fill:#9c9c9c;}
          .st02{fill:#9c9c9c;}
          .st03{fill:#9c9c9c;}
          .st04{fill:#9c9c9c;}
          .st05{fill:#9c9c9c;}
          .st06{fill:#9c9c9c;}
          .st07{fill:#9c9c9c;}
          .st08{fill:#9c9c9c;}
          .st09{fill:#ffffff;}
          .st010{fill:#a9a9a9;}
          .st011{fill:#a9a9a9;}
          .st012{fill:#a9a9a9;}
        </style>
        <g>
          <path class="st00" d="M111.1,0.2c1,0.5,2.1,0.3,3.1,0.4c20.2,1.9,38.3,8.9,54.4,21.3c13.6,10.4,24,23.5,31.2,39
            c0.5,1.1,1,1.5,2.3,1.5c146.7,0,293.3,0,440,0c0.5,0,1,0,1.6,0c0.1,0.5-0.3,0.8-0.5,1.1c-19.4,27.6-38.7,55.2-58.1,82.9
            c-0.5,0.8-1.1,1.1-2,1.1c-127.1,0-254.1,0-381.2,0c-1.1,0-1.5,0.4-1.9,1.3c-14.3,29.7-37.3,48.9-69.1,57.6
            c-6.4,1.7-12.9,2.7-19.5,3.1c-0.5,0.2-0.9,0-1.4,0.1c-0.5,0-0.9,0-1.4,0c-0.6,0.1-1.2-0.1-1.7,0.1c-1.3,0-2.6,0-3.8,0
            c-0.6-0.3-1.1-0.1-1.7-0.1c-0.5,0-0.9,0-1.4,0c-0.5,0-0.9,0-1.4,0c-8.1,0-15.9-1.7-23.6-3.9c-10.4-3.1-20.1-7.7-29.1-13.8
            c-6.4-4.4-12.3-9.4-17.6-15.1c-7.6-8.1-13.8-17.2-18.5-27.3c-4.5-9.7-7.5-19.9-8.9-30.5c-0.3-2.4-0.2-4.8-0.6-7.1
            c0-0.2,0-0.3,0-0.5c0.3-0.5,0.1-1.1,0.1-1.7c-0.1-0.6,0.1-1.1-0.1-1.7c0-1.6,0-3.2,0-4.8c0.3-0.6,0.1-1.3,0.1-1.9
            c-0.1-0.7,0.1-1.4-0.1-2.1c0-0.2,0-0.5,0-0.7c0.3-1.7,0.2-3.5,0.4-5.2c0.7-6.1,1.9-12.1,3.6-18c1.9-6.3,4.3-12.3,7.3-18.1
            C15.3,49.7,19.8,43,25,36.8c8-9.3,17.3-17.1,27.9-23.1C64.2,7.3,76.1,3.1,88.9,1.1c3-0.5,6-0.7,9.1-0.8c0.2,0,0.5,0.1,0.7-0.1
            c0.5,0,1,0,1.4,0c0.6,0.2,1.3,0.2,1.9,0c1.9,0,3.8,0,5.8,0c0.6,0.2,1.3,0.2,1.9,0C110.2,0.2,110.6,0.2,111.1,0.2z"/>
          <path class="st01" d="M0.2,98.9c0.5,0.7,0.1,1.4,0.2,2.1c-0.1,0.1-0.1,0.1-0.2,0C0.2,100.3,0.2,99.6,0.2,98.9z"/>
          <path class="st02" d="M0.2,101c0.1,0,0.1,0,0.2,0c0,0.7,0.2,1.3-0.2,1.9C0.2,102.3,0.2,101.7,0.2,101z"/>
          <path class="st03" d="M109.7,0.2c-0.6,0.4-1.3,0.3-1.9,0C108.4,0.2,109,0.2,109.7,0.2z"/>
          <path class="st03" d="M102,0.2c-0.6,0.3-1.3,0.4-1.9,0C100.7,0.2,101.4,0.2,102,0.2z"/>
          <path class="st04" d="M0.2,107.8c0.4,0.5,0.2,1.1,0.2,1.7c-0.1,0.1-0.1,0.1-0.2,0C0.2,108.9,0.2,108.3,0.2,107.8z"/>
          <path class="st05" d="M0.2,109.4c0.1,0,0.1,0,0.2,0c-0.1,0.6,0.3,1.2-0.2,1.7C0.2,110.6,0.2,110,0.2,109.4z"/>
          <path class="st06" d="M101.3,209.3c0.6,0.1,1.2-0.2,1.7,0.2c-0.6,0-1.1,0-1.7,0C101.2,209.5,101.2,209.4,101.3,209.3
            C101.2,209.3,101.2,209.3,101.3,209.3z"/>
          <path class="st06" d="M106.8,209.5c0.5-0.5,1.1-0.2,1.7-0.2c0.1,0.1,0.1,0.1,0.1,0.2c0,0-0.1,0.1-0.1,0.1
            C107.9,209.5,107.4,209.5,106.8,209.5z"/>
          <path class="st07" d="M98.4,209.5c0-0.1,0-0.1,0-0.2c0.5,0,1,0,1.4,0c0.1,0,0.1,0.1,0.1,0.1c0,0.1-0.1,0.1-0.1,0.1
            C99.4,209.5,98.9,209.5,98.4,209.5z"/>
          <path class="st08" d="M99.8,209.5c0-0.1,0-0.1,0-0.2c0.5,0,1,0,1.4,0c0,0.1,0,0.1,0,0.2C100.8,209.5,100.3,209.5,99.8,209.5z"/>
          <path class="st08" d="M108.5,209.5c0-0.1,0-0.1,0-0.2c0.5,0,1,0,1.4,0c0.1,0.1,0.1,0.1,0.1,0.1c0,0-0.1,0.1-0.1,0.1
            C109.4,209.5,109,209.5,108.5,209.5z"/>
          <path class="st07" d="M109.9,209.5c0-0.1,0-0.1,0-0.2c0.5,0,1,0,1.4,0c0,0.1,0,0.1,0,0.2C110.9,209.5,110.4,209.5,109.9,209.5z"/>
          <path class="st09" d="M197.8,105c0,51.2-41.6,92.8-92.8,92.7c-51.3,0-92.8-41.6-92.7-92.9c0-51.1,41.6-92.6,92.8-92.6
            C156.2,12.3,197.8,53.8,197.8,105z"/>
          <path class="st09" d="M414.4,106.2c1.2,0.6,2.3,1.2,3.2,2c2.7,2.3,3.3,5.4,3.6,8.7c0.2,3.4,0,6.8,0.2,10.2c0.1,1.6,0.6,3.1,1.9,4.1
            c0.6,0.4,0.5,1,0.4,1.5c-0.1,0.5-0.7,0.3-1,0.3c-3.7,0-7.4,0-11,0c-0.8,0-1-0.3-1.2-0.9c-0.8-3-1.1-6-1-9.1c0-1.8,0-3.7-0.2-5.5
            c-0.4-4.1-2.1-6.1-6.3-6.2c-4.2-0.2-8.4,0-12.6-0.1c-0.9,0-0.7,0.6-0.7,1.1c0,5.5,0,11,0,16.6c0,1.1,0,2.2,0,3.4
            c0,0.6-0.1,0.9-0.8,0.9c-3.3,0-6.6,0-10,0c-0.6,0-0.8-0.2-0.7-0.8c0-0.2,0-0.4,0-0.6c0-17.8,0-35.5,0-53.3c0-1.1,0.3-1.3,1.4-1.3
            c8.8,0,17.5,0,26.3,0c4.3,0,8.4,0.8,11.8,3.8c6.5,5.7,7,16.9,1.1,22.7C417.5,104.8,416.1,105.5,414.4,106.2z"/>
          <path class="st09" d="M231.3,115.7c1.6,0,3.2,0,4.8,0c0.6,0,0.9,0.2,1,0.8c1,5.2,3.8,7.7,9.2,8.1c3.2,0.3,6.3,0.2,9.4-0.8
            c2.4-0.8,4.2-2.1,4.8-4.7c0.7-2.9-0.3-5-3-6.3c-2.8-1.4-5.9-2-8.9-2.6c-4.2-0.9-8.4-1.8-12.5-3.3c-6.7-2.5-9.6-7.2-9.6-14.3
            c0-7.5,5-14,12.3-16c6.9-1.9,13.8-2,20.5,0.9c5.6,2.4,9.3,6.4,10.5,12.6c0.7,3.5,0.7,3.5-2.9,3.5c-2.4,0-4.8,0-7.2,0
            c-0.5,0-0.8,0-0.9-0.6c-0.6-5.4-4.6-7.4-9.4-7.8c-2.6-0.2-5.3-0.2-7.8,0.9c-1.8,0.8-3.3,1.9-4,3.9c-1,2.9,0.2,5.5,3.1,6.7
            c2.4,1,5,1.5,7.5,2.2c4.7,1.2,9.5,2,14,3.6c5.4,2,8.9,5.6,9.5,11.5c0.9,8.7-3.1,15.6-11.4,18.5c-8.5,3-17.2,2.8-25.4-1.2
            c-5.9-2.8-9-7.8-9.5-14.4c-0.1-0.9,0.1-1.4,1.2-1.3C228.3,115.8,229.8,115.7,231.3,115.7z"/>
          <path class="st09" d="M526.3,96c0,5.9,0.1,11.8,0,17.8c0,2.7-0.4,5.3-1.2,7.9c-1.8,5.9-5.7,9.6-11.5,11.4
            c-6.2,1.9-12.5,1.9-18.8,0.2c-7.7-2.1-11.9-7.4-13-15.2c-0.4-2.5-0.5-5-0.5-7.5c0-10.8,0-21.5,0-32.3c0-1,0.2-1.3,1.2-1.3
            c3.2,0.1,6.4,0.1,9.6,0c1.1,0,1.2,0.3,1.2,1.3c0,11.1,0,22.2,0,33.4c0,2,0.2,3.9,0.6,5.8c0.9,3.9,3.3,6.1,7.2,6.7
            c2.1,0.3,4.2,0.3,6.3-0.1c3.3-0.7,5.4-2.8,6.3-6.1c0.5-2,0.7-4,0.7-6.1c0-11.2,0-22.5,0-33.7c0-0.9,0.2-1.2,1.2-1.2
            c3.2,0.1,6.4,0.1,9.6,0c1,0,1.3,0.2,1.3,1.2C526.3,84.2,526.3,90.1,526.3,96C526.3,96,526.3,96,526.3,96z"/>
          <path class="st09" d="M370.8,133c-4.1,0-8.1,0-12.1,0c-0.7,0-0.8-0.4-0.9-0.9c-1-3.2-2.1-6.4-3-9.6c-0.2-0.8-0.6-1-1.4-1
            c-6.2,0-12.3,0-18.5,0c-0.7,0-1,0.2-1.3,0.9c-1,3.2-2.1,6.4-3.2,9.7c-0.2,0.5-0.3,0.9-1,0.9c-3.8,0-7.6,0-11.4,0
            c-0.2-0.4,0-0.6,0.1-0.9c6.4-18,12.9-36.1,19.3-54.1c0.2-0.6,0.5-0.9,1.2-0.9c3.8,0,7.7,0,11.5,0c0.6,0,1,0.1,1.2,0.8
            c6.4,18.1,12.8,36.3,19.2,54.4C370.6,132.4,370.7,132.6,370.8,133z"/>
          <path class="st09" d="M537.6,105c0-8.9,0-17.8,0-26.8c0-0.9,0.2-1.2,1.2-1.2c8.1,0,16.2,0,24.2,0c2.8,0,5.6,0.6,8.1,1.8
            c5.5,2.5,8.1,7.1,8.7,13c0.3,2.8,0.2,5.7-0.3,8.5c-1.3,6.8-5.2,10.6-12.1,12c-2.4,0.5-4.9,0.6-7.4,0.6c-3.2,0.1-6.3,0.1-9.5,0
            c-0.9,0-1.2,0.2-1.2,1.2c0,5.8,0,11.7,0,17.5c0,1-0.1,1.4-1.3,1.3c-3.1-0.1-6.2-0.1-9.4,0c-0.9,0-1.1-0.2-1.1-1.1
            C537.6,122.9,537.6,113.9,537.6,105z"/>
          <path class="st09" d="M446.2,110c0-7.2,0-14.4,0-21.6c0-1-0.2-1.4-1.3-1.3c-4.8,0.1-9.5,0-14.3,0.1c-1.1,0-1.3-0.3-1.3-1.3
            c0.1-2.6,0.1-5.2,0-7.8c0-0.8,0.2-0.9,0.9-0.9c14.5,0,29,0,43.6,0c0.7,0,1,0.1,1,0.9c0,2.7-0.1,5.4,0,8.2c0,0.9-0.3,1-1.1,1
            c-4.8,0-9.7,0-14.5,0c-1,0-1.3,0.3-1.3,1.3c0,14.4,0,28.9,0,43.3c0,1.1-0.2,1.4-1.4,1.4c-3.2-0.1-6.3-0.1-9.5,0c-0.9,0-1-0.2-1-1.1
            C446.2,124.6,446.2,117.3,446.2,110z"/>
          <path class="st09" d="M292.3,109.9c0-7.2,0-14.5,0-21.7c0-1-0.3-1.2-1.2-1.2c-4.8,0-9.7,0-14.5,0c-0.9,0-1.2-0.2-1.1-1.1
            c0.1-2.7,0-5.4,0-8c0-0.7,0.2-0.9,0.9-0.9c14.6,0,29.1,0,43.7,0c0.8,0,0.9,0.2,0.9,0.9c0,2.7,0,5.4,0,8c0,0.9-0.3,1.1-1.1,1.1
            c-4.7,0-9.4,0-14.2,0c-1.8,0-1.6-0.2-1.6,1.5c0,14.4,0,28.7,0,43.1c0,1.1-0.3,1.4-1.4,1.3c-3.1-0.1-6.2-0.1-9.2,0
            c-1,0-1.3-0.2-1.3-1.2C292.3,124.5,292.3,117.2,292.3,109.9z"/>
          <path class="st010" d="M100.9,149.1c-0.5-0.2-0.7-0.7-1-1.1c-3.9-4.7-7.8-9.3-11.7-14c-0.5-0.6-0.7-1-0.1-1.8
            c4.7-6.8,5.5-14,1.8-21.4c-3.7-7.4-10-11.3-18.3-11.4c-5.6-0.1-11.1,0-16.7,0c-2.5,0-4.2,1.7-4.2,4.2c0,5.5,0,11,0,16.6
            c0.1,15.1,16,25.1,29.6,18.5c0.8-0.4,1.3-0.4,1.9,0.4c6,7.2,12,14.5,18.1,21.7c1.3,1.5,0.6,3.2,0.8,4.8c0,0.4-0.5,0.4-0.8,0.4
            c-10.9,1.2-20.1,5.8-27.6,13.8c-0.6,0.6-1,0.3-1.5,0.1c-6.9-3.1-13.3-7.1-19.1-12.1c-14.9-12.8-24.2-28.8-27.8-48.1
            c-7.9-43.2,20.2-85.2,63.3-94.5c43.9-9.6,87.2,18,97.4,61.9c8.7,37.7-10.7,76.8-46.1,92.9c-0.8,0.4-1.2,0.3-1.8-0.4
            c-7.4-7.7-16.4-12.2-27-13.4c-0.9-0.1-1.1-0.3-1.1-1.2c0-10.8,0-21.5,0-32.3c0-0.7,0.2-1.2,0.7-1.7c6.1-7.3,12.2-14.6,18.3-21.9
            c0.5-0.6,0.9-0.7,1.7-0.3c13,6.3,28.2-2.2,29.6-16.6c0.1-1.1,0.2-2.2,0.2-3.2c0-5,0-10.1,0-15.1c0-2.7-1.7-4.4-4.3-4.4
            c-5.6,0-11.3-0.2-16.9,0c-8.3,0.3-14.5,4.2-18.1,11.7c-3.6,7.3-2.7,14.5,1.9,21.2c0.3,0.4,0.8,0.7,0.2,1.4
            c-4.3,5.1-8.6,10.3-13,15.5c-0.3-0.4-0.2-0.9-0.2-1.3c-0.1-4,0.2-8.1-0.4-12.1c-0.9-6.1-3.3-11.5-7.1-16.3
            c-0.6-0.8-1.5-1.5-1.7-2.4c-0.2-0.9,1-1.6,1.5-2.4c4.2-6.9,4.8-14,1-21.1c-3.8-7.1-9.9-10.8-18-11c-5.6-0.1-11.1,0-16.7,0
            c-2.7,0-4.2,1.6-4.2,4.3c0,5.5-0.1,11,0,16.6c0.2,14.9,15.3,24.7,29,18.8c0.8-0.3,1.2-0.2,1.7,0.4c3,3.7,5.5,7.7,6.5,12.4
            c0.4,1.8,0.6,3.5,0.6,5.4c0,12.8,0,25.5,0,38.3C101,148.6,101.2,148.9,100.9,149.1z"/>
          <path class="st011" d="M129.6,183.1c-15.9,5.3-35.1,4.8-49.1,0C92.2,171.1,115.1,169.3,129.6,183.1z"/>
          <path class="st011" d="M143.9,76.9c2.2,0,4.3,0,6.5,0c0.6,0,1,0,1,0.8c-0.1,4.5,0.3,9-0.2,13.5c-0.8,7.9-8.7,13.2-16.3,10.9
            c-1.2-0.4-1.2-0.4-0.4-1.4c2.3-2.7,4.6-5.5,6.8-8.2c1.2-1.5,1.4-3.2,0.6-4.7c-0.8-1.4-2.3-2.1-4-1.9c-1.1,0.2-2,0.8-2.7,1.7
            c-2.2,2.7-4.5,5.4-6.7,8.1c-0.9,1-0.9,1-1.5-0.1c-4.1-8.1,1.4-17.9,10.4-18.6C139.6,76.9,141.8,77,143.9,76.9
            C143.9,77,143.9,76.9,143.9,76.9z"/>
          <path class="st011" d="M58.5,114.5c0-2.2,0-4.3,0-6.5c0-0.7,0.2-0.9,0.9-0.9c4,0,8-0.1,12,0c9.7,0.3,15.6,10,11.5,18.5
            c-0.6,1.3-0.6,1.3-1.5,0.2c-2.3-2.8-4.6-5.5-6.9-8.3c-1.1-1.3-2.5-1.8-4.2-1.4c-1.6,0.4-2.5,1.5-2.8,3.1c-0.2,1.3,0.3,2.4,1.1,3.4
            c2.3,2.7,4.5,5.5,6.8,8.2c0.6,0.7,0.7,1-0.3,1.3c-8,2.5-16.3-3.4-16.6-11.8C58.5,118.5,58.5,116.5,58.5,114.5
            C58.5,114.5,58.5,114.5,58.5,114.5z"/>
          <path class="st011" d="M79,60.2c2.5,0.2,5.6-0.3,8.6,0.5c7.9,2.2,11.7,11.6,7.6,18.7c-0.5,0.8-0.7,0.8-1.3,0.1
            c-2.2-2.9-4.4-5.7-6.6-8.6c-1-1.3-2.3-2-4-1.7c-3,0.5-4.3,3.8-2.4,6.3c2.2,2.9,4.4,5.9,6.7,8.7c0.7,0.8,0.4,1-0.5,1.3
            c-8,2-15.7-3.7-16.1-12c-0.2-4.2,0-8.3-0.1-12.5c0-0.7,0.3-0.9,0.9-0.8C74.2,60.2,76.3,60.2,79,60.2z"/>
          <path class="st012" d="M398.1,86.8c2.2,0.1,4.9-0.3,7.5,0.2c3.1,0.6,4.7,2.4,5.2,5.5c0.1,0.7,0.2,1.5,0.1,2.3
            c-0.2,4.7-2.4,6.8-7.6,6.9c-4.3,0.1-8.6,0.1-12.8,0.1c-0.7,0-0.9-0.2-0.9-0.9c0-4.4,0-8.7,0-13.1c0-0.8,0.2-1,1-1
            C393,86.8,395.3,86.8,398.1,86.8z"/>
          <path class="st012" d="M344.3,90c1,3.2,2,6.1,2.9,9c1.3,3.9,2.5,7.9,3.8,11.8c0.2,0.7,0.2,0.9-0.6,0.9c-4.1,0-8.2,0-12.4,0
            c-0.6,0-0.9,0-0.6-0.8C339.7,104.1,341.9,97.2,344.3,90z"/>
          <path class="st012" d="M549.3,95c0-2.4,0-4.8,0-7.2c0-0.7,0.1-1,0.9-1c3.6,0,7.1,0,10.7,0c5.2,0.1,7.9,3.5,7.4,9
            c-0.5,4.8-2.9,7.1-7.7,7.3c-3.5,0.1-6.9,0.1-10.4,0.1c-0.6,0-0.8-0.2-0.8-0.8C549.4,99.9,549.3,97.5,549.3,95z"/>
        </g>
      </svg>
    </div>
  </footer>
  
  <div class="page-modals">
    <?php include_once "./_includes/signin_signup_modal.php"; ?>
  </div>

  <div class="user-signed-in-hidden-agent"></div>

  <?php include_once "./_includes/all_page_include.php"; ?>

  <script src="./scripts/signin_and_signup.js"></script>
  <script src="./scripts/search.js"></script>
  <script>

    // Initiating and adding event listeners for signed in actions
    (function() {

      // User Signed In Action Elements
      var user_signed_in_hidden_agent = document.querySelector ( ".user-signed-in-hidden-agent" ),
          user_profile_picture = document.querySelector ( ".user-profile-pic-wrap > img" );
          user_signed_in_actions = document.querySelector ( ".user-signed-in-actions-wrap" );

      // When clicked on profile picture, showing signed in actions
      if ( user_profile_picture ) {
        user_profile_picture.onclick = function() {
          if ( user_signed_in_actions )
            user_signed_in_actions.style.display = "block";
            user_signed_in_hidden_agent.style.display = "block";
        };
      }
      
      // When clicked on hidden layer which is activated when signed in actions are shown
      if ( user_signed_in_hidden_agent ) {
        user_signed_in_hidden_agent.onclick = function () {
          user_signed_in_actions.style.display = "none";
          user_signed_in_hidden_agent.style.display = "none";
        }
      }
    })();
  </script>
</body>
</html>