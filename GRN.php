<?php
include_once "include/session.inc.php";
include_once "include/GRN.inc.php";
$page="grn";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Good Return Note</title>
    <style>

    </style>
    <link href="home.css" rel="stylesheet">
    <style>
        .tab {
            border: 1px solid black;
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
            padding: 5px;
        }
/*matches eevery element that is the 
nth child regarless of type of its parent*/
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

        .btn {
            width: 120px;
            height: 34px;
            border: none;
            background-color: #7ed6df;
            background-image: linear-gradient(315deg, #7ed6df 0%, #000000 100%);
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
            color: white;
            
            align-items: center;
            padding: 2px;
            text-decoration: none;
        }

        .container2 {
            background-color: white;
            margin: auto;
            margin-top: 30px;
            margin-bottom: 50px;
            /*set the maximum width of an element */
            max-width: 90%;
            max-height: 50%;
            width: 80%;
            text-align: center;
        }

    </style>
</head>
<body>
    
<?php
include_once "include/menu.inc.php";

?>
    
    <table class="tab">
    <tr>
         <th>No:</th>
        <th>GRN NO</th>
        <th>DATE</th>
        <th>SUPPLIER</th>
        
    </tr>
    <?php
    $count=1;
    //returns an array that corresponds to the fetched row
    //OCI_BOTH-returns an array with both numeric and associative indexex
    //associative array is an array where each key has its own specific value
    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
        ?>

        <tr>
        <td><?php echo $count; $count++;?></td>
            <td><?= $row['ID'] ?></td>
            <td><?= $row['DATE_RETURNED'] ?></td>
            <td><?= $row['SUPPLIER_NAME'] ?></td>
            <!-- pass grn id using url so as to get the grn details -->
            <td><a class="btn" href="viewGRN.php?id=<?= $row['ID'] ?>">View</a></td>
        </tr>
        <?php
    }
    ?>
</table>
<div class="container2">
    <a class="btn" href="addGRN.php">ADD GRN</a>
</div>

</body>
</html>