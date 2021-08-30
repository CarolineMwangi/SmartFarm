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
    $sql = "UPDATE products_table SET status = '1' WHERE product_id = '".$ProductID."'";
                $result = mysqli_query($conn,$sql);

                if($result){
                    echo "<script>alert('Product Enabled.')</script>";
                    
                }else{
                    echo "<script>alert('Product Not Enabled.')</script>";
                }
} else {
    echo "<script>alert('Oops! Something went wrong.')</script>";
}



?>