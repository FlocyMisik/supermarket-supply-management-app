<?php
include_once "connection.inc.php";
//session stores information to be used across multiple pages
//Start new or resume existing session
session_start();

$email = $_POST['email'] ?? "";
$password = $_POST['password'] ?? "";


$sql = "select * from users where email='$email'";

$stid = oci_parse($conn, $sql);
//OCI_DEFAULT-Do not automatically commit changes. 
ociexecute($stid, OCI_DEFAULT);
//fetch from database
//return the next row from a query as an associative array
$row = oci_fetch_assoc($stid);

 oci_execute($stid);

if (!empty($row)) {
    //sha1(secure hash algorith ) takes  in the password and produces a value.
    if (sha1($password) == $row['PASSWORD']) {
        //assign details that one may need
        //$_SESSION-associative array that contains all session variable.
        $_SESSION['user_id'] = $row['ID'];
        $_SESSION['name'] = $row['FIRST_NAME'] . ' ' . $row['SECOND_NAME'];
        $_SESSION['designation'] =  $row['DESIGNATION'];
        header("location:../home.php?signup=success");
    } else {
        echo "invalid log in credentials";
    }

} else {
    echo "invalid log in credentials";
}

