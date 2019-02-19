<?php
/**
 * Sign out Action File
 *
 * Used to signout user from current session.
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

session_start();


session_destroy();        // Destroying Session
header("Location: ./");   // Redirecting user to homepage
die();                    // Ending Current Script