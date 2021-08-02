<?php

error_reporting(E_ALL);
session_start();

$host="localhost";
$user="root";
$pass="";
$db="smartfarme";

//mysqli_connect($host,$user,$pass);
//mysqli_select_db($db, 'smartfarmme') or die(mysqli_error($db));
$con = mysqli_connect('localhost', 'root', '', 'smartfarme');
if (!$con) {
	die("<script>alert('Connection failed.')</script>");
}


error_reporting(E_ALL);

$fname="";
$lname="";
$email="";
$pnumber="";
$password="";
$cpassword="";
$errors=array();





if (isset($_POST['submit'])) {
	$fname=($_POST['fname']);
	$lname=($_POST['lname']);
	$email=($_POST['email']);
	$pnumber=($_POST['pnumber']);
	$password=($_POST['password']);
	$cpassword=($_POST['cpassword']);
	
	if (empty($fname)) {
		array_push($errors, "First Name is Required");
	}
	if (empty($lname)) {
		array_push($errors, "Last Name is Required");
	}

if (empty($email)) {
		array_push($errors, "Email is Required");
	}
if (empty($pnumber)) {
		array_push($errors, "Phone number is Required");
	}

if (empty($password)) {
		array_push($errors, "Password is Required");
	}
	if ($password != $cpassword) {
		array_push($errors, "The passwords do not match");
	}
	if (count($errors)==0) {
		$password=md5($password);
		

		$sql="INSERT INTO users (fname,lname,email,pnumber,password) VALUES ('$fname','$lname','$email','$pnumber','$password',)";
		mysqli_query($con,$sql);

		$_SESSION['email']=$email;
		$_SESSION['success']="You are logged in";
		header('location: index_user.php');
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
			min-height: 100vh;
			background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(backie.jpg) ;
			background-position: center;
			background-size: cover;
			display: flex;
			justify-content: center;
			align-items:center;
		}
		.container {
			width: 400px;
			min-height: 400px;
			background: #fff;
			border-radius: 5px;
			box-shadow: 0 0 5px  rgba(0, 0, 0,.3);
			padding: 40px 30px;



		}
		.container .avatar{
			display: block;
			margin-left: auto;
			margin-right: auto;
			width: 100%;
		}
		.container .login-text{
			color: #111;
			font-weight: 500;
			font-size: 20px;
			text-align: center;
			margin-bottom: 20px;
			display: black;
			text-transform: capitalize;

		}
		.container .login-last{
			color: #111;
			font-weight: 500;
			font-size: 1.1rem;
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
			height: 50px;
			margin-bottom: 25px;
		}

		.container .login-email .input-group input {
			width: 100%;
			height: 100%;
			border: 2px solid #e7e7e7;
			padding: 15px 20px;
			font-size: 1rem;
			border-radius: 30px;
			background: transparent; 
			outline: none;
			transition: .3s;
		}
		.container .login-email .input-group input:focus, .container .login-email .input-group input:valid {
			border-color: #a29bfe;
		}
		.container .login-email .input-group .btn {
			display: block;
			width: 100%;
			padding: 15px 20px;
			text-align: center;
			border: none;
			background: #a29bfe;
			outline: none;
			border-radius: 30px;
			font-size: 1.2rem;
			color: #fff;
			cursor: pointer;
			transition: .3s;
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

			
			
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Sign-up</p>

			
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
				<input type="password" placeholder="Password" name="password" >
			</div>
			<div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword"  >
			</div>

			<div class="input-group">
				<button type="submit" class="btn" name="submit">Sign-up</button>
			</div>
			<p class="login-last">Already have an existing account?<a href="login_user.php">Login here.</a></p>

		</form>
	</div>
</body>

</html>

