<?php
 
 include 'config_seller.php';
 session_start();
 
 if (!isset($_SESSION['username'])) {
     header("Location: login_admin.php");
 }
 
 $ID = $_GET['ID'];
 $sql = "SELECT user_status FROM users WHERE user_id = '".$ID."'";
 $result = mysqli_query($conn,$sql);
 if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $sql = "UPDATE users SET user_status = '0' WHERE user_id = '".$ID."'";
                $result = mysqli_query($conn,$sql);

                if($result){
                    echo "<script>alert('Account Suspended.')</script>";
                    
                }else{
                    echo "<script>alert('Account not suspended.')</script>";
                }
} else {
    echo "<script>alert('Oops! Something went wrong.')</script>";
}



?>