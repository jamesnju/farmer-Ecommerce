
<?php
    include('../connection.php');
    include('../functions/functioncommon.php');
    if(isset($_POST['adminreg'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash_password = password_hash($password,PASSWORD_DEFAULT);
        $confirmpassword = $_POST['confirm_password'];
        
        
        /* if user exists */
        $select = "Select * from  `admin_registration` where admin_username='$username' or admin_email='$email'";
        $sql_result= mysqli_query($con,$select);
        $row_count = mysqli_num_rows($sql_result);
        if($row_count>0){
            echo  "<script>alert('username or email Exist')</script>";
            //echo "<script>window.open('registration.php','_self')</script>";
        }else if($password != $confirmpassword){
            echo  "<script>alert('password do not match')</script>";
            //echo "<script>window.open('registration.php','_self')</script>";
        }
        
        else{
            /* insert query */
        $insert_query="insert into `admin_registration` (admin_username,admin_email,
        admin_password) VALUES
        ('$username','$email','$hash_password')";
        $result = mysqli_query($con,$insert_query);
        echo "<script>alert('user registration succes')</script>";
        echo "<script>window.open('adminlogin.php','_self')</script>";
        }        

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
        <!--fonrawosome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">

</head>
<body>
    <div class="container-fluid m-3">
        <h3 class="text-center mt-5">Admin  registration</h3>
        <div class="row d-flex justify-content-center align-item-center">
            <div class="col-lg-6 col-xl-5">
                <img src="" alt="Adminimage">
            </div>
            <div class="col-lg-6 col-xl-5">
                <!-- <img src="" alt="Adminimage"> -->
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username">username</label>
                        <input type="text" id="username"  name="username" placeholder="Enter username"  class="form-control">

                    </div>
                    <div class="form-outline mb-4">
                        <label for="email">email</label>
                        <input type="email" id="email"  name="email" placeholder="Enter email"  class="form-control">
                        
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password">password</label>
                        <input type="password" id="password"  name="password" placeholder="Enter password"  class="form-control">
                        
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirmpassword">confirmpassword</label>
                        <input type="password" id="confirm_password"  name="confirm_password" placeholder="Enter confirmpassword"  class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border" value="Register" name="adminreg">
                        <p class="small pt-1 text-bold text-success fw-bold">Have an account click here <a class="link-danger" href="adminlogin.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

   
    
     <!--bootstrap js-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
     crossorigin="anonymous"></script>

</body>
</html>