<?php
include_once "connection.inc.php";
$sql="SELECT * FROM CATEGORIES";
$stid=ociparse($conn,$sql);
ociexecute($stid);