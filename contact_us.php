<?php

include 'config_seller.php';

session_start();

if (isset($_POST['send'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (name, email, phone, subject, message)
					VALUES ('$name', '$email', '$phone', '$subject', '$message')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Thank you for your message. We will get back to you soon.')</script>";
        $name = "";
        $email = "";
        $phone = "";
        $subject = "";
        $message = "";
    } else {
        echo "<script>alert('Oops! Something Wrong Went.')</script>";
    }
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

					</div>
					<div class="card-body">
						<form action="" method="POST">

							<input type="text" name="name" placeholder="Name" class="form-control mb2">
							<input type="email" name="email" placeholder="Email Address" class="form-control mb-s">
							<input type="number" name = "phone" placeholder="Number" class="form-control mb-2">
							<input type="text" name="subject" placeholder="Subject" class="form-control mb-2">
							<textarea name="message" class="form-control" placeholder="Enter Message" cols="30" rows="10"></textarea>
							<input type="submit" name = "send" value="SEND MESSAGE" class="btn btn-success">
							
							
						</form>
					
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>

