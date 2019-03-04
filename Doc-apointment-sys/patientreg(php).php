<?php
            session_start(); 
            $errors = array();
		     //$errors = array();
		     $db = mysqli_connect('localhost', 'root' , '' , 'das');
			 if(isset($_POST['submit2']))
			 {
				 $fullname = mysqli_real_escape_string( $db,$_POST['fullname']);
				 $username = mysqli_real_escape_string( $db,$_POST['username']);
				 $phn = mysqli_real_escape_string( $db,$_POST['phn']);
				 $age = mysqli_real_escape_string( $db,$_POST['age']);
				 $email = mysqli_real_escape_string( $db,$_POST['email']);
				 $password1 = mysqli_real_escape_string( $db,$_POST['password1']);
				 $password2 = mysqli_real_escape_string( $db,$_POST['password2']);
				 
				 
				 if(empty($fullname)) {array_push($errors , "fullname is requred for signUp");}
				 if(empty($username)) {array_push($errors , "username is requred for signUp");}
				 if(empty($phn)) {array_push($errors , "phone no. is requred for signUp");}
				 if(empty($age)) {array_push($errors , "age is requred for signUp");}
				 if(empty($email)) {array_push($errors , "email is requred for signUp");}
				 if(empty($password1)) {array_push($errors , "password is requred for signUp");}
				 if(empty($password2)) {array_push($errors , "password is requred for signUp");}
				 if($password1 != $password2){array_push($errors , "passwords dont match for signUp");}
				 
				 $check = "SELECT * FROM patient WHERE username = '$username' OR email = '$email' LIMIT 1";
				 $result = mysqli_query($db,$check);
				 $user = mysqli_fetch_assoc($result);
				 
				 if($user)
				 {
					 if($user['username'] === $username)
					 {
						 array_push($errors , "username already exist");
					 }
					 if($user['email'] === $email)
					 {
						 array_push($errors , "email already exist");
					 }
				 }
				 if(count($errors) == 0)
				 {
				     //$password1 = md5($password1);
				 
				     $query = "INSERT INTO patient(full_name,username,phon_no,age,email,password) VALUES('$fullname ','$username','$phn','$age','$email','$password1')";
				     $result = mysqli_query($db , $query);
					  if($result == true)
                      {
                                echo "<p class='success'>successfully registered</p>";
                      }
					 //$_session['username']
					 //$_SESSION['success'] = "successfull registration";
				 }
			 }
			 
			 if(isset($_POST['submit1']))
			 {
				 $username = mysql_real_escape_string($_POST['username']);
				 $password = mysql_real_escape_string($_POST['password']);
				 
				 if(empty($username)) {array_push($errors , "username is requred for logIn");}
				 if(empty($password)) {array_push($errors , "password is requred for logIn");}
				 
				 if(count($errors) == 0)
				 {
				     //$password = md5($password);
				 
				     $query = "SELECT  * FROM patient WHERE username = '$username' AND password = '$password'";
				     $result = mysqli_query($db , $query);
					 if(mysqli_num_rows($result) == 1)
					 {
					 $_SESSION['username'] = $username;
					 //$_SESSION['success'] = "successfully logged in ";
					 header('location: hospital.php');
					// '<META HTTP-EQUIV="Refresh" Content="0; URL=hospital.php">';
					 }
					 else
					 {
						 array_push($errors , "wrong username/password combination");
					 }
				 }
				 
			 }
			 
		  ?>