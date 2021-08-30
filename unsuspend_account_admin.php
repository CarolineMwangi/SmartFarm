<?php
 
 include 'config_seller.php';
 session_start();
 
 if (!isset($_SESSION['username'])) {
     header("Location: login_admin.php");
 }
 
 $ID = $_GET['ID'];
 $sql = "SELECT adm_status FROM admins WHERE adm_id = '".$ID."'";
 $result = mysqli_query($conn,$sql);
 if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $sql = "UPDATE admins SET adm_status = '1' WHERE adm_id = '".$ID."'";
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