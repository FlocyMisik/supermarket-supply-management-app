<?php
include_once "connection.inc.php";
$sql="SELECT * FROM SALES";
// prepares an oracle statement for execution
$stid=ociparse($conn,$sql);

ociexecute($stid);
