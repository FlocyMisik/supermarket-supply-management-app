<?PHP
//start or resume a new session
session_start();
//destroys all information associated with the current session
session_destroy();

header("location:../index.php");
?>