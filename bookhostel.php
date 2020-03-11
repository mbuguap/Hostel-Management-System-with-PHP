<?php require_once 'db.php';

$error_array = array(); 
if (isset($_SESSION['email'])){
    $userLoggedIn = $_SESSION['email'];
    $user_details_query = mysqli_query($conn, "SELECT * FROM student_register WHERE email = '$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
if (!isset($_SESSION['email'])) { 
    $_SESSION['msg'] = "You have to log in first"; 
    header('location: index.php'); 
}  
if(isset($_POST['submit'])){

    $RoomType = mysqli_real_escape_string($conn,$_POST['RoomType']);
    
    $RoomNumber = mysqli_real_escape_string($conn,$_POST['RoomNumber']);
    $Duration = mysqli_real_escape_string($conn,$_POST['Duration']);
    $Fees = mysqli_real_escape_string($conn,$_POST['Fees']);
    $studentid = mysqli_real_escape_string($conn,$_POST['StudentId']);
    $studentname = mysqli_real_escape_string($conn,$_POST['StudentName']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);;
    $phonenumber = mysqli_real_escape_string($conn,$_POST['phonenumber']);
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    $course = mysqli_real_escape_string($conn,$_POST['course']);
    $feepermonth = mysqli_real_escape_string($conn,$_POST['RoomFees']);


    $sql = "SELECT *  FROM hostel_booking WHERE email = '$userLoggedIn'";
    $result = $conn->query($sql);

    if (empty($result->num_rows)) {
     
        if( !empty($RoomType) || !empty($RoomNumber) || !empty($Duration) || !empty($Fees) ){
            $sql = mysqli_query($conn, "INSERT INTO `hostel_booking`(`room_type`,`room_number`,`feespermonth`,`duration`,`fees`, `student_id`, `student_name`, `email`, `phonenumber`,`gender`, `course`) 
            VALUES ('$RoomType','$RoomNumber','$feepermonth','$Duration','$Fees', '$studentid', '$studentname', '$email', '$phonenumber', '$gender', '$course' )");
            array_push($error_array, '<div class="alert alert-success" role="alert">Hostel Booked Successfully</div>');
        }
        else { array_push($error_array, '<div class="alert alert-danger" role="alert">Please fill the empty spaces!</div>');
    
        }
    } else {
        array_push($error_array, '<div class="alert alert-danger" role="alert">You have already booked!</div>');
    }
  
        
       
    }

?>
<?php require_once 'header.php' ?>
<div id="particles-js"></div>

<div class="container-fluid header">
    <nav class="db f3 dt-l w-100 border-box pa3 ph5-l">
        <div class="db dtc-l w-50-l tc tr-l">
            <a class="db dtc-l v-mid f3 mid-gray link dim w-100 w-25-l tc tl-l mb2 mb0-l link-head" href="#"
                title="Home">
                La Casa De Papel Hostel
            </a>
        </div>
        <div class="db dtc-l v-mid  w-50-l tc tr-l">
            <a class="link dim dark-gray f3 dib mr3 mr4-l" href="studentdetails.php" title="User"><?php echo $user['name']; ?> </a>
            <a class="link dim dark-gray f3 dib mr3 mr4-l" href="logout.php" title="Log Out">Log Out</a>
        </div>
    </nav>
</div>
<?php require_once 'sidebar.php' ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 shadow-5">
    <form class="needs-validation" action="bookhostel.php" method="post" novalidate>
        <?php if(in_array('<div class="alert alert-danger" role="alert">You have already booked!</div>', $error_array)) echo '<div class="alert alert-danger" role="alert">You have already booked!</div>';
                            ?>
        <h3 class="text-center">Book Hostel</h3>
        <?php $sql = "SELECT * FROM student_register WHERE email = '$userLoggedIn'";
                        $query = $conn->query($sql);
                        while($row = $query->fetch_assoc()){ ?>
<?php if(in_array('<div class="alert alert-success" role="alert">Hostel Booked Successfully</div>', $error_array)) echo '<div class="alert alert-success" role="alert">Hostel Booked Successfully</div>';
                            ?>
        <div class="form-row">
            <div class="col-md-2 mb-3">
                <label for="validationCustom01">Student Id</label>
                <input type="text" class="form-control" name="StudentId" value="<?php echo $row['student_id'] ?>"
                    readonly>
            </div>

            <div class="col-md-2 mb-3">
                <label for="validationCustom01">Student Name</label>
                <input type="text" class="form-control" name="StudentName" value="<?php echo $row['name'] ?>" readonly>
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationCustom04">Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>" readonly>
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationCustom03">Phone Number</label>
                <input type="text" class="form-control" name="phonenumber" value="<?php echo $row['phonenumber'] ?>"
                    readonly>
            </div>

            <div class="col-md-2 mb-3">
                <label for="validationCustom05">Gender</label>
                <input type="text" class="form-control" name="gender" value="<?php echo $row['gender'] ?>" readonly>
            </div>
            <div class="col-md-2 mb-3">
                <div class="form-group">
                    <label for="exampleInputPassword1">Course</label>
                    <input type="text" class="form-control" name="course" value="<?php echo $row['course'] ?>" readonly>
                </div>
            </div>
            <?php } ?>
        </div>
        
        <div class="form-row">
        <div class="col-md-2 mb-3">
                <label>Room Type</label> 
                <select class="custom-select" id="RoomType" onchange="document.getElementById('text_content').value=this.options[this.selectedIndex].text" required>
                <option selected disabled value="">Select Room Type</option>
                <?php 
                $result = mysqli_query($conn,"SELECT * FROM rooms");
                while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["room_id"];?>"><?php echo $row["room_type"];?></option>
                <?php } ?>
                </select>
                <input type="hidden" name="RoomType"  id="text_content" value="" />
            </div>
            <div class="col-md-2 mb-3">
                <label>Room Number</label>
                <select class="custom-select" id="RoomNumber" oninput="document.getElementById('text').value=this.options[this.selectedIndex].text" required>
                    <option value="" disabled selected>Choose Room Number</option>
                    <option></option>
                </select>
                <input type="hidden" name="RoomNumber" id="text" value="" />
            </div>
            <div class="col-md-2 mb-3"> 
                <label>Fees Per Month</label>
                <select class="custom-select" id="RoomFees" oninput="document.getElementById('textf').value=this.options[this.selectedIndex].text" required>
                    <option value="" disabled selected>Fees Per Month</option>
                    <option></option>
                </select>
                <input type="hidden" name="RoomFees" id="textf" value="" />
            </div>
                        
            <div class="col-md-3 mb-3">
                <label for="validationCustom05">Duration in months</label>
                <select class="custom-select" name="Duration" onchange="calculateAmount(this.value)" required>
                    <option selected disabled value="">Duration in Months</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <div class="form-group">
                    <label for="exampleInputPassword1">Fees</label>
                    <input type="text" class="form-control" name="Fees" id="fees" placeholder="Fees" readonly>
                </div>
            </div>
        </div>
        <?php if(in_array('<div class="alert alert-danger" role="alert">Please fill the empty spaces!</div>', $error_array)) echo '<div class="alert alert-danger" role="alert">Please fill the empty spaces!</div>';
                            ?>

        <button class="btn btn-info btn-lg " type="submit" id="submit" name="submit">Submit
            form</button> <br>
        
    </form>
    </div>
    </div>
</main>

<script>
$(document).ready(function() {
	$('#RoomType').on('change', function() {
			var room_number = this.value;
			$.ajax({
				url: "room_cat.php",
				type: "POST",
				data: {
					room_number 
				},
				cache: false,
				success: function(dataResult){
					$("#RoomNumber").html(dataResult);
				}
			});
	});
    $('#RoomNumber').on('change', function() {
			var room_fees = this.value;
			$.ajax({
				url: "room_cat.php",
				type: "POST",
				data: {
					room_fees
				},
				cache: false,
				success: function(dataResult){
					$("#RoomFees").html(dataResult);
				}
			});
	});
});


function calculateAmount(val) {
        var feesPerMonth = $("#RoomFees option:selected").text();
        var tot_price = val * feesPerMonth;
        var divobj = document.getElementById('fees');
        divobj.value = tot_price;
    }
</script>


<?php require_once 'footer.php' ?>