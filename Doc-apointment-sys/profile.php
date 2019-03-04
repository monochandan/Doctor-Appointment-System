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
table,td,tr{
	border-collapse:collapse;
	padding:0px;	
}
table{
	border:1px #000 solid;
	width:30%;	
	background:#FFF;
	height:auto;
	margin:auto;
	box-shadow:10px 10px 10px #000;
}

td{
	border:1px #000 solid ;	
}
.button1
{
	position: absolute;
	top: 30%;
	left: 50%;
	transform: translate(-60%, -60%);
}
.button1{
	background: none;
	color: #ccc;
	width: 50px;
	height: 40px;;
	border: 2px solid #338033;
	font-size: 18px;
	border-radius: 4px;
	transition: .6s;
	overflow: hidden;	
}
.button1:focus{
	outline: none;
}
.button1:before{
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
.button1:after{
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
.button1:hover{
	background: #338033;
	cursor: pinter;
}

.button1:hover:before{
	transform: translateX(300px) skewX(-15deg);
	opacity: .6;
	transition: .7s;
}
.button1:hover:after{
	transform: translateX(300px) skewX(-15deg);
	opacity: 1;
	transition: .7s;
}
input[type=text], input[type=password] {
    width: 90%;
    padding: 12px 20px;
    margin: 8px 26px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	font-size:16px;
}

input[type=text], input[type=password] {
    width: 90%;
    padding: 12px 20px;
    margin: 8px 26px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	font-size:16px;
}

/* Set a style for all buttons */
.button2 {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 26px;
    border: none;
    cursor: pointer;
    width: 90%;
	font-size:20px;
}
.button2:hover {
    opacity: 0.8;
}
/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}
.avatar {
    width: 200px;
	height:200px;
    border-radius: 50%;
}

/* The Modal (background) */
.modal {
	display:none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

/* Modal Content Box */
.modal-content {
    background-color: #fefefe;
    margin: 4% auto 15% auto;
    border: 1px solid #888;
    width: 40%; 
	padding-bottom: 30px;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    animation: zoom 0.6s
}
@keyframes zoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
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
 <a href="dashbord.php?"/>Back</a>
<div class="content">
     <img  class='img' src = "user1.png" width="60" height="60"/>
     <?php if(isset($_SESSION["username"])): ?>
	 <h2><?php echo $_SESSION['username']; ?></h2>
	 <?php endif ?>
  </div>
  <div class="col-lg-12 text-center">
       <h1 style="font-family:Lucida Console"><center>My Profile</center></h1>
   </div>
   <table>
     <?php
	 $host= 'localhost';
     $user= 'root';
     $pass = '';
     $db = 'das';

     $mysqli = mysqli_connect($host,$user,$pass,$db);
	 
	 $result = $mysqli->query("SELECT * FROM patient")or die ($mysqli->error());

      if(isset($_SESSION["username"]))
      {
            $i = "select * from patient where username = '$_SESSION[username]' LIMIT 1";

			$h = mysqli_query($mysqli,$i);
			while($tr = mysqli_fetch_array($h))
			{
	?>   
           <tr>
               <td> <center><font size ="5"><strong>Full Name</strong> </font></center></td>
				<td><font size ="5"><?php echo $tr["full_name"]; ?></font></td>
		   </tr>
		   
		   <tr>
               <td><center><font size ="5"><strong>Username</strong> </center></font></td>
				<td><font size ="5"><?php echo $tr["username"]; ?></font></td>
		   </tr>
			
			<tr>
               <td><center><font size ="5"><strong>Phon No.</strong></center> </font></td>
				<td><font size ="5"><?php echo $tr["phon_no"]; ?></font></td>
		   </tr>
		   
		   <tr>
               <td>
			   <center>
			   <font size ="5"><strong>Age</strong> </font>
			   </center>
			   </td>
				<td><font size ="5"><?php echo $tr["age"]; ?></font></td>
		   </tr>
			
			<tr>
               <td><center><font size ="5"><strong>Email</strong> </font><center></td>
				<td><font size ="5"><?php echo $tr["email"]; ?></font></td>
		   </tr>
		   <?php
			}
			}
		?>
    </table>
	<button onclick="document.getElementById('modal-wrapper').style.display='block'"style="width:300px; margin-top:200px;" class="button1">
      <font color="Black">Update Information</font></button>

    <div id="modal-wrapper" class="modal">
  <form class="modal-content animate" method="post" action="">
    <div class="imgcontainer">
                         <span onclick="document.getElementById('modal-wrapper').style.display='none'" 
	                     class="close" title="Close PopUp">&times;</span>
                         <h1 style="text-align:center" >Update Information</h1>
                   </div>    
   

    <div class="container">
	  <?php
	  $host= 'localhost';
      $user= 'root';
      $pass = '';
      $db = 'das';

       $mysqli = mysqli_connect($host,$user,$pass,$db);
	 
	  $result = $mysqli->query("SELECT * FROM patient where username = '$_SESSION[username]' LIMIT 1")or die ($mysqli->error());
	  while($t=mysqli_fetch_array($result))
	  {
	  ?>
	  
	  <!--<font color="white">Full Name</font>
           <input type="text" placeholder="Enter Full Name" name="fname" value ="?>" /> 
		
	  <font color="white">Username</font>
		  <input type="text" placeholder="Enter username" name="username" value ="" /> -->
		
	  <font color="white">Phon No.</font>
           <input type="text" placeholder="Enter Department" name="phn" value ="<?php echo $t["phon_no"]; ?>" /> 
	 
	  <font color="white">Age</font>
	      <input type="text" placeholder="Enter age" name="age" value ="<?php echo $t["age"]; ?>" /> 
	   
	  <font color="white">Email</font>
		  <input type="text" placeholder="Enter Email" name="mail" value ="<?php echo $t["email"]; ?>" /> 
		  
		  <button class="button2" name = "update" >Update</button>
    </div>
	<?php
	  }
	  ?>
  </form>
  <script>
var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>	
<?php 
 if(isset($_POST['update']))
 {
	 //$fname=$t["full_name"];
	// $username=$t["username"];
	 $phn=$_POST['phn'];
	 $age=$_POST['age'];
	 $mail=$_POST['mail'];
	 
	  $host= 'localhost';
      $user= 'root';
      $pass = '';
      $db = 'das';
	  
	   //echo 
	  // echo 

       $mysqli = mysqli_connect($host,$user,$pass,$db);
	 
	    $i="UPDATE patient SET phon_no='$phn',age='$age',email='$mail' WHERE  username = '$_SESSION[username]'";
		$result1 = mysqli_query($mysqli,$i);
		if($result1==true)
		{
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=profile.php">';
			echo "<p class='success'>Successfully updated</p>";
		}
		else
	   {
		    echo "<p class='error'>Not updated</p>";
	   }
 }
	 
?> 
</body>
</html>