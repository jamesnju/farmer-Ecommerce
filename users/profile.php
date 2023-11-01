<?php 
    include('../connection.php');
    include('../functions/functioncommon.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecommerce</title>
    <!--fonrawosome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../header.css"> 
    <link rel="stylesheet" href="../styles.css"> 
    <link rel="stylesheet" href="../footer.css"> 

</head>
<body>
    <!--navbar-->
    <nav class="header">
    <div class="logo">AGRIBIZZ</div>
    <form class="d-flex" action="searchproduct.php" method="get">
      <input class="search1 form-control me-2" name="search_data" type="search" placeholder="Search" aria-label="Search">
      <!--<button class="btn btn-outline-dark" type="submit">Search</button>-->
      <input type="submit" value="search" name="searchdata" class="search">
    </form>
    <div class="navsect">
      <ul>
      <li><a href="../home.php">Home</a></li>
      <li><a href="../blog.php">Blog</a></li>
      <li><a href="../farm_products.php">Products</a></li>
      <li><a href="../index.php">Market</a></li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i>
          <sup>
            <?php
            getcartnumbers(); 
          ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Price
            <?php 
            gettotalprice();
            ?>
          </a>
        </li>
          <?php 
          //displays username if logged in
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
          <?php 
            if(!isset($_SESSION['username'])){
              echo '<li class="nav-item">
              <a class="nav-link" href="../users/login.php">Login</a>
            </li>';
            }else{
              echo '<li class="nav-item">
              <a class="nav-link" href="../users/logout.php">Logout</a>
            </li>';
            }
          ?>
      </ul>
    </div>
  </nav>
            <?php
              getUserOrder();
              if(isset($_GET['edit_account'])){
                include('editaccount.php');
              }
              //myorders
              if(isset($_GET['my_orders'])){
                include('userorders.php');
              }
              //delete
              if(isset($_GET['delete_account'])){
                include('deleteaccount.php');
              }
            ?>
        </div>
    </div>
    </div>
        <?php 
            include('../footer.php');
        ?>



    <!--bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
     crossorigin="anonymous"></script>
    
</body>
</html>