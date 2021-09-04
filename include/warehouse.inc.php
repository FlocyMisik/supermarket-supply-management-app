<?php
include_once "connection.inc.php";
$sql="SELECT * FROM GOODS ";
$stid=ociparse($conn,$sql);
ociexecute($stid);
