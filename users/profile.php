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
    <link rel="stylesheet" href="../styles1.css"> 
    <link rel="stylesheet" href="../styles.css"> 
    <link rel="stylesheet" href="../footer.css"> 

</head>
<body>
    <!--navbar-->
    <nav class="header">
        <div class="logo">Logo</div>
        <form class="d-flex" action="searchproduct.php" method="get">
        <input class="form-control me-2" name="search_data" type="search" placeholder="Search" aria-label="Search">
        <!--<button class="btn btn-outline-dark" type="submit">Search</button>-->
        <input type="submit" value="search" name="searchdata" class="search">
      </form>
        <div class="navsect">
            <ul class="navlinks">
                <a href="../home.php"><li>home</li></a>
                <a href="../blog.php"><li>BLOGS</li></a>
                <a href="../farm_products.php"><li>Farms Shop</li></a>
                <a href="../index.php"><li>Farmers Market</li></a>
                <a href="../contact.php"><li>Contact</li></a>
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
                        ?>/=
                    </a>
                    </li>
            </ul>
            <div class="account">
                <button><a href="registration.php">My Account</a></button>
            </div>
            <!-- <a href="logou.php"><li>Logout</li></a> -->
        </div>    
        <div class="hamberger">
            <span class="bar">__</span>
            <span class="bar">__</span>
            <span class="bar">__</span>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <img src="./img/" alt="LOGO" class="logo">logo</a>
      <ul class="length navbar-nav me-auto mb-2 mb-lg-0 ">
        <?php
          if(isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='./users/profile.php'>My Account</a>
          </li>";
          }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='./users/registration.php'></a>
          </li>";
          }
        ?>
         <?php //checks if user is logged in or not
        
        if(!isset($_SESSION['username'])){
          echo '<li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>';
        }else{
          echo '<li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>';
        }
      ?>
        

    </nav>
<!--sidebar-->
<?php
cart();//calling cart function
?>
    <nav class="welcom navbar navbar-expand-lg">
        <ul class="navbar-nav me-auto">
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
        
        <?php //checks if user is logged in or not
        
          if(!isset($_SESSION['username'])){
            echo '<li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>';
          }else{
            echo '<li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>';
          }
        ?>
        

        </ul>

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