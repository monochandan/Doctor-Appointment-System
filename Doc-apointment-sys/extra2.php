<html>
<body>

   <form method="post" id="new-appointment">
		   
		
		
		
		<?php
	     $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 //where avlblty=1;
			 $result = $mysqli->query("SELECT doc_id FROM doctor")or die ($mysqli->error());
		?>
		<div class="input-field">
		     <label for="Doctor ID">Doctor ID</label>
			 <select name="docid_input">
			 <option value="docid">Select Doctor ID</option>
			 <?php 
	           //$i = 0;
	           while($doc = $result->fetch_assoc()):
	          ?>
			  <option value="<?php echo $doc['doc_id']?>"><?php echo $doc['doc_id']?>  <?php endwhile; ?></option>
			 <select>
		</div>
		
		<div class="input-field">
	        <label for="shift">Shift</label> 
			<select name="select_shift">
			  <option value="SHIFT">Select Shift</option>   
              <option value="morning1">Morning-01(8 AM - 10 AM)</option>
              <option value="morning2">Morning-02(10 AM - 12 PM)</option>
              <option value="afternoon">Afternoon(4 PM - 6 PM)</option>
              <option value="evening">Evening(7 PM - 9 PM)</option>
             </select>
		</div>
		
		
		<?php
	         $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 //where avlblty=1;
			 $result1 = $mysqli->query("SELECT h_code FROM hospital")or die ($mysqli->error());
		?>
		<div class="input-field">
		     <label for="hospid">Hospital ID</label>
			 <select name="hosid_input">
			 <option value="hosid">Select Hospital</option>
			 <?php 
	           //$i = 0;
	           while($hosp = $result1->fetch_assoc()):
	          ?>
			  <option value="<?php echo $hosp['h_code']?>"><?php echo $hosp['h_code']?>  <?php endwhile; ?></option>
			 <select>
		</div>
		
		<div class="input-field">
		     <input type="submit" name = "submit" value="submit" class="btn"/>
	    </div>
		
             <?php
		     $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 
			 
			 if(isset($_POST['submit']))
			 {
				  
				  $docid = $_POST['docid_input'];
				  $shift = $_POST['select_shift'];
				  $hosp_id = $_POST['hosid_input'];
				
				 
				    $avl = 1;
				
				
					$query1 = "SELECT doc_id,h_code,shift FROM doc_hospital WHERE doc_id = '$docid' AND h_code = '$hosp_id' AND shift = '$shift'";
					$result1 = mysqli_query($mysqli,$query1);
					$num_rows1 = mysqli_num_rows($result1);
					echo $num_rows1;
					
					//$query2 = "SELECT shift FROM doc_hospital WHERE shift = '$shift'";
					//$result2 = mysqli_query($mysqli,$query2);
					//$num_rows2 = mysqli_num_rows($result2);
					//echo $num_rows2;
					
			 }
		?>		
   
</body>
</html>

