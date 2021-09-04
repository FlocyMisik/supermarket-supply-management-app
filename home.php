<?php
include_once "include/session.inc.php";
$page='home';

?>
<html>
<html lang="en">
<head>
    
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
    <style>
        .image ul li{
            margin-top: 30px;
            margin-left: 30px;
            margin-right: 30px;
            
        }
    </style>
</head>
<body>
<!-- loading the menu file -->
<?php
include_once "include/menu.inc.php";

?>
<div class="image">
    <ul>
        <li><img src="image2.jpg" height="80%" width="100%"></li>
    </ul>
</div>



</body>
</html>