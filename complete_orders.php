<?php
 
 include 'config_seller.php';
 session_start();
 
 if (!isset($_SESSION['username'])) {
     header("Location: index.php");
 }
 
 $OrderID = $_GET['ID'];
 $sql = "SELECT status FROM orders WHERE order_id = '".$OrderID."'";
 $result = mysqli_query($conn,$sql);
 if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $sql = "UPDATE orders SET status = 'delivered' WHERE order_id = '".$OrderID."'";
                $result = mysqli_query($conn,$sql);

                if($result){
                    echo "<script>alert('Order Complete.')</script>";
                    echo '<script>window.location = "view_orders.php"</script>';
                    
                }else{
                    echo "<script>alert('Order Not Complete .')</script>";
                }
} else {
    echo "<script>alert('Oops! Something went wrong.')</script>";
}



?>