<?php
include_once"connection.inc.php";
//left join-outputs all data on the left table 
//and what matches on the right side table
$sql="SELECT GOOD_RETURN_NOTE.*, SUPPLIER.SUPPLIER_NAME FROM GOOD_RETURN_NOTE LEFT JOIN SUPPLIER ON GOOD_RETURN_NOTE.SUPPLIER_ID = SUPPLIER.SUPPLIER_ID";
$stid=ociparse($conn,$sql);
ociexecute($stid);