<?php
	
	include_once('../db.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM student_register WHERE student_id = '".$_GET['id']."'";

		if($conn->query($sql)){
			$_SESSION['message'] = 'Student deleted successfully';
		}
		else{
			$_SESSION['error'] = 'Something went wrong';
		}
	}
	header('location: managestudent.php'); 
?>