<?php

   $date = $_GET['date'];
   $month = $_GET['month'];
   $year = $_GET['year'];
   $doc_id = $_GET['docid'];
   $shift = $_GET['shift'];
   $hcode = $_GET['hcode'];
   $username = $_GET['username'];
   /*echo $date;
   echo'</br>';
   echo $month;
    echo'</br>';
   echo $year;
    echo'</br>';
   echo $doc_id;
    echo'</br>';
   echo $shift;
    echo'</br>';
   echo $hcode;
    echo'</br>';
   echo $username;*/
   
             $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 
			     $query4 = "SELECT * FROM apointment WHERE date='$date' AND month='$month' AND year='$year' AND  doc_id='$doc_id' AND shift='$shift'AND h_code='$hcode'AND username = '$username'";
				  $result4 = mysqli_query($mysqli,$query4);
				  //$res4 = mysqli_fetch_assoc($result4);
				  //echo  $res4;
				  if($res4 = mysqli_fetch_array($result4))
				 {
					 
					  $time =  $res4['time_slot'];
					  $ser =  $res4['serial'];
   
                      $query5 = "INSERT INTO apnmnt_history(date,month,year,doc_id,shift,time_slot,h_code,status,username,serial)
					            VALUES('$date','$month','$year','$doc_id','$shift','$time','$hcode','Absent','$username','$ser')";
		              $result5 = mysqli_query($mysqli,$query5);
		 
					   if($result5 == true)
					   {
						 
						 $query6 = "DELETE FROM apointment WHERE date = '$date' AND month = '$month' AND year = '$year' AND doc_id = '$doc_id' AND shift = '$shift' 
						            AND time_slot = '$time' AND h_code = '$hcode' AND username = '$username' AND serial = '$ser'";         
				         $result6 = mysqli_query($mysqli,$query6);
						  //echo "result6";
						  //echo $result6;
						 if($result6 == true)
						 {
							 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=doctormain.php">';
						 }  
					 }
					
				 }
?>