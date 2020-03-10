<?php
	
	include_once('../db.php');

	if(isset($_POST['add'])){ 
		$coursecode = $_POST['coursecode']; 
		$coursename = $_POST['coursename'];
		$duration = $_POST['duration'];
		$sql = "INSERT INTO course (course_code, course_name, duration) VALUES ('$coursecode', '$coursename', '$duration')";

		
		if($conn->query($sql)){
			$_SESSION['success'] = 'Course added successfully';
		}
		
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: course.php');
?>

