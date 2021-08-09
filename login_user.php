<?php

$host="localhost";
$user="root";
$pass="";
$db="sfdb";

$email="";
$fname="";
$lname="";
$pnumber="";

$password="";
$errors=array();

//mysqli_connect($host,$user,$pass);
//mysqli_select_db($db, 'smartfarmme') or die(mysqli_error($db));
$con = mysqli_connect('localhost', 'root', '', 'sfdb');
if (!$con) {
	die("<script>alert('Connection failed.')</script>");
}


session_start();

if (isset($_POST['submit'])) {
	$email=($_POST['email']);
	$password=($_POST['password']);

	if (empty($email)) {
		array_push($errors," Email is Required");
	}
	if (empty($password)) {
		array_push($errors," Password is required");
	}
	//print_r($errors);

	if (count($errors)==0) {
		$password=md5($password);
		$query=" SELECT * FROM users WHERE email='$email' AND password='$password'";
		$result= mysqli_query($con, $query);
		
		echo mysqli_num_rows($result);
		if (mysqli_num_rows($result)==1) {
			foreach ($result as $row) {
				
			if (isset($_SESSION)) {
				session_start();
			
			
			$_SESSION['email']=$email;
			$_SESSION['fname']=$row['fname'];
			$_SESSION['lname']=$row['lname'];
			$_SESSION['pnumber']=$row['pnumber'];
		

			$_SESSION['success']="You are logged in";
			header('location: index_user.php');
		}else{
			echo "Session Expired";
		}
	}
			
		}else{
			array_push($errors, "The email or password is incorrect");

					}
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
			height: 370px;
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
		<img src="logo.png" class="avatar" width = "210" height = "105">
		<form action="" method="POST" class="login-email">
			<?php if (count($errors)>0): ?>

			<div class="error">
				<?php  foreach ($errors as $errors): ?>
				<p><?php echo $errors; ?></p>
					
				<?php endforeach ?>
			</div>	
				<?php endif ?>

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
			<p class="login-last">Don't have an Account?<a href="signup_user.php">Sign-up here.</a></p>
		</div>


		</form>
	</div>

</body>

</html>