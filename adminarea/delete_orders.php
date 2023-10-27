<?php 

    if(isset($_GET['delete_orders'])){
        $delete_id=$_GET['delete_orders'];

        $delete_query="delete from `user_orders` where order_id=$delete_id";
        $result=mysqli_query($con,$delete_query);
        if($result){
            echo"<script>alert('order deleted')</script>";
            echo"<script>window.open('index.php?list_orders','_self')</script>";
        }
    }

?>