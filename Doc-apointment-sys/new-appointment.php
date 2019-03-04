<?php include('patientreg(php).php');?>
<html>
<head>
<style>
body
   {
   background-image:url('back.jpg');
   }
   
    .content
   {
	   margin-left:510px;
   }
   .sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
.img
{
	margin-left : 400px;
}
 h2
   {
	   margin-top:-45px;
	   margin-left:460px;
   }
form
{
	width: 30%;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid #80C4De;
	background: white;
	border-radius: 0px 0px 10px 10px;
}
.input-field
{
	margin: 10px 0px 10px 0px;
}
.input-field label
{
	display: block;
	text-align: left;
	margin: 3px;
}
.input-field input
{
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius; 5px;
	border: 1px solid gray;
}	
.btn
{
	padding: 10px;
	font-size: 15px;
	color: white;
	background: #5F9EA0;
	border: none;
	border-radius: 5px;
}
select
{
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius; 5px;
	border: 1px solid gray;
}
.success 
  {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
  }
  .error 
  {
  color: #ff1a1a; 
  background: #ff6666; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
  padding: 10px;
  }
</style>
</head>
<body>
  <div class="content">
     <img  class='img' src = "user1.png" width="60" height="60"/>
     <?php if(isset($_SESSION["username"])): ?>
	 <h2><?php echo $_SESSION['username']; ?></h2>
	 <?php endif ?>
  </div>
  <a href="dashbord.php?"/>Back</a>
  
  <div class="col-lg-12 text-center">
       <h1 style="font-family:Lucida Console"><center>New Appointment</center></h1>
   </div>
   <form method="post" id="new-appointment">
		     <?php
		     $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 ?>
          <div class="input-field">
		     <label for="date">Date</label>
			 <select name="date_input">
			 <option value="select_date">select vallid date</option>
			 <?php 
			   $a_date = date('y-m-d');
			   $today = date('d');
               //$lastday = date('t',strtotime($a_date));
	           while($today <= 31):
	          ?>
			  <option value="<?php echo $today ?>"><?php echo $today ?>  <?php $today++; endwhile; ?></option> 					  
            </select>			 
		</div>
		
		<div class="input-field">
		   <label for= "month">Month</label>
		      <select name="month_input">
		           <option value="month">select month</option>
		            <option value="1">JANUARY</option>
		          <option value="2">FEBRUARY</option>
		        <option value="3">MARCH</option>
		          <option value="4">APRIL</option>
		            <option value="5">MAY</option>
		           <option value="6">JUN</option>
		           <option value="7">JULY</option>
		          <option value="8">AUGUST</option>
		          <option value="9">SEPTEMBAR</option>
		       <option value="10">OCTOBARE</option>
		       <option value="11">NOVEMBER</option>
		          <option value="12">DECEMBER</option>
		     </select>
		</div>
		
		
		<div class="input-field">
		     <label for="year">Year</label>
			 <select name="year_input">
			 <option value="19">2019</option> 	
            </select>			 
		</div>
		
		<?php
	     $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 //where avlblty=1;
			 $result = $mysqli->query("SELECT full_name,doc_id FROM doctor")or die ($mysqli->error());
		?>
		<div class="input-field">
		     <label for="Doctor ID">Doctor ID</label>
			 <select name="docid_input">
			 <option value="docid">Select Doctor ID</option>
			 <?php 
	           //$i = 0;
	           while($doc = $result->fetch_assoc()):
	          ?>
			  <option value="<?php echo $doc['doc_id']; ?>"><?php 
			  echo '('; 
			  echo $doc['doc_id'];
			  echo ')'; 
			  echo $doc['full_name'];?>  <?php endwhile; ?></option>
			 <select>
		</div>
		
		<div class="input-field">
	        <label for="shift">Shift</label> 
			<select name="select_shift">
			  <option value="SHIFT">Select Shift</option>   
              <option value="morning1">Morning-01(8 AM - 10 AM)</option>
              <option value="morning2">Morning-02(10 AM - 12 PM)</option>
              <option value="afternoon">Afternoon(4 PM - 6 PM)</option>
              <option value="evening">Evening(7 PM - 9 PM)</option>
             </select>
		</div>
		
		<div class="input-field">
	        <label for="time-slot">Time Slot</label> 
	        <select name="select_time">
			  <option value="TIME">Select Time Slot</option> 
              <option value="01">Morning-01 Shift</option> 			  
              <option value="8AM-8:15AM">8 AM - 8:15 AM</option>
              <option value="8:20AM-8:35AM">8:20 AM - 8:35 AM</option>
              <option value="8:40AM-8:55AM">8:40 AM - 8:55 AM</option>
              <option value="9:00AM- 9:15AM">9:00 AM - 9:15 AM</option>
			  <option value="9:20AM-9:35AM">9:20 AM - 9:35 AM</option>
              <option value="9:40AM-9:55AM">9:40 AM - 9:55 AM</option>
              <option value="10:00AM-10:15AM">10:00 AM - 10:15 AM</option>
			  <option value="dass">===========================</option> 
			  <option value="02">Morning-02 Shift</option> 
              <option value="10:30AM-10:45AM">10:30 AM - 10:45 AM</option>
			  <option value="10:50AM-11:05AM">10:50 AM - 11:05 AM</option>
              <option value="11:10AM-11:25AM">11:10 AM - 11:25 AM</option>
              <option value="11:30AM-11:45AM">11:30 AM - 11:45 AM</option>
              <option value="11:50AM-12:05PM">11:50 AM- 12:05 PM</option>
			  <option value="12:10PM-12:25PM">12:10 PM - 12:25 PM</option>
              <option value="12:30PM-12:45PM">12:30 PM - 12:45 PM</option>
			  <option value="dass">===========================</option> 
			  <option value="03">Afternoon Shift</option> 
              <option value="4:00PM-4:15PM">4:00 PM - 4:15 PM</option>
              <option value="4:20PM-4:35PM">4:20 PM - 4:35 PM</option>
			  <option value="4:40 PM-4:55PM">4:40 PM - 4:55 PM</option>
              <option value="5:00PM-5:15PM">5:00 PM - 5:15 PM</option>
              <option value="5:20PM-5:35PM">5:20 PM - 5:35 PM</option>
              <option value="5:40PM-5:55PM">5:40 PM - 5:55 PM</option>
			  <option value="6:00PM-6:15PM">6:00 PM - 6:15 PM</option>
			  <option value="dass">===========================</option> 
			  <option value="04">Eveninh Shift</option> 
              <option value="7:00PM-7:15PM">7:00 PM - 7:15 PM</option>
              <option value="7:20PM-7:35PM">7:20 PM - 7:35 PM</option>
              <option value="7:40PM-7:55PM">7:40 PM - 7:55 PM</option>
			  <option value="8:00PM-8:15PM">8:00 PM  - 8:15 PM</option>
              <option value="8:20PM-8:35PM">8:20 PM - 8:35 PM</option>
              <option value="8:40PM-8:55PM">8:40 PM - 8:55 PM</option>
              <option value="9:00PM-9:15PM">9:00 PM - 9:15 PM</option>
             </select>
		</div>
		
		<?php
	         $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 //where avlblty=1;
			 $result1 = $mysqli->query("SELECT h_name,h_code FROM hospital")or die ($mysqli->error());
		?>
		<div class="input-field">
		     <label for="hospid">Hospital ID</label>
			 <select name="hosid_input">
			 <option value="hosid">Select Hospital</option>
			 <?php 
	           //$i = 0;
	           while($hosp = $result1->fetch_assoc()):
	          ?>
			  <option value="<?php echo $hosp['h_code']?>"><?php echo '('; echo $hosp['h_code']; echo ')'; echo $hosp['h_name']; ?>  <?php endwhile; ?></option>
			 <select>
		</div>
		<div class="input-field">
		     <input type="submit" name = "submit" value="submit" class="btn"/>
	    </div>
		
             <?php
		     $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 
			 
			 if(isset($_POST['submit']))
			 {
				  $date = $_POST['date_input'];
				  $month = $_POST['month_input'];
				  $year = $_POST['year_input'];
				  $docid = $_POST['docid_input'];
				  $shift = $_POST['select_shift'];
				  $time = $_POST['select_time'];
				  $hosp_id = $_POST['hosid_input'];
				
				 $a_date = date('m');
				 $serial = 0;
				 $date1 = 29;
				 $date2 = 30;
				 $date3 = 31;
				 echo $shift;
				 echo "</br>";
				 echo $time;
				/*$time1 = array("8 AM - 8:15 AM","8:20 AM - 8:35 AM","8:40 AM - 8:55 AM","9:00 AM - 9:15 AM",
				                "9:20 AM - 9:35 AM","9:40 AM - 9:55 AM","10:00 AM - 10:15 AM");
				$time2 = array("10:30 AM - 10:45 AM","10:50 AM - 11:05 AM","11:10 AM - 11:25 AM",
				               "11:30 AM - 11:45 AM","11:50 AM- 12:05 PM","12:10 PM - 12:25 PM","12:30 PM - 12:45 PM");
				$time3 = array("4:00 PM - 4:15 PM","4:20 PM - 4:35 PM","4:40 PM - 4:55 PM","5:00 PM - 5:15 PM",
				                "5:20 PM - 5:35 PM","5:40 PM - 5:55 PM","6:00 PM - 6:15 PM");
				$time4 = array("7:00 PM - 7:15 PM","7:20 PM - 7:35 PM","7:40 PM - 7:55 PM","8:00 PM  - 8:15 PM",
				               "8:20 PM - 8:35 PM","8:40 PM - 8:55 PM","9:00 PM - 9:15 PM");*/
				
				if($docid == "docid" || $month == "month"||$shift == "shift"|| $time == "TIME"|| $time == "dass" || $hosp_id == "hosid")
				{
					echo "Field is empty";
					exit;
				}
				if($month != $a_date)
				{
					echo"<p class='error'>not valid month</p>";
					exit;
				}
				if(($month=='2' && $date >= $date1) || ($month == '6' && $date >= $date2) || (($month == '3' || $month == "4" || $month == "9" || $month == '11') && $date >= $date3))
				{
					echo "<p class='error'>invalid date</p>";
					exit;
				}
				if($date && $month && $year && $docid && $shift && $time && $hosp_id)
				{
					
					
					$check = "SELECT * FROM doc_hospital WHERE doc_id = '$docid' AND h_code = '$hosp_id' AND shift = '$shift' AND availability = 'available' ";
					$result = mysqli_query($mysqli,$check);
					$res = mysqli_fetch_assoc($result);
                    //echo $res;					
					
				     if($res == 0)
				     {
						echo "<p class='error'>doctor is not employeed in this hospital</p>";
						exit;
				     }
					 
					 
					$check1 = "SELECT * FROM apointment WHERE date = '$date' AND month = '$month' AND year = '$year' AND doc_id = '$docid'
					           AND shift = '$shift' AND h_code = '$hosp_id'";
				    $result1 = mysqli_query($mysqli,$check1);
					$res1 = mysqli_num_rows($result);
					     
					//echo $res1;
					echo '</br>';
					 if($res1 != 0)
				     {
						 if($shift = "morning1")
						 {
                             
							echo "<p class='error'>This slot's are not Available in this shift";
							echo '</br>';
						    while($res2 = mysqli_fetch_assoc($result1))
						     {
								
							    echo $res2['time_slot'];
							    echo '</br>';  
						     }
							 exit;
						 } 
						 if($shift = "morning2")
						 {
							echo "<p class='error'>This slot's are not Available in this shift";
							echo '</br>';
						    while($res2 = mysqli_fetch_assoc($result1))
						     {
								
							    echo $res2['time_slot'];
							    echo '</br>';  
						     }
							 exit;;
						 }
						 if($shift = "afternoon")
						 {
							echo "<p class='error'>This slot's are not Available in this shift";
							echo '</br>';
						    while($res2 = mysqli_fetch_assoc($result1))
						     {
								
							    echo $res2['time_slot'];
							    echo '</br>';  
						     }
							 exit;
						 }
						 if($shift = "evening")
						 {
							echo "<p class='error'>This slot's are not Available in this shift";
							echo '</br>';
						    while($res2 = mysqli_fetch_assoc($result1))
						     {
								
							    echo $res2['time_slot'];
							    echo '</br>';  
						     }
							 exit;
						 }
				     }
					 
					 
					 $check2 = "SELECT * FROM apointment WHERE doc_id = '$docid' AND shift = '$shift'  AND h_code = '$hosp_id' AND 
					            username = '$_SESSION[username]' AND status = 'not checked'";  
					           
				    $result2 = mysqli_query($mysqli,$check2);
					$res2 = mysqli_num_rows($result2);
					
					
					 if($res2 == 1)
				     {
						 
						echo "<p class='error'>you exist in a slot</p>";
						exit;
				     }
				}
				 if($shift = "morning1" && $time != "8AM-8:15AM" || $time != "8:40AM-8:55AM" ||
				$time != "9:00AM-9:15AM"||$time != "9:20AM-9:35AM" ||$time != "9:40AM-9:55AM" 
				||$time != "10:00AM-10:15AM" )
				{echo "<p class='error'>shift and slot unmatch1</p>"; exit;}
				
				if($shift = "morning2" && $time != "10:30AM-10:45AM" || $time != "10:50AM-11:05 AM" ||
				   $time != "11:10AM-11:25AM" ||$time != "11:30AM-11:45AM" ||$time != "11:50AM-12:05PM" ||
				   $time != "12:10PM-12:25PM" || $time != "12:30PM-12:45PM" )
				{echo "<p class='error'>shift and slot unmatch2</p>"; exit;}
				
				if($shift = "afternoon" && $time != "4:00PM-4:15PM" ||$time != "4:20PM-4:35PM" ||
				$time != "4:40PM-4:55PM" ||$time != "5:00PM-5:15PM" ||$time != "5:20PM-5:35PM" ||
				$time != "5:40PM-5:55PM" ||$time != "6:00PM-6:15PM")
				
				{echo "<p class='error'>shift and slot unmatch3</p>"; exit;}
				
				if($shift = "evening" &&$time != "7:00PM-7:15PM" ||$time != "7:20PM-7:35PM" ||
				$time != "7:40PM-7:55PM" ||$time != "8:00PM-8:15PM" ||$time != "8:20PM-8:35PM" ||
				$time != "8:40PM-8:55PM" ||$time != "9:00PM-9:15PM")
				{echo "<p class='error'>shift and slot unmatch4</p>"; exit;}
				
				if($time == "8AM-8:15AM" ||$time == "10:30AM-10:45AM" ||$time == "4:00PM-4:15PM" ||$time == "7:00PM-7:15PM")
				{$serial = 1;}
				if($time == "8:20AM-8:35AM" ||$time == "10:50AM-11:05AM" ||$time == "4:20PM-4:35PM" ||$time == "7:20PM-7:35PM")
				{$serial = 2;}
				if($time == "8:40AM-8:55AM" ||$time == "11:10AM-11:25AM" ||$time == "4:40PM-4:55PM" ||$time == "7:40PM-7:55PM")
				{$serial = 3;}
				if($time == "9:00AM-9:15AM" ||$time == "11:30AM-11:45AM" ||$time == "5:00PM-5:15PM" ||$time == "8:00PM-8:15PM")
				{$serial = 4;}
				if($time == "9:20AM-9:35AM" ||$time == "11:50AM-12:05PM" ||$time == "5:20PM-5:35PM" ||$time == "8:20PM-8:35PM")
				{$serial = 5;}
				if($time == "9:40AM-9:55AM" ||$time == "12:10PM-12:25PM" ||$time == "5:40PM-5:55PM" ||$time == "8:40PM-8:55PM")
				{$serial = 6;}
				if($time == "10:00AM-10:15AM" ||$time == "12:30PM-12:45PM" ||$time == "6:00PM-6:15PM" ||$time == "9:00PM-9:15PM")
				{$serial = 7;}
				 
				
				
				
				   //ksdjfhdksljfhdskjfhdskjfhdsjfhdslkjfhdskljfh
				 //dkfjhsdkfjhdskjfhdslkfjhdslkfjhdslkfjhdslkfjh ,month,year,doc_id,shift,time_slot,h_code  ,'$month','$year','$docid','$shift','$time','$hosp_id'
				
				
					
					 $query = "INSERT INTO apointment(date,month,year,doc_id,shift,time_slot,h_code,status,username,serial)
					 VALUES('$date','$month','$year','$docid','$shift','$time','$hosp_id','not checked','$_SESSION[username]','$serial')";
					 $result = mysqli_query($mysqli,$query);
				
					 
					 if($result == true)
                      {
                               //echo "<p class='success'>successfully registered</p>";
							   echo '<META HTTP-EQUIV="Refresh" Content="0; URL=dashbord.php">';
							   
                      }
				  
				 			 
				 
			 }
		?>		
   </form>
</script>
</body>
</html>