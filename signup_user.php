<?php

$host="localhost";
$user="root";
$pass="";
$db="sfdb";

//mysqli_connect($host,$user,$pass);
//mysqli_select_db($db, 'smartfarmme') or die(mysqli_error($db));
$con = mysqli_connect('localhost', 'root', '', 'sfdb');
if (!$con) {
	die("<script>alert('Connection failed.')</script>");
}


error_reporting(0);
session_start();


if (isset($_SESSION['email_address'])) {
    header("Location: login_user.php");
}

if (isset($_POST['submit'])) {

	$fname=($_POST['fname']);
	$lname=($_POST['lname']);
	$email=($_POST['email']);
	$pnumber=($_POST['pnumber']);
	$password=md5($_POST['password']);
	$cpassword=md5($_POST['cpassword']);

	if ($password == $cpassword){

		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($con, $sql);
		if (!$result->num_rows > 0) {
			$sql="INSERT INTO users (fname,lname,email,pnumber,password) VALUES ('$fname','$lname','$email','$pnumber','$password')";
			$result = mysqli_query($con,$sql);

			if($result){
				echo "<script>alert('Yay! Registration Completed.')</script>";
				$fname = "";
                $lname = "";
				$email = "";
                $pnumber = "";
				$password = "";
				$cpassword = "";

			}else{
				echo "<script>alert('Oops! Something Wrong Went.')</script>";
			}
		}else {
				echo "<script>alert('Email Already Exists.Try again.')</script>";
			}
		
		} else {
			echo "<script>alert('Password Not Matched.')</script>";
		}
		
	}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	
</head>
<body>
	<style type="text/css">

	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: sans-serif;
		}

		body {
			width: 100%;
			margin: 0;
			padding: auto;
			font-family: 'Times New Roman', serif;
		}
		.container {
			width: 350px;
			height: 600px;
			color:black;
			top:10%;
			left:37%;
			position: absolute;
			box-sizing: border-box;
			padding: 5px 90px;  
			font-size:14px;
			font-weight:bold;
			border:1px solid;
			background-color:white;

		}
		.container .avatar{
			display: block;
			margin-left: auto;
			margin-right: auto;
			width: 100%;
		}
		.container .login-text{
			text-align:center;
			font-size: 20px;
			text-decoration: none;
			font: monospace;

		}
		.container .login-last{
			color: #111;
			font-weight: 400;
			font-size: 14px;
			text-align: center;
			margin-bottom: 20px;
			display: black;
			text-transform: capitalize;

		}
		.container .login-last a{
			text-decoration: none;
			color: #6c5ce7;


		}

		.container .login-email .input-group {
			width: 100%;
			height: 30px;
			margin-bottom: 25px;
		}

		.container .login-email .input-group input {
			width: 100%;
			height: 100%;
			padding: 15px 20px;
			font-size: 13px;
			border-radius: 30px;
			background: transparent; 
			outline: none;
			transition: .3s;
		}
		
		.container .login-email .input-group .btn {
			padding: 10px 40px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			margin-top:4px;
			margin-left:30px;
			cursor: pointer;
			border-radius: 16px;
			border:none;
			background-color:#AFEEEE;
		}

		.container .login-email .input-group .btn:hover {
			transform: translateY(-5px);
			background: turquoise;
		}
		.error{
			width: 92%;
			margin: 0px auto;
			padding: 10px;
			border: 1px solid #a94442;
			color: #a94442;
			background: #f2dede;
			border-radius: 5px;
			text-align: left;
		}


	</style>


	<div class="container">
			<img src="logo.png" class="avatar">
		<form action="" method="POST" class="login-email">
			<?php if (count($errors)>0): ?>

			<div class="error">
				<?php  foreach ($errors as $errors): ?>
				<p><?php echo $errors; ?></p>
					
				<?php endforeach ?>
			</div>	

			<?php endif ?>

			
			
			<p class="login-text" >Sign-up</p>
			<br>

			
			<div class="input-group">
				<input type="text" placeholder="First Name" name="fname" value="<?php echo $fname; ?>">
			</div>
			<div class="input-group">
				<input type="text" placeholder="Last Name" name="lname" value="<?php echo $lname; ?>">
			</div>

			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>">
			</div>
			<div class="input-group">
				<input type="tel" placeholder="Phone Number" name="pnumber" value="<?php echo $pnumber; ?>">
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>" >
			</div>
			<div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $cpassword; ?>" >
			</div>

			<div class="input-group">
				<button type="submit" class="btn" name="submit">Sign-up</button>
			</div>
			<p class="login-last">Already have an existing account?<a href="login_user.php">Login here.</a></p>
			<a href="index.php">Back To Home</a>

		</form>
	</div>
</body>

</html>

