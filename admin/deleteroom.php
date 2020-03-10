<?php
	
	include_once('../db.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM rooms WHERE room_id = '".$_GET['id']."'";

		if($conn->query($sql)){
			$_SESSION['msg'] = 'Room deleted successfully';
		}
	
		
		else{
			$_SESSION['error'] = 'Something went wrong';
		}
	}
	

	header('location: room.php');
?>  