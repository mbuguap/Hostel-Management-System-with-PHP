<?php
	include 'db.php';
	$course_code=$_POST["course_code"];
	$duration = $_POST['duration'];
	$result = mysqli_query($conn,"SELECT * FROM course where course_id=$course_code");
?> 

<?php while($row = mysqli_fetch_array($result)) { ?>
	<option value="">Select Course Code</option>
	<option value="<?php echo $row["course_id"];?>"><?php echo $row["course_code"];?></option>
<?php } ?>
 
<?php 
$result = mysqli_query($conn,"SELECT * FROM course where course_id=$duration");
while($row = mysqli_fetch_array($result)) { ?>
<option value="">Select Course Duration</option>
	<option value="<?php echo $row["course_id"];?>"><?php echo $row["duration"];?></option>
<?php } ?> 
 
