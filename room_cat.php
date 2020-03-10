 <?php
	include 'db.php';
	$room_number=$_POST["room_number"];
	$room_fees = $_POST["room_fees"];
	$result = mysqli_query($conn,"SELECT * FROM rooms where room_id=$room_number");
?> 

<?php
 
while($row = mysqli_fetch_array($result)) {
?>
<option value="">Select Room Number</option>
	<option value="<?php echo $row["room_id"];?>"><?php echo $row["room_number"];?></option>
<?php
} 
?>
<?php
$result = mysqli_query($conn,"SELECT * FROM rooms where room_id=$room_fees");
while($row = mysqli_fetch_array($result)) {
?>
<option value="">Select Room Fees</option>
	<option value="<?php echo $row["room_id"];?>"><?php echo $row["fees"];?></option>
<?php
}
?>