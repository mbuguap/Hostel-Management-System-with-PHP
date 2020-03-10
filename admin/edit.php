<?php
	
	include_once('../db.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$coursecode = $_POST['coursecode']; 
		$coursename = $_POST['coursename'];
		$duration = $_POST['duration'];
		$sql = "UPDATE course SET course_code = '$coursecode', course_name = '$coursename', duration = '$duration'  WHERE course_id = '$id'";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Course updated successfully';
		}
		 
		 
		else{ 
			$_SESSION['error'] = 'Something went wrong in updating course';
		}
	}
	else{
		$_SESSION['error'] = 'Select course to edit first';
	}

	header('location: course.php');

?>