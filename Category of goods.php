<?php
include_once "include/session.inc.php";
include_once "include/category of goods.inc.php";
$page="categories";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Category of Goods</title>
    <link rel="stylesheet" href="home.css">
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }
        .head{
            margin-top: 20px;
            text-align: center;
        }
        .tab{
             border-collapse: collapse;
             width: 60%;
            text-align: center;
            margin-left: 300px;
            margin-top: 30px;
        }
.tab td,.tab th{
    border: 1px solid black;
}
/*matches eevery element that is the 
nth child regarless of type of its parent*/
.tab tr:nth-child(even){
    background-color: #f2f2f2;
}
.tab tr:hover{
    background-color: #ddd;
}
.tab th{
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background:linear-gradient(315deg, #7ed6df 0%, #000000 100%);
color: white;
text-align: center;
}
.btn{
    background:linear-gradient(315deg, #7ed6df 0%, #000000 100%);
    text-transform: uppercase;
    margin-top: 20px;
    margin-bottom: 5px;
    color: white;
    padding :10px; 
    margin-left: 300px;

}
.search{
    float: right;
    margin-top: 10px;
    margin-bottom: 10px;
    margin-right: 20px;
   

}

        </style>
</head>
<body>
<!-- loading the menu file -->
<?php
include_once "include/menu.inc.php";

?>

<div class="search">
<form  action="Category of goods.php"  method="get" >
         <input type="text" name="search" class="form-1">    
         <button type="submit" id="btn" >search</button>  
</form>
</div>


<table class="tab">

 <tr>
   <th>No:</th>
     <th>Category ID</th>
     <th>Category Name</th>
 </tr>
 <?php
//$_REQUEST used to collect data after submitting a form
 //isset -check if the variable is set i.e declared and not null
 if(isset($_REQUEST['search'])){
    $searchq=$_REQUEST['search'];
    //'%$searchq%-looks for anything that contains the string that one has entered
    //%-wildcard used to execute one or more characters-
    //%-look for any value that contains that string
    $sql="SELECT * FROM CATEGORIES WHERE category_id LIKE '%$searchq%' OR category_name LIKE '%$searchq%'";

    $stid=ociparse($conn,$sql);
ociexecute($stid);
    
} 
    $count=1;
    //OCI_BOTH-returns an array with both numeric and associative indexex
    //returns an array that corresponds to the fetched row
    //associative array is an array where each key has its own specific value
    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    ?>
        <tr>
            <td><?php echo $count; $count++;?></td>
            <td><?= $row['CATEGORY_ID']?></td>
            <td><?=$row['CATEGORY_NAME']?></td>
        </tr>
 <?php
    }
 ?>
</table>
<form action="registernewcategory.php" method="GET">
    <button class="btn" name="Register" type="submit">Register new category</button>
</form>
</body>
</html>