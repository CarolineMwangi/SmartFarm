<?php 

include 'config_seller.php';

session_start();

error_reporting(0);

if (isset($_SESSION['email_address'])) {
    header("Location: index_user.php");
}


if (isset($_POST['submit'])) {
		$email=$_POST['email'];
		$password=md5($_POST['password']);

		
		$query=" SELECT * FROM users WHERE email='$email' AND password='$password'";
		$result= mysqli_query($con, $query);
		
		if ($result->num_rows > 0) {
			
			$row = mysqli_fetch_assoc($result);
			$_SESSION['email_address'] = $row['email'];
			$_SESSION['fname'] = $row['fname'];
			$_SESSION['lname'] = $row['lname'];
			$_SESSION['pnumber'] = $row['pnumber'];

			header("Location: index_user.php");
	
			
		}else{

			echo "<script>alert('Oops! Incorrect Email or Password.')</script>";

		}
	


if (isset($_POST['login'])) {
	$email_address = $_POST['user_email'];
	$password = md5($_POST['user_password']);
    


	$sql = "SELECT * FROM users WHERE user_email='$email_address' AND user_password='$password' AND user_status= '1'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['email_address'] = $row['user_email'];
		header("Location: index_user.php");
	} else {
		echo "<script>alert('Oops! Incorrect Email or Password.')</script>";
	}

}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
		<title>Buyer Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="http://code.jquery.com/jquery.js"></script>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<br />
		<div class="container">
        <img src="SFLogo.png" class="logo" width = "210" height = "105" style = "display: block; margin-left:auto; margin-right:auto; " >
			<h1 align="center">LOG IN AS A BUYER ON SMARTFARM</h1>
			<br />
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Buyer Login</h3>
				</div>
				<div class="panel-body">
					<?php echo $message; ?>
					<form method="post">
						
						<div class="form-group">
							<label>Enter Your Email</label>
							<input type="text" name="user_email" class="form-control" />
							<?php echo $error_user_email; ?>
						</div>
						<div class="form-group">
							<label>Enter Your Password</label>
							<input type="password" name="user_password" class="form-control" />
							<?php echo $error_user_password; ?>
						</div>
                        
						<div class="form-group">
							<input type="submit" name="login" class="btn btn-success" value="Click to Login" style = "background-color:#AFEEEE; color:black; font-weight:bold;"/>&nbsp;&nbsp;&nbsp;
							<a href="signup_user.php">Signup</a>
						</div>
					</form>
				</div>
			</div>
		</div>
		<br />
		<br />
	</body>
</html>
