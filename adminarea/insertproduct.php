<?php

    include('../connection.php');

    /*insrting product title  into dbs*/
    if(isset($_POST['insertproduct'])){
        $product_title = $_POST['producttitle'];
        $product_description = $_POST['productdescription'];
        $product_keywords = $_POST['productkeywords'];
        $product_price= $_POST['productprice'];

        /*inserting images*/
        $product_image1 = $_FILES['productimage1']['name'];

        /*give images tempory names*/
        $temp_image1 = $_FILES['productimage1']['tmp_name'];

        /*checkingif the fields are empty*/
        if($product_title =='' or $product_description=='' or$product_keywords=='' or 
        $product_image1==''or $product_price==''){

            echo "<script>alert('fill all the fileds')</script>";
            //exit();
        }else{
            //storing images in the image folder 
            move_uploaded_file($temp_image1,"./productimages/$product_image1");

            /*$select_query = "select * from `products`";
            $result_product= mysqli_query($con,$select_query);
            $num = mysqli_num_rows($result_product);
            if($num >0){
                echo "<script>alert('product already exists')</script>";
            }else*/
            //insert query
            $insert_query= "insert into `products` (product_title,
            product_description,product_keywords,
            product_image1,product_price,date) 
            values ('$product_title','$product_description','$product_keywords',
            '$product_image1','$product_price',Now())";
            $result = mysqli_query($con,$insert_query);
            if($result){
                echo "<script>alert('item inserted successfull')</script>";
                echo "<script>window.open('index.php','_self')</script>";


            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert products</title>
    <!--fonrawosome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css"> 
</head>
<body>
    
    <div class="containeradmin mt-1">
        <fieldset>
        <h2 class="text-center">INSERT PRODUCT</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <!--product title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="producttitle" id="product_title" class="form-control" placeholder="product title" autocomplete="off">
            </div>
            <!--product description-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product description</label>
                <input type="text" name="productdescription" id="product_description" class="form-control" placeholder="product description" autocomplete="off">
            </div>
                <!--keywords-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" name="productkeywords" id="product_title" 
                class="form-control" placeholder="product keywords" autocomplete="off">
            </div>
                <!--image1-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image1</label>
                <input type="file" name="productimage1" id="product_image1" 
                class="form-control" placeholder="product image1" autocomplete="off">
            </div> 
            <!--price-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name="productprice" id="product_title" 
                class="form-control" placeholder="product price" autocomplete="off">
            </div>
            <!--button-->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insertproduct" class="btn btn-info mb-3 px-3" value="insertproduct">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <a href="index.php"><input class="btn btn-info mb-3 px-3" value="Go home"></a>
            </div>
        </form>
        </fieldset>
    </div>








<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
     crossorigin="anonymous"></script>
    
</body>
</html>