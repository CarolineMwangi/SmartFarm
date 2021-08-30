<?php

//index.php

//error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

if(isset($_SESSION["user_id"]))
{
	header("location:home.php");
}


$connect = new PDO("mysql:host=localhost; dbname=sfdb", "root", "");

$message = '';
$error_user_name = '';
$error_user_email = '';
$error_user_password = '';
$error_user_cpassword = '';
$user_name = '';
$user_email = '';
$user_password = '';
$user_cpassword = '';

if(isset($_POST["register"]))
{
	if(empty($_POST["user_name"]))
	{
		$error_user_name = "<label class='text-danger'>Enter Name</label>";
	}
	else
	{
		$user_name = trim($_POST["user_name"]);
		$user_name = htmlentities($user_name);
	}

	if(empty($_POST["user_email"]))
	{
		$error_user_email = '<label class="text-danger">Enter Email Address</label>';
	}
	else
	{
		$user_email = trim($_POST["user_email"]);
		if(!filter_var($user_email, FILTER_VALIDATE_EMAIL))
		{
			$error_user_email = '<label class="text-danger">Enter Valid Email Address</label>';
		}
	}

	if(empty($_POST["user_password"]))
	{
		$error_user_password = '<label class="text-danger">Enter Password</label>';
	}
	else
	{
		$user_password = trim($_POST["user_password"]);
		$user_password = md5($user_password);
	}
    if(empty($_POST["user_cpassword"]))
	{
		$error_user_cpassword = '<label class="text-danger">Confirm Password</label>';
	}
	else
	{
		$user_cpassword = trim($_POST["user_cpassword"]);
		$$user_cpassword = md5($user_cpassword);
	}

	if($error_user_name == '' && $error_user_email == '' && $error_user_password == '' && $error_user_cpassword == '')
	{
		$user_activation_code = md5(rand());

		$user_otp = rand(100000, 999999);

		$data = array(
			':user_name'		=>	$user_name,
			':user_email'		=>	$user_email,
			':user_password'	=>	$user_password,
            ':user_cpassword'	=>	$user_cpassword,
			':user_activation_code' => $user_activation_code,
			':user_email_status'=>	'0',
			':user_otp'			=>	$user_otp
		);

		$query = "
		INSERT INTO register
		(name, email, password, token, status, otp)
		SELECT * FROM (SELECT :user_name, :user_email, :user_password, :user_activation_code, :user_email_status, :user_otp) AS tmp
		WHERE NOT EXISTS (
		    SELECT email FROM register WHERE email = :user_email
		) LIMIT 1
		";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		if($connect->lastInsertId() == 0)
		{
			$message = '<label class="text-danger">Email Already Registered</label>';
		}	
		else
		{
			
			
            require 'PHPMailer-master/src/Exception.php';
            require 'PHPMailer-master/src/PHPMailer.php';
            require 'PHPMailer-master/src/SMTP.php';
			$mail = new PHPMailer;
			$mail->IsSMTP();
            $mail -> Mailer = "smtp";
            $mail->SMTPDebug  = 1; 
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = '587';
			$mail->SMTPAuth = true;
			$mail->Username = 'farmsmart086@gmail.com';
			$mail->Password = 'smartfarm600.';
			$mail->SMTPSecure = 'tls';
			$mail->From = 'farmsmart086@gmail.com';
			$mail->FromName = 'SmartFarm';
			$mail->AddAddress($user_email, $user_name);
			$mail->WordWrap = 50;
			$mail->IsHTML(true);
			$mail->Subject = 'Verification code for Verify Your Email Address';

			$message_body = '
			<p>For verify your email address, enter this verification code when prompted: <b>'.$user_otp.'</b>.</p>
			<p>Sincerely,</p>
			';
			$mail->Body = $message_body;

			if($mail->Send())
			{
				echo '<script>alert("Please Check Your Email for Verification Code")</script>';

				header('location:email_verify.php?code='.$user_activation_code);
			}
			else
			{
				$message = $mail->ErrorInfo;
			}
		}

	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Seller Signup</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="http://code.jquery.com/jquery.js"></script>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<br />
		<div class="container">
        <img src="SFLogo.png" class="logo" width = "210" height = "105" style = "display: block; margin-left:auto; margin-right:auto; " >
			<h1 align="center">SIGN UP AS A SELLER ON SMARTFARM</h1>
			<br />
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Seller Registration</h3>
				</div>
				<div class="panel-body">
					<?php echo $message; ?>
					<form method="post">
						<div class="form-group">
							<label>Enter Your Name</label>
							<input type="text" name="user_name" class="form-control" />
							<?php echo $error_user_name; ?>
						</div>
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
							<label>Confirm Your Password</label>
							<input type="password" name="user_cpassword" class="form-control" />
							<?php echo $error_user_cpassword; ?>
						</div>
						<div class="form-group">
							<input type="submit" name="register" class="btn btn-success" value="Click to Register" style = "background-color:#AFEEEE; color:black; font-weight:bold;"/>&nbsp;&nbsp;&nbsp;
							<a href="login_farmer.php">Login</a>
						</div>
					</form>
				</div>
			</div>
		</div>
		<br />
		<br />
	</body>
</html>