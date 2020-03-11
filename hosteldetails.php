<?php require_once 'db.php'; 
if (isset($_SESSION['email'])){
    $userLoggedIn = $_SESSION['email'];
    $user_details_query = mysqli_query($conn, "SELECT * FROM student_register WHERE email = '$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
if (!isset($_SESSION['email'])) { 
    $_SESSION['msg'] = "You have to log in first"; 
    header('location: index.php'); 
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
    <?php require_once 'sidebar.php' ;?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 shadow-5">
    <h3 class="text-center">Hostel Details</h3>
    <?php
                $sql = "SELECT *  FROM hostel_booking WHERE email = '$userLoggedIn'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                           
                while($row = $result->fetch_assoc()) {  
                       
            ?>

<div class="card-deck">
            <div class="card border-success mb-3">
                <div class="card-body text-secondary">
                    <h5 class="card-title">Student Id</h5>
                    <p class="card-text"><?php echo $row["student_id"]; ?></p>
                  </div>
            </div>
            <div class="card border-success mb-3">
                <div class="card-body text-secondary">
                    <h5 class="card-title">Booking ID</h5>
                    <p class="card-text"><?php echo $row["booking_id"]; ?></p>
                  </div>
            </div>

            <div class="card border-success mb-3">
                <div class="card-body text-secondary">
                    <h5 class="card-title">Student Name</h5>
                    <p class="card-text"><?php echo $row["student_name"]; ?></p>
                  </div>
            </div>
        </div>
        <div class="card-deck">

            <div class="card border-success mb-3">
                <div class="card-body text-secondary">
                    <h5 class="card-title">Room Number</h5>
                    <p class="card-text"><?php echo $row["room_number"]; ?></p>
                  </div>
            </div>
            <div class="card border-success mb-3">
                <div class="card-body text-secondary">
                    <h5 class="card-title">Duration in Months</h5>
                    <p class="card-text"><?php echo $row["duration"]; ?></p>
                  </div>
            </div>
            
            <div class="card border-success mb-3">
                <div class="card-body text-secondary">
                    <h5 class="card-title">Fees Per Month</h5>
                    <p class="card-text"><?php echo $row["feespermonth"]; ?></p>
                  </div>
            </div>
        </div>
        <div class="card-deck">
            
            <div class="card border-success mb-3">
                <div class="card-body text-secondary">
                    <h5 class="card-title">Total Fees</h5>
                    <p class="card-text"><?php echo $row["fees"]; ?></p>
                  </div>
            </div>
            <div class="card border-success mb-3">
                <div class="card-body text-secondary">
                    <h5 class="card-title">Room Type</h5>
                    <p class="card-text"><?php echo $row["room_type"]; ?></p>
                  </div>
            </div>
            <div class="card border-success mb-3">
                <div class="card-body text-secondary">
                    <h5 class="card-title">Course</h5>
                    <p class="card-text"><?php echo $row["course"]; ?></p>
                  </div>
            </div>
        </div>
        <div class="card-deck">
        <div class="card border-success mb-3">
                <div class="card-body text-secondary">
                    <h5 class="card-title">Email</h5>
                    <p class="card-text"><?php echo $row["email"]; ?></p>
                  </div>
            </div>

            <div class="card border-success mb-3">
                <div class="card-body text-secondary">
                    <h5 class="card-title">Phone Number</h5>
                    <p class="card-text"><?php echo $row["phonenumber"]; ?></p>
                  </div>
            </div>
            <div class="card border-success mb-3">
                <div class="card-body text-secondary">
                    <h5 class="card-title">Gender</h5>
                    <p class="card-text"><?php echo $row["gender"]; ?></p>
                  </div>
            </div>
              <?php     }
                   } else {
                       echo "No Details Available";
                   }
                   ?>
            
        </div>
              
            
    
 </main>
                </div>
                </div>
                <?php require_once 'footer.php' ?>