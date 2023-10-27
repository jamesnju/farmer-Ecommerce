<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>
<body>
    <h3 class="text-center text-success mb-4">delete account</h3>
    <form action="" method="post">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control m-auto w-50" name="delete" value="delete account"/>
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control m-auto w-50" name="dont_delete" value="Don't delete account"/>
        </div>
    </form>
    
</body>
</html>
<?php 
    $username_session=$_SESSION['username'];
    if(isset($_POST['delete'])){
        $delete_query="Delete from `regislation`where username='$username_session'";
        $result=mysqli_query($con,$delete_query);
        if($result){
            session_destroy();
            echo "<script>alert('deleted account')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
    if(isset($_POST['dont_delete'])){
        echo "<script>window.open('profile.php','_self')</script>";
    }

?>