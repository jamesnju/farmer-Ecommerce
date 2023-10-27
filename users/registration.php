<?php
    include('../connection.php');
    include('../functions/functioncommon.php');
    if(isset($_POST['user_register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash_password = password_hash($password,PASSWORD_DEFAULT);
        $confirmpassword = $_POST['confirm_password'];
        $useraddress = $_POST['useraddress'];
        $usercontact = $_POST['usercontact'];
        $userimage = $_FILES['userimage']['name'];
        $userimage_tmp = $_FILES['userimage']['tmp_name'];
        $user_ip = getIPAddress();
        
        /* if user exists */
        $select = "Select * from  `regislation` where username='$username' or user_email='$email'";
        $sql_result= mysqli_query($con,$select);
        $row_count = mysqli_num_rows($sql_result);
        if($row_count>0){
            echo  "<script>alert('username or email Exist')</script>";
            echo "<script>window.open('registration.php','_self')</script>";
        }else if($password != $confirmpassword){
            echo  "<script>alert('password do not match')</script>";
            echo "<script>window.open('registration.php','_self')</script>";
        }
        
        else{
            /* insert query */
        $insert_query="insert into `regislation` (username,user_email,
        user_image,user_password,user_ip,user_address,user_mobile) VALUES
        ('$username','$email','$userimage','$hash_password','$user_ip','$useraddress','$usercontact')";
        $result = mysqli_query($con,$insert_query);
        echo "<script>alert('user registration succes')</script>";
        echo "<script>window.open('login.php','_self')</script>";

         /* store the image */
         move_uploaded_file($userimage_tmp,"userimg/$userimage");
        }

        /* checking if user is not logged in but can still add items to cart before log in */
        $select_cart="select * from `cart` where ip_address='$user_ip'";
        $result_cart=mysqli_query($con,$select_cart);
        $row_count=mysqli_num_rows($result_cart);
        if($row_count>0){
            $_SESSION['username']=$username;//stores the username
            echo"<script>alert('You bave items in your cart')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }else{
            echo "<script>window.open('./index.php','_self')";
        }
        

    }

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <!--fonrawosome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css"> 

</head>
<body>
    <div class="reg container-fluid  my-0 py-3" >
        <fieldset>
        <h2 class="text-center text-success">REGISTRATION FORM</h2>
        <div class=" cont row d-flex align-items-center justify-content-center h-20rem">
            <div class="col-lg-12 col-xl-6 ">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username -->
                    <div class="form-outline mb-4">
                        <label for="username " class="form-label">username</label>
                        <input type="text " id="username" class="form-control" placeholder="username" autocomplete="off" required name="username">
                    </div>
                    <!-- email -->
                    <div class="form-outline mb-4">
                        <label for="email " class="form-label">email</label>
                        <input type="email" id="email" class="form-control" placeholder="email" autocomplete="off" required name="email">
                    </div>
                    <!-- user image -->
                    
                    <div class="form-outline mb-4">
                        <label for="userimage" class="form-label">Profile image</label>
                        <input type="file" id="userimage" class="form-control" name="userimage">
                    </div>
                <!--  password -->
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">password</label>
                        <input type="password" id="password" class="form-control" placeholder="password" autocomplete="off" required name="password">
                    </div>
                    <!--  cornfirm password -->
                    <div class="form-outline mb-4">
                        <label for="confirmpassword" class="form-label">confirm password</label>
                        <input type="password" id="cornfirm_password" class="form-control" placeholder="confirm password" autocomplete="off" required name="confirm_password">
                    </div>
                    <!--  address -->
                    <div class="form-outline mb-4">
                        <label for="useraddress" class="form-label">useraddress</label>
                        <input type="text" id="useraddress" class="form-control" placeholder="useraddress" autocomplete="off" required name="useraddress">
                    </div>
                    <!--  contact -->
                    <div class="form-outline mb-4">
                        <label for="usercontact" class="form-label">usercontact</label>
                        <input type="text" id="usercontact" class="form-control" placeholder="usercontact" autocomplete="off" required name="usercontact">
                    </div>
                    <div class=" mt-4 pt-2">
                        <input type="submit" value="Register" class="submit py-3 px-3 text-dark" name="user_register">
                    </div>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ?
                        <a href="login.php" class="text-decoration-none"> Log in here</a></p>
                </form>
            </div>
        </div>
        </fieldset>
    </div>

    











<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
     crossorigin="anonymous"></script>
    
</body>
</html>