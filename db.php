

<?php
date_default_timezone_set('Africa/Nairobi');
ob_start();
session_start();

$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "Hostel";

// Create connection
$conn = mysqli_connect($DB_host,$DB_user, $DB_pass, $DB_name);



// if($conn){
//     echo 'success';
// }else{
//     echo "failed";
// }