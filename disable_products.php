<?php
 
 include 'config_seller.php';
 session_start();
 
 if (!isset($_SESSION['username'])) {
     header("Location: login_farmer.php");
 }
 
 $ProductID = $_GET['ID'];
 $sql = "SELECT status FROM products_table WHERE product_id = '".$ProductID."'";
 $result = mysqli_query($conn,$sql);
 if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $sql = "UPDATE products_table SET status = '0'";
                $result = mysqli_query($conn,$sql);

                if($result){
                    echo "<script>alert('Product Disabled.')</script>";
                    echo '<script>window.location = "view_posts_seller.php"</script>';
                }else{
                    echo "<script>alert('Product Not Disabled.')</script>";
                }
} else {
    echo "<script>alert('Oops! Something went wrong.')</script>";
}



?>