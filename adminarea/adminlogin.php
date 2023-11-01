<?php
    @session_start();
    include('../connection.php');
    include('../functions/functioncommon.php');
    
    if(isset($_POST['adminlog'])){
        $username = $_POST['username'];
        $password =$_POST['password'];
        
            //selecting userlogin details
        $sql_query="select * from `admin_registration` where admin_username='$username'";
        $result_query=mysqli_query($con,$sql_query);
        $rows_count=mysqli_num_rows($result_query);//checks if the row is empty
        $row_data=mysqli_fetch_assoc($result_query);//fetches data stored in db

        if($rows_count>0){
            $_SESSION['username']=$username;
            //matching the hashed pass in the db for verification
            if(password_verify($password,$row_data['admin_password'])){
                $_SESSION['username']=$username;//storesthe userdetails
                echo "<script>alert('login successful')</script>";
                echo "<script>window.open('index.php','_self')</script>";
                
            }else{
                //echo "<h2 class='text-center text-danger'> wrong pass</h2>";
                echo "<script>alert('wrong username or password')</script>";
            }
            
        }else{
            echo "<script>alert('wrong username or password')</script>";
           // echo "<h2 class='text-center text-danger'> wrong pass</h2>";
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
        <h3 class="text-center mt-5">Admin  Login</h3>
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
                        <label for="password">password</label>
                        <input type="password" id="password"  name="password" placeholder="Enter password" class="form-control">
                    </div>
                    <p><a href="forgotpassword.php" class="text-danger fw-bold">forgot password?</a></p>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border" value="Login" name="adminlog">
                        <p class="small pt-1 text-bold text-success fw-bold">Don't Have an account click here <a class="link-danger" href="adminregistration.php">Register</a></p>
                        <button type="submit" class="bg-info py-2 px-3 border text-decoration-none" value="Buyer" name="adminlog"><a href="../users/login.php">Buyer</a></button> 
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