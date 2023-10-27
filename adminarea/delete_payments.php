<?php 

    if(isset($_GET['delete_payments'])){
        $delete_id=$_GET['delete_payments'];

        $delete_query="delete from `user_payment` where payment_id=$delete_id";
        $result=mysqli_query($con,$delete_query);
        if($result){
            echo"<script>alert('payment deleted')</script>";
            echo"<script>window.open('index.php?list_payments','_self')</script>";
        }
    }

?>