<?php 

include 'config_seller.php';

session_start();

if (!isset($_SESSION['email_address'])) {
    header("Location: login_user.php");
}

if (isset($_GET['id'])) {
	




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Final Checkout</title>
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
.text-center ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  
}

.text-center li{
	float: left;
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

	<div class="text-center">
		<h1 class="display-4 text-danger">Thank You!</h1>
		<h2 class="text-dark">Your Order has been placed Successfully!</h2>

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
              

            </tr>
            </thead>
            <tbody>

		<?php
		$query = "SELECT * FROM orders WHERE order_id='".$_GET['id']."'";
		$result = mysqli_query($conn,$query);


		if ($result->num_rows > 0) {
			
			$row = mysqli_fetch_assoc($result);
			$email=$row['buyer_email'];
			$products=unserialize($row['products']);
			$address=$row['address'];
			$amount=0;

			echo '<h4 class="bg-info text-secondary rounded p-2" >User Information: </h4>';
			   foreach ($products as $keys => $values) {
                    
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
                            
                           
                   </tr>
               </tbody>
                          
                            
                  
                   <?php

                   $amount=$amount+ ($values['quantity'] * $values['product_price']);

                }

			echo '
		
		<h4>Your Email: '.$email.'</h4>
		<h4>Your Address: '.$address.'</h4>
		<h4>Total Amount Paid:'.$amount.' </h4>';

	
			
		}

		?>
		

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

<?php
}else{
	echo 'Invalid Link';
}
?>