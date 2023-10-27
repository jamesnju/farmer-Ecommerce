<?php
    include("../connection.php");
    include('../functions/functioncommon.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin Pannel</title>
    <!--fonrawosome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container-fluid1">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../img/logo.png" alt="Amin" class="admin p-0">

                <nav class="navbar navbar-expand-lg ">
                <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link text-light">Log Out</a>
                        </li>
                    </ul>
                    <?php 
        
                        if(!isset($_SESSION['username'])){
                        echo '<li class="nav-item">
                        <a class="nav-link" href="#">Welcome Guest</a>
                        </li>';
                        }else{
                        echo '<li class="nav-item">
                        <a class="nav-link" href="#">Welcome '.$_SESSION['username'].'</a>
                        </li>';
                        }
                    ?>
                    
                </nav>
            </div>
        </nav>
        <div class="second">
            <h3 class="text-center p-2">Admin Dashboard</h3>
        </div>
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class=" p-5">
                    <a href="" ><img src="../img/black-friday-elements-assortment.jpg" class="adminname" alt=""></a>
                    <p class="text-light text-center"></p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="insertproduct.php" class="nav-link text-dark bg-light ">Insert product</a></button>
                    <button><a href="index.php?viewproducts" class="nav-link text-light text-dark bg-light ">View products</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-dark bg-light ">All orders</a></button>
                    <button><a href="index.php?list_payments" class="nav-link text-dark bg-light ">All payments</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-dark bg-light ">List users</a></button>
                    <button><a href="logout.php" class="nav-link text-dark bg-light ">Logout</a></button>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <h1>Admin</h1>
            <?php 
            /*we use get to get the insert category variable*/
            
                if(isset($_GET['viewproducts'])){
                    include('viewproduct.php');
                }
                if(isset($_GET['edit_product'])){
                    include('edit_product.php');
                }
                if(isset($_GET['delete_product'])){
                    include('delete_product.php');
                }
                if(isset($_GET['delete_category'])){
                    include('delete_category.php');
                }
                if(isset($_GET['delete_brands'])){
                    include('delete_brands.php');
                }
                if(isset($_GET['list_orders'])){
                    include('list_orders.php');
                }
                if(isset($_GET['delete_orders'])){
                    include('delete_orders.php');
                }
                if(isset($_GET['list_payments'])){
                    include('list_payments.php');
                }
                if(isset($_GET['delete_payments'])){
                    include('delete_payments.php');
                }
                if(isset($_GET['list_users'])){
                    include('list_users.php');
                }
                if(isset($_GET['delete_users'])){
                    include('delete_users.php');
                }
            ?>
        </div>
    </div>
    
 <!--bootstrap js-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
     crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>