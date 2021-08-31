<?php 

include 'config_seller.php';

session_start();
$checkout= array();

if (!isset($_SESSION['email_address'])) {
    header("Location: login_user.php");
 }


$query = "SELECT * FROM products_table ORDER BY product_name";
$result = mysqli_query($conn,$query);

if (isset($_POST['submit'])) {


  
    
    

            if (!empty($_SESSION['shopping_cart'])) {
                $id=uniqid();

      
         $address=($_POST['address']);
        $buyer_email=($_POST['buyer_email']);
        $products=serialize($_SESSION['shopping_cart']);
        $mpesa_code=($_POST['mpesa_code']);
        $pnumber=($_POST['pnumber']);


       

    

           $sql="INSERT INTO orders (order_id, buyer_email, products, address, mpesa_code, pnumber) VALUES ('$id','$buyer_email', '$products','$address', '$mpesa_code', '$pnumber') ";
            $result = mysqli_query($conn,$sql);

            if ($result) {
                echo "<script>alert('Order Complete.')</script>";
                unset($_SESSION['shopping_cart']);
                echo "<script>window.location.href='final_checkout.php?id=".$id."';</script>";
            }else{
                echo "<script>alert('Oops! Something went wrong.')</script>";
            }
        }else{
            echo "<script>alert('You have no products in cart.')</script>";
        }
       
   
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

       <!-- font awesome cdn link -->
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    
</head>
<body>

    <style type="text/css">
       .btn{
    display: inline-block;
    margin-top: 1rem;
    background: #2B65EC;
    color: #fff;
    padding: .8rem 3rem;
    font-size: 30px;
    text-align: center;
    cursor: pointer;
}

.btn:hover{
    background:#1E90FF ;
}


@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap');

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
    overflow-x: hidden;
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



    </style>
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
                <!-- Adding a row in the nav bar -->
                <div class="row justify-content-center">
                    <h1 class="heading text-center" > <?php echo "WELCOME, " . $_SESSION['email_address'] . ""; ?></h1>
                </div>
                <!-- Adding a row in the nav bar for the nav links-->
            <div class="row justify-content-center">        
                <a href="index_user.php">Home</a>
                
                <?php if (isset($_SESSION['email_address'])): ?> 

                    <a href="view_posts_buyer.php">Shop Products</a>
                     <a href="profile_user.php">Profile</a>

                <?php endif ?>
                  <?php if (isset($_SESSION['email_address'])): ?> 
                         <a href="changepassword_user.php">Change password</a>

                <?php endif ?>
                <a href="about_us.php">About us</a>
                <a href="#">Contact Us</a>

                <?php if (isset($_SESSION['email_address'])): ?> 
                    <a href="logout_user.php">Logout</a>
                     
                <?php endif ?>
            </div>
            <div class="icons">
                    <a href="view_posts_buyer.php" class="fas fa-shopping-basket">
                         <?php
                    if (isset($_SESSION['shopping_cart'])) {
                        $count=count($_SESSION['shopping_cart']);
                        echo "<span id=\"card_count\" class=\"text-info \">$count</span>" ;
                    }else{
                          echo "<span id=\"card_count\" class=\"text-warning bg-light\">0</span>" ;
                    }
                    ?>
                    </a>
                    
                    <a href="profile_user.php" class="fas fa-user-circle"></a>
                </div>

            </nav>

            

        </div>

    </header>
    


  
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-lg-6 px-4 pb-4" id="order">
                <h4 class="text-center text-info p-2">Complete your order!</h4>
                 <?php
            
            if (!empty($_SESSION['shopping_cart'])) {
                $total=0; 


                foreach ($_SESSION['shopping_cart'] as $keys => $values) {
                    
                   ?>
                   <tr >
                        <td><?php echo '<div style="margin:5px;padding-right:10px"><img src="assets/'.$values["product_image"].'" width="120px" height="100px"><br>';?></td>
                            <td>Product:   </td>
                            <td><?php echo $values['product_name']?></td>
                            <td>Unit Price:  </td>
                            <td><?php echo $values['product_price']?></td>
                            <td>Total price:   </td>
                            <td><?php echo number_format($values['quantity'] * $values['product_price'],2); ?></td>
                           
                            
                            
                            <td><a href="view_posts_buyer.php?action=delete&product_id=<?php echo $values['product_id']; ?>"><span class="text-danger" style="color: turquoise;">Remove</span></a></td>
                   </tr>
                   <?php

                   $total=$total+ ($values['quantity'] * $values['product_price']);

                }
                ?>

                <tr>
                    <td colspan="3" align="right">Totat Amount:  </td>
                    <td align="right"><?php echo number_format($total,2); ?></td>
                </tr>

                <form action="#" method="post" id="placeOrder">
                    <input type="email" name="buyer_email" placeholder="Enter Email" value="<?php  echo $_SESSION['email_address'] ?>" hidden>
                    <h6 class="text-center lead">Select Payment Method</h6>
                    <div class="form-group">
                        <select name="pmode" class="form-control" id="select">
                            <option value="" select disabled>Select Payment Mode</option>
                            <option value="cod" id="pod">Pay on Delivery</option>
                            <option value="mpesa" id="mpesa">M-Pesa</option>
                            
                        </select>
                        <div id="mpesa1" >
                          
                          
                        
                            <p>MAKE PAYMENT ON MPESA SEND MONEY NUMBER XXXXXXXXXX then fill the form below:</p>
                            <input type="text" name="mpesa_code" value="" placeholder="M-Pesa transaction code" >
                            <input type="number" name="pnumber" value="" placeholder="Phone Number used to make payment" >
                            
                        
                        </div>
                          <script type="text/javascript">
                                
                                $(document).ready(function(){
                                    $("#mpesa1").css("visibility", "hidden");

                                $("#select").click(function(){
                                    //alert("Doesnt work");
                                if($(this).val() == "mpesa") {
        $("#mpesa1").css("visibility", "visible");

    }
    else{
         $("#mpesa1").css("visibility", "hidden");
    }
});
});
</script>
                    </div>
                    <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address here eg. South B Blue Garden Estate House no. 5"></textarea>

                    <div class="form-group">
                        <input type="submit"  class="btn" name="submit" value="Proceed to Checkout" class="btn btn-danger btn-block">
                    </div>
                </form>
                <?php
            }else{
                echo 'You have no products in the cart.';
            }
            ?>
            </div>
        </div>
    </div>

</body>
</html>