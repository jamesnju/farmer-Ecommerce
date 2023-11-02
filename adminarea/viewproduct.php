
<?php
    include("../connection.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view  product</title>
    <link rel="stylesheet" href="../styles.css">
    <!--fonrawosome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <h3 class="text-center text-success">View Products</h3>
    <table class="table table-bordered mt-5">
        <thead >
            <tr>
                <th class="bg-info">Produc Id</th>
                <th class="bg-info">product Title</th>
                <th class="bg-info">Product Image</th>
                <th class="bg-info">product price</th>
                <th class="bg-info">Total Sold</th>
                <th class="bg-info">Delete</th>
            </tr>
        </thead>
        <tbody >
            <?php
                $select_product="select * from `products`";
                $result_query=mysqli_query($con,$select_product);
                $number=0;
                while($row_fetch=mysqli_fetch_assoc($result_query)){
                    $product_id=$row_fetch['product_id'];
                    $product_title=$row_fetch['product_title'];
                    $product_image1=$row_fetch['product_image1'];
                    $product_price=$row_fetch['product_price'];
                   
                    $number++;
                    ?>
                <tr class='text-center'>
                    
                    <td class="bg-secondary text-light"><?php echo$number;?></td>
                    <td class="bg-secondary text-light"><?php echo$product_title;?></td>
                    <td class="bg-secondary text-light"><img src='./productimages/<?php echo $product_image1;?>' class='productimage'/></td>
                    <td class="bg-secondary text-light"><?php echo$product_price;?>/=</td>
                    <td class="bg-secondary text-light"><?php 
                        $get_total="select * from `orders_pending` where product_id=$product_id";
                        $totaL_result=mysqli_query($con,$get_total);
                        $row_count=mysqli_num_rows($totaL_result);
                        echo $row_count;
                    ?></td>
                    
                    <td class="bg-secondary text-light"><a href='index.php?delete_product=<?php echo $product_id; ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                <?php
                }
            ?>
           
        </tbody>
    </table>
    

    <!--bootstrap js-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
     crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>