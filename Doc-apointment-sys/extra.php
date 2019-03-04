<html>
<form method="post" id="new-appointment">

        <?php
		     $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 
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
		     <input type="submit" name = "sub" value="submit" class="btn"/>
	    </div>
		
		<?php
		     $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 
			 if(isset($_POST['sub']))
			 {
				 $docid = $_POST['docid_input'];
				 $query = "INSERT INTO doc(doc) VALUES('$docid')";
				 mysqli_query($mysqli , $query);
			 }
			 
		?>
</form>
</html>