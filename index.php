<?php
/**
 * Homepage
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

// Starting Session
session_start();

// SET Library
include_once "./libraries/set/set.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="CodeManiacs">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Startup Ecosystem Tracker - CodeManiacs</title>

  <link rel="icon" href="./images/favicon.jpg">
  <link rel="stylesheet" href="./styles/prix.css">
  <link rel="stylesheet" href="./styles/all-page.css">
  <link rel="stylesheet" href="./styles/index.css">
  
  <script src="./scripts/jquery.js"></script>
  <script src="./scripts/set.js"></script>

</head>
<body>
  
  <div class="header disp-flex">
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
        <?php } else { ?>
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
        <?php } // User has logged in end ?>
      </div>
    </div>
  </div>

  <div class="hero">
    <div class="hero-text-wrap vert-center">
      <div class="hero-content-wrap">
        <div class="hero-title-wrap">
          <h1>Startup Ecosystem Tracker</h1>
        </div>
        <div class="hero-brief-wrap">
          <p>Carriage quitting securing be appetite it declared. High eyes kept so busy feel call in. Would day nor ask walls known. But preserved advantage are but and certainty earnestly enjoyment. Passage weather as up am exposed. And natural related man subject. Eagerness get situation his was delighted. </p>
        </div>
      </div>
    </div>
  </div>

  <div class="startups">
    <div class="startups-grid-wrap">
      <?php 
      // Getting startups
      $query_to_get_startups = mysqli_query (
        $connection,
        " SELECT 
          startup_id 
        FROM 
          startups 
        LIMIT 
          8 "
      );

      // More than 8 startups have registered 
      // that means it is safe to display them on homepage
      if ( mysqli_num_rows($query_to_get_startups) >= 8 ) { 
        
        // Fetching startup one by one
        while ( $startup_data = mysqli_fetch_assoc($query_to_get_startups) ) {

          // Default profile picture
          if ( 
            $startup->get_profile_picture_id ( $connection, $startup['startup_id'] ) == "" || 
            is_null ( $startup->get_profile_picture_id($connection, $startup['startup_id']) )
          ) {
            $startup_profile_picture = "../../images/default_user_profile_picture.png";
          }
          // Custom profile picture
          else {
            $startup_profile_picture = "../../files/profile_pictures/" . $startup->get_profile_picture_id ( $connection, $startup['startup_id'] );
          }
          ?>
          <div class="a-startup">
            <div class="a-startup-content-wrap">
              <div class="a-startup-logo-wrap">
                <img src="./images/default_startup_icon.png" width="50" alt="">
              </div>
              <div class="a-startup-name-wrap">
                <span><?php echo $startup->get_name ( $connection, $startup['startup_id'] ); ?></span>
              </div>
              <div class="a-startup-desc-wrap">
                <span><?php echo $startup->get_vision ( $connection, $startup['startup_id'] ); ?></span>
              </div>
              <div class="a-startup-link-wrap">
                <a href="./view?sid=<?php echo $startup['startup_id']; ?>" target="_blank">View Profile</a>
              </div>
            </div>
          </div>
          <?php 
        } // Fetching startup one by one END
      // Show some dummy data
      } else { ?>
      <div class="a-startup">
        <div class="a-startup-content-wrap">
          <div class="a-startup-logo-wrap">
            <img src="./images/default_startup_icon.png" width="50" alt="">
          </div>
          <div class="a-startup-name-wrap">
            <span>Startup Name</span>
          </div>
          <div class="a-startup-desc-wrap">
            <span>Startup Mission. This is where two line startup mission goes.</span>
          </div>
          <div class="a-startup-link-wrap">
            <a href="">View Profile</a>
          </div>
        </div>
      </div>
      <div class="a-startup">
        <div class="a-startup-content-wrap">
          <div class="a-startup-logo-wrap">
            <img src="./images/default_startup_icon.png" width="50" alt="">
          </div>
          <div class="a-startup-name-wrap">
            <span>Startup Name</span>
          </div>
          <div class="a-startup-desc-wrap">
            <span>Startup Mission. This is where two line startup mission goes.</span>
          </div>
          <div class="a-startup-link-wrap">
            <a href="">View Profile</a>
          </div>
        </div>
      </div>
      <div class="a-startup">
        <div class="a-startup-content-wrap">
          <div class="a-startup-logo-wrap">
            <img src="./images/default_startup_icon.png" width="50" alt="">
          </div>
          <div class="a-startup-name-wrap">
            <span>Startup Name</span>
          </div>
          <div class="a-startup-desc-wrap">
            <span>Startup Mission. This is where two line startup mission goes.</span>
          </div>
          <div class="a-startup-link-wrap">
            <a href="">View Profile</a>
          </div>
        </div>
      </div>
      <div class="a-startup">
        <div class="a-startup-content-wrap">
          <div class="a-startup-logo-wrap">
            <img src="./images/default_startup_icon.png" width="50" alt="">
          </div>
          <div class="a-startup-name-wrap">
            <span>Startup Name</span>
          </div>
          <div class="a-startup-desc-wrap">
            <span>Startup Mission. This is where two line startup mission goes.</span>
          </div>
          <div class="a-startup-link-wrap">
            <a href="">View Profile</a>
          </div>
        </div>
      </div>
      <div class="a-startup">
        <div class="a-startup-content-wrap">
          <div class="a-startup-logo-wrap">
            <img src="./images/default_startup_icon.png" width="50" alt="">
          </div>
          <div class="a-startup-name-wrap">
            <span>Startup Name</span>
          </div>
          <div class="a-startup-desc-wrap">
            <span>Startup Mission. This is where two line startup mission goes.</span>
          </div>
          <div class="a-startup-link-wrap">
            <a href="">View Profile</a>
          </div>
        </div>
      </div>
      <div class="a-startup">
        <div class="a-startup-content-wrap">
          <div class="a-startup-logo-wrap">
            <img src="./images/default_startup_icon.png" width="50" alt="">
          </div>
          <div class="a-startup-name-wrap">
            <span>Startup Name</span>
          </div>
          <div class="a-startup-desc-wrap">
            <span>Startup Mission. This is where two line startup mission goes.</span>
          </div>
          <div class="a-startup-link-wrap">
            <a href="">View Profile</a>
          </div>
        </div>
      </div>
      <div class="a-startup">
        <div class="a-startup-content-wrap">
          <div class="a-startup-logo-wrap">
            <img src="./images/default_startup_icon.png" width="50" alt="">
          </div>
          <div class="a-startup-name-wrap">
            <span>Startup Name</span>
          </div>
          <div class="a-startup-desc-wrap">
            <span>Startup Mission. This is where two line startup mission goes.</span>
          </div>
          <div class="a-startup-link-wrap">
            <a href="">View Profile</a>
          </div>
        </div>
      </div>
      <div class="a-startup">
        <div class="a-startup-content-wrap">
          <div class="a-startup-logo-wrap">
            <img src="./images/default_startup_icon.png" width="50" alt="">
          </div>
          <div class="a-startup-name-wrap">
            <span>Startup Name</span>
          </div>
          <div class="a-startup-desc-wrap">
            <span>Startup Mission. This is where two line startup mission goes.</span>
          </div>
          <div class="a-startup-link-wrap">
            <a href="">View Profile</a>
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
  <script src="./scripts/home.js"></script>
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