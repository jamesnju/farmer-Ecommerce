<?php 

    if(isset($_GET['delete_users'])){
        $delete_id=$_GET['delete_users'];

        $delete_query="delete from `regislation` where user_id=$delete_id";
        $result=mysqli_query($con,$delete_query);
        if($result){
            echo"<script>alert('user deleted')</script>";
            echo"<script>window.open('index.php?list_users','_self')</script>";
        }
    }

?>