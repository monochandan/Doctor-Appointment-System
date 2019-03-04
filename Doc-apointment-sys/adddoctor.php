<?php 
include('adminlogin(php).php');
include('adddoctor(php).php');
?>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--=======Font Open Sans======-->
    <link href="adddoctor.css" rel='stylesheet' type='text/css'>
	<!--StyleSheet-->
</head>
<body> 

  <div class="content">
     <img  class='img' src = "user1.png" width="60" height="60"/>
     <?php if(isset($_SESSION["username"])): ?>
	 <h2><?php echo $_SESSION['username']; ?></h2>
	 <?php endif ?>
  </div>
  <a href="adminmain.php?"/>Back</a>/ /<a href="adminlogout.php?"/>Logout</a>
<div class="forms">
	<form method="post" id="login">
	   <?php include('errors.php'); ?>
	      <h1>Dcotor Registration</h1>
	      <div class="input-field">
		    <label for="FullName">FullName</label>
	        <input type="text" name="fullname"/>
	        <label for="DoctorID">Doctor ID</label>
	        <input type="DoctorID" name="Doctorid"/>
	        <label for="Username">Username</label> 
	        <input type="Username" name="username" />
			<label for="Degree">Degree</label>
	        <input type="Degree" name="degree"/>
			<label for="Degree">Degree(01)</label>
	        <input type="Degree" name="degree01"/>
	        <label for="Degree">Degree(02)</label> 
	        <input type="Degree" name="degree02" />
			<label for="Degree">Degree(03)</label>
	        <input type="Degree" name="degree03"/>
			<label for="Degree">Degree(04)</label>
	        <input type="Degree" name="degree04"/>
	        <label for="Specalist">Specalist</label> 
	        <input type="Specalist" name="specalist"/>
			<label for="Email">Email</label>
	        <input type="Email" name="email"/>
			<label for="Contact">Contact No.</label>
	        <input type="Contact" name="contact"/>
	        <label for="password">Password</label> 
	        <input type="password" name="password" />
			<label for="Availability">Availability</label>
	        <input type="Availability" name="availability"/>
	        <input type="submit" name="submit6" value="ADD" class="button"/>
	      </div>
	  </form>
</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type="text/javascript">
$(document).ready(function(){
	  $('.tab a').on('click', function (e) {
	  e.preventDefault();
	  
	  $(this).parent().addClass('active');
	  $(this).parent().siblings().removeClass('active');
	  
	  var href = $(this).attr('href');
	  $('.forms > form').hide();
	  $(href).fadeIn(500);
	});
});
</script>
</body>
</html>