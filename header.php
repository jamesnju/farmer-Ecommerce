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
    <link rel="stylesheet" href="styles1.css">
</head>
<body>
    <nav class="header">
        <div class="logo">AGRIBIZZ</div>
        <form class="d-flex" action="searchproduct.php" method="get">
        <input class="search1 form-control me-2" name="search_data" type="search" placeholder="Search" aria-label="Search">
        <!--<button class="btn btn-outline-dark" type="submit">Search</button>-->
        <input type="submit" value="search" name="searchdata" class="search">
      </form>
        <div class="navsect">
            <ul class="navlinks">
                <a href="home.php"><li>Home</li></a>
                <a href="blog.php"><li>Blog</li></a>
                <a href="farm_products.php"><li>Products</li></a>
                <a href="index.php"><li>Market</li></a>
                <a href="contact.php"><li>Contact</li></a>
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
            </ul>
            <nav class="navbar navbar-expand-lg">
        <ul>
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

    </nav>
        
        

    </nav>
    <script src="./file.js"></script>
</body>
</html>
