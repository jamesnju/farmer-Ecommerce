<?php 
    include('../connection.php');
    include('../functions/functioncommon.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment </title>
     <!--fonrawosome-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css"> 

</head>
<body>
    <?php
        //code to access user id
        $user_ip = getIPAddress();
        $get_user = "select * from regislation where user_ip='$user_ip'";
        $result=mysqli_query($con,$get_user);
        $run_query=mysqli_fetch_array($result);
        $user_id=$run_query['user_id'];
    ?>
    <div class="container">
        <h2 class="text-center text-light">Payment</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id ?>" >
                <img src="../pay/shopping.jpg" width="80%" height="80%" alt="">
            </a>
            </div>
        </div>
    </div>






    <!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
     crossorigin="anonymous"></script>
</body>
</html>