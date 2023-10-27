<h3 class="text-center text-success">All users</h3>
<table class="table table-bordered mt-5">
    <thead >

    <?php  
        $get_payments="select * from `regislation`";
        $result_orders=mysqli_query($con,$get_payments);
        $row_count=mysqli_num_rows($result_orders);
        

        if($row_count==0){
            echo"<h3 class='text-center text-danger mt-5'>No users yet</h3>";
        }else{
            echo" <tr>
        <th class='bg-info text-center'>SI no</th>
        <th class='bg-info text-center'>Username</th>
        <th class='bg-info text-center'>user email</th>
        <th class='bg-info text-center'>user Image</th>
        <th class='bg-info text-center'>user address</th>
        <th class='bg-info text-center'>user mobile</th>
        <th class='bg-info text-center'>Delete</th>
        </tr>
        </thead >";
            $number=0;
            while($row_data=mysqli_fetch_assoc($result_orders)){
                $user_id=$row_data['user_id'];
                $username=$row_data['username'];
                $user_email=$row_data['user_email'];
                $user_image=$row_data['user_image'];
                $user_address=$row_data['user_address'];
                $user_mobile=$row_data['user_mobile'];
              
                $number++;

            ?>

                <tbody class='bg-secondary text-light'>
                <tr class="bg-secondary text-light" >
                    <td class="bg-secondary text-light "><?php echo $number; ?></td>
                    <td class="bg-secondary text-light "><?php echo $username; ?></td>
                    <td class="bg-secondary text-light "><?php echo $user_email; ?></td>
                    <td class="bg-secondary text-light "><img class="productimage" src="../users/userimg/<?php echo $user_image; ?>"></td>
                    <td class="bg-secondary text-light "><?php echo $user_address; ?></td>
                    <td class="bg-secondary text-light "><?php echo $user_mobile; ?></td>

                        <td class="bg-secondary text-light">
                    <a href='index.php?delete_users=<?php echo $user_id; ?>'
                    type="button" class=" text-light" >
                    <i class='fa-solid fa-trash'></i></a></td>
                
                </tr>
            </tbody>
            <?php
            }
        }


    ?>
       
    
</table>