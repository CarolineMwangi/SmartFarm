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

       

    

           $sql="INSERT INTO orders (order_id, buyer_email, products, address) VALUES ('$id','$buyer_email', '$products','$address') ";
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


    
</head>
<body>

    <style type="text/css">
       .btn{
    display: inline-block;
    margin-top: 1rem;
    background: #2B65EC;
    color: #fff;
    padding: .8rem 3rem;
    font-size: 0.9rem;
    text-align: center;
    cursor: pointer;
}

.btn:hover{
    background:#1E90FF ;
}



    </style>
    


  
    <div class="container">
        <img src="logo.png" width="200 " height="80">
        <div class="row justify-content-center">
            <div class="col-lg-6 px-4 pb-4" id="order">
                <h4 class="text-center text-info p-2">Complete your order!</h4>
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
                            <td><?php echo $values['product_description']; ?></td>
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

                <form action="#" method="post" id="placeOrder">
                    <input type="email" name="buyer_email" placeholder="Enter Email" value="<?php  echo $_SESSION['email_address'] ?>" hidden>
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