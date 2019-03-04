<html>
<body>
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
<div class="input-field">
	        <label for="time-slot">Time Slot</label> 
	        <select name="select_time">
			  <option value="TIME">Select Time Slot</option> 
              <option value="01">Morning-01 Shift</option> 			  
              <option value="8 AM - 8:15 AM">8 AM - 8:15 AM</option>
              <option value="8:20 AM - 8:35 AM">8:20 AM - 8:35 AM</option>
              <option value="8:40 AM - 8:55 AM">8:40 AM - 8:55 AM</option>
              <option value="9:00 AM - 9:15 AM">9:00 AM - 9:15 AM</option>
			  <option value="9:20 AM - 9:35 AM">9:20 AM - 9:35 AM</option>
              <option value="9:40 AM - 9:55 AM">9:40 AM - 9:55 AM</option>
              <option value="10:00 AM - 10:15 AM">10:00 AM - 10:15 AM</option>
			  <option value="dass">===========================</option> 
			  <option value="02">Morning-02 Shift</option> 
              <option value="10:30 AM - 10:45 AM">10:30 AM - 10:45 AM</option>
			  <option value="10:50 AM - 11:05 AM">10:50 AM - 11:05 AM</option>
              <option value="11:10 AM - 11:25 AM">11:10 AM - 11:25 AM</option>
              <option value="11:30 AM - 11:45 AM">11:30 AM - 11:45 AM</option>
              <option value="11:50 AM- 12:05 PM">11:50 AM- 12:05 PM</option>
			  <option value="12:10 PM - 12:25 PM">12:10 PM - 12:25 PM</option>
              <option value="12:30 PM - 12:45 PM">12:30 PM - 12:45 PM</option>
			  <option value="dass">===========================</option> 
			  <option value="03">Afternoon Shift</option> 
              <option value="4:00 PM - 4:15 PM">4:00 PM - 4:15 PM</option>
              <option value="4:20 PM - 4:35 PM">4:20 PM - 4:35 PM</option>
			  <option value="4:40 PM - 4:55 PM">4:40 PM - 4:55 PM</option>
              <option value="5:00 PM - 5:15 PM">5:00 PM - 5:15 PM</option>
              <option value="5:20 PM - 5:35 PM">5:20 PM - 5:35 PM</option>
              <option value="5:40 PM - 5:55 PM">5:40 PM - 5:55 PM</option>
			  <option value="6:00 PM - 6:15 PM">6:00 PM - 6:15 PM</option>
			  <option value="dass">===========================</option> 
			  <option value="04">Eveninh Shift</option> 
              <option value="7:00 PM - 7:15 PM">7:00 PM - 7:15 PM</option>
              <option value="7:20 PM - 7:35 PM">7:20 PM - 7:35 PM</option>
              <option value="7:40 PM - 7:55 PM">7:40 PM - 7:55 PM</option>
			  <option value="8:00 PM  - 8:15 PM">8:00 PM  - 8:15 PM</option>
              <option value="8:20 PM - 8:35 PM">8:20 PM - 8:35 PM</option>
              <option value="8:40 PM - 8:55 PM">8:40 PM - 8:55 PM</option>
              <option value="9:00 PM - 9:15 PM">9:00 PM - 9:15 PM</option>
             </select>
		</div>
		

<div>
 <input type="submit" name = "submit" value="submit" class="btn"/>
 </div>
</body>

<?php
             $host= 'localhost';
             $user= 'root';
             $pass = '';
             $db = 'das';

             $mysqli = mysqli_connect($host,$user,$pass,$db);
			 if(isset($_POST['submit']))
			 {
				  $shift = $_POST['select_shift'];
				  $time = $_POST['select_time'];
				  /*$date = 28;
				  $month = 2;
				  $year = 19;
				  $docid = 222;
				  $hospid = 222;
				  $shift = "morning1";
				 $query = "SELECT * FROM apointment WHERE date = '$date' AND month = '$month' AND year = '$year' AND doc_id = '$docid'
				           AND shift = '$shift' AND h_code = '$hospid'";
			     $result = mysqli_query($mysqli,$query);
				 $res = mysqli_num_rows($result);
				 
				 echo $res;
				 */
				 echo $shift;
				 echo '</br>';
				 echo $time;
				  if($shift = "morning1" && 
				 $time = "10:30 AM - 10:45 AM" || $time = "10:50 AM - 11:05 AM" ||$time = "11:10 AM - 11:25 AM" ||$time = "11:30 AM - 11:45 AM" ||$time = "11:50 AM- 12:05 PM" ||$time = "12:10 PM - 12:25 PM" || $time = "12:30 PM - 12:45 PM" ||
                 $time = "4:00 PM - 4:15 PM" ||$time = "4:20 PM - 4:35 PM" ||$time = "4:40 PM - 4:55 PM" ||$time = "5:00 PM - 5:15 PM" ||$time = "5:20 PM - 5:35 PM" ||$time = "5:40 PM - 5:55 PM" ||$time = "6:00 PM - 6:15 PM" ||
                 $time = "7:00 PM - 7:15 PM" ||$time = "7:20 PM - 7:35 PM" ||$time = "7:40 PM - 7:55 PM" ||$time = "8:00 PM  - 8:15 PM" ||$time = "8:20 PM - 8:35 PM" ||$time = "8:40 PM - 8:55 PM" ||$time = "9:00 PM - 9:15 PM") 
				{echo "shift and slot unmatch"; exit;}
				
				if($shift == "morning2" &&
				$time == "8 AM - 8:15 AM" ||$time == "8:20 AM - 8:35 AM" ||$time == "8:40 AM - 8:55 AM" ||$time == "9:00 AM - 9:15 AM"||$time == "9:20 AM - 9:35 AM" ||$time == "9:40 AM - 9:55 AM" ||$time == "10:00 AM - 10:15 AM" || 
				$time == "4:00 PM - 4:15 PM" ||$time == "4:20 PM - 4:35 PM" ||$time == "4:40 PM - 4:55 PM" ||$time == "5:00 PM - 5:15 PM" ||$time == "5:20 PM - 5:35 PM" ||$time == "5:40 PM - 5:55 PM" ||$time == "6:00 PM - 6:15 PM" ||
                $time == "7:00 PM - 7:15 PM" ||$time == "7:20 PM - 7:35 PM" ||$time == "7:40 PM - 7:55 PM" ||$time == "8:00 PM  - 8:15 PM" ||$time == "8:20 PM - 8:35 PM" ||$time == "8:40 PM - 8:55 PM" ||$time == "9:00 PM - 9:15 PM")
				{echo "shift and slot unmatch"; exit;}
			 }
?>
</html>