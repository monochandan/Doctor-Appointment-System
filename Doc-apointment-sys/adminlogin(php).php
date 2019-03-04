<?php
    session_start();
	$errors = array();
	
	$db = mysqli_connect('localhost','root','','das');
	
	if(isset($_POST['submit']))
	{
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$hosp_id = mysqli_real_escape_string($db,$_POST['hospital_id']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		
		if(empty($username)){array_push($errors,"user name requred for logIn");}
		if(empty($hosp_id)){array_push($errors,"valid hospital ID requred for logIn");}
		if(empty($password)){array_push($errors,"Password requred for logIn");}
		
		if(count($errors) == 0)
		{
		   $check = "SELECT * FROM admin WHERE username = '$username' AND hospital_id = '$hosp_id' AND  password = '$password'";
		   $result = mysqli_query($db,$check);
		   
		   if(mysqli_num_rows($result) == 1)
		   {
			   $_SESSION['username'] = "ADMIN";
			   $_SESSION['hospital_id'] = $hosp_id;
			   header("location: adminmain.php");
		   }
		   else
		   {
			   array_push($errors,"wrong combination");
		   }
		}
	}
?>