<?php 

include 'config_seller.php';

error_reporting(0);
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login_admin.php");
}

if(isset($_POST['change'])){
     
    $adm_email_address = $_POST['adm_email_address'];
    $adm_opassword = md5($_POST['adm_opassword']);
    $adm_npassword = md5($_POST['adm_npassword']);
    $adm_cpassword = md5($_POST['adm_cpassword']);

    if($adm_npassword == $adm_cpassword){
        $sql = "SELECT * FROM admin_table WHERE adm_email_address='$adm_email_address' AND adm_password = '$adm_opassword'";
        $result = mysqli_query($conn, $sql);
        if($result-> num_rows > 0){

            $sql = "UPDATE admin_table set adm_password='$adm_npassword' where adm_email_address='$adm_email_address'";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "<script>alert('Yay! Password Successfully Changed.')</script>";
                $adm_email_address = "";
                $adm_opassword = "";
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
    <title>Change Password Seller</title>
    <style>
             body
         {
             margin: 0;
             padding: auto;
             font-family: 'Times New Roman', serif;
         }
        .logo1
        {
            display: block;
           
            margin-right:auto;
            width: 100%
            float: center;
        }
        
        .header
        {
            width: 1366px;
            height:80px;
            background-color:#AFEEEE;
            float: center;
            padding-left:20px;
	        border:1px solid none;
            font-weight:bold;
        }
        .header li
        {
            width: 120px;
            float: left;
            margin: 30px 40px;
            padding: auto;
            text-align: center;
        }

        .header a
        {
            text-decoration: none;
            color: black;
            cursor: pointer;
        }
        .header a:hover
        {
            color:red;
            text-decoration:underline;
            
        }
        .dropbtn1 {
            color: black;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-top:4px;
            font-weight:bold;
            cursor: pointer;
            border-radius: 16px;
            border:none;
            background-color:#AFEEEE;
        }
        .dropbtn2 {
            color: black;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-top:4px;
            font-weight:bold;
            cursor: pointer;
            border-radius: 16px;
            border:none;
            background-color:#AFEEEE;
        }
        .dropdown_posts {
            position: relative;
            display: inline-block;
            float: right;
           
            margin-right:80px;
        }
        .dropdown_orders {
            position: relative;
            display: inline-block;
            float: right;
            
            margin-right:80px;
        }
        .dropdown-orders {
             display: none;
             position: absolute;
             background-color: #f1f1f1;
             min-width: 160px;
             box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
             z-index: 1;
        }
        .dropdown-posts {
             display: none;
             position: absolute;
             background-color: #f1f1f1;
             min-width: 160px;
             box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
             z-index: 1;
        }
        .dropdown-posts a {
             color: black;
             padding: 12px 16px;
             text-decoration: none;
             display: block;
        }
        .dropdown-posts a:hover {
            color: red;
            background-color:#AFEEEE;
        }
        .dropdown_posts:hover .dropdown-posts {
            display: block;
        }
        .dropdown_posts:hover .dropbtn1 {
            background-color: #AFEEEE;
            text-decoration:underline;
            color:red;
        }
        .dropdown-orders a {
             color: black;
             padding: 12px 16px;
             text-decoration: none;
             display: block;
        }
        .dropdown-orders a:hover {
            color: red;
            background-color:#AFEEEE;
        }
        .dropdown_orders:hover .dropdown-orders {
            display: block;
        }
        .dropdown_orders:hover .dropbtn2 {
            background-color: #AFEEEE;
            text-decoration:underline;
            color:red;
        }
        .dropbtn3 {
            color: black;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-top:4px;
            font-weight:bold;
            cursor: pointer;
            border-radius: 16px;
            border:none;
            background-color:#AFEEEE;
        }
        .dropdown_profile {
            position: relative;
            display: inline-block;
            float: right;
            
            margin-right:80px;
        }
        .dropdown-profile {
             display: none;
             position: absolute;
             background-color: #f1f1f1;
             min-width: 160px;
             box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
             z-index: 1;
        }
        .dropdown-profile a {
             color: black;
             padding: 12px 16px;
             text-decoration: none;
             display: block;
        }
        .dropdown-profile a:hover {
            color: red;
            background-color:#AFEEEE;
        }
        .dropdown_profile:hover .dropdown-profile {
            display: block;
        }
        .dropdown_profile:hover .dropbtn3 {
            background-color: #AFEEEE;
            text-decoration:underline;
            color:red;
        }
        .change_farmer
        {
            width: 370px;
            height: 430px;
            color:black;
            top:40%;
            left:37%;
            position: absolute;
            box-sizing: border-box;
            padding: 5px 90px;  
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
        .change
        {
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-top:4px;
           
            cursor: pointer;
            border-radius: 16px;
            border:none;
            background-color:#AFEEEE;
        }
        
        
        .change_farmer a
        {
            text-decoration: none;
            font-size: 15px;
            line-height: 20px;
            color: purple;
            cursor: pointer;
        }
        .change_farmer a:hover
        {
            color:darkblue;
            text-decoration:underline;
        }
        .change_farmer input
        {
            border-radius:16px;
            height:30px;
        }
    </style>
</head>
<body>
<div class = "logo">
        <img src="SFLogo.png" class = "logo1" width = "210" height = "105">
        <div class="dropdown_profile">
			    <button class="dropbtn3"><?php echo "WELCOME, " . $_SESSION['username'] . ""; ?></button>
                <div class="dropdown-profile">
                    <a href="">Manage Profile</a>
                    <a href="changepassword_admin.php">Change Password</a>
                    <a href="logout_admin.php">Logout</a>
                </div>
            </div>
            <div class="dropdown_posts">
			    <button class="dropbtn1">POSTS</button>
                <div class="dropdown-posts">
                    <a href="view_posts_admin.php">View Posts</a>
                </div>
            </div>
            <div class="dropdown_orders">
			    <a href=""><button class="dropbtn2">USERS</button></a>
                <div class="dropdown-orders">
                     <a href="view_farmers.php">View Sellers</a>
                     <a href="">View Buyers</a>
                     <a href="view_admins.php">View Admins</a>
                     <a href="signup_admin.php">Add Admins</a>
                     <a href="add_seller.php">Add Sellers</a>
                     <a href="add_buyer.php">Add Buyers</a>
                 </div>
            </div>
    </div>
    <div class = "header">
        <ul type = "none">
            <li><a href="index_admin.php"> HOME </a></li>
			<li><a href="about_us.php"> ABOUT US </a></li>
			<li><a href="contact_us.php"> CONTACT US </a></li>
        </ul>
    </div>

    <div class="change_farmer">
    <img src="SFLogo.png" class="logo" width = "210" height = "105" >

    <h1> Change Password </h1>

        <form action="" method="POST">
            
			<input type="email" name="adm_email_address" placeholder=" Enter email address" value="<?php echo $email_address; ?>" required>

            <br>
            <br>


			<input type="password" name="adm_opassword" placeholder=" Enter old password" value="<?php echo $opassword; ?>" required>

            <br>
            <br>

            <input type="password" name="adm_npassword" placeholder=" Enter new password" value="<?php echo $npassword; ?>" required>

            <br>
            <br>

			<input type="password" name="adm_cpassword" placeholder=" Confirm new password" value="<?php echo $cpassword; ?>" required>

            <br>
            <br>
            
            <input class = "change" type="submit" name="change" value="CHANGE PASSWORD">

            
            <br>        
        </form>
    </div>
</body>
</html>