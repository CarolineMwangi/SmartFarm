
<?php

$host="localhost";
$user="root";
$pass="";
$db="sfdb";

$email="";
$errors=array();
$msg1="";
$msg2="";



//mysqli_connect($host,$user,$pass);
//mysqli_select_db($db, 'smartfarmme') or die(mysqli_error($db));
$con = mysqli_connect('localhost', 'root', '', 'sfdb');
if (!$con) {
	die("<script>alert('Connection failed.')</script>");
}

//use this when starting sessions
if(!isset($_SESSION)) {session_start();}

if (isset($_POST['submit'])) {

	$email=($_POST['email']);
	$opassword=($_POST['opassword']);
	$password=($_POST['password']);
	$cpassword=($_POST['cpassword']);

	if (empty($email)) {
		array_push($errors, "Email is Required");
	}
	if (empty($opassword)) {
		array_push($errors, "Old Password is Required");
	}

if (empty($password)) {
		array_push($errors, "New Password is Required");
	}
	if (empty($cpassword)) {
		array_push($errors, "Confirm Password is Required");
	}

	//check if Passwords match
	if($password!=$cpassword){
		array_push($errors, "Passwords do not match");
	}

	//excecute query when errors are 0
	if(empty($errors)){
		$query= mysqli_query($con,"SELECT email,password from users where email='$email' AND password='".md5($opassword)."'");

		//count result
		$num=mysqli_num_rows($query);

		if ($num>0) {
			$bn=mysqli_query($con,"UPDATE users set password='".md5($password)."' where email='$email'");
			$_SESSION['msg1']="Password Changed Successfully";
			header("Location: login_user.php");
		}else{
			$_SESSION['msg2']="Old password or email is incorrect";
		}
	}


}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<title>Change Password form</title>
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
		<img src="logo.png" class="avatar">
		<?php
		if(isset($_SESSION['msg1'])){
			?>
			<p style="color:red;"><?php
			echo $_SESSION['msg1'];
			unset($_SESSION['msg1']); //for error messages, unset the session after echo

			?></p>
			<?php
		}
		if(isset($_SESSION['msg2'])){
			?>
					<p style="color:red;"><?php
					echo $_SESSION['msg2'];
					unset($_SESSION['msg2']); //for error messages, unset the session after echo

					?></p>
			<?php
		}
		 ?>
		<form action="" method="POST" class="login-email">
			<?php if (count($errors)>0): ?>

			<div class="error">
				<?php  foreach ($errors as $errors): ?>
				<p><?php echo $errors; ?></p>

				<?php endforeach ?>
			</div>
				<?php endif ?>

			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Change Password</p>
			<div class="input-group">

				<input type="email" placeholder="Email" name="email" value="<?php if(isset($_POST['email'])){
					echo $_POST['email'];
				} ?>">
			</div>
			<div class="input-group">
				<input type="password" placeholder="Old Password" name="opassword" value="<?php if(isset($_POST['opassword'])){
					echo $_POST['opassword'];
				} ?>" >
			</div>
			<div class="input-group">
				<input type="password" placeholder="New Password" name="password" value="<?php if(isset( $_POST['password'])){
					echo $_POST['password'];
				} ?>" >
			</div>
			<div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php if(isset($_POST['cpassword'])){
					echo $_POST['cpassword'];
				} ?>" >
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Change Password</button>
			</div>
			<div class="">
			<p class="login-last"><a href="login_user.php">Login here.</a></p>
		</div>


		</form>
	</div>

</body>

</html>
