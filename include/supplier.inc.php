<?php
include_once "connection.inc.php";
$sql="SELECT * FROM SUPPLIER";
$stid=ociparse($conn,$sql);
ociexecute($stid);