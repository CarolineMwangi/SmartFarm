
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


if(isset($_POST['submit'])){
     
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if($password == $cpassword){
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($con, $sql);
        if($result-> num_rows > 0){

            $sql = "UPDATE users set password='$password' where email='$email'";
            $result = mysqli_query($con, $sql);
            if($result){
                echo "<script>alert('Yay! Password Successfully Updated.')</script>";
                $email = "";
                $password = "";
                $cpassword = "";
                
            }else{
                echo "<script>alert('Oops! Something Wrong Went.')</script>";
            }

        }else{
            echo "<script>alert('Oops! Invalid Details.Try again')</script>";
        }
    }else{
        echo "<script>alert('Password Not Matched.')</script>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<title>Change Password User</title>
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
			height: 30px;
			margin-bottom: 25px;
		}

		.container .login-email .input-group input {
			width: 100%;
			height: 100%;
			padding: 20px 20px;
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
			margin-left:60px;
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
		<img src="logo.png" class="avatar" width = "190" height = "110" >
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

			<p class="login-text" style="font-size: 20px; font-weight: 800;">Change Password</p>
			<div class="input-group">

				<input type="email" placeholder="Email" name="email" value="<?php if(isset($_POST['email'])){
					echo $_POST['email'];
				} ?>">
			</div>
			<br>
		
			<br>
			<div class="input-group">
				<input type="password" placeholder="New Password" name="password" value="<?php if(isset( $_POST['password'])){
					echo $_POST['password'];
				} ?>" >
			</div>
			<br>
			<div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php if(isset($_POST['cpassword'])){
					echo $_POST['cpassword'];
				} ?>" >
			</div>
			<br>
			<div class="input-group">
				<button name="submit" class="btn">Change Password</button>
			</div>
			<br>
			<div class="">
			<p class="login-last"><a href="index_user.php">Back To Home</a></p>
		</div>


		</form>
	</div>

</body>

</html>
