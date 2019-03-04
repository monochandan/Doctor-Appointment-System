<?php include('patientreg(php).php');?>
<html>
<head>
<style>
body
   {
   background-image:url('back.jpg');
   }
   
.img
{
	margin-left : 880px;
}
 h2
   {
	   margin-top:-45px;
	   margin-left:950px;
   }
   form
{
	width: 70%;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid #80C4De;
	background: white;
	border-radius: 0px 0px 10px 10px;
}

/*background: #dff0d8;
background-size: 10px 20px; 
border: 1px solid #3c763d;*/

.doc_details{
min-height: 100px;
align: center;
margin-top: 10px;
margin-left: 800px;
padding: 10px 20px;

}
.hosp_details{
min-height: 100px;
align: center;
background: #dff0d8;
background-size: 10px 20px; 
border: 1px solid #3c763d;
margin-top: -180px;
margin-left: 10px;
padding: 10px 10px;

}
.success 
  {
  color: #00e600; 
  margin-bottom: 20px;
  margin-left : 480px;
  }
  .error 
  {
  color: #ff0000; 
  margin-bottom: 20px;
  margin-left : 480px;
  }
  .output_field
  {
	  margin-top: 40px;
      margin-left: 800px;
	  background: #dff0d8;
      background-size: 10px 20px; 
      border: 1px solid #3c763d;  
  }
  .date_details
  {
	  margin-top: 40px;
      margin-left: 800px;
	  background: #dff0d8;
	  background-size: 5px 5px; 
      border: 1px solid #3c763d; 
  }
  .problem_field
  {
	  margin-top: 40px;
	  background: #dff0d8;
	  background-size: 5px 5px; 
  }
  .medicine_field1
  {
	  margin-top: 10px;
	  background: #dff0d8;
	  background-size: 5px 5px; 
 
  }
  .medicine_field2
  {
	  margin-top: 10px;
	  background: #dff0d8;
	  background-size: 5px 5px; 
 
  }
  .medicine_field3
  {
	  margin-top: 10px;
	  background: #dff0d8;
	  background-size: 5px 5px; 
 
  }
  .test_field1
  {
	  margin-top: 10px;
	  background: #dff0d8;
	  background-size: 5px 5px;
  }
   .test_field2
  {
	  margin-top: 10px;
	  background: #dff0d8;
	  background-size: 5px 5px;
  }
   .extra1
  {
	  margin-top: 40px;
	  background: #dff0d8;
	  background-size: 5px 5px;
  }
  .extra2
  {
	  margin-top: 10px;
	  background: #dff0d8;
	  background-size: 5px 5px;
  }
  .extra3
  {
	  margin-top: 10px;
	  background: #dff0d8;
	  background-size: 5px 5px;
  }
  .next_date
  {
	  margin-top: 90px;
      margin-left: 500px;
  }
  .button1
  {
	  background-image:url("back3.png");
	  width:50px;
	  height: 50px;
  {
</style>
</head>
<body>
<div class="content">
     <img  class='img' src = "user1.png" width="60" height="60"/>
     <?php if(isset($_SESSION["username"])): ?>
	 <h2><?php echo "Dr. "; echo $_SESSION['username']; ?></h2>
	 <?php endif ?>
  </div>
  <!--<div>
    <button class="button1"></button>-->
  </div>
<form method = "POST">
        <?php
	         $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 $txt4 = $_GET['docid'];
			 $txt6 = $_GET['hcode'];
			 $query1 = "SELECT * FROM doctor WHERE doc_id = '$txt4' AND h_code = '$txt6'";
			 
			 $result = mysqli_query($mysqli,$query1);
			 if($res = mysqli_fetch_assoc($result))
			 {
				 $doc_name = $res['full_name'];
				 $degree1 = $res['degree1'];
				 $degree2= $res['degree2'];
				 $degree3 = $res['degree3']; 
				 $degree4= $res['degree4'];
				 $degree5= $res['degree5'];
				 $spclst= $res['specalist']; 
				 $eml = $res['email']; 
				 $cnct_no = $res['contact_no'];
				 
				 //$query3 =  "INSERT INTO prescription(doc_id) VALUES('$_SESSION[doc_id]')";
				 //$result3 = mysqli_query($mysqli,$query3);
	 ?>
	 <div class="doc_details">
	      <b><?php echo $doc_name;?></b></br>
		  <?php echo $degree1;?></br>
		  <?php echo $degree2;?></br>
		  <?php echo $degree3;?></br>
		  <?php echo $degree4;?></br>
		  <?php echo $degree5;?></br>
		  <?php echo $spclst;?></br>
		  <?php echo $eml;?></br>
		  <?php echo $cnct_no;?></br>
	 </div>
	 <?php
			 }
	 ?>
     
	 
	  <?php
	         $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 
			 $txt6 = $_GET['hcode'];
			 $query1 = "SELECT * FROM hospital WHERE h_code = '$txt6'";
			 $result1 = mysqli_query($mysqli,$query1);
			 if($res1 = mysqli_fetch_assoc($result1))
			 {
	 ?>
	 <div class="hosp_details">
	      <b><?= $res1['h_name'];?></b></br>
		  <?= $res1['road']; ?>
		  <?= $res1['poat']; ?>
		  <?= $res1['block']; ?>
		  <?= $res1['section']; ?></br>
		  <?= $res1['city']; ?>
		  <?= $res1['division']; ?></br>
		  <?= $res1['email']; ?></br>
		  <?= $res1['phon1']; ?></br>
		  <?= $res1['phon2']; ?></br>
		  <?= $res1['phon3']; ?></br>
		  <?= $res1['hotline']; ?></br>
		  <?= $res1['website']; ?></br>
	 </div>
	 <?php
			 }
	 ?>
	 
	 <?php
	         $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			  $txt4 = $_GET['docid'];
			 $txt5 = $_GET['shift'];
			 $txt6 = $_GET['hcode'];
			 $query = "SELECT availability WHERE doc_id = '$txt4' AND shift = '$txt5' AND h_code = '$txt6'";
			 $result = mysqli_query($mysqli,$query1);
			 if($res = mysqli_fetch_assoc($result))
			 {
				  if($res["availability"] = "available")//
				  {
					  echo "<p class='success'>Doctor is Availiable</p>";
				  }
				  else
				  {
					   echo "<p class='error'>Doctor is Not Availiable</p>";
				  }
			 }
			 
	 ?>
	 <hr>
	 <hr>
	  <div class="content">
       <img  class='img1' src = "pres.png" width="35" height="35" />
	 </div>
	 <?php
	        
	         $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 
			 $txt1 = $_GET['date'];
			 $txt2 = $_GET['month'];
			 $txt3 = $_GET['year'];
			 $txt4 = $_GET['docid'];
			 $txt5 = $_GET['shift'];
			 $txt6 = $_GET['hcode'];
			 
			 $query2 = "SELECT full_name,age,gender FROM patient WHERE username = '$_SESSION[username]'";
			 $result2 = mysqli_query($mysqli,$query2);
			 
			 if($res2 = mysqli_fetch_assoc($result2))
			 {
				 $fullname  = $res2['full_name'];
				 $age = $res2['age'];
                 $gender = $res2['gender'];				 
			 }
			 
			 $query3 = "SELECT * FROM prescription WHERE username = '$_SESSION[username]' AND doc_id = '$txt4' AND hosp_id = '$txt6' AND shift = '$txt5' AND date = '$txt1' AND month = '$txt2' AND year = '$txt3'";
			 $result3 = mysqli_query($mysqli,$query3);
			 
			 if($res3 = mysqli_fetch_assoc($result3))
			 {
				 $problem  = $res3['problem'];
				 $medicine1 = $res3['medicine1'];
				 $time1  = $res3['time1'];
				 $medicine2 = $res3['medicine2'];
				 $time2  = $res3['time2'];
				 $medicine3 = $res3['medicine3'];
				 $time3  = $res3['time3'];
				 $test1 = $res3['test1'];
				 $test2  = $res3['test2'];
				 $extra1 = $res3['extra1'];
				 $extra2  = $res3['extra2'];
				 $extra3 = $res3['extra3'];
				 $next_meet  = $res3['next_meet'];
                 				 
			 }
	 ?>
	 <div class="date_details">
	     <b><?php 
		     echo $txt1;
		     echo ' / ';
          	 echo $txt2;
		     echo ' / ';
             echo "20";
			 echo $txt3;			 
			?></b>
	   </div>
	 <div class="output_field">
	 
	      <div class="patient_details">
		  <label for="name">Patient Name: </label>
	      <b><?php echo $fullname;?></b></br>
		  <label for="age">Patient Age:</label>
		  <b><?php echo $age;?></b></br>
		  <label for="gender">Patient Gender:</label>
		  <b><?php echo $gender;?></b></br>
		  </div>
	 </div>
	 
	 <div>
	 <label for="problems"><b><h3>Problem's</h3></b></label>
	 <div class="problem_field">
	      <b><?php echo $problem;?></b></br>
	 </div>
	 </div>
	 
	 <div>
	 <label for="Medicines"><b><h3>Medicine's</h3></b></label>
	 <div class="medicine_field1">
	      <b>
		  <?php 
		   echo $medicine1;
		   ?>
		   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;
		   <?php
		   echo $time1;
		  ?></b></br>
	 </div>
	 <div class="medicine_field2">
	      <b><?php echo $medicine2;?>
		   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;
		   <?php
		   echo $time2;?>
		  </b></br>
	 </div>
	 <div class="medicine_field3">
	      <b><?php echo $medicine3;?>
		  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;
		   <?php
		   echo $time3;?>
		  </b></br>
	 </div>
	 </div>
	 
	 <div>
	 <label for="tests"><b><h3>Test's</h3></b></label>
	 <div class="test_field1">
	      <b>
		  <?php 
		   echo $test1;
		   ?>
		   </b></br>
	 </div>
	 <div class="test_field2">
	      <b><?php 
		   echo $test2;?>
		  </b></br>
	 </div>
	 </div>
	 
	 <div>
	 <div class="extra1">
	      <b>
		  <?php 
		   echo $extra1;
		   ?>
		   </b></br>
	 </div>
	 <div class="extra2">
	      <b><?php 
		   echo $extra2;?>
		  </b></br>
	 </div>
	 <div class="extra3">
	      <b><?php 
		   echo $extra3;?>
		  </b></br>
	 </div>
	 </div>
	 <div class="next_date">
	    <b>
		  <?php 
		   echo "NEXT MEET: ";
		   ?>
		   &nbsp&nbsp&nbsp;
		   <?php
		   echo $next_meet;
		  ?></b>
		
	   </div>
 </form>
</body>
</html>