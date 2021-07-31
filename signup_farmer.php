<?php 

include 'config_seller.php';

error_reporting(0);

session_start();

if (isset($_SESSION['email_address'])) {
    header("Location: login_farmer.php");
}

if (isset($_POST['register'])) {
	$first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
	$email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $description = $_POST['description'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM sellers_table WHERE email_address='$email_address'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO sellers_table (first_name, last_name, email_address, phone_number, description, password)
					VALUES ('$first_name', '$last_name', '$email_address', '$phone_number', '$description', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Yay! Registration Completed.')</script>";
				$first_name = "";
                $last_name = "";
				$email_address = "";
                $phone_number = "";
                $description = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Oops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Email Already Exists.Try again.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Farm Seller Sign Up</title>
    <style>
     
     body
     {
         margin: 0;
         padding: auto;
         font-family: 'Times New Roman', serif;
     }
     .logo
     {
        display: block;
       margin-left:auto;
       margin-right:auto;
       width: 100%
     }
     .sign_farmer
     {
         width: 370px;
         height: 740px;
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
     h1
     {
         text-align:center;
         font-size: 20px;
         text-decoration: none;
         font: monospace;
     }
     .register
     {
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin-top:4px;
        margin-left:40px;
        cursor: pointer;
        border-radius: 16px;
        border:none;
        background-color:#AFEEEE;
     }
     .des
     {
         width: 200px;
         height: 100px;
         border-radius:16px;
     }
     
     .sign_farmer a
     {
        text-decoration: none;
	    font-size: 15px;
	    line-height: 20px;
	    color: purple;
        cursor: pointer;
     }
     .sign_farmer a:hover
     {
        color:darkblue;
        text-decoration:underline;
     }
     .sign_farmer input
     {
         border-radius:16px;
         height:30px;
     }
    </style>
</head>
<body>

    <div class="sign_farmer">
    <img src="SFLogo.png" class="logo" width = "210" height = "105" >

    <h1> Signup </h1>

        <form action="" method="POST">
            
            <input type = "text" name = "first_name" placeholder = " Enter First Name" value="<?php echo $first_name; ?>" required>

            <br>
            <br>

            <input type = "text" name = "last_name" placeholder = " Enter Last Name" value="<?php echo $last_name; ?>" required>

            <br>
            <br>

			<input type="email" name="email_address" placeholder=" Enter email address" value="<?php echo $email_address; ?>" required>

            <br>
            <br>

			<input type="phone" name="phone_number" placeholder=" Enter phone number" value="<?php echo $phone_number; ?>" required>

            <br>

            <p>Description of products and location: </p>
			<textarea class = "des" name="description" placeholder=" Briefly describe your products and your location" value="<?php echo $description; ?>" required> </textarea>

            <br>
            <br>

			<input type="password" name="password" placeholder=" Enter password" value="<?php echo $password; ?>" required>

            <br>
            <br>

			<input type="password" name="cpassword" placeholder=" Confirm password" value="<?php echo $cpassword; ?>" required>

            <br>
            <br>
            
            <input class = "register" type="submit" name="register" value="REGISTER">

            <p id = "account">Already have an account? <a  href = "login_farmer.php"> LOG IN</a> </p>
            
            <br>        
        </form>
    </div>
</body>
</html>