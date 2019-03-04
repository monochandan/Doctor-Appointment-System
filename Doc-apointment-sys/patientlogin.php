<?php    
   //session_start();
   //$errors = array();
  include ('patientreg(php).php');
  //include ('patientlog(php).php');
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--=======Font Open Sans======-->
    <link rel="stylesheet" type="text/css" href="patientlogin.css">
	
</style>
</head>
<body>
<div class="forms">
	<ul class="tab-group">
		<li class="tab active"><a href="#login">Log In</a></li>
		<li class="tab"><a href="#signup">Sign Up</a></li>
	</ul>
	<form method="post" id="login">
	 <?php include('errors.php'); ?>
	      <h1>Patient Login</h1>
	      <div class="input-field">
	        <label for="username">Username</label>
	        <input type="username" name="username"/>
	        <label for="password">Password</label> 
	        <input type="password" name="password"/>
	        <input type="submit" name = "submit1" value="Login" class="button"/>
	      </div>
	  </form>
	  <form method="post" id="signup">
	  <?php include('errors.php'); ?>
	      <h1>Patient Registration</h1>
	      <div class="input-field">
		    <label for="fullname">Full Name</label> 
	        <input type="fullname" name="fullname"/>
			<label for="username">Username</label> 
	        <input type="username" name="username" />
			<label for="phn">Phone Number</label> 
	        <input type="phn" name="phn"/>
			<label for="age">Age</label> 
	        <input type="age" name="age"/>
	        <label for="email">Email</label> 
	        <input type="email" name="email"/>
	        <label for="password">Password</label> 
	        <input type="password" name="password1" />
	        <label for="password">Confirm Password</label> 
	        <input type="password" name="password2" />
	        <input type="submit" name = "submit2" value="Sign up" class="button" />
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