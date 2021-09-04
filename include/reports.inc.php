<?php
include_once "connection.inc.php";
$sql="SELECT * FROM SALES WHERE SALES_DATE='01-AUG-21'";
$stid=ociparse($conn,$sql);
ociexecute($stid);

