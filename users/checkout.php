<?php 
    include('../connection.php');
    
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
    <link rel="stylesheet" href="../styles.css"> 
</head>
<body>
    <!--navbar-->
<!--sidebar-->

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
        <?php 
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
    
    <!--product items-->
    <div class="row px-1">
        <!--products-->
        <div class="col-md-12">
            <div class="row">
            <!-- checking if user is login or not forcheckout -->
            <?php
            if(!isset($_SESSION['username'])){
              include('login.php');
            }else{
              include('payment.php');

            }

            ?>
                
                
            </div>
        </div>
    </div>
      <?php 
          include('../footer.php');
      ?>
    </div>



    <!--bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
     crossorigin="anonymous"></script>
    
</body>
</html>