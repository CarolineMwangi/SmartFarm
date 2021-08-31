<?php
 
 include 'config_seller.php';
 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 session_start();
 
 if (!isset($_SESSION['username'])) {
     header("Location: index.php");
 }
 
 $OrderID = $_GET['ID'];
 $sql = "SELECT buyer_email, status FROM orders WHERE order_id = '".$OrderID."'";
 $result = mysqli_query($conn,$sql);
 if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $email = $row['buyer_email'];
    $sql = "UPDATE orders SET status = 'delivered' WHERE order_id = '".$OrderID."'";
                $result = mysqli_query($conn,$sql);

                if($result){

                require 'PHPMailer-master/src/Exception.php';
                require 'PHPMailer-master/src/PHPMailer.php';
                require 'PHPMailer-master/src/SMTP.php';
                $mail = new PHPMailer;
                $mail->IsSMTP();
                $mail -> Mailer = "smtp";
                $mail->SMTPDebug  = 1; 
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = '587';
                $mail->SMTPAuth = true;
                $mail->Username = 'farmsmart086@gmail.com';
                $mail->Password = 'smartfarm600.';
                $mail->SMTPSecure = 'tls';
                $mail->From = 'farmsmart086@gmail.com';
                $mail->FromName = 'SmartFarm';
                $mail->AddAddress($email);
                $mail->WordWrap = 50;
                $mail->IsHTML(true);
                $mail->Subject = 'SmartFarm Order';
                $message_body = '
                <p>Your SmartFarm Order #<b>'.$OrderID.'</b> has been delivered.Thank you for shopping with us.We cannot wait to serve you again.</p>
                <p>Sincerely,</p>
                ';
                $mail->Body = $message_body;

                if($mail->Send())
                {
                    echo "<script>alert('Order Complete.')</script>";
                    echo '<script>window.location = "view_orders.php"</script>';
                }
                else
                {
                    $message = $mail->ErrorInfo;
                }
                   
                    
                    
                }
} else {
    echo "<script>alert('Oops! Something went wrong.')</script>";
}



?>