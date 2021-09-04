<?php

include_once "connection.inc.php";

$firstname = $_POST['firstname'] ?? "";
$secondname = $_POST['secondname'] ?? "";
$telephone = $_POST['telephone'];
$designation = $_POST['designation'];
//strtotime 
$dob = date('d-M-Y',strtotime($_POST['dob']));
$gender = $_POST['gender'];
$email = $_POST['email'];
$password1 = sha1($_POST['password1']);
$password2 = $_POST['password2'];
//check if values are empty
if (empty($firstname) || !empty($secondname) || !empty($telephone) || !empty($designation) || !empty($email) || !empty($password1) || !empty($password2)) {
    $sql = "INSERT INTO USERS(first_name, second_name, designation ,telephone, date_of_birth, email, gender, password) VALUES('$firstname','$secondname','$designation','$telephone','$dob','$email','$gender','$password1')";
    
    $stid = oci_parse($conn, $sql);
oci_execute($stid);
header("location:../index.php?signup=success");
}
else{
    echo "field cannot be empty";
}


