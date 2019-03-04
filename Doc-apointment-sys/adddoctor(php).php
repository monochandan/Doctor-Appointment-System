<?php
  $errors = array();
  $db = mysqli_connect('localhost','root','','das');
  if(isset($_POST['submit6']))
  {
	             $fullname = mysqli_real_escape_string( $db,$_POST['fullname']);
	             $docid = mysqli_real_escape_string( $db,$_POST['Doctorid']);
				 $username = mysqli_real_escape_string( $db,$_POST['username']);
				 $degree1 = mysqli_real_escape_string( $db,$_POST['degree']);
				 $degree2 = mysqli_real_escape_string( $db,$_POST['degree01']);
				 $degree3 = mysqli_real_escape_string( $db,$_POST['degree02']);
				 $degree4 = mysqli_real_escape_string( $db,$_POST['degree03']);
				 $degree5 = mysqli_real_escape_string( $db,$_POST['degree04']);
				 $specalist = mysqli_real_escape_string( $db,$_POST['specalist']);
				 $email = mysqli_real_escape_string( $db,$_POST['email']);
				 $contact = mysqli_real_escape_string( $db,$_POST['contact']);
				 $password = mysqli_real_escape_string( $db,$_POST['password']);
				 $availability = mysqli_real_escape_string( $db,$_POST['availability']);
				 
				 
				 if(empty($docid)) {array_push($errors , "docid is requred for signUp");}
				 if(empty($fullname)) {array_push($errors , "fullname is requred for signUp");}
				 if(empty($username)) {array_push($errors , "username  is requred for signUp");}
				 if(empty($degree1)) {array_push($errors , "degree1 is requred for signUp");}
				 if(empty($degree2)) {array_push($errors , "degree2 is requred for signUp");}
				 if(empty($degree3)) {array_push($errors , "degree3 is requred for signUp");}
				 if(empty($degree4)) {array_push($errors , "degree4 is requred for signUp");}
				 if(empty($degree5)) {array_push($errors , "degree5 is requred for signUp");}
				 if(empty($specalist)) {array_push($errors , "specalist is requred for signUp");}
				 if(empty($email)) {array_push($errors , "email is requred for signUp");}
				 if(empty($contact)) {array_push($errors , "contact is requred for signUp");}
				 if(empty($password)) {array_push($errors , "password is requred for signUp");}
				 if(empty($availability)) {array_push($errors , "availability is requred for signUp");}
				 
				 $check = "SELECT * FROM doctor WHERE doc_id = '$docid' OR username = '$username' OR email = '$email'";
				 $result = mysqli_query($db,$check);
				 $user = mysqli_fetch_assoc($result);
				 
				 if($user)
				 {
					 if($user['doc_id'] === $docid) {array_push($errors,"the same id is exist");}
					 if($user['username'] === $username){array_push($errors,"username already exist");}
					 if($user['email'] === $email) {array_push($errors,"the Doctor is registered before");}
				 }
				 if(count($errors) == 0)
				 {
				     //$password1 = md5($password1);
				 
				     $query = "INSERT INTO doctor(full_name,doc_id,h_code,username,degree1,degree2,degree3,degree4,degree5,specalist,email,contact_no,password,availability) 
					 VALUES('$fullname','$docid','$_SESSION[hospital_id]','$username','$degree1','$degree2','$degree3','$degree4','$degree5','$specalist','$email','$contact','$password','$availability')";				   
					 $result = mysqli_query($db , $query);
					 
					 if($result == true)
                      {
                                echo "<p class='success'>successfully registered</p>";
                      }
	             }
	}
				 			 
?>