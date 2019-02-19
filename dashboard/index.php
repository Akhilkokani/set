<?php
/**
 * This page is just used to redirect user to specific page inside dashboard folder,
 * such as /dashboard/startup/ etc...
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */
session_start();
header ( "Location: ./startup/" );
die();