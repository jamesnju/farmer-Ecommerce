<?php

    //include('./connection.php');
    //getting products
    function getproducts(){
    global $con; 
     //condition to check will item is selected
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){

     $select_query="select * from `products` order by rand()";/* limit showsmax number of product to view per page you can by order product title or random*/
    $result = mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        
        echo "<div class='col-md-4 mb-3'>
        <div class='card'>
            <img src='../adminarea/productimages/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>Price: Ksh $product_price</h5>
                <h5 class='card-title'>$product_title </h5>
                <p class='card-text'>$product_description</p>
                <a href='index.php?Addtocart=$product_id' class='btn btn-secondary'>Add to cart</a>
            </div>
        </div> </div>";
    }
    }
    }
    }
    //diplaying all products tithe product page
    function getAllproducts(){
        global $con; 
     //condition to check will item is selected
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){

     $select_query="select * from `products` order by rand() ";/* limit showsmax number of product to view per page you can by order product title or random*/
    $result = mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3'];
        $product_price = $row['product_price'];
        
        echo "<div class='col-md-4 mb-3'>
        <div class='card'>
            <img src='../adminarea/productimages/$product_image2' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>Price: Kshs $product_price /=</h5>
                <h5 class='card-title'>$product_title </h5>
                <p class='card-text'>$product_description</p>
                <a href='index.php?Addtocart=$product_id' class='btn btn-secondary'>Add to cart</a>
                </div>
        </div> </div>";
    }
    }
    }

    }


  //getting unique categories
function getuniquecategories(){
global $con; 
//condition to check will item is selected
if(isset($_GET['category'])){
    $category_id = $_GET['category'];
$select_query="select * from `products` where category_id=$category_id ";
$result = mysqli_query($con,$select_query);
$num_row = mysqli_num_rows($result);
if($num_row==0){
echo "<h1 class='text-center text-danger'>No stock for this category</h1>";
}
while($row=mysqli_fetch_assoc($result)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];
    
    echo "<div class='col-md-4 mb-3'>
    <div class='card'>
        <img src='../adminarea/productimages/$product_image1' class='card-img-top' alt='$product_title'>
        <div class='card-body'>
            <h5 class='card-title'>Price:Kshs$product_price /=</h5>
            <h5 class='card-title'>$product_title </h5>
            <p class='card-text'>$product_description</p>
            <a href='index.php?Addtocart=$product_id' class='btn btn-secondary'>Add to cart</a>
            <a href='productdetails.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
        </div>
    </div></div>";
}
}
}


  //displaying individual item , unique brands 
function getuniquebrands(){
    global $con; 
    //condition to check will item is selected
    if(isset($_GET['brand'])){
        $brand_id = $_GET['brand'];
    $select_query="select * from `products` where brand_id=$brand_id ";
    $result = mysqli_query($con,$select_query);
    $num_row = mysqli_num_rows($result);
    if($num_row==0){
        echo "<h1 class='text-center text-danger'>No stock for this brand</h1>";
    }
    while($row=mysqli_fetch_assoc($result)){
        $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];
    
    echo "<div class='col-md-4 mb-3'>
    <div class='card'>
        <img src='../adminarea/productimages/$product_image1' class='card-img-top' alt='$product_title'>
        <div class='card-body'>
            <h5 class='card-title'>Price:Kshs$product_price /=</h5>
            <h5 class='card-title'>$product_title </h5>
            <p class='card-text'>$product_description</p>
            <a href='index.php?Addtocart=$product_id' class='btn btn-secondary'>Add to cart</a>
            <a href='productdetails.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
        </div>
    </div></div>";
}
}
}


//displaying brands inside sidebar from the db

