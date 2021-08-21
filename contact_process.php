<?php

	if (isset($_POST['btn'])) {
		$name=$_POST['name'];
		$email=$_POST['email'];
		$subject=$_POST['subject'];
		$msg=$_POST['msg'];

		if (empty($name) || empty($email) || empty($subject) || empty($msg)) 
		{
			header('location:contact_us.php?error');


		}
		



		}



	
	else{
		header("location:contact_us.php");
	}


?>