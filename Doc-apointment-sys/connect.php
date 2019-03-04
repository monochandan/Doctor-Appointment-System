<?php
		 // $servername = "localhost";
		  //$username = "root";
		 // $password = "";
		 // $dbname = "lsm";
		   
		//  $conn = mysql_connect($servername,$username,$password,$dbname);
		@mysql_connect("localhost","root","") or die (mysql_error());
		@mysql_select_db ("das");
	
		   
    ?>