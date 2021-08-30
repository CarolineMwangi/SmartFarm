<?php
 
 include 'config_seller.php';
 session_start();
 
 if (!isset($_SESSION['username'])) {
     header("Location: login_admin.php");
 }
 
 $ID = $_GET['ID'];
 $sql = "SELECT status FROM register WHERE id = '".$ID."'";
 $result = mysqli_query($conn,$sql);
 if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $sql = "UPDATE register SET status = '1' WHERE id = '".$ID."'";
                $result = mysqli_query($conn,$sql);

                if($result){
                    echo "<script>alert('Account unsuspended.')</script>";
                    
                }else{
                    echo "<script>alert('Account not unsuspended.')</script>";
                }
} else {
    echo "<script>alert('Oops! Something went wrong.')</script>";
}



?>