<?php
include_once "include/connection.inc.php";
include_once "include/session.inc.php";

$sql = "SELECT * FROM SUPPLIER";
$stid=ociparse($conn,$sql);
ociexecute($stid);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Warehouse new stock</title>
    <link rel="stylesheet" href="home.css">
</head>

<style>
    * {
        margin: 0;
        padding: 0;
         /*allows us to include padding and border in an elements total width
        and height */
        box-sizing: border-box;
    }

    body {
        max-height: 50%;
        font-family: sans-serif;
        
    }

    .container {
        background-color: white;
        margin: auto;
        margin-top: 30px;
        margin-bottom: 50px;
        max-width: 90%;
        max-height: 50%;
        width: 500px;
        border: 1px solid black;
    }

    .container2 {
        background-color: white;
        margin: auto;
        margin-top: 30px;
        margin-bottom: 50px;
        max-width: 90%;
        max-height: 50%;
        width: 80%;
        text-align: center;
    }

    form {
        width: 100%;
        height: 70%;
        padding: 20px;
        background: white;
    }

    .container-1 {
        width: 100%;
        height: 70%;
        padding: 20px;
        background: white;
    }

    .container h2 {
        text-align: center;
        margin-bottom: 10px;
        color: #222;
        margin-top: 30px;
        text-transform: uppercase;
    }

    .container p {
        text-align: center;
        margin-bottom: 24px;
        color: #222;
    }

    .form-1 {
        width: 100%;
        height: 40px;
        background: white;
        border-radius: 4px;
        border: 1px, silver;
        margin: 10px 0 18px 0;
        padding: 0 10px;
        text-align: center;
        margin-bottom: 10px;


    }

    .container-1 .form-1 {
        width: 100%;
        height: 40px;
        background: white;
        border-radius: 4px;
        border: 1px, silver;
        margin: 10px 0 18px 0;
        padding: 0 10px;
        text-align: center;
        margin-bottom: 10px;


    }

    .btn {
        margin-left: 30%;
        width: 120px;
        height: 34px;
        border: none;
        background-color: #7ed6df;
        background-image: linear-gradient(315deg, #7ed6df 0%, #000000 100%);
        cursor: pointer;
        font-size: 16px;
        text-transform: uppercase;
        color: white;
        justify-content: center;
        align-items: center;


    }

    .tab {
        border-collapse: collapse;
        width: 90%;
        text-align: center;
        margin-left: 100px;
        margin-top: 30px;
    }

    .tab td, .tab th {
        border: 1px solid black;
    }
/* used to match child elements */
    .tab tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .tab tr:hover {
        background-color: #ddd;
    }

    .tab th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background: linear-gradient(315deg, #7ed6df 0%, #000000 100%);
        color: white;
        text-align: center;
    }
</style>
</head>
<body>

<?php
include_once "include/menu.inc.php";

?>

<form method="POST" action="include/addGRN.inc.php">
    <div class="container">
        <h2>NEW GRN</h2>
    
        <div class="container-1">
            <label for="Product ID">SUPPLIER</label>
            <select name="supplier" id="supplier" class="form-1" required>
                <option value="">SELECT</option>
                <?php
                //returns an array that corresponds to the fetched row or false 
                //OCI_BOTH-returns an array with both numeric and associative indexex
                //if there are no more rows
                //associative array is an array where each key has its own specific value
                while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                    ?>
                    <option value="<?= $row['SUPPLIER_ID'] ?>"><?= $row['SUPPLIER_NAME'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <table class="tab" id="myTable">
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Reason</th>
        </tr>
        <tbody>
        <tr>
            <td>
                <div class="container-1">
                    <input type="text" class="form-1" name="productname[]" >
                </div>
            </td>
            <td>
                <div class="container-1">
                    <input type="text" class="form-1" name="price[]" >
                </div>
            </td>
            <td>
                <div class="container-1">
                    <input type="text" class="form-1" name="quantity[]" >
                </div>
            </td>
            <td>
                <div class="container-1">
                    <input type="text" class="form-1" name="reason[]">
                </div>
            </td>
        </tr>
        </tbody>


    </table>
    <div class="container2">
        <button type="button" class="btn" onclick="myFunction()">ADD PRODUCT</button>
        <button type="submit" class="btn">SUBMIT</button>
    </div>
</form>
<script>
    function myFunction() {
        var cell1HTML = '<div class="container-1">' +
            '<input type="text" class="form-1" name="productname[]" required>' +
            '</div>';
        var cell2HTML = '<div class="container-1">' +
            '<input type="text" class="form-1" name="price[]" required>' +
            '</div>';
        var cell3HTML = '<div class="container-1">' +
            '<input type="text" class="form-1" name="quantity[]" required>' +
            '</div>';
        var cell4HTML = '<div class="container-1">' +
            '<input type="text" class="form-1" name="reason[]" required>' +
            '</div>';
            
            // Find a <table> element with id="myTable":
        var table = document.getElementById("myTable");
        //count the number of rows to get the next index of the next row in table
        var rowCount = table.rows.length;
         //Create an empty <tr> element and add it after the last row of the table:
        var row = table.insertRow(rowCount);
         // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
         // Add some text to the new cells:
//innerHTML returns HTML content of the element
        cell1.innerHTML = cell1HTML;
        cell2.innerHTML = cell2HTML;
        cell3.innerHTML = cell3HTML;
        cell4.innerHTML = cell4HTML;
    }
</script>
</body>
</html>