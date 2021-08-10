<?php 

include 'config_seller.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login_admin.php");
}

$sql = "SELECT * FROM admin_table ORDER BY adm_last_name";
$result1 = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View SmartFarm Admins</title>
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
            margin-left:540px;
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
        h1
        {
            text-align:center;
        }
        .info
        {
           margin-left:50px;
        }
        table,th,td
        {
            border: 1px ridge black;
            text-align: center;
            border-collapse: collapse;
        }
        th
        {
            background-color:#AFEEEE;
            font-size: 18px;
            padding: 20px;
        }
        td
        {
            font-size:16px;
            padding: 20px;
        }
        .link
        {
            color: black;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-top:4px;
            cursor: pointer;
            border-radius: 16px;
            border:1px solid;
            background-color:#AFEEEE;
        }
        .link:hover
        {
            background-color:turquoise;
            text-decoration:underline;
        }
    </style>
</head>
<body>
<div class = "logo">
        <img src="SFLogo.png" class = "logo1" width = "210" height = "105">
        <div class="dropdown_profile">
			    <button class="dropbtn3"><?php echo "WELCOME, " . $_SESSION['username'] . ""; ?></button>
                <div class="dropdown-profile">
                    <a href="">Manage Account</a>
                    <a href="logout_admin.php">Logout</a>
                </div>
            </div>
        <div class="dropdown_posts">
			    <button class="dropbtn1">POSTS</button>
                <div class="dropdown-posts">
                    <a href="">View Posts</a>
                </div>
            </div>
            <div class="dropdown_orders">
			    <a href=""><button class="dropbtn2">USERS</button></a>
                <div class="dropdown-orders">
                     <a href="view_farmers.php">View Sellers</a>
                     <a href="view_buyers.php">View Buyers</a>
                     <a href="view_admins.php">View Admins</a>
                     <a href="signup_admin.php">Add Admins</a>
                 </div>
            </div>
    </div>
    <div class = "header">
        <ul type = "none">
            <li><a href="index_admin.php"> HOME </a></li>
			<li><a href=""> ABOUT US </a></li>
			<li><a href=""> CONTACT US </a></li>
        </ul>
    </div>
    
    <h1> SMART FARM USERS: ADMINS</h1>
    <div class = "info">
        <form action="" method="post">
            <table>
            <tr>
                <th>Admin ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Password</th>
                <th> </th>
                <th> </th>
            </tr>

            <?php
                while($row = mysqli_fetch_assoc($result1)){
            ?>

            <tr>
                <td><?php echo $row['adm_id'];?></td>
                <td><?php echo $row['adm_first_name'];?></td>
                <td><?php echo $row['adm_last_name'];?></td>
                <td><?php echo $row['adm_email_address'];?></td>
                <td><?php echo $row['adm_phone_number'];?></td>
                <td><?php echo $row['adm_password'];?></td>
                <td><a class="link" href="">Update Password</a></td>
                <td><a class="link" href="">Suspend Account</a></td>
            </tr>
            <?php } ?>
            </table>
        </form>
    </div>
</body>
</html>