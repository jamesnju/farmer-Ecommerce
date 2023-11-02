<?php

include("../connection.php");

    if(isset($_GET['edit_product'])){
        $edit_id=$_GET['edit_product'];
        //echo $edit_id;
        $select_query="select * from `products` where product_id=$edit_id";
        $result=mysqli_query($con,$select_query);
        $row_fetch=mysqli_fetch_assoc($result);
        $product_title=$row_fetch['product_title'];
        //echo $product_title;
        $product_description=$row_fetch['product_description'];
        $product_keywords=$row_fetch['product_keywords'];
        // $category_id=$row_fetch['category_id'];
        // $brand_id=$row_fetch['brand_id'];
        $product_image1=$row_fetch['product_image1'];
        // $product_image2=$row_fetch['product_image2'];
        // $product_image3=$row_fetch['product_image3'];
        $product_price=$row_fetch['product_price'];
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css"/>
</head>
<body>
    <h1 class="text-center text-danger">Edit products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="" class="form-label"> Product title</label>
            <input type="text" value="<?php echo $product_title;?>" class="form-control" name="product_title">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="" class="form-label"> Product description</label>
            <input type="text" value="<?php echo $product_description;?>" class="form-control" name="product_description">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="" class="form-label"> Product keywords</label>
            <input type="text" value="<?php echo $product_keywords;?>" class="form-control" name="product_keywords">
        </div>
        <?php
        //fetching cateory id
        $get_catogory="select * from `categories` where category_id=$category_id";
        $get_results=mysqli_query($con,$get_catogory);
        $row_category=mysqli_fetch_assoc($get_results);
        $category_title=$row_category['category_title'];
        //echo $category_title;

        ?>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="">product  categories</label>
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_title;?>"><?php echo $category_title;?></option>
                <?php
                    $get_catogory_all="select * from `categories`";
                    $results_query=mysqli_query($con,$get_catogory_all);
                    while($row_category_all=mysqli_fetch_assoc($results_query)){
                        $category_title=$row_category_all['category_title'];
                        $category_id=$row_category_all['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                ?>             
            </select>
        </div>
        <?php
        //fetching brand id
        $get_brand="select * from `brands` where brand_id=$brand_id";
        $get_brand=mysqli_query($con,$get_brand);
        $row_brand=mysqli_fetch_assoc($get_brand);
        $brand_title=$row_brand['brand_title'];
        //echo $brand_title;

        ?>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="">product brands</label>
            <select name="product_brand" class="form-select">
                <option value="<?php echo $brand_title;?>"><?php echo $brand_title;?></option>
                <?php
                    $get_brand_all="select * from `brands`";
                    $results_query=mysqli_query($con,$get_brand_all);
                    while($row_brand_all=mysqli_fetch_assoc($results_query)){
                        $brand_title=$row_brand_all['brand_title'];
                        $brand_id=$row_brand_all['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                ?>
              
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for=" Product image1" class="form-label"> Product image1</label>
            <div class="d-flex">
            <input type="file" class="form-control w-90 m-auto" name="product_image1">
            <img src="./productimages/<?php echo $product_image1;?>" alt="" class="productimage"/>
        </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for=" Product image2" class="form-label"> Product image2</label>
            <div class="d-flex">
            <input type="file" class="form-control w-90 m-auto" name="product_image2">
            <img src="./productimages/<?php echo $product_image2; ?>" alt="" class="productimage"/>
        </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for=" Product image3" class="form-label"> Product image3</label>
            <div class="d-flex">
            <input type="file" class="form-control w-90 m-auto" name="product_image3">
            <img src="./productimages/<?php echo $product_image3;?>" alt="" class="productimage"/>
        </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="" class="form-label"> Product price</label>
            <input type="text" value="<?php echo $product_price;?>" class="form-control" name="product_price">
        </div>
        <div class="text-center">
            <input type="submit" value="Update products" name="edit_product_button" class="btn btn-info px-3 mb-3">
        </div>
    </form>
    
</body>
</html>
<!-- editing udate button -->
<?php
if (isset($_POST['edit_product_button'])) {
    $product_tit = $_POST['product_title'];
    $product_descripi = $_POST['product_description'];
    $product_keywor = $_POST['product_keywords'];
    $product_category = $_POST['product_category']; // Corrected variable name
    $product_bra = $_POST['product_brand'];
    $product_pri = $_POST['product_price'];
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // Checking if fields are empty
    if ($product_tit == '' || $product_descripi == '' || $product_keywor == '' || $product_category == '' ||
        $product_bra == '' || $product_image1 == '' || $product_image2 == '' || $product_image3 == '' || $product_pri == '') {

        echo "<script>alert('Please fill in all fields')</script>";

    } else {
        move_uploaded_file($temp_image1, "./productimages/$product_image1");
        move_uploaded_file($temp_image2, "./productimages/$product_image2");
        move_uploaded_file($temp_image3, "./productimages/$product_image3");

        // Query to update products
        $update_sql = "UPDATE `products` SET product_title='$product_tit', product_description='$product_descripi',
            product_keywords='$product_keywor', category_id='$product_category', brand_id='$product_bra',
            product_image1='$product_image1', product_image2='$product_image2', product_image3='$product_image3',
            product_price='$product_pri', date=NOW() WHERE product_id=$edit_id";

        $result_update = mysqli_query($con, $update_sql);

        if ($result_update) {
            echo "<script>alert('Products updated successfully')</script>";
            echo "<script>window.open('./viewproduct.php', '_self')</script>";
        }
    }
}
?>
