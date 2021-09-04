<?php
//connect to oracle database
$conn = oci_connect('flocy', 'flocy', 'localhost/ORCL00');
if (!$conn) {
    $e = oci_error();//returns the last error found
    //trigger error-error handling function
    //ent-quotes-encodes single and double quotes
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);

}