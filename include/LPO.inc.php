<?php
include_once "connection.inc.php";
$sql="SELECT * FROM local_purchasing_order" ;
$stid=ociparse($conn,$sql);
ociexecute($stid);
