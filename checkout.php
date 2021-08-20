<?php 

include 'config_seller.php';

session_start();
if (!isset($_SESSION['email_address'])) {
    header("Location: login_user.php");
}

$query = "SELECT * FROM products_table ORDER BY product_name";
$result = mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Checkout</title>


<!-- font awesome cdn link -->
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">



</head>
<body>

	<style type="text/css">
		
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap');



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





<div class = "logo">
        <img src="SFLogo.png" class = "logo1" width = "210" height = "105">
        <div class="dropdown_profile">
			    <button class="dropbtn3"><?php echo "WELCOME, " . $_SESSION['email_address'] . ""; ?></button>
                <div class="dropdown-profile">
                    <a href="">Manage Profile</a>
                    <a href="changepassword_user.php">Change Password</a>
                    <a href="logout_user.php">Logout</a>
                </div>
            </div>
           
    </div>
    <div class = "header">
        <ul type = "none">
            <li><a href="index_farmer.php"> HOME </a></li>
			<li><a href=""> ABOUT US </a></li>
			<li><a href=""> CONTACT US </a></li>
        </ul>
    </div>

    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-lg-6 px-4 pb-4" id="order">
    			<h4 class="text-center text-info p-2">Complete your Order!</h4>
    			<div class="jumbotron p-3 mb-2 text-center">
    				<h6 class="lead"><b>Product(s) : </b>All Items</h6>
    				<h6 class="lead"><b>Delivery Charge : </b>Free</h6>
    				<h5><b>Amount Payable : </b> /-</h5>

    			</div>
    			<form action="" method="post" id="placeOrder">
    				<input type="hidden" name="products" value="<?= $allItems; ?>">
    				<input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
    				<div class="form-group">
    					<input type="text" name="name" class="form-control" placeholder="Enter Name" required>
    					<input type="email" name="email" class="form-control" placeholder="Enter Email" required>
    					<input type="tel" name="phone" class="form-control" placeholder="Enter Phone Number" required>
    				</div>
    				<div class="form-group">
    					<textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address..."></textarea>
    				</div>
    				<h6 class="text-center lead">Select Payment Method</h6>
    				<div class="form-group">
    					<select name="pmode" class="form-control">
    						<option value="" select disabled>Select Payment Mode</option>
    						<option value="cod">Pay on Delivery</option>
    						<option value="mpesa">M-Pesa</option>
    						<option value="cards">Debit/Credit card</option>
    					</select>
    				</div>
    				<div class="form-group">
    					<input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
    				</div>
    			</form>

    		</div>
    		
    	</div>

    </div>



</body>
</html>