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
   table,td,tr
	{
	     border-collapse:collapse;
	     padding:10px;	
    }
	table
	{
	     border:1px #000 inset;
	     width:80%;	
	     background:#FFF;
	     height:auto;
	     margin:auto;
	     box-shadow:3px 3px 9px #000;
   }
   th
   {
	    background:#00b300;
	    color:#FFF;
	    font-weight:bold;
	    padding:5px;
	/*box-shadow:3px 3px 9px #000;*/
   }
   td
   {
	    border:1px #000 solid;	
   }
   tr:hover
   {
	/*box-shadow: 3px 3px 5px #000;*/
	   background-color:#66b3ff;	
	   color:#FFF;
   }
   .result
   {
	   color: #3c763d;
	   margin-top:50px;
	   margin-left:50px;
   }
</style>
</head>
<body>
   <a href="dashbord.php?"/>Back</a>
   <div class="content">
     <img  class='img' src = "user1.png" width="60" height="60"/>
     <?php if(isset($_SESSION["username"])): ?>
	 <h2><?php echo $_SESSION['username']; ?></h2>
	 <?php endif ?>
  </div>
  
  <div>
       &nbsp;&nbsp;&nbsp;&nbsp&nbsp;<table>
	   <tr>
	       <th>Date</th>
		   <th>Doctor ID</th>
		   <th>Hospital ID</th>
		   <th>Time</th>
		   <th>Serial No.</th>
		   <th>Status</th>
		   <th>prescrption</th>
	   </tr>
	   <?php
	         $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);  
			 
			 $query1 = "SELECT * FROM apnmnt_history WHERE username = '$_SESSION[username]'";
			 $result1 = mysqli_query($mysqli,$query1);

			    while($tp = mysqli_fetch_assoc($result1))
				{
		?> 
		<tr>
		 <td>
		  <?php
		   echo $tp["date"];
		   echo"/";
		   echo $tp["month"];
		   echo"/";
		   echo $tp["year"];
		  ?>
		 </td>
		 <td><?php echo $tp["doc_id"]; ?></td>
		 <td><?php echo $tp["shift"]; ?></td>
		 <td><?php echo $tp["time_slot"]; ?></td>
		 <td><?php echo $tp["h_code"]; ?></td>
		 <td><?php echo $tp["status"]; ?></td>
		 <td>
		 <?php
             		 if($tp["status"]  == "Absent")
					 {
						 echo "NOT AVAILABLE";
					 }
                     else
					 {
					?>
					    <a href="show_prescription.php?date=<?php echo $tp["date"];?>&month=<?php echo $tp["month"];?>&year=<?php echo$tp["year"];?>
						   &docid=<?php echo $tp["doc_id"];?>&shift=<?php echo $tp["shift"];?>&hcode=<?php echo $tp["h_code"];?>" >
						<input method= "post" type="submit" name = "submit" value="Prescription" class="btn"/>
						</a>
				   <?php		
					 }	
                   ?>					 

		 </td>
		</tr>
		<?php
				}
		?>
	  </table>
  </div>
</body>
</html>