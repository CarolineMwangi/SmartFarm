<?php 

include 'config_seller.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login_admin.php");
}

$query = "SELECT * FROM products_table ORDER BY product_name";
$result = mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View SmartFarm Products</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
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
        .data
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
                    <a href="">Manage Profile</a>
                    <a href="changepassword_admin.php">Change Password</a>
                    <a href="logout_admin.php">Logout</a>
                </div>
            </div>
        <div class="dropdown_posts">
			    <button class="dropbtn1">POSTS</button>
                <div class="dropdown-posts">
                    <a href="view_orders.php">View Orders</a>
                    <a href="view_posts_admin.php">View Posts</a>
                    <a href="view_messages_admin.php">View Messages</a>
                </div>
            </div>
            <div class="dropdown_orders">
			    <a href=""><button class="dropbtn2">USERS</button></a>
                <div class="dropdown-orders">
                     <a href="view_farmers.php">View Sellers</a>
                     <a href="view_buyers.php">View Buyers</a>
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

    
    
    <h1> SMART FARM PRODUCTS</h1>
    <div class = "data">
    <form action="" method="post">
        <table id="tbl_products">
            <tr>
                  
                <th>Product ID</th>
                <th>Product Image</th> 
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Category</th>
                <th>Seller's Email</th>
                <th>Product Description</th>
                <th>Product Status</th>
                
                <th> </th>
                <th> </th>
                <th> </th>
            </tr>

        <?php

             while($rows = mysqli_fetch_assoc($result)){

        ?>

                    <tr>
                        <td><?php echo $rows['product_id'];?></td>
                        <td><?php echo '<div style="margin:5px;padding-right:10px"><img src="assets/'.$rows["product_image"].'" width="120px" height="100px"><br>';?></td>
                        <td><?php echo $rows['product_name'];?></td>
                        <td><?php echo $rows['product_price'];?></td>
                        <td><?php echo $rows['product_category'];?></td>
                        <td><?php echo $rows['seller_email'];?></td>
                        <td><?php echo $rows['product_description'];?></td>
                        <td><?php echo $rows['status'];?></td>
                        <td><a class= "link" href="update_admin.php?GetID=<?php echo $rows['product_id']?>">Update Products</a></td>
                        <td><a class= "link" href="disable_products.php?ID=<?php echo $rows['product_id'] ?>">Disable Products</a></td>
                        <td><a class= "link" href="enable_products.php?ID=<?php echo $rows['product_id'] ?>">Enable Products</a></td>
                    </tr>

                    <?php } ?>

        </table>
    </form>
    </div>
    <script type="text/javascript">

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="js/main.js"></script>
    <script>
    $(document).ready(function() {
      $('#tbl_products').DataTable();
    } );
    </script>
</body>
</html>