function getbrands(){
    global $con;
    $select_query = "select * from `brands` ";
    $select_result = mysqli_query($con,$select_query);
    while($row_data = mysqli_fetch_assoc($select_result)){
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];

        echo "<li  class=' sidebar nav-item'>
        <a href='index.php?brand=$brand_id' class='nav-link text-dark'>$brand_title</a>
    </li>";
    }
}
//displaying brands inside sidebar from the db
 function getcategory(){
    global $con;
    $select_query = "select * from `categories`";
    $result = mysqli_query($con,$select_query);
    while($row = mysqli_fetch_assoc($result)){
        $category_title = $row['category_title'];
        $category_id = $row['category_id'];

        echo "<li class='cate nav-item'>
        <a href='index.php?category=$category_id' class='nav-link text-dark'>$category_title</a>
    </li>";
    }
 }

 //searching products
 function searchproducts(){
    global $con; 

    if(isset($_GET['searchdata'])){
        $search_data_value =$_GET['search_data'];
    $search_query="select * from `products` where product_keywords like '%$search_data_value%'";/* limit showsmax number of product to view per page you can by order product title or random*/
   $result = mysqli_query($con,$search_query);
   $num = mysqli_num_rows($result);
   if($num==0){
    echo "<h2 class='text-center text-danger'> NO result match !</h2>";

   }
   while($row=mysqli_fetch_assoc($result)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
       $product_description = $row['product_description'];
       $product_keywords = $row['product_keywords'];
       $product_image1 = $row['product_image1'];
       $product_price = $row['product_price'];
       
       echo "<div class='col-md-4 mb-3'>
       <div class='card'>
           <img src='../adminarea/productimages/$product_image1' class='card-img-top' alt='$product_title'>
           <div class='card-body'>
               <h5 class='card-title'>Price:$product_price/= </h5>
               <h5 class='card-title'>$product_title </h5>
               <p class='card-text'>$product_description</p>
               <a href='index.php?Addtocart=$product_id' class='btn btn-secondary'>Add to cart</a>
           </div>
       </div></div>";
   }
   }
}
//view more details

    function viewmore(){
        global  $con;
        if(isset($_GET['product_id'])){
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
                $product_id=$_GET['product_id'];
        $select_query = "select * from `products` where product_id=$product_id";
        $result_query= mysqli_query($con,$select_query);
        $num = mysqli_num_rows($result_query);
        //if($num==0){
           // echo "No more product reletd to this product";
        
            while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description = $row['product_description'];
                $product_keywords = $row['product_keywords'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                $product_image2 = $row['product_image2'];
                $product_image3 = $row['product_image3'];
                $product_price = $row['product_price'];

                echo "
                <div class='col-md-4 mb-3'>
                    <div class='card'>
                        <img src='../adminarea/productimages/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>Price:Kshs$product_price/= </h5>
                            <h5 class='card-title'>$product_title </h5>
                            <p class='card-text'>$product_description</p>
                            <a href='index.php?Addtocart=$product_id' class='btn btn-secondary'>Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class='col-md-8'>
                    <div class='row'>
                        
                            <h1 class='text-center text-info mb-5'>Releted products</h1>
                        
                        <div class='col-md-6'>
                            <img src='../adminarea/productimages/$product_image2' class='card-img-top' alt='$product_title'>
                        </div>
                        <div class='col-md-6'>
                            <img src='../adminarea/productimages/$product_image3' class='card-img-top' alt='$product_title'>
                        </div>
                    </div>

                </div>";
            }
        }
    }
    }}//}

    //getting ip address of the user
    function getIPAddress(){
        
    //whether ip is from the share internet  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }  
    //whether ip is from the remote address  
    else{  
            $ip = $_SERVER['REMOTE_ADDR'];  
        }  
        return $ip; 
        //$ip = getIPAddress();  
        //echo 'User Real IP Address - '.$ip;  

    }





    //cart function
    
    function cart(){
        if(isset($_GET['Addtocart'])){
            global $con;
            $ip = getIPAddress();
            $get_product_id=$_GET['Addtocart'];
            
            //$quantity=$_GET['quantity'];

            $select_query="select * from `cart` where ip_address='$ip' 
            and product_id=$get_product_id";
            $result_query=mysqli_query($con,$select_query);
            $number=mysqli_num_rows($result_query);
            if($number>0){
                echo"<script>'product already added to cart'</script>";
                    //redirecting homepage
                echo "<script>window.open('index.php','_self')</script>";
            }else{
                $insert_query="insert into `cart` (product_id,ip_address,quantity) values ($get_product_id,'$ip',0)";
                $result_query=mysqli_query($con,$insert_query);
                echo"<script>alert('product added to cart')</script>"; 
                echo "<script>window.open('index.php','_self')</script>";
            }

        }

    }
    //getting number of items from the db


    function getcartnumbers(){
        if(isset($_GET['Addtocart'])){
            global $con;
            $ip = getIPAddress();
            $select_item = "select * from `cart` where ip_address='$ip'";
            $result_query= mysqli_query($con,$select_item);
            $count_items= mysqli_num_rows($result_query);
        }else{
            global $con;
            $ip = getIPAddress();
            $select_item = "select * from `cart` where ip_address='$ip'";
            $result_query= mysqli_query($con,$select_item);
            $count_items= mysqli_num_rows($result_query);
        }
        echo $count_items; 
    }

    //getting price to  display at the  navbar

    function gettotalprice(){
        global $con;
        $ip = getIPAddress();
        $total_price=0;
        $select_ipquery="select * from `cart` where ip_address='$ip'";
        $result = mysqli_query($con,$select_ipquery);
        while($row=mysqli_fetch_array($result)){
            $product_id=$row['product_id'];
            $select_product="select * from `products` where product_id='$product_id'";
            $result_query=mysqli_query($con,$select_product);
            while($row_productprice=mysqli_fetch_array($result_query)){
                $product_price=array($row_productprice['product_price']);
                $product_values=array_sum($product_price);
                $total_price+=$product_values;
            }
        }
        echo $total_price;
        
    }


    //get user order details in the profile

    function getUserOrder(){
        global $con;
        $username=$_SESSION['username'];
        $get_details="select * from `regislation` where username='$username'";
        $result_details=mysqli_query($con, $get_details);
        while($row_query=mysqli_fetch_array($result_details)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_order="select * from `user_orders` where user_id=$user_id and
                    order_status='pending'";
                    $result_order=mysqli_query($con,$get_order);
                    $row_count=mysqli_num_rows($result_order);
                    

                    if($row_count > 0){
                        echo "<h3 class='text-success text-center my-5'>You have<span class='text-danger'> $row_count </span>pending orders</h3>
                        <h5 class='text-center'><a href='profile.php?my_orders'class='text-danger text-decoration-none ' > view Orders details</a></h5>"; 
                    } else{
                        echo "<h3 class='text-success text-center my-5 p-4'>You have<span class='text-danger'> 0 </span>pending orders</h3>
                        <h5 class='text-center'><a href='../index.php'class='text-success' >Explore products</a></h5>
                        ";

                    }  
                }
            }

        }

        }

    }
?>