<?php 

include 'config_seller.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: index_farmer.php");
}

if (isset($_POST['submit'])) {
	$email_address = $_POST['email_address'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM sellers_table WHERE email_address='$email_address' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['email_address'];
		header("Location: index_farmer.php");
	} else {
		echo "<script>alert('Oops! Incorrect Email or Password.')</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Log In</title>
    <style>
          body
     {
         margin: 0;
         padding: auto;
         font-family: 'Times New Roman', serif;;
     }
     .logo
     {
       display: block;
       margin-left:auto;
       margin-right:auto;
       width: 100%
     }
     .log_farmer
     {
         width: 370px;
         height: 460px;
         color:black;
         top:15%;
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
     .login
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
     .log_farmer a
     {
        text-decoration: none;
	    font-size: 15px;
	    line-height: 20px;
	    color: purple;
        cursor: pointer;
     }
     .log_farmer a:hover
     {
        color:darkblue;
        text-decoration:underline;
     }
     .log_farmer input
     {
         border-radius:16px;
         height:30px;
     }
    </style>
</head>
<body>
        

    <div class="log_farmer">
    <img src="SFLogo.png" class="logo" width = "210" height = "105" >

    <h1> Login </h1>
   
    <form action="" method="POST">

        <input type="email" name="email_address" placeholder=" Enter email address" value="<?php echo $email_address; ?>"  required>

        <br>
        <br>
        <br>

        <input type="password" name="password" placeholder=" Enter password" value="<?php echo $password; ?>"  required>
        
        <br>
        <br>

        <a href="forgot_pass_farmer.php">Forgot Password? </a>
        <p id = "account1">Don't have an account? <a  href = "signup_farmer.php"> SIGN UP </a> </p>
        <a href="index.php">Back To Home</a>

        <br>
       
        <input class = "login" type="submit" name="submit" value="LOG IN">
    </form>
    
</body>
</html>