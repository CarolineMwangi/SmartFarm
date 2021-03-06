<?php

//email_verify.php

$connect = new PDO("mysql:host=localhost;dbname=sfdb", "root", "");

$error_user_otp = '';
$token = '';
$message = '';

if(isset($_GET["code"]))
{
	$token = $_GET["code"];

	if(isset($_POST["submit"]))
	{
		if(empty($_POST["user_otp"]))
		{
			$error_user_otp = 'Enter OTP Number';
		}
		else
		{
			$query = "
			SELECT * FROM users 
			WHERE user_token = '".$token."' 
			AND user_otp = '".trim($_POST["user_otp"])."'
			";

			$statement = $connect->prepare($query);

			$statement->execute();

			$total_row = $statement->rowCount();

			if($total_row > 0)
			{
				$query = "
				UPDATE users 
				SET user_status = '1' 
				WHERE user_token = '".$token."'
				";

				$statement = $connect->prepare($query);

				if($statement->execute())
				{
					header('location:login_user.php?register=success');
				}
			}
			else
			{
				$message = '<label class="text-danger">Invalid OTP Number</label>';
			}
		}
	}
}
else
{
	$message = '<label class="text-danger">Invalid Url</label>';
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>SmartFarm Email Verification </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="http://code.jquery.com/jquery.js"></script>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<br />
		<div class="container">
			<h3 align="center">SmartFarm Email Verification </h3>
			<br />
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Enter OTP Number That Has Been Sent To Your Email</h3>
				</div>
				<div class="panel-body">
					<?php echo $message; ?>
					<form method="POST">
						<div class="form-group">
							<label>Enter OTP Number</label>
							<input type="text" name="user_otp" class="form-control" />
							<?php echo $error_user_otp; ?>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" class="btn btn-success" value="Submit" />
						</div>
					</form>
				</div>
			</div>
		</div>
		<br />
		<br />
	</body>
</html>