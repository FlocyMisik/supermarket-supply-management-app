<?php 

//ucwords convert the first letters to caps
$designation=ucwords($_SESSION['designation']);

?>
<div class="menu-bar">
    <nav>
        <ul>
            <!-- get the current page and assign active class -->
            <li class="<?php if($page=="home"){echo "active";}?>"><a href="home.php">Home</a></li>

            <?php if($designation=='Manager' || $designation=='Stock Manager'){?>
                <li class="<?php if($page=="sales"){echo "active";}?>"><a href="sales.php" >Sales</a></li>

                <?php 
                }
                if($designation=='Manager' || $designation=='Stock Manager'|| $designation=='Purchasing Admin'){?>
                <li class="<?php if($page=="stock"){echo "active";}?>"><a href="Available stock.php">Available stock</a></li>
            <?php
                }
                if($designation=='Manager' || $designation=='Stock Manager'){
            ?>
            <li class="<?php if($page=="categories"){echo "active";}?>"><a href="Category of goods.php"> Category of Goods</a></li>
            <?php 
                }
            if($designation=='Manager' || $designation=='Stock Manager'|| $designation=='Purchasing Admin'){
                ?>
            <li class="<?php if($page=="lpo"){echo "active";}?>"><a href="LPO.php">Local Purchasing Order</a></li>
            <?php
            }
            ?>
            <?php
    

            if($designation=='Purchasing Admin'|| $designation=='Manager'){
            ?>
            <li class="<?php if($page=="grn"){echo "active";}?>"><a href="GRN.php">Good Return Note</a></li>
            <li class="<?php if($page=="supplier"){echo "active";}?>"><a href="supplier.php">Suppliers Data</a></li>
            <?php
            }

            if($designation=='Warehouse Manager'|| $designation=='Manager'|| $designation=='Purchasing Admin'){
            ?>
            <li class="<?php if($page=="warehouse"){echo "active";}?>"><a href="warehouse.php"> Warehouse</a> </li>
            <?php
            }
            if($designation=='Manager'){

            ?>
            <li class="<?php if($page=="reports"){echo "active";}?>"><a href="reports.php"> Reports</a></li>
            <?php
            }
            ?>
           <li class="dropdown"><?php echo $_SESSION['name']?>
           <div class="sub-menu-1">
                        <ul>
                            <li><?php echo $_SESSION['designation']?></li>
                            <li><a href="include/logout.php"> Logout</a></li>
                        </ul>
                    </div>
            </li> 
        </ul>
    
    </nav>
</div>