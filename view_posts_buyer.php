<?php 

include 'config_seller.php';

session_start();

if (!isset($_SESSION['email_address'])) {
    header("Location: login_user.php");
}


$query = "SELECT * FROM products_table ORDER BY product_name";
$result = mysqli_query($conn,$query);

if (isset($_POST['add_to_cart'])&&isset($_POST['product_id'])) {
   
   if (isset($_SESSION['shopping_cart'])) {

       $item_aray_id=array_column($_SESSION['shopping_cart'], 'product_id');

       if (!in_array($_POST['product_id'], $item_aray_id)) {

        $count=count($_SESSION['shopping_cart']);
        $item_array=array(
        'product_id'=> $_POST['product_id'],
        'product_image'=> $_POST['product_image'],
        'product_name'=> $_POST['product_name'],
        'product_price'=> $_POST['product_price'],
        'product_category'=> $_POST['product_category'],
        'sellers_email'=> $_POST['seller_email'],
        'product_description'=> $_POST['product_description'],
        'quantity'=> $_POST['quantity'],
        );

        $_SESSION['shopping_cart'][$count]=$item_array;


           
       }else{

        echo '<script>alert("Item Already Added")</script>';
        echo '<script>window.location="view_posts_buyer.php"</script>';

       }
   }
   else{
    $item_array=array(
        'product_iid'=> $_POST['product_id'],
        'product_image'=> $_POST['product_image'],
        'product_name'=> $_POST['product_name'],
        'product_price'=> $_POST['product_price'],
        'product_category'=> $_POST['product_category'],
        'sellers_email'=> $_POST['seller_email'],
        'product_desrciption'=> $_POST['product_description'],
        'quantity'=> $_POST['quantity'],

    );
    $_SESSION['shopping_cart'][0]=$item_array;

   }
   

}

if (isset($_GET['action'])) {
    if ($_GET['action']=="delete") {
       foreach ($_SESSION['shopping_cart'] as $keys => $values) {
           if ($values['product_id']==$_GET['product_id']) {
               unset($_SESSION['shopping_cart'][$keys]);
               echo '<script>alert("Item Removed")</script>';
               echo '<script>window.location="view_posts_buyer.php"</script>';

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
    <title>View SmartFarm Sellers</title>
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
           margin-left:10px;
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

    
    <h1> SMART FARM PRODUCTS</h1>
    <div class = "data">
    <form action="" method="post">
        <table>
            <tr>
                  
                
                <th>Product Image</th> 
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Category</th>
                <th>Seller's Email</th>
                <th>Product Description</th>
                <th>Quantity</th>
                <th></th>
                
            </tr>
            <?php
            
            if (!empty($_SESSION['shopping_cart'])) {
                $total=0; 
                foreach ($_SESSION['shopping_cart'] as $keys => $values) {
                   ?>
                   <tr>
                        <td><?php echo '<div style="margin:5px;padding-right:10px"><img src="assets/'.$values["product_image"].'" width="120px" height="100px"><br>';?></td>
                            <td><?php echo $values['product_name']?></td>
                            <td><?php echo $values['product_price']?></td>
                            <td><?php echo number_format($values['quantity'] * $values['product_price'],2); ?></td>
                            <td><?php echo $values['product_category']?></td>
                            <td><?php echo $values['sellers_email']?></td>
                            <td><?php echo $values['product_description']?></td>
                            <td><a href="view_posts_buyer.php?action=delete&product_id=<?php echo $values['product_id']; ?>"><span class="text-danger">Remove</span></a></td>
                   </tr>
                   <?php

                   $total=$total+ ($values['quantity'] * $values['product_price']);

                }
                ?>

                <tr>
                    <td colspan="3" align="right">Totat Amount:  </td>
                    <td align="right"><?php echo number_format($total,2); ?></td>
                </tr>


                <?php



                
                


            }
            ?>
                       

        <?php

             while($rows = mysqli_fetch_assoc($result)){

        ?>

                    <tr>
                        
                        <td><?php echo '<div style="margin:5px;padding-right:10px"><img src="assets/'.$rows["product_image"].'" width="120px" height="100px"><br>';?></td>
                        <td><?php echo $rows['product_name'];?></td>
                        <td><?php echo $rows['product_price'];?></td>
                        <td><?php echo $rows['product_category'];?></td>
                        <td><?php echo $rows['seller_email'];?></td>
                        <td><?php echo $rows['product_description'];?></td>
                        <td><input type="number" name="quantity" min = "0"  required style = "width:40px;" ></td>
                        <input type="text" name="product_image" value="<?php echo $rows['product_image']; ?>" hidden>
                        <input type="text" name="product_id" value="<?php echo $rows['product_id']; ?>" hidden>
                        <input type="text" name="product_name" value="<?php echo $rows['product_name']; ?>" hidden>
                        <input type="text" name="product_price" value="<?php echo $rows['product_price']; ?>" hidden>
                        <input type="text" name="product_category" value="<?php echo $rows['product_category']; ?>" hidden>
                        <input type="text" name="seller_email" value="<?php echo $rows['seller_email']; ?>" hidden>
                        <input type="text" name="product_description" value="<?php echo $rows['product_description']; ?>" hidden>
                        <td><input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart"></td>
                    </tr>

                    <?php } ?>

        </table>
    </form>
    </div>
</body>
</html>