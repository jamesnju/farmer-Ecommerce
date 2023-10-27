

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cartpage</title>
    <!--fonrawosome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <!--navbar-->
   <?php include('header.php');?>
<!--sidebar-->
<?php
cart();//calling cart function
?>
    <nav class=" welcom navbar navbar-expand-lg">
        <ul class="navbar-nav me-auto">
        <?php 
        
        if(!isset($_SESSION['username'])){
          echo '<li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>';
        }else{
          echo '<li class="nav-item">
          <a class="nav-link text-center" href="#">Welcome '.$_SESSION['username'].'</a>
        </li>';
        }
      ?>
        <?php 
          if(!isset($_SESSION['username'])){
            echo '<li class="nav-item">
            <a class="nav-link text-center" href="./users/login.php">Login</a>
          </li>';
          }else{
            echo '<li class="nav-item">
            <a class="nav-link text-center" href="./users/logout.php">Logout</a>
          </li>';
          }
        ?>

        </ul>

    </nav>
  <div class="container1">
    <div class="row cartrow">
      <form action="" method="post">
        <table class=" bg-dark table table-bordered text-center">
            
          
            <tbody>
                <?php
                    /*fetching cart itms from db*/
                    
                    global $con;
                    $ip = getIPAddress();
                    $total_price=0;
                    $select_ipquery="select * from `cart` where ip_address='$ip'";
                    $result = mysqli_query($con,$select_ipquery);
                    $result_count = mysqli_num_rows($result);
                    if($result_count>0){
                      echo "  <thead>
                                <tr>
                                  <th>Product Title</th>
                                  <th>Product image</th>
                                  <th>Quantity</th>
                                  <th>Total Price</th>
                                  <th>Remove</th>
                                  <th colspan='2'>Operations</th>
                                </tr>
                              </thead>";

                    
                    while($row=mysqli_fetch_array($result)){
                        $product_id=$row['product_id'];
                        $select_product="select * from `products` where product_id='$product_id'";
                        $result_query=mysqli_query($con,$select_product);
                        while($row_productprice=mysqli_fetch_array($result_query)){
                            $product_price=array($row_productprice['product_price']);
                            $price_table=$row_productprice['product_price'];
                            $product_title=$row_productprice['product_title'];
                            $product_image1=$row_productprice['product_image1'];
                            $product_values=array_sum($product_price);
                            $total_price+=$product_values;
                        
                    

                ?>
                <tr>
                  <td><?php echo $product_title ?></td>
                  <td><img src="./adminarea/productimages/<?php echo $product_image1 ?>" alt=".."class="cart_img"></td>
                  <td><input type="text" class="form-input w-50" name="qty" ></td>
                  <!-- updateing button -->
                  
                  <?php
                  
                  $ip = getIPAddress();
                  if(isset($_POST['update_cart'])){
                    $quantites = $_POST['qty'];
                    $select_update_query = "update `cart` set quantity=$quantites where ip_address='$ip'";
                    $result_update = mysqli_query($con, $select_update_query);
                    $total_price = $total_price * $quantites;

                  }
                  
                  ?>
                  <td><?php echo $price_table ?></td>
                  <td><input  type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                  <td>
                      <!-- <button  class="bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                      <input type="submit" value="update" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                      <!-- <button  class="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                      <input type="submit" value="remove" name="remove"  class="bg-info px-3 py-2 border-0 mx-3">
                  </td>
                </tr>
            <?php 
          }}}
          else{
            echo "<h1 class='text-center text-danger'>Cart is empty</h1>";
          }
          
          ?>    
            </tbody>    
            
        </table>
        <div class="d-flex mb-5">
          <?php
            global $con;
            $ip = getIPAddress();
            $select_ipquery="select * from `cart` where ip_address='$ip'";
            $result = mysqli_query($con,$select_ipquery);
            $result_count = mysqli_num_rows($result);
            if($result_count>0){
              echo "<h4 class='px-3 text-dark'>Subtotal:<strong class='text-primary'>$total_price /-</strong></h4>
              <input type='submit' value='Continue shopping' name='continue_shopping'  class='bg-secondary px-3 py-2 border-0 mx-3'>
              <button class='bg-secondary px-3 py-2 border-0 mx-3'><a href='./users/checkout.php' class='text-light text-decoration-none'>checkout</a></button>
          ";
            }else{
              echo "<input type='submit' value='Continue shopping' name='continue_shopping'  class='bg-secondary px-3 py-2 border-0 mx-3'>
              ";
            }

            if(isset($_POST['continue_shopping'])){
              echo "<script>window.open('index.php', '_self')</script>";
            }
          ?>
          
        </div>
    </div>
   </div>
  </form>
  <!-- function to remove items from the cart -->
  <?php
  function remove(){
    global $con;
    if(isset($_POST['remove'])){
      foreach($_POST['removeitem'] as $remove_id){
        echo $remove_id;
        $delete_query="delete from `cart` where product_id=$remove_id";
        $result_delete= mysqli_query($con,$delete_query);
        if($result_delete){
          echo "<script>window.open('cart.php','_self')</script>";
        }
      }
    }
  }
  echo $removeitem=remove();
  ?>

    </div>
        <?php 
            include('./footer.php');
        ?>



    <!--bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
     crossorigin="anonymous"></script>
    
</body>
</html>