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
    
    <title>Add local purchasing order</title>
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
<!-- loading the menu file -->
<?php
include_once "include/menu.inc.php";

?>

<form method="POST" action="include/addLPO.inc.php">

    <div class="container">
        <h2>NEW LPO</h2>

        <div class="container-1">
            <label for="Date Delivered">Valid To</label>
            <input type="date" class="form-1" id="validdate" name="validdate">

        </div>
    </div>
    
    <table class="tab" id="myTable">
        <tr>
            <th>Supplier Name</th>
            <th>Product Name</th>
            <th>Quantity</th>
        </tr>
        
        <tbody>
        <tr>
            <td id="supplier_div">
            <div class="container-1">
            <label for="supplier">SUPPLIER</label>
            <select name="supplier[]" id="supplier" class="form-1">
                <option value="">SELECT</option>
                <?php
                //returns an array that corresponds to the fetched row
                while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                    ?>
                
                    <option value="<?= $row['SUPPLIER_ID'] ?>"><?= $row['SUPPLIER_NAME'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
            </td><div class="container-1">
                    <input type="text" class="form-1" name="productname[]">
                </div>
            <td id="product_name_div">
                
            </td>

            <td id="quantity_div">
                <div class="container-1">
                    <input type="text" class="form-1" name="quantity[]">
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
        var cell1HTML = document.getElementById('supplier_div');
        var cell2HTML = document.getElementById('product_name_div');
        var cell3HTML=document.getElementById('quantity_div');
            // Find a <table> element with id="myTable":
        var table = document.getElementById("myTable");

//get the number of rows of the table and 
// so as to be able to know the index of the next row of the table
        var rowCount = table.rows.length;
        //Create an empty <tr> element and add it after the last row of the table:
        var row = table.insertRow(rowCount);
        //cells-<td>
        // Insert new cells (<td> elements) at the 1st, 2nd  and 3rd position of the "new" <tr> element:
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        // Add some html to the new cells:
        // innerHTML return the HTML content of an element

        //take the html that i got through get
        //element by id and set it to the new cell that i have just added.
        cell1.innerHTML = cell1HTML.innerHTML;
        cell2.innerHTML = cell2HTML.innerHTML;
        cell3.innerHTML = cell3HTML.innerHTML;
    }
</script>
</body>
</html>