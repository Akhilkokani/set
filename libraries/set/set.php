<?php
/**
 * Back-end library which will makes tasks easier.
 * Tasks such as checking if user has uploaded a custom profile picture or not,
 * adding new startup under a particular user, deleting a startup/incubation/entire account.
 * Totally, this library will help make system more efficient and robust.
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

spl_autoload_register ( function($class_name) {
  include $class_name . ".php";
});

// Establishing a connection to SET Database
// Establishing a connection to DIPP Database
$connection = mysqli_connect ( "localhost", "akhilkokani", "akhil@1234", "set" );
$dipp_connection = mysqli_connect ( "localhost", "akhilkokani", "akhil@1234", "dipp" );

// If there's an error while connecting to Database
// Stop entire system, and display message
if ( !$connection )
  die ( "Error while connecting to database." );

$utility = new utility();           // Utility Class Object
$user = new user();                 // User Class Object
$startup = new startup();           // Startup Class Object
$incubation = new incubation();     // Incubation Class Object