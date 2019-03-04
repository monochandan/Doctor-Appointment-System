<?php 
 session_start();
 $errors = array();
 
 $db = mysqli_connect('localhost','root','','das');
  //$avl = ;
 if(isset($_POST['submit3']))
 {
	 $username = mysqli_real_escape_string($db,$_POST['username']);
	 $doctorid = mysqli_real_escape_string($db,$_POST['doctorid']);
	 $hospid = mysqli_real_escape_string($db,$_POST['hospid']);
	 $shift =  mysqli_real_escape_string($db,$_POST['shift']);
	 $password =  mysqli_real_escape_string($db,$_POST['password']);
	 
	 if(empty($username)){array_push($errors,"username requred for logIn");}
	 if(empty($doctorid)){array_push($errors,"username requred for logIn");}
	 if(empty($hospid)){array_push($errors,"password requred for logIn");}
	 if(empty($shift)){array_push($errors,"username requred for logIn");}
	 if(empty($password)){array_push($errors,"password requred for logIn");}
	 
	 if(count($errors) == 0)
	 {
		 $query = "SELECT * FROM doc_hospital WHERE doc_id = '$doctorid' AND h_code = '$hospid' 
		            AND shift = '$shift' AND availability = 'available'";
		 $result = mysqli_query($db,$query);
		 $res = mysqli_num_rows($result);
		 //echo $res;
		 if($res == 1)
		 {
			 $query1 = "SELECT * FROM doctor WHERE doc_id = '$doctorid' AND h_code = '$hospid' AND password = '$password'";
		     $result1 = mysqli_query($db,$query1);
		     $res1 = mysqli_num_rows($result1);
			// echo $res1;
			 if($res1 == 1)
			 {
				  // $query2 = "SELECT full_name FROM doctor WHERE doc_id = '$doctorid' AND h_code = '$hospid' AND username = '$username'";
                  // $result2 = mysqli_query($db,$query2);
				  // if($res2 = mysqli_fetch_array($result2))
				   //{
					 //  echo $res2['full_name'];
				   //}
				   //$_SESSION['full_name']  = $res1['full_name'];
			       $_SESSION['username'] = $username;
				   $_SESSION['doc_id'] = $doctorid;
				   $_SESSION['hosp_id'] = $hospid;
				   $_SESSION['shift'] = $shift;
			       header('location:doctormain.php');
			 }
			 else
		     {
			      array_push($errors,"wrong password");
		     }
		 }
		 else
		 {
			 array_push($errors,"something wrong");
		 }
			 
	 }
 }

?>