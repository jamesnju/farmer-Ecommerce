<?php
    if(isset($_GET['edit_account'])){//using the varible name edit_account

        $username_session= $_SESSION['username'];
        $select_query="select * from `regislation` where username='$username_session'";
        $result=mysqli_query($con,$select_query);
        $fetch_row=mysqli_fetch_assoc($result);
        $user_id=$fetch_row['user_id'];
        $username=$fetch_row['username'];
        $user_email=$fetch_row['user_email'];
        $user_password=$fetch_row['user_password'];
        $user_address=$fetch_row['user_address'];
        $user_mobile=$fetch_row['user_mobile'];

        if(isset($_POST['updateaccount'])){
            $update_id=$user_id;
            $username=$_POST['user_name'];
            $user_email=$_POST['user_email'];
            $user_address=$_POST['user_address'];
            $user_mobile=$_POST['user_mobile'];
            $user_image=$_FILES['user_image']['name'];
            $user_image_tmp=$_FILES['user_image']['tmp_name'];
            move_uploaded_file($user_image_tmp,"./userimg/$user_image");
            //update query
            $update_query="update `regislation` set username='$username',user_email='$user_email',user_image='$user_image',user_address='$user_address',
            user_mobile='$user_mobile' where user_id=$update_id";
            $result_query_update=mysqli_query($con,$update_query);
            if($result_query_update){
                echo "<script>alert('information updated successfully')</script>";
                echo "<script>window.open('logout.php','_self')</script>";

            }

        }
        
        

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset class="border-5">
        <h3 class="text-center text-success mb-4">Edit Account</h3>
        <form class="text-center" action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4">
                <input type="text" value="<?php echo $username ?>" name="user_name" class="form-control w-50 m-auto">
            </div>
            <div class="form-outline mb-4">
                <input type="email" value="<?php echo $user_email ?>" name="user_email" class="form-control w-50 m-auto">
            </div>
            <div class="form-outline mb-4 d-flex w-50 m-auto">
                <input type="file" name="user_image" class="form-control m-auto">
                <img src="./userimg/<?php echo $user_image ?>" alt="user_image" class="editimage">;
            </div>
            <div class="form-outline mb-4">
                <input type="text" value="<?php echo $user_address ?>" name="user_address" class="form-control w-50 m-auto">
            </div>
            <div class="form-outline mb-4">
                <input type="text" value="<?php echo $user_mobile ?>" name="user_mobile" class="form-control w-50 m-auto">
            </div>
            
            <input type="submit" value="Update Details" name="updateaccount" class="bg-info py-2 border-0">

        </form>
    </fieldset>    
    
</body>
</html>