<?php
	
	include_once('../db.php');

	if(isset($_POST['editroom'])){
		$id = $_POST['id'];
		$type = $_POST['type'];
		$number = $_POST['number'];
		$fees = $_POST['fees'];
		$sql = "UPDATE rooms SET room_type = '$type', room_number = '$number', fees = '$fees' WHERE room_id = '$id'";

		if($conn->query($sql)){
			$_SESSION['msg'] = 'Room updated successfully';
		}
		
		
		else{
			$_SESSION['error'] = 'Something went wrong';
		}
	}

	header('location: room.php');
  
?>