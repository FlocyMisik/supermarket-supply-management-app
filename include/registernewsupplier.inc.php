<?php

include_once "connection.inc.php";

$supplierid=$_POST['supplierid'] ??"";
$suppliername=$_POST['suppliername']??"";
$contactnumber=$_POST['contactnumber']??"";
$email=$_POST['email']??"";

$sql = "INSERT INTO SUPPLIER(supplier_id, supplier_name,contact_number,email_address) VALUES ('$supplierid','$suppliername','$contactnumber','$email')";
$stid = oci_parse($conn, $sql);
oci_execute($stid);

header("location:../supplier.php?registration=success");