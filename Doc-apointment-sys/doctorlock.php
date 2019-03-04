<?php include('adminlogin(php).php');?>
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
  <a href="adminmain.php?"/>Back</a>/ /<a href="adminlogout.php?"/>Logout</a>
  <div class="col-lg-12 text-center">
       <h1 style="font-family:Lucida Console"><center>Lock Doctor</center></h1>
   </div>
   
   
   <form method="post" id="new-appointment">

          <?php
	         $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 //where avlblty=1;
			 $result = $mysqli->query("SELECT doc_id FROM doctor")or die ($mysqli->error());
		?>
		<div class="input-field">
		     <label for="Doctor ID">Doctor ID</label>
			 <select name="docid_input">
			 <option value="docid">Select Doctor ID</option>
			 <?php 
	           //$i = 0;
	           while($doc = $result->fetch_assoc()):
	          ?>
			  <option value="<?php echo $doc['doc_id']?>"><?php echo $doc['doc_id']?>  <?php endwhile; ?></option>
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
	        <label for="availability">Availability</label>
			<select name="availability">
            <option value="not available">Not Available</option>			
	       </select>
		</div>
		
		<div class="input-field">
		     <input type="submit" name = "submit8" value="submit" class="btn"/>
	    </div>
		 <?php
		     $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 if(isset($_POST['submit8']))
			 {
				 $docid = $_POST['docid_input'];
				 $shift = $_POST['select_shift'];
				 $avlblty = $_POST['availability'];
				 
				 $query1 = "UPDATE doctor SET availability = '$avlblty' WHERE doc_id = '$docid' AND h_code = '$_SESSION[hospital_id]'";
			     $result1 = mysqli_query($mysqli,$query1);
				 
				 if($result1 == true)
				 {
					 $query2 = "DELETE FROM doc_hospital WHERE doc_id = '$docid' AND h_code = '$_SESSION[hospital_id]' AND shift = '$shift'";
				     $result2 = mysqli_query($mysqli,$query2);
					 
					 if($result2 == true)
					 {
						 echo "<p class='success'>Doctor Is Locked</p>";
						 //echo '<META HTTP-EQUIV="Refresh" Content="0; URL=doctorlock.php">';
					 }
					 else
					 {
						 echo "<p class='error'>error 2</p>";
						 //echo '<META HTTP-EQUIV="Refresh" Content="0; URL=doctorlock.php">';
					 }
				 
				 }
				 else
					 {
						 echo "<p class='error'>error 1</p>";
						 //echo '<META HTTP-EQUIV="Refresh" Content="0; URL=doctorlock.php">';
					 }
			 
			 
			 }
			 else
					 {
						 echo "<p class='error'>error 0</p>";
						 //echo '<META HTTP-EQUIV="Refresh" Content="0; URL=doctorlock.php">';
					 }
		 ?>
		</form>
	</html>