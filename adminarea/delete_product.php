


</form>
<?php 

    if(isset($_GET['delete_product'])){
        $delete_id=$_GET['delete_product'];

        $delete_query="delete from `products` where product_id=$delete_id";
        $result=mysqli_query($con,$delete_query);
        if($result){
            echo"<script>alert('product deleted')</script>";
            echo"<script>window.open('./index.php?viewproduct','_self')</script>";
        }
    }

?>