<h3 class="text-center text-success">All payments</h3>
<table class="table table-bordered mt-5">
    <thead >

    <?php  
        $get_payments="select * from `user_payment`";
        $result_orders=mysqli_query($con,$get_payments);
        $row_count=mysqli_num_rows($result_orders);
        

        if($row_count==0){
            echo"<h3 class='text-center text-danger mt-5'>No payment yet</h3>";
        }else{
            echo" <tr>
        <th class='bg-info text-center'>SI no</th>
        <th class='bg-info text-center'>Invoice number</th>
        <th class='bg-info text-center'>Amount</th>
        <th class='bg-info text-center'>Payment Mode</th>
        <th class='bg-info text-center'>Order Date</th>
        <th class='bg-info text-center'>Delete</th>
        </tr>
        </thead >";
            $number=0;
            while($row_data=mysqli_fetch_assoc($result_orders)){
                $order_id=$row_data['order_id'];
                $payment_id=$row_data['payment_id'];
                $amount=$row_data['amount'];
                $invoice_number=$row_data['invoice_number'];
                $payment_mode=$row_data['payment_method'];
                $order_date=$row_data['date'];
              
                $number++;

            ?>

                <tbody class='bg-secondary text-light'>
                <tr class="bg-secondary text-light" >
                    <td class="bg-secondary text-light "><?php echo $number; ?></td>
                    <td class="bg-secondary text-light "><?php echo $invoice_number; ?></td>
                    <td class="bg-secondary text-light "><?php echo $amount; ?></td>
                    <td class="bg-secondary text-light "><?php echo $payment_mode; ?></td>
                    <td class="bg-secondary text-light "><?php echo $order_date; ?></td>
                        <td class="bg-secondary text-light">
                    <a href='index.php?delete_payments=<?php echo $payment_id; ?>'
                    type="button" class=" text-light" >
                    <i class='fa-solid fa-trash'></i></a></td>
                
                </tr>
            </tbody>
            <?php
            }
        }


    ?>
       
    
</table>