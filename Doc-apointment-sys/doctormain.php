<?php include('doclogin(php).php'); ?>
<html>
<head>
<style>
   body 
	{
	font-family: 'open sans', sans-serif;
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
   button
{
	position: absolute;
	top: 5%;
	left: 10%;
	transform: translate(-60%, -60%);
}

    table,td,tr
	{
	     border-collapse:collapse;
	     padding:10px;	
    }
	table
	{
	     border:1px #000 inset;
	     width:60%;	
	     background:#FFF;
	     height:auto;
		 align: center;
	     margin:auto;
		 top: 50%;
		 margit-top: 20px;
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
</style>
</head>
<body>

  <div class="content">
     <img  class='img' src = "doc.png" width="60" height="60"/>
     <?php if(isset($_SESSION['username'])): ?>
	 <h2><?php echo "Dr. "; echo $_SESSION['username']; ?></h2>
	 <?php endif ?>
  </div>
  <a href="doclogout.php?"/>Logout</a>
  <div>
   &nbsp;&nbsp;&nbsp;&nbsp&nbsp;<table>
   <tr>
		   <th>Patient</th>
		   <th>Serial No.</th>
		   <th>Time Slot</th>
		   <th>Status</th>
	   </tr>
	   <?php
	         $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 
			 $date = date("d");
			 $month = date("m");
			 $year = date("y");
			 
			  $query1 = "SELECT * FROM apointment WHERE date = '$date' AND month = '$month' AND year = '$year' AND doc_id = '$_SESSION[doc_id]'
			            AND shift = '$_SESSION[shift]' AND h_code = '$_SESSION[hosp_id]'";
			  $result1 = mysqli_query($mysqli,$query1);
			  
			  while($tr = mysqli_fetch_assoc($result1))
			  {
				  
			
	   ?>
	   <tr>
	      <td> <?php echo $tr["username"]; ?> </td>
		  <td><?php echo $tr["serial"]; ?></td>
		  <td><?php echo $tr["time_slot"]; ?></td>
		  <td align="center"><a href="prescription.php? txtid1=<?php echo $tr["username"];?>">YES</a> / 
		  <a href="absent.php?date=<?php echo $date;?>&month=<?php echo $month;?>&year=<?php echo $year;?>
		   &docid=<?php echo $_SESSION['doc_id'];?>&shift=<?php echo $tr['shift'];?>&hcode=<?php echo  $_SESSION['hosp_id'];?>&username=<?php echo $tr["username"];?>">NO</a> </td> 
	   </tr>
	   <?php
	             // $i++;
			     //  }
		  }
        ?>
   
   </table>
  </div>
  
 
</body>
</html>