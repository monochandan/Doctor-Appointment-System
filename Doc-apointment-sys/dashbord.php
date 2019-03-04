<?php include('patientreg(php).php'); ?>
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
.img1
{
	margin-left : 370px;
	margin-top: 180px;
}
.img2
{
	margin-left : 700px;
	margin-top: -45px;
}
.img3
{
	margin-left : 1090px;
	margin-top: -60px;
}
.button1
{
	position: absolute;
    top: 60%;
	left: 28%;
}
.button2
{
	position: absolute;
    top: 60%;
	left: 50%;
}
.button3
{
	position: absolute;
    top: 60%;
	left: 75%;
}
button
{
	position: absolute;
	top: 5%;
	left: 10%;
	transform: translate(-60%, -60%);
}
button{
	background: none;
	color: #ccc;
	width: 200px;
	height: 40px;;
	border: 2px solid #338033;
	font-size: 18px;
	border-radius: 4px;
	transition: .6s;
	overflow: hidden;	
}
button:focus{
	outline: none;
}
button:before{
	content: '';
	display: block;
	position: absolute;
	background: rgb(153, 230, 153);
	width: 60px;
	height: 100%;
	left: 0;
	top: 0;
	opacity: .5s;
	filter: blur(30px);
	transform: translteX(-130px) skewX(-15deg);
}
button:after{
	content: '';
	display: block;
	position: absolute;
	background: rgba(255,255,255,.2);
	width: 30px;
	height: 100%;
	left: 30px;
	top: 0;
	opacity: 0;
	filter: blur(30px);
	transform: translateX(-100px) scaleX(-15deg);
}
button:hover{
	background: #338033;
	cursor: pinter;
}

button:hover:before{
	transform: translateX(300px) skewX(-15deg);
	opacity: .6;
	transition: .7s;
}
button:hover:after{
	transform: translateX(300px) skewX(-15deg);
	opacity: 1;
	transition: .7s;
}
.success 
  {
  color: #1a1a1a; 
  text-align: center; 
  background: #80ffbf; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
  box-shadow: 0 2px 15px;
  }
  .error 
  {
  color: #1a1a1a; 
  text-align: center;
  background: #ffb3b3; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
  box-shadow: 0 2px 15px;
  }
  .pending
  {
	  padding: 10px;
      width: 250px;
	  margin-left: 500px;
	  
  }
 </style>
</head>
<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="hospital.php">Hospital's</a>
  <a href="patientreg.php">Patient Reg.</a>
  <a href="logout.php">Logout</a>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
  
  <div class="content">
     <img  class='img' src = "user1.png" width="60" height="60"/>
     <?php if(isset($_SESSION["username"])): ?>
	 <h2><?php echo $_SESSION['username']; ?></h2>
	 <?php endif ?>
  </div>

  <div class="col-lg-12 text-center">
       <h1 style="font-family:Lucida Console"><center>My Dashbord</center></h1>
   </div>
   <form class="pending">
     <?php
             $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 
			 $query = "SELECT * FROM apointment WHERE username = '$_SESSION[username]'";
			 $result = mysqli_query($mysqli,$query);
			 $res = mysqli_num_rows($result);
			 //echo $res;
			 if($res == 0)
			 {
				 echo "<p class = 'success'>You can appoint a doctor for your checkup</p>";
				 //exit;
			 }
			 while($res1 = mysqli_fetch_assoc($result))
			 {
				 $date = $res1['date'];
				 $month = $res1['month'];
				 $year = $res1['year'];
				 $docid = $res1['doc_id'];
				 $shift = $res1['shift'];
				 $timeslot = $res1['time_slot'];
				 $hcode = $res1['h_code'];
				 $status  = $res1['status'];
				 $serial = $res1['serial'];
				 //echo $hcode; 
				 $query1 = "SELECT full_name FROM doctor WHERE doc_id = '$docid'";
				 $result1 = mysqli_query($mysqli,$query1);
				 
				 if($res2 = mysqli_fetch_assoc($result1))
				 {
					 $fullname = $res2['full_name'];
					 
					 $query2 = "SELECT h_name FROM hospital WHERE h_code = '$hcode'";
				     $result2 = mysqli_query($mysqli,$query2);
					 
					 if($res3 = mysqli_fetch_assoc($result2))
					 {
						  //echo $res3['h_name'];
						  //echo $fname1;
					      echo "<p class = 'error'>";
						  echo $date;
						  echo '/';
						  echo $month;
						  echo '/';
						  echo $year;
						  echo '</br>';
						  echo  $fullname;
						  echo '(';
						  echo  $docid;
						  echo ')';
						  echo '</br>';
						  echo  $shift;
						  echo '</br>';
						  echo  $timeslot;
						  echo '</br>';
						  echo 'Serial:';
						  echo  $serial;
						  echo '</br>';			
						  echo 'Hospital:';
						  echo $res3['h_name'];
						  echo '(';
						  echo  $hcode;
						  echo ')';
						  echo '</br>';
						  echo  "Pending";
						  echo '</p>';
					 }
				 }
			 } 
   ?>
   </form>
  <div class="wrapper">
        <div class="btn">
		    <img class ='img1' src ="user2.png" width="60" height="60"/>
		    <a href="profile.php">
			 <button class="button1" name = "profile" style="color:black" >My Profile</button>
			</a>
		</div>
		<div class="btn1">
		    <img class ='img2' src ="eye.png" width="60" height="60"/>
			<a href="apointment.php">
			 <button class="button2" name = "apointment" style="color:black">Apointment's</button>
			</a>
		</div>
		<div class="btn2">
		    <img class ='img3' src ="stopwatch.png" width="60" height="60"/>
			<a href="new-appointment.php">
			 <button class="button3" name = "newapointment" style="color:black">New Apointment's</button>
			</a>
		</div>
   </div>
   
    <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</body>
</html>
