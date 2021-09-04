<?php

include_once "connection.inc.php";
$categoryname=$_POST['categoryname']??"";

$sql="INSERT INTO CATEGORIES(category_name) VALUES('$categoryname')";

$stid = oci_parse($conn, $sql);
oci_execute($stid);

header("location:../Category of goods.php?registration=success");