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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="text-center">
		<h1 class="display-4 text-danger">Thank You!</h1>
		<h2 class="text-success">Your Order has been placed Successfully!</h2>
		<?php
		$query = "SELECT * FROM orders WHERE order_id='".$_GET['id']."'";
		$result = mysqli_query($conn,$query);

		if ($result->num_rows > 0) {
			
			$row = mysqli_fetch_assoc($result);
			$email=$row['buyer_email'];
			$products=unserialize($row['products']);
			$address=$row['address'];
			$amount=0;

			echo '<h4 class="bg-danger text-light rounded p-2" >Items Purchased:  </h4>';
			   foreach ($products as $keys => $values) {
                    
                   ?>
                   <ol>
                   	<li>
                   		   <p><?php echo $values['product_name']?></p>
                            <p><?php echo $values['product_price']?></p>
                            <p><?php echo $values['quantity']?></p>
                            <p><?php echo number_format($values['quantity'] * $values['product_price'],2); ?></p>
                            <p><?php echo $values['product_category']?></p>
                            <p><?php echo $values['sellers_email']?></p>
                            <p><?php echo $values['product_description']; ?></p>
                   	</li>
                        
                          
                            
                   </ol>
                   <?php

                   $amount=$amount+ ($values['quantity'] * $values['product_price']);

                }

			echo '
		<h4>Your Name: '.$_SESSION['email_address'].' </h4>
		<h4>Your Email: '.$email.'</h4>
		<h4>Your Address: '.$address.'</h4>
		<h4>Total Amount Paid:'.$amount.' </h4>';

	
			
		}

		?>
		

	</div>

</body>
</html>

<?php
}else{
	echo 'Invalid Link';
}
?>