<?php 
include 'config_seller.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login_farmer.php");
}

if(isset($_POST['post'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $email_address = $_POST['email_address'];
    $product_description = $_POST['product_description'];
    $product_status = '1';
    $product_imagepath = $_FILES['product_imagepath'];

    $ofile_name = $_FILES['product_imagepath']['name'];
    $tmp_location = $_FILES['product_imagepath']['tmp_name'];

    $file_type = substr($ofile_name, strpos($ofile_name, '.'), strlen($ofile_name));
    $file_path = "assets/";
    $nfile_name = time().$file_type;

    if(is_uploaded_file($_FILES['product_imagepath']['tmp_name'])){
        if(move_uploaded_file($tmp_location, $file_path.$nfile_name)){
            $sql = "INSERT INTO products_table (product_name, product_price, seller_email, product_category, product_description, product_image, status) VALUES ('$product_name', '$product_price', '$email_address', '$product_category', '$product_description', '$nfile_name' , '$product_status' ) ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
 			
                echo "<script>alert('Image has been uploaded to folder.')</script>";
            }else{
                echo "<script>alert('Image Not Uploaded.')</script>";
            }
        }
    }

    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Your Product</title>
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
            display: block;
        margin-left:auto;
        margin-right:auto;
        width: 100%
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
        .post_farmer
     {
         width: 370px;
         height: 710px;
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
         font-size: 23px;
         text-decoration: none;
         font: monospace;
       
     }
     .input
     {
         border-radius:16px;
         height:30px;
     }
     #des
     {
         width: 200px;
         height: 100px;
         border-radius:16px;
     }
     #post
     {
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin-top:4px;
        margin-left:40px;
        cursor: pointer;
        border-radius: 16px;
        border:none;
        background-color:#AFEEEE;
     }
     #post:hover
     {
         background-color:turquoise;
         font-weight:bold;
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
                    <a href="changepassword_farmer.php">Change Password</a>
                    <a href="logout_farmer.php">Logout</a>
                </div>
            </div>
        <div class="dropdown_posts">
			    <button class="dropbtn1">POSTS</button>
                <div class="dropdown-posts">
                    <a href="create_post_farmer.php">Create Post</a>
                    <a href="view_posts_seller.php">View Your Posts</a>
                </div>
            </div>
            
    </div>
    <div class = "header">
        <ul type = "none">
            <li><a href="index_farmer.php"> HOME </a></li>
			<li><a href="about_us.php"> ABOUT US </a></li>
			<li><a href="contact_us.php"> CONTACT US </a></li>
        </ul>
    </div>
    <div class="post_farmer">

    <img src="SFLogo.png" class="logo" width = "210" height = "105" >

    <h1> Post Your Product </h1>

        <form action="" method="POST" enctype = "multipart/form-data">
            
            <input class="input" type = "text" name = "product_name" placeholder = " Enter Product Name"  required>

            <br>
            <br>

            <input class="input" type = "number" name = "product_price" placeholder = " Enter Product Price/Kg"  required>

            <br>
            <br>

            <label for="category">Choose a category:</label>
            <select id="product_category" name="product_category" class="input">
                <option value="fruits">Fruits</option>
                <option value="vegetables">Vegetables</option>
                <option value="dairy">Dairy</option>
                <option value="eggs">Eggs</option>
            </select>

            <br>
            <br>


			<input class="input" type="email" name="email_address" placeholder=" Enter Sellers Email Address"  required>

            <br>
            <br>

			

            <p>Description of products and location: </p>
			<textarea class="input" id = "des" name="product_description" placeholder=" Briefly describe your products and your location"  required> </textarea>

            <br>
            <br>

            <label for="product_imagepath" style="margin-left: 31px;"> Product Image: </label>
            <input  type="file" name="product_imagepath" required="true" id="product_imagepath">

            <br>
            <br>

            
            <input class="input" id = "post" type="submit" name="post" value="POST">

            
            
            <br>        
        </form>
    </div>
</body>
</html>