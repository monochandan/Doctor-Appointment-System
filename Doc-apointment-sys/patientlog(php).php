<?php
            session_start(); 
            $errors = array();
		     //$errors = array();
		     $db = mysqli_connect('localhost', 'root' , '' , 'das');
             if(isset($_post['submit1']))
			 {
				 $username = mysqli_real_escape_string($db,$_POST['username']);
				 $password = mysqli_real_escape_string($db,$_POST['password']);
				 
				 if(empty($username)) {array_push($errors , "username is requred");}
				 if(empty($password)) {array_push($errors , "password is requred");}
				 
				 if(count($errors) == 0)
				 {
				     $password = md5($password);
				 
				     $query = "SELECT  * FROM patient WHERE username = '$username' AND password = '$password'";
				     $result = mysqli_query($db , $query);
					 if(mysqli_num_rows($result) == 1)
					 {
					 //$_session['username']
					 $_SESSION['success'] = "successfully logged in ";
					 header('location: hospital.php');
					 }
					 else
					 {
						 array_push($errors , "wrong username/password combination");
					 }
				 }
				 
			 }
			 
?>