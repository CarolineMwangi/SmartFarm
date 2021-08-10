<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login_admin.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Welcome To SmartFarm</title>
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
        .logo
        {
            width: 1366px;
            height:110px;
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
        .div1
        {
            width:1366px;
            height:400px;
            margin-top: 5px;
            background:url(fruveg1.jpg);
            background-size:1366px 700px;
            background-position:center;
            background-repeat: no-repeat;
            text-align: center;
        }
        .div1 h1
        {
            padding-top:80px;
            font-size:40px;
        }
        .welcome
        {
            width: 400px;
            padding-top: 10px;
            padding-left: 450px;
            padding-bottom:30px;
            font-size: 20px;
        }
        .contact
        {
            width: 1366px;
            background-color: #AFEEEE;
        }
        .contact form{
            text-align: center;
            padding: 10px;
            border: .1rem solid rgba(0, 0, 0, .3);
        }
        .contact h1
        {
            text-align: center;
            padding-top:20px;
        }

        .contact form .inputBox{
            display: block;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .contact form .inputBox input, .contact form  textarea{
            padding: 1rem;
            font-size: 15px;
            background: #f7f7f7;
            text-transform: none;
            margin: 1rem 0;
            border: .1rem solid rgba(0, 0, 0, .3);
            width: 49%;
        }

        .contact form textarea{
            height: 150px;
            resize: none;
            width: 70%;

        }
       
        .footer .credit{
            padding: 2.5rem 1rem;
            border-top:.1rem solid rgba(0, 0, 0, .1);
            margin-top: 1rem;
            text-align: center;
            font-size: 15px;
        }
        .footer .credit span{
            color: var(--green);
        }
        .logo2
        {
            float: left;
        }
        .logo-div
        {
            width:1366px;
            height:200px;
            padding-left: 440px;
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
                     <a href="add_seller.php">Add Sellers</a>
                     <a href="add_buyer.php">Add Buyers</a>
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

    <div class = "div1">
        <h1>WELCOME TO SMARTFARM!</h1>
        <div class="welcome">
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti voluptatem nesciunt recusandae fugit hic impedit id et voluptates unde reprehenderit soluta, aspernatur, dolor sequi minima aperiam vitae, laboriosam placeat culpa.</p>
        </div>
    </div>

    <div class = "logo-div">
    <img src="SFLogo.png" class = "logo2" width = "410" height = "205">
    </div> 

    <section class="contact" id="contact">
            
            <h1 class="heading"> <span>CONTACT</span> US</h1>

            <form action="">
                
                <div class="inputBox">
                    <input type="text" placeholder="Name">
                    <input type="email" placeholder="Email">
                </div>

                    <div class="inputBox">
                    <input type="number" placeholder="Number">
                    <input type="text" placeholder="Subject">
                </div>

                <textarea placeholder="Message" name="" id="" cols="30" rows="10"></textarea>

                <br>

                <input type="submit" value="SEND MESSAGE" class="btn">


            </form>

        </section>

        <section class="footer">
            <h1 class="credit">All rights reserved.<br>©2021. </h1>
            
        </section>

</body>
</html>