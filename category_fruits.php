<?php

include 'config_seller.php';

session_start();

if (!isset($_SESSION['email_address'])) {
    header("Location: login_user.php");
}


$query = "SELECT * FROM products_table  WHERE product_category='fruits'";
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
        echo '<script>window.location="category_fruits.php"</script>';

       }
   }
   else{
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
    $_SESSION['shopping_cart'][0]=$item_array;

   }


}

if (isset($_GET['action'])) {
    if ($_GET['action']=="delete") {
       foreach ($_SESSION['shopping_cart'] as $keys => $values) {
           if ($values['product_id']==$_GET['product_id']) {
               unset($_SESSION['shopping_cart'][$keys]);
               echo '<script>alert("Item Removed")</script>';
               echo '<script>window.location="category_fruits.php"</script>';

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

    <!-- font awesome cdn link -->
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
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
            font-size:20px;
            padding: 20px;
        }
        body{
          font-size: 15px;
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





        /* Copied css */




        :root{
    --green: turquoise;
    --black: #2c2c54;
}

*{
    font-family: 'Times New Roman', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
    text-transform: capitalize;
    transition: all .2s linear;
}

*::selection{
    background: var(--green);
    color: #fff;
}

html{
    font-size: 62.5%;
    overflow-x: auto;
    scroll-padding-top: 6.5rem;
    scroll-behavior: smooth;
}
section{
    padding: 2rem;
}
.btn{
    display: inline-block;
    margin-top: 1rem;
    background: var(--green);
    color: #fff;
    padding: .8rem 3rem;
    font-size: 1.7rem;
    text-align: center;
    cursor: pointer;
}

.btn:hover{
    background: var(--black);
}
.heading{
    text-align: center;
    color: var(--black);
    text-transform: uppercase;
    padding: 1rem;
    font-size: 3.5rem;
    padding-bottom: 2rem;
}

.heading span{
    color: var(--green);
    text-transform: uppercase;
}


.header-1{
    background: #eee;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 2rem 9%;

}

.logo{
    color: var(--black);
    font-weight: bolder;
    font-size: 3rem;
}

.logo span{
    padding-right: 5rem;
    color: var(--green);
}

.header-1 .search-box-container{
    display: flex;
    height: 5rem;
}

.header-1 .search-box-container #search-box-container{
    height: 100%;
    width: 100%;
    padding: 1rem;
    font-size: 2rem;
    color: #333;
    border: 1rem solid rgba(0, 0, 0, .3);
    text-transform: none;
}

.header-1 .search-box-container label{
    height: 100%;
    width: 8rem;
    font-size: 2.5rem;
    line-height: 5rem;
    color: #fff;
    background: var(--green);
    text-align: center;
    cursor: pointer;
}

.header-1 .search-box-container label:hover{
    background: var(--black);
}

.header-2{
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 2rem 9%;
    box-shadow: 0.5rem 1rem rgba(0, 0, 0, .1);
    position: relative;

}
.header-2 .active{
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 10000;
}

.header-2 .navbar a{
    padding: .5rem 1.5rem;
    font-size: 2rem;
    border-radius: .5rem;
    color: var(--black);
}

.header-2 .navbar a:hover{
    background: var(--green);
    color: #fff;
}

.header-2 .icons a{
    font-size: 2.5rem;
    color: var(--black);
    padding-left: 1rem;
}

.header-2 .icons a:hover{
    color: var(--green);
}

#menu-bar{
    font-size: 3rem;
    border-radius: .5rem;
    border: .1rem solid var(--black);
    padding: .8rem 1.5rem;
    color: var(--black);
    cursor: pointer;
    display: none;
}

.home{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
}

.home .image{
    flex: 1 1 40rem;
    padding-top: 5rem;
}

.home .image img{
    width: 100%;
}

.home .content{
    flex: 1 1 40rem;
}

.home .content span{
    font-size: 3rem;
    color: #333;

}

.home .content h3{
    font-size: 5rem;
    color: var(--black);
}
.deal{
    background-position: left;
}

.deal .content{
    max-width: 100%;
    text-align: center;
}
.deal .content .count-down{
    justify-content: center;
}


.banner-container{
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
}

.banner-container .banner{
    flex: 1 1 40rem;
    height: 25rem;
    overflow:hidden ;
    position: relative;
}
.banner-container .banner img{
    height: 100%;
    width: 100%;
    object-fit: cover;
}
.banner-container .banner .content{
    position: absolute;
    top: 50%;
    left: 4%;
    transform: translateY(-50%);
}

.banner-container .banner .content h3{
    font-size: 3rem;
    color: var(--black);
}
.banner-container .banner .content p{
    font-size: 2rem;
    color:#333;
}
.banner-container .banner:hover img{
    transform: scale(1.2) rotate(-5deg);
}
.category .box-container{
    display: flex;
    gap: 1.5rem;
    flex-wrap: wrap;
}
.category .box-container .box{
    border: .1rem solid rgba(0, 0, 0, .3);
    border-radius: .5rem;
    text-align: center;
    padding: 2rem;
    flex: 1 1 25rem;
}
.category .box-container .box img{
    width: 20rem;
    margin: .5rem 0;
}
.category .box-container .box h3{
    font-size: 3.5rem;
    color: var(--black);
}
.category .box-container .box p{
    font-size: 2rem;
    color: #666;
    padding: .5rem 0;
}
.category .box-container .box .btn{
    display: block;
}

.product .box-container{
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
}
.product .box-container .box{
    flex: 1 1 30rem;
    text-align: center;
    padding: 2rem;
    border: .1rem solid rgba(0, 0, 0, .3);
    border-radius: .5rem;
    overflow: hidden;
    position: relative;
}
.product .box-container .box img{
    height: 20rem;
}
.product .box-container .box .discount{
    position: absolute;
    top: 1rem;
    left: 1rem;
    background: rgba(0, 255, 0, .1);
    color: var(--green);
    padding: .7rem 1rem;
    font-size: 2rem;
}
.product .box-container .box .icons{
    position: absolute;
    top: .5rem;
    right: -6rem;
}
.product .box-container .box:hover .icons{
    right: 1rem;
}
.product .box-container .box .icons a{
    display: block;
    height: 4.5rem;
    width: 4.5rem;
    line-height: 4.5rem;
    font-size: 1.7rem;
    color: var(--black);
    background: rgba(0, 0, 0, .05);
    border-radius: 50%;
    margin-top: .7rem;

}
.product .box-container .box .icons a:hover{
    background: var(--green);
    color: #fff;
}
.product .box-container .box h3{
    color: var(--black);
    font-size: 2.5rem;
}
.product .box-container .box .stars i{
    padding: 1rem .1rem;
    font-size: 1.7rem;
    color: gold;

}
.product .box-container .box .price{
    font-size: 2rem;
    color: #333;
    padding: .5rem 0;
}
.product .box-container .box .price span{
    font-size: 1.5rem;
    color: #999;
    text-decoration: line-through;
}
.product .box-container .box .quantity{
    display: flex;
    align-items: center;
    justify-content: center;
    padding-top: 1rem;
    padding-bottom: .5rem ;
}
.product .box-container .box .quantity span{
    padding: 0.7rem;
    font-size: 1.7rem;
}
.product .box-container .box .quantity input{
    border: .1rem solid rgba(0, 0, 0, .3);
    font-size: 1.5rem;
    font-weight: bolder;
    color: var(--black);
    padding: .5rem;
    background: rgba(0, 0, 0, .05);
}
.product .box-container .box .btn{
    display: block;
}

.deal{
    background: url(veg3.jpg) no-repeat;
    background-position: center;
    background-size: cover;
    padding-top: 7rem;
    padding-bottom: 7rem;
}
.deal .content{
    max-width: 50rem;
}
.deal .content .title{
    font-size: 4rem;
    color: var(--black);
}
.deal .content p{
    font-size: 1.7rem;
    padding: 1rem 0;
    color: #333;
}

.deal .content .count-down{
    display: flex;
    gap: 1rem;
    padding: .5rem 0;
}
.deal .content .count-down .box{
    width: 9rem;
    text-align: center;
    box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
    border: .1rem solid rgba(0, 0, 0, .3);
}
.deal .content .count-down .box h3{
    color: var(--black);
    background: #fff;
    height: 7rem;
    line-height: 7rem;
    width: 100%;
    font-size: 5rem;

}
.deal .content .count-down .box span{
    display: block;
    background: var(--black);
    color: #fff;
    width: 100%;
    padding:.5rem ;
    font-size: 2rem;
}
.contact form{
    text-align: center;
    padding: 2rem;
    border: .1rem solid rgba(0, 0, 0, .3);
}

.contact form .inputBox{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}
.contact form .inputBox input, .contact form  textarea{
    padding: 1rem;
    font-size: 1.7rem;
    background: #f7f7f7;
    text-transform: none;
    margin: 1rem 0;
    border: .1rem solid rgba(0, 0, 0, .3);
    width: 49%;
}

.contact form textarea{
    height: 20rem;
    resize: none;
    width: 100%;

}

.footer .box-container{
    display: flex;
    gap: 1.5rem;
    flex-wrap: wrap;
}

.footer .box-container .box{
    padding: 1rem 0;
    flex: 1 1 25rem;
}
.footer .box-container .box .share a{
    padding: 0;
    height: 4rem;
    width: 4rem;
    line-height: 4rem;
    text-align: center;
}
.footer .box-container .box h3{
    font-size: 2.5rem;
    color: var(--black);
}
.footer .box-container .box p{
    font-size: 1.3rem;
    color: #666;
    padding: .7rem 0;
}

.footer .box-container .box .links a{
    display: block;
    padding: .5rem 0;
    font-size: 1.7rem;
    color: #333;
}
.footer .box-container .box .links a:hover{
    text-decoration: underline;
    color: var(--green);
}
.footer .credit{
    padding: 2.5rem 1rem;
    border-top:.1rem solid rgba(0, 0, 0, .1);
    margin-top: 1rem;
    text-align: center;
    font-size: 2rem;
}
.footer .credit span{
    color: var(--green);
}


@media(max-width:1200px){

    html{
        font-size: 55%;
    }
}

@media(max-width:991px){

    .header-1,
    .header-2{
        padding: 2rem;
    }
    section{
        padding: 2rem;
    }
}
@media(max-width: 768px){
    #menu-bar{
        display: initial;
    }
    .header-2 .navbar{
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: var(--black);
        padding: 1rem 2rem;
        display: none;
    }
    .header-2 .navbar .active{
        display: initial;
    }



    .header-2 .navbar a{
        font-size: 2.5rem;
        display: block;
        text-align: center;
        background: #fff;
        padding: 1rem;
        margin: 1.5rem 0;
    }
    .home .content{
        text-align: center;
    }
    .home .content h3{
        font-size: 4rem;
    }
    .contact form .inputBox input{
        width: 100%;
    }
}

@media(max-width:450px){

    html{
        font-size: 50%;
    }
    .heading{
        font-size: 3rem;
    }

    .header-1{
        flex-flow: column;
    }

    .header-1 .search-box-container{
        width: 100%;
        margin-top: 2rem;
    }

    .logo{
        font-size: 4rem;
    }
    .deal .content .count-down .box h3{
        font-size: 4rem;
    }
    .deal .content .count-down .box span{
        font-size: 1.5rem;
    }
}
    </style>


<link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
</head>
<body>
     <header>
        <div class="header-1" style = "background-color:white;">


            <img src="logo.png" width="200 " height="80">

            <form action="" class="search-box-container"  >
                <input type="search" id="search-box" placeholder=" Search here..." style = "border: 1px solid black;">
                <label for="search-box" class="fas fa-search"></label>
            </form>


        </div>

        <div class="header-2" style = "background-color:#AFEEEE;">

            <div id="menu-bar" class="fas fa-bars"></div>

            <nav class="navbar">


               <h1 class="heading"> <?php echo "WELCOME, " . $_SESSION['email_address'] . ""; ?></h1>


                <a href="index_user.php">Home</a>

                <?php if (isset($_SESSION['email_address'])): ?>

                    <a href="view_posts_buyer.php">Shop Products</a>
                     <a href="profile_user.php">Profile</a>



                <?php endif ?>
                  <?php if (isset($_SESSION['email_address'])): ?>
                         <a href="changepassword_user.php">Change password</a>

                <?php endif ?>
                <a href="about_us.php">About us</a>
                <a href="contact_us.php">Contact Us</a>

                <?php if (isset($_SESSION['email_address'])): ?>
                    <a href="logout_user.php">Logout</a>

                <?php endif ?>

            </nav>

            <div class="icons">
                <a href="view_posts_buyer.php" class="fas fa-shopping-basket">
                    <?php
                    if (isset($_SESSION['shopping_cart'])) {
                        $count=count($_SESSION['shopping_cart']);
                        echo "<span id=\"card_count\" class=\"text-warning bg-light\">$count</span>" ;
                    }else{
                          echo "<span id=\"card_count\" class=\"text-warning bg-light\">0</span>" ;
                    }
                    ?>
                </a>
                
                <a href="profile_user.php" class="fas fa-user-circle"></a>


            </div>

        </div>

    </header>

    <br>
    <h1> SMART FARM PRODUCTS</h1>
    <br>
    <h1>Shopping Cart</h1>
    <div class = "data" style="padding:8px!important">

        <table id="tbl_products1">
          <thead>
            <tr>

                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Total Amount</th>
                <th>Product Category</th>
                <th>Seller's Email</th>
                <th>Product Description</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            <?php

            if (!empty($_SESSION['shopping_cart'])) {
                $total=0;
                foreach ($_SESSION['shopping_cart'] as $keys => $values) {

                   ?>
                   <tr>
                        <td><?php echo '<div style="margin:5px;padding-right:10px"><img src="assets/'.$values["product_image"].'" width="120px" height="100px"><br>';?></td>
                            <td><?php echo $values['product_name']?></td>
                            <td><?php echo $values['product_price']?></td>
                            <td><?php echo $values['quantity']?></td>
                            <td><?php echo number_format($values['quantity'] * $values['product_price'],2); ?></td>
                            <td><?php echo $values['product_category']?></td>
                            <td><?php echo $values['sellers_email']?></td>
                            <td><?php echo $values['product_description']?></td>
                            <td><a href="category_fruits.php?action=delete&product_id=<?php echo $values['product_id']; ?>"><span class="text-danger">Remove</span></a></td>
                   </tr>
                   <?php

                   $total=$total+ ($values['quantity'] * $values['product_price']);

                }
                ?>




                <?php







            }
            ?>
            
            </tbody>
          </table>
          <?php   if (!empty($_SESSION['shopping_cart'])) { ?>
          <tr>
              <td colspan="5" align="right"><b>Totat Amount:  </b>  </td>
              <td colspan="5" align="left"><?php echo number_format($total,2); ?></td>
            
             
          </tr>
         <a href="address_user.php" class="btn">Buy Now!</a>


        <?php } ?>
          <br>
          <h1>Fruits Category</h1>
            <table id="tbl_products">
              <thead>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Category</th>
                <th>Seller's Email</th>
                <th>Product Description</th>
                <th>No. of Products</th>
                <th>Action</th>
              </thead>
              <tbody>
        <?php

             while($rows = mysqli_fetch_assoc($result)){

        ?>

                    <tr>
                        <form action="" method="post">
                          <td><?php echo '<div style="margin:5px;padding-right:10px"><img src="assets/'.$rows["product_image"].'" width="120px" height="100px"><br>';?></td>
                          <td><?php echo $rows['product_name'];?></td>
                          <td><?php echo $rows['product_price'];?></td>
                          <td><?php echo $rows['product_category'];?></td>
                          <td><?php echo $rows['seller_email'];?></td>
                          <td><?php echo $rows['product_description'];?></td>
                          <td>
                            <input type="number" name="quantity" min = "0"  style = "width:40px;  background-color: darkgray;" required>
                            <input type="text" name="product_image" value="<?php echo $rows['product_image']; ?>" hidden>
                            <input type="text" name="product_id" value="<?php echo $rows['product_id']; ?>" hidden>
                            <input type="text" name="product_name" value="<?php echo $rows['product_name']; ?>" hidden>
                            <input type="text" name="product_price" value="<?php echo $rows['product_price']; ?>" hidden>
                            <input type="text" name="product_category" value="<?php echo $rows['product_category']; ?>" hidden>
                            <input type="text" name="seller_email" value="<?php echo $rows['seller_email']; ?>" hidden>
                            <input type="text" name="product_description" value="<?php echo $rows['product_description']; ?>" hidden>
                          </td>
                          <td><input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart"></td>
                        </form>
                    </tr>



                    <?php } ?>


                      </tbody>
        </table>
          


    </div>
    <script type="text/javascript">

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="js/main.js"></script>
    <script>
    $(document).ready(function() {
      $('#tbl_products').DataTable();
      $('#tbl_products1').DataTable();
    } );
    </script>
</body>
</html>
