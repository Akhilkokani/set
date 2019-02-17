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

$utility = new utility();           // Utility Class Object
$user = new user();                 // User Class Object
$startup = new startup();           // Startup Class Object
$incubation = new incubation();     // Incubation Class Object