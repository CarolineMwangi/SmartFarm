<?php 

include 'config_seller.php';

error_reporting(0);


if(isset($_POST['forgot_pass'])){
     
    $adm_email_address = $_POST['adm_email_address'];
    $adm_npassword = md5($_POST['adm_npassword']);
    $adm_cpassword = md5($_POST['adm_cpassword']);

    if($adm_npassword == $adm_cpassword){
        $sql = "SELECT * FROM admin_table WHERE adm_email_address='$adm_email_address'";
        $result = mysqli_query($conn, $sql);
        if($result-> num_rows > 0){

            $sql = "UPDATE admin_table set adm_password='$adm_npassword' where adm_email_address='$adm_email_address'";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "<script>alert('Yay! Password Successfully Updated.')</script>";
                $adm_email_address = "";
                $adm_npassword = "";
                $adm_cpassword = "";
                
            }else{
                echo "<script>alert('Oops! Something Wrong Went.')</script>";
            }

        }else{
            echo "<script>alert('Oops! Invalid Details.Try again')</script>";
        }
    }else{
        echo "<script>alert('Password Not Matched.')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Recover Password</title>
    <style>
          body
     {
         margin: 0;
         padding: auto;
         font-family: 'Times New Roman', serif;;
     }
     .logo
     {
       display: block;
       margin-left:auto;
       margin-right:auto;
       width: 100%
     }
     .forgot_farmer
     {
         width: 370px;
         height: 450px;
         color:black;
         top:15%;
         left:37%;
         position: absolute;
         box-sizing: border-box;
         padding: 5px 85px;  
         font-size:14px;
         font-weight:bold;
         border:1px solid;
         background-color:white;
     }
     h1
     {
         text-align:center;
         font-size: 20px;
         text-decoration: none;
         font: monospace;
     }
     .text
     {
        margin-left: 10px;
     }
     .forgot_pass
     {
        padding: 12px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin-top:4px;
        cursor: pointer;
        border-radius: 16px;
        border:none;
        font-weight: bold;
        background-color:#AFEEEE;
     }
    
     .forgot_farmer input
     {
         border-radius:16px;
         height:30px;

     }
    </style>
</head>
<body>
        

    <div class="forgot_farmer">
    <img src="SFLogo.png" class="logo" width = "210" height = "105" >

    <h1> Recover Password </h1>
    
    <form action="" method="POST">

        <input class = "text" type="email" name="adm_email_address" placeholder=" Enter email address "  required>

        <br>
        <br>
        <input class = "text" type="password" name="adm_npassword" placeholder=" Enter New password"  required>

        <br>
        <br>

		<input class = "text" type="password" name="adm_cpassword" placeholder=" Confirm New password"  required>

        <br>
        <br>

        <input class = "forgot_pass" type="submit" name="forgot_pass" value="RECOVER YOUR PASSWORD">
        <br>
        <br>
        
        <p style = "color:red;">**Use the email address used to sign up on this site.**</p>
        
    </form>
     
    <?php

        if(isset($_GET["reset"])){
            if($_GET["reset"] == "success"){
                echo '<p style = "color:red; font-weight:bold; fon-size:20px;"> Check your email!</p>';
            }
        }
    
    
    
    ?>
    
</body>
</html>