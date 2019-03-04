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
   </style>
</head>
<body>
<div class="content">
     <img  class='img' src = "user1.png" width="60" height="60"/>
     <?php if(isset($_SESSION["username"])): ?>
	 <h2><?php echo $_SESSION['username']; ?></h2>
	 <?php endif ?>
 </div>
 <div>
       &nbsp;&nbsp;&nbsp;&nbsp&nbsp;<table>
	   <tr>
	       <th>Full Name</th>
		   <th>Doctor ID</th>
		   <th>Username</th>
		   <th>Specalist</th>
		   <th>Email</th>
		   <th>Conact</th>
		   <th>Password</th>
		   <th>Availability</th>
		   <th>Shift</th>
	   </tr>
	       <?php
	         $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 $query1 = "SELECT * FROM doctor WHERE h_code = $_SESSION[hospital_id]";
			 
			 $result1 = mysqli_query($mysqli,$query1);
			 
			 //if($result === FALSE) { 
              //  echo mysql_error(); // TODO: better error handling
			     //mysqli_fetch_assoc($result)
      
			 while($tr = mysqli_fetch_assoc($result1))
			 {
				 
	   ?>
	   <tr>
	   <td><?php echo $tr["full_name"]; ?></td>
	   <td><?php echo $tr["doc_id"]; ?></td>
	   <td><?php echo $tr["username"]; ?></td>
	   <td><?php echo $tr["specalist"]; ?></td>
	   <td><?php echo $tr["email"]; ?></td>
	   <td><?php echo $tr["contact_no"]; ?></td>
	   <td><?php echo $tr["password"]; ?></td>
	   <td><?php echo $tr["availability"]; ?></td>
	   <td>
	   <?php 
	      $docid = $tr["doc_id"];
		  $hid   =  $_SESSION['hospital_id'];
		  
	      $query2 = " SELECT shift from doc_hospital WHERE doc_id = '$docid' AND h_code = ' $hid'" ;
	      $result2 = mysqli_query($mysqli,$query2);
		  while($res = mysqli_fetch_assoc($result2 ))
		  {
		?>
		
		<?php echo $res['shift'];?>
			  
		<?php	  
	        echo'</br>';
		    //endwhile;
			}
		?>
		</td>
		<?php
			 }
	   ?>
	   
	   </tr>
	   </table>
	   </div>
</body>
</html>
