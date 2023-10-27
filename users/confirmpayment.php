<?php 
    include('../connection.php');
    include('../functions/functioncommon.php');
    session_start();

    if(isset($_GET['order_id'])){
        $order_id=$_GET['order_id'];
        //echo $order_id;
        $select_query="select * from `user_orders` where order_id=$order_id";
        $result_query=mysqli_query($con,$select_query);
        $fetch_data=mysqli_fetch_assoc($result_query);
        $invoice_number=$fetch_data['invoice_number'];
        $amount_due=$fetch_data['amount_due'];
    }
    if(isset($_POST['makepayment'])){
        $invoice_number=$_POST['invoice_number'];
        $amount_due=$_POST['amount'];
        $payment_method=$_POST['payment_method'];
        //insering
        $insert_query="insert into `user_payment`(order_id,invoice_number,amount,payment_method,date) 
        values ($order_id,$invoice_number,$amount_due,'$payment_method',NOW())";
        $result_insert=mysqli_query($con,$insert_query);
        if($result_insert){
            echo"<script>alert('payment details completed succesfull')</script>";
            echo "<script>window.open('profile.php?my_orders','_self')</script>";
        }
        $update_orders="update `user_orders` set order_status='Complete' where order_id=$order_id";
        $result_orders=mysqli_query($con,$update_orders);
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confrim Payment</title>
     <!--fonrawosome-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"> 
</head>
<body class="bg-secondary">
    <div class="container my-5">
        <h2 class="text-center text-light">Confirm Payment</h2>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-60 m-auto">
                <input type="text" value="<?php echo $invoice_number ?>" name="invoice_number" class="form-control w-50 m-auto">
            </div>
            <div class="form-outline my-4 text-center w-60 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" value="<?php echo $amount_due ?>" name="amount" class="form-control w-50 m-auto">
            </div>
            <div class="form-outline my-4 text-center w-60 m-auto">
            <select name="payment_method" class="form-select w-50 m-auto">
                <option>Select payment method</option>
                <option>UPI</option>
                <option>PayPal</option>
                <option>Payoffline</option>
                <option>M-pesa</option>
                <option>Pay on delivery</option>
            </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" name="makepayment" class="bg-primary px-3 py-3-2 border-0" value="Confirm Payment">
            </div>
            
        </form>
    </div>


   <!--bootstrap js-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
     crossorigin="anonymous"></script>
</body>
</html>