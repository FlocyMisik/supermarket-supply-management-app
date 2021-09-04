<?php
include_once "connection.inc.php";
session_start();
//check if one is logged in ,if else direct to sign in
//$_session used  to get session variable values
if (!(isset($_SESSION['user_id']) && $_SESSION['name'] != '')) {
    header("location:home.php");

} 








