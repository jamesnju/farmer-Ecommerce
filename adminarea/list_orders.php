<h3 class="text-center text-success">All orders</h3>
<table class="table table-bordered mt-5">
    <thead >

    <?php  
        $get_orders="select * from `user_orders`";
        $result_orders=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result_orders);
        

        if($row_count==0){
            echo"<h3 class='text-center text-danger mt-5'>No orders yet</h3>";
        }else{
            echo" <tr>
        <th class='bg-info text-center'>SI no</th>
        <th class='bg-info text-center'>Due Amount</th>
        <th class='bg-info text-center'>Invoice number</th>
        <th class='bg-info text-center'>Total products</th>
        <th class='bg-info text-center'>Order Date</th>
        <th class='bg-info text-center'>Status</th>
        <th class='bg-info text-center'>Delete</th>
        </tr>
        </thead >";
            $number=0;
            while($row_data=mysqli_fetch_assoc($result_orders)){
                $order_id=$row_data['order_id'];
                $user_id=$row_data['user_id'];
                $amount_due=$row_data['amount_due'];
                $invoice_number=$row_data['invoice_number'];
                $total_products=$row_data['total_products'];
                $order_date=$row_data['order_date'];
                $order_status=$row_data['order_status'];
                $number++;

            ?>

                <tbody class='bg-secondary text-light'>
                <tr class="bg-secondary text-light" >
                    <td class="bg-secondary text-light "><?php echo $number; ?></td>
                    <td class="bg-secondary text-light "><?php echo $amount_due; ?></td>
                    <td class="bg-secondary text-light "><?php echo $invoice_number; ?></td>
                    <td class="bg-secondary text-light "><?php echo $total_products; ?></td>
                    <td class="bg-secondary text-light "><?php echo $order_date; ?></td>
                    <td class="bg-secondary text-light "><?php echo $order_status; ?></td>
                        <td class="bg-secondary text-light">
                    <a href='index.php?delete_orders=<?php echo $order_id; ?>'
                    type="button" class=" text-light" >
                    <i class='fa-solid fa-trash'></i></a></td>
                
                </tr>
            </tbody>
            <?php
            }
        }


    ?>
       
    
</table>