<?php include('doclogin(php).php'); ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--=======Font Open Sans======-->
    <link href="doclogin.css" rel='stylesheet' type='text/css'>
	<!--StyleSheet-->
	
</head>
<body>
<div class="forms">	
	<form method="post" id="login">
	<?php include('errors.php'); ?>
	      <h1>Doctor Login</h1>
	      <div class="input-field">
		  <label for="username">Username</label>
			<input type="username" name="username"/>
	        <label for="doctorid">Doctor ID</label>
			<input type="doctorid" name="doctorid"/>
			<label for="hodpid">Hospital ID</label>
	        <input type="hodpid" name="hospid"/>
			<label for="shift">Shift</label>
			 <input type="shift" name="shift"/>
	        <label for="password">Password</label> 
	        <input type="password" name="password"/>
	        <input type="submit" name="submit3" value="Login" class="button"/>
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