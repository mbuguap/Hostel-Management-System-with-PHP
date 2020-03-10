<?php
	
	include_once('../db.php');

	if(isset($_POST['addroom'])){
		$type = $_POST['type'];
		$number = $_POST['number'];
		$fees = $_POST['fees'];
		$sql = "INSERT INTO rooms (room_type, room_number, fees) VALUES ('$type', '$number', '$fees')";

		
		if($conn->query($sql)){
			$_SESSION['msg'] = 'Room added successfully';
		}
		
		
		else{
			$_SESSION['error'] = 'Something went wrong';
		}
	}

	header('location: room.php');
?>

  