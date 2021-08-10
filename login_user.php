<?php

$host="localhost";
$user="root";
$pass="";
$db="sfdb";

$errors=array();

//mysqli_connect($host,$user,$pass);
//mysqli_select_db($db, 'smartfarmme') or die(mysqli_error($db));
$con = mysqli_connect('localhost', 'root', '', 'sfdb');
if (!$con) {
	die("<script>alert('Connection failed.')</script>");
}


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
			header("Location: index_user.php");
	
			
		}else{

			echo "<script>alert('Oops! Incorrect Email or Password.')</script>";

		}
	

}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<title>Login form</title>
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
			height: 470px;
			color:black;
			top:20%;
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
			margin-bottom: 20px;
			display: black;
			text-transform: capitalize;

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
			padding: 10px 50px;
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
			background:turquoise;
		}
			
	</style>


	<div class="container">
		<img src="logo.png" class="avatar" width = "210" height = "105">
		<form action="" method="POST" class="login-email">
			
			<p class="login-text" >Login</p>
			<br>
			<div class="input-group">
			
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" >
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php if(isset($_POST['password'])){
					echo $_POST['password'];
				} ?>" >
			</div>
			<div class="input-group">
				<button type="submit" name="submit" class="btn">Login</button>
			</div>
			<div class="">
			<a href="forgot_pass_farmer.php"  >Forgot Password? </a>
			<br>
			<br>
			<p class="login-last">Don't have an Account?<a href="signup_user.php">Sign-up here.</a></p>
		</div>


		</form>
	</div>

</body>

</html>