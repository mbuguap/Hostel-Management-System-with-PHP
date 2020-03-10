<?php
	
	include_once('db.php');

	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$full_name = $_POST['full_name'];
		$username = $_POST['username'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
		$course = $_POST['course'];
		$sql = "UPDATE student_register SET name = '$full_name', username = '$username', email = '$email', phonenumber = '$phone_number', course = '$course' WHERE student_id = '$id'";

		if($conn->query($sql)){
			$_SESSION['updated'] = 'Details updated successfully';
		}
		
		
		else{ 
			$_SESSION['error'] = 'Something went wrong ';
		}
	}
	else{
		$_SESSION['error'] = 'Select field to edit first';
	}

	header('location: studentdetails.php');

?>