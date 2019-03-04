<?php include("adminlogin(php).php"); ?>
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
	margin-top : 20px;
}
 h2
   {
	   margin-top:-45px;
	   margin-left:950px;
   }
.img1
{
	margin-left : 350px;
	margin-top: 40px;
}
.button1
{
	position: absolute;
    top: 40%;
	left: 28%;
}
.img2
{
	margin-left : 700px;
	margin-top: -50px;
}
.button2
{
	position: absolute;
    top: 40%;
	left: 50%;
}
.img3
{
	margin-left : 1090px;
	margin-top: -60px;
}
.button3
{
	position: absolute;
    top: 40%;
	left: 75%;
}
.img4
{
	margin-left : 350px;
	margin-top: 150px;
}
.button4
{
	position: absolute;
    top: 70%;
	left: 28%;
}
.img5
{
	margin-left : 700px;
	margin-top: -50px;
}
.button5
{
	position: absolute;
    top: 70%;
	left: 50%;
}

button
{
	position: absolute;
	top: 5%;
	left: 10%;
	transform: translate(-60%, -60%);
}
button{
	background: none;
	color: #ccc;
	width: 200px;
	height: 40px;;
	border: 2px solid #338033;
	font-size: 18px;
	border-radius: 4px;
	transition: .6s;
	overflow: hidden;	
}
button:focus{
	outline: none;
}
button:before{
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
button:after{
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
button:hover{
	background: #338033;
	cursor: pinter;
}

button:hover:before{
	transform: translateX(300px) skewX(-15deg);
	opacity: .6;
	transition: .7s;
}
button:hover:after{
	transform: translateX(300px) skewX(-15deg);
	opacity: 1;
	transition: .7s;
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
  <a href="adminlogout.php?"/>Logout</a>
 <div class="col-lg-12 text-center">
       <h1 style="font-family:Lucida Console"><center>Admin Manager</center></h1>
   </div>
  <div class="wrapper">
        <div class="btn">
		    <img class ='img1' src ="add.png" width="60" height="60"/>
		    <a href="adddoctor.php">
			 <button class="button1" name = "profile" style = "color:black">Add Doctor</button>
			</a>
		</div>
		<div class="btn1">
		    <img class ='img2' src ="unlock.png" width="60" height="60"/>
			<a href="doctorunlock.php">
			 <button class="button2" name = "apointment" style = "color:black">Doctor Unlock</button>
			</a>
		</div>
		<div class="btn2">
		    <img class ='img3' src ="lock.png" width="60" height="60"/>
			<a href="doctorlock.php">
			 <button class="button3" name = "newapointment" style = "color:black">Doctor Lock</button>
			</a>
		</div>
		<div class="btn3">
		    <img class ='img4' src ="list.png" width="60" height="60"/>
			<a href="doc_list.php">
			 <button class="button4" name = "newapointment" style = "color:black">Doctor List</button>
			</a>
		</div>
		<div class="btn4">
		    <img class ='img5' src ="profile.png" width="60" height="60"/>
			<a href="docprofile.php">
			 <button class="button5" name = "newapointment" style = "color:black">Create Doc Profile</button>
			</a>
		</div>
   </div>
</body>
</html>
