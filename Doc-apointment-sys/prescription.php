<?php include('doclogin(php).php'); ?>
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
margin-top: -180px;
margin-left: 10px;
padding: 10px 20px;

}
.img1{
	margin-top: 15px;
	margin-left: 10px;
}
.input_field
{
	margin: 10px 0px 10px 0px;
}
.input_field label
{
	display: block;
	text-align: left;
	margin: 3px;
}
.input_field input
{
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius; 5px;
	border: 1px solid gray;
}
.prb label
{
	display: block;
	text-align: left;
	margin: 3px;
}
.prb input
{
	height: 80px;
	width: 93%;
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
.btn
{
	padding: 10px;
	font-size: 15px;
	color: white;
	margin-top: 20px;
	background: #5F9EA0;
	border: none;
	border-radius: 5px;
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
     <img  class='img' src = "doc.png" width="60" height="60"/>
     <?php if(isset($_SESSION["username"])): ?>
	 <h2><?php echo "Dr. "; echo $_SESSION['username']; ?></h2>
	 <?php endif ?>
  </div>
  <form method="post">
     <?php
	         $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 
			 $query1 = "SELECT * FROM doctor WHERE doc_id = '$_SESSION[doc_id]' AND h_code = '$_SESSION[hosp_id]'";
			 
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
			 
			
			 $query1 = "SELECT * FROM hospital WHERE h_code = '$_SESSION[hosp_id]'";
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
	 <hr>
	 <hr>
	 <?php
			 }
	 ?>
	 <div class="content">
       <img  class='img1' src = "pres.png" width="35" height="35" />
	 </div>
	 
	 <?php
	        
	         $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 
			 $username = $_GET['txtid1'];
			 //$serial = $_GET['txtid2'];
			 $query2 = "SELECT full_name,age,gender FROM patient WHERE username = '$username'";
			 $result2 = mysqli_query($mysqli,$query2);
			 
			 if($res2 = mysqli_fetch_assoc($result2))
			 {
				 $fullname  = $res2['full_name'];
				 $age = $res2['age'];
				 $gender = $res2['gender'];
                 //echo $fullname;
                 //echo "</br>";
                // echo $age;				 
			 }
	 ?>
	   <div class="input_field">
	        
	          <label for="name">Patient Name</label> 
	              <input type="text" name="ptnt_name" value="<?php echo $fullname;?>"/>
	   
	           <label for="age">Age</label> 
	               <input type="text" name="age" value="<?php echo $age;?>"/>
				   
			 <label for="gender">Gender</label> 
	               <input type="text" name="gender" value="<?php echo $gender;?>"/>
				   
				  <label for="shift">Problems</label> 
	                    <input  type="text" name="problem"/> 
				   
			   <label for="shift">Medicine1</label> 
	               <input  type="text" name="medicine1"/> 
				   
				   <label for="time">Time1</label> 
				   <select name="time1">
		            <option value="0-0-1">0-0-1</option>
		          <option value="0-1-0">0-1-0</option>
		        <option value="1-0-0">1-0-0</option>
		          <option value="1-0-1">1-0-1</option>
		            <option value="1-1-0">1-1-0</option>
		           <option value="1-1-1">1-1-1</option>
		          </select>
				   
				   
				   <label for="shift">Medicine2</label> 
	               <input  type="text" name="medicine2" /> 
				   
				   <label for="time">Time2</label> 
				   <select name="time2">
		            <option value="0-0-1">0-0-1</option>
		          <option value="0-1-0">0-1-0</option>
		        <option value="1-0-0">1-0-0</option>
		          <option value="1-0-1">1-0-1</option>
		            <option value="1-1-0">1-1-0</option>
		           <option value="1-1-1">1-1-1</option>
		          </select>
				  
				  
		
				   <label for="shift">Medicine3</label> 
	               <input  type="text" name="medicine3" /> 
				   
				   <label for="time">Time3</label> 
				   <select name="time3">
		            <option value="0-0-1">0-0-1</option>
		          <option value="0-1-0">0-1-0</option>
		        <option value="1-0-0">1-0-0</option>
		          <option value="1-0-1">1-0-1</option>
		            <option value="1-1-0">1-1-0</option>
		           <option value="1-1-1">1-1-1</option>
		          </select>
				  
				   
				   <label for="shift">Test1</label> 
	               <input  type="text" name="test1"  />
				   
				   <label for="shift">Test2</label> 
	               <input  type="text" name="test2" />
				   
				   
				   
				   <label for="shift">Extra1</label> 
	               <input  type="text" name="extra1"  />
				   
				   <label for="shift">Extra2</label> 
	               <input  type="text" name="extra2" />
				   
				   <label for="shift">Extra3</label> 
	               <input  type="text" name="extra3" />
				   
				   
				   <label for="shift">Next Meet</label> 
	               <input  type="text" name="next_meet" />
				   
				   <input type="submit" name = "submit7" value="submit" class="btn"/>
				   
	 </div>
  </form>
        <?php
	         $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 //echo $username; 
       if(isset($_POST['submit7']))
	   {
		   
		   
		            $problm = $_POST['problem'];
				    $medcn1 = $_POST['medicine1'];
					$tm1 = $_POST['time1'];
					$medcn2 = $_POST['medicine2'];
				    $tm2 = $_POST['time2'];
					$medcn3 = $_POST['medicine3'];
					$tm3 = $_POST['time3'];
					$tst1 = $_POST['test1'];
					$tst2 = $_POST['test2'];
					$extr1 = $_POST['extra1'];
					$extr2 = $_POST['extra2'];
					$extr3 = $_POST['extra3'];
					$meet =  $_POST['next_meet'];
					$dat = date('d');
			        $mon = date('m');
			        $yr = date('y');
          $query = "INSERT INTO prescription(username,doc_id,hosp_id,shift,date,month,year,problem,medicine1,time1,medicine2,time2,medicine3,time3,test1,test2,
		           extra1,extra2,extra3,next_meet)VALUES('$username','$_SESSION[doc_id]','$_SESSION[hosp_id]','$_SESSION[shift]','$dat','$mon','$yr','$problm',
		            '$medcn1','$tm1','$medcn2','$tm2','$medcn3','$tm3','$tst1','$tst2','$extr1','$extr2','$extr3','$meet')"; 
	      $result = mysqli_query($mysqli,$query);
		  
		  if($result == true)
		  {
			  
			      $query4 = "SELECT * FROM apointment WHERE date='$dat' AND month='$mon' AND year='$yr' AND  doc_id='$_SESSION[doc_id]' AND shift='$_SESSION[shift]'AND h_code='$_SESSION[hosp_id]'AND username = '$username'";
				  $result4 = mysqli_query($mysqli,$query4);
				  //$res4 = mysqli_fetch_assoc($result4);
				  //echo  $res4;
				  if($res4 = mysqli_fetch_array($result4))
				 {
					 
					  $time =  $res4['time_slot'];
					  $ser =  $res4['serial'];
					 
					 //echo $time ;
					 //echo $ser;
					 
					$query5 = "INSERT INTO apnmnt_history(date,month,year,doc_id,shift,time_slot,h_code,status,username,serial)
					            VALUES('$dat','$mon','$yr','$_SESSION[doc_id]','$_SESSION[shift]','$time','$_SESSION[hosp_id]','checked','$username','$ser')";
					 $result5 = mysqli_query($mysqli,$query5);
					 //echo "result5";
					 //echo $result5; 
					if($result5 == true)
					 {
						 
						 $query6 = "DELETE FROM apointment WHERE date = '$dat' AND month = '$mon' AND year = '$yr' AND doc_id = '$_SESSION[doc_id]' AND shift = '$_SESSION[shift]' 
						            AND time_slot = '$time' AND h_code = '$_SESSION[hosp_id]' AND username = '$username' AND serial = '$ser'";         
				         $result6 = mysqli_query($mysqli,$query6);
						  //echo "result6";
						  //echo $result6;
						 if($result6 == true)
						 {
							 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=doctormain.php">';
						 }  
					 }
					
				 }
		  }
	   }
	  ?>
</body>
</html>