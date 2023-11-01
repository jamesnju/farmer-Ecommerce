<?php 
    include('./connection.php');
    include('./functions/functioncommon.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="header.css">
</head>
<body>
  <nav class="header">
    <div class="logo">AGRIBIZZ</div>
    <form class="Searchsect" action="searchproduct.php" method="get">
    <input class="search1 form-control me-2" name="search_data" type="search" placeholder="Search" aria-label="Search">
      <!--<button class="btn btn-outline-dark" type="submit">Search</button>-->
      <input type="submit" value="search" name="searchdata" class="search">
    </form>
    <div class="navsect">
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="farm_products.php">Products</a></li>
        <li><a href="index.php">Market</a></li>
        <!-- <li><a href="./users/profile.php">Orders</a></li> -->
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
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
              <a class="nav-link" href="./users/login.php">Login</a>
            </li>';
            }else{
              echo '<li class="nav-item">
              <a class="nav-link" href="./users/logout.php">Logout</a>
            </li>';
            }
          ?>
      </ul>
    </div>
  </nav>
</body>
</html>
