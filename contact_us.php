<?php

include 'config_seller.php';

session_start();

if (!isset($_SESSION['email_address'])) {
    header("Location: login_user.php");
}







?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact Us</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


	<div class="container">
		<div class="row">
			<div class="col-lg-6 m-auto">
				<div class="card mt-5">
					<div class="card-title">
						<h2 class="text-center py-2">Contact US</h2>
						<hr>

						<?php
						$msg="";
						if (isset($_GET['error'])) {
							$msg="Please fill in the empty fields.";
							echo '<div class="alert alert-danger">'.$msg.'</div>';
						}

						if (isset($_GET['success'])) {
							$msg="Your message has been sent successfully!";
							echo '<div class="alert alert-success">'.$msg.'</div>';
						}



						?>


					</div>
					<div class="card-body">
						<form action="contact_process.php" method="post">
							<input type="text" name="name" placeholder="Name" class="form-control mb2">
							<input type="email" name="email" placeholder="Email Address" class="form-control mb-s">
							<input type="text" name="subject" placeholder="Subject" class="form-control mb-2">
							<textarea name="msg" class="form-control" placeholder="Enter Message"></textarea>
							<button class="btn btn-success" name="btn">Send</button>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>

