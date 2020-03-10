<?php
	
	include_once('../db.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM course WHERE course_id = '".$_GET['id']."'"; 

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Course deleted successfully';
		}
	
		
		else{
			$_SESSION['error'] = 'Something went wrong in deleting course';
		}
	}
	else{
		$_SESSION['error'] = 'Select course first to delete first';
	}

	header('location: course.php');
?>