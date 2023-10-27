<?php 
    include('../connection.php');
    include('../functions/functioncommon.php');
    

    if(isset($_GET['user_id'])){
        $user_id=$_GET['user_id'];
    }
    //getting total items and total price of all  items
    $get_ip_address= getIPAddress();
    $total_price=0;
    $cart_query_price="select * from `cart` where ip_address='$get_ip_address'";
    $result=mysqli_query($con,$cart_query_price);
    $invoice_number= mt_rand();//inbuild php function to generate a random numbers
    $status ='pending';
    $count_products=mysqli_num_rows($result);
    while($row_price=mysqli_fetch_array($result)){
        $product_id=$row_price['product_id'];
        $select_product="select * from `products` where product_id=$product_id";
        $product_result=mysqli_query($con,$select_product);
        while($row_product_price=mysqli_fetch_array($product_result)){
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total_price += $product_values;
        }

    }
    //getting quantity from cart
    $get_cart="select * from `cart`";
    $result_query=mysqli_query($con,$get_cart);
    $get_item_quantity=mysqli_fetch_array($result_query);
    $quantity=$get_item_quantity['quantity'];
    if($quantity==0){
        $quantity=1;
        $subtotal=$total_price;
    }else{
        $quantity=$quantity;
        $subtotal=$total_price*$quantity;
    }
//insering datails into in the db order table
$insert_query="insert into `user_orders` (user_id,amount_due,invoice_number,total_products,order_date,order_status) VALUES
 ($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status') ";
$result=mysqli_query($con,$insert_query);
if($result){
    echo "<script>alert('Order Has been succesfully placed')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}
//order pending
$sql_pending_orders="insert into `orders_pending` (user_id,invoice_number,product_id,quantity,order_status) VALUES
 ($user_id,$invoice_number,$product_id,$quantity,'$status') ";
$result_pending=mysqli_query($con,$sql_pending_orders);
 

//deleting items from cart after user sucessfully submited the order
$empty_cart="Delete from `cart` where ip_address='$get_ip_address'";
$result_delete=mysqli_query($con,$empty_cart);
?>