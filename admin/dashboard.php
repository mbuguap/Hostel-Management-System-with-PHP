<?php

require_once '../db.php';


if (isset($_SESSION['username'])){
    $adminLoggedIn = $_SESSION['username'];
    $admin_details_query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$adminLoggedIn'");
    $admin = mysqli_fetch_array($admin_details_query);
}

if (!isset($_SESSION['username'])) { 
    $_SESSION['msg'] = "You have to log in first"; 
    header('location: index.php'); 
} 
  
?>
<?php require_once 'header.php'; ?>
    <div id="particles-js"></div>
    
    <div class="container-fluid  header">
        <nav class="db f3 dt-l w-100 border-box pa3 ph5-l">
            <div class="db dtc-l w-50-l tc tr-l">
                <a class="db dtc-l v-mid f3 mid-gray link dim w-100 w-25-l tc tl-l mb2 mb0-l link-head" href="#"
                    title="Home">
                    La Casa De Papel Hostel
                </a>
            </div>
            <div class="db dtc-l v-mid  w-50-l tc tr-l">
                <a class="link dim dark-gray f3 dib mr3 mr4-l" href="adminprofile.php"><?php echo $admin['name']; ?> </a>

                <a class="link dim dark-gray f3 dib mr3 mr4-l" href="logout.php" title="Log Out">Log Out</a>
            </div>
        </nav>
    </div>
    
    <?php require_once 'sidebar.php'; ?>
    <div class="col-md-9 ">
    <div class="container">
        <?php if (isset($_SESSION['alert'])) : ?>
        <div class=" alert alert-success">
     
                <?php
                        echo $_SESSION['alert'].$admin['name'];
                        unset($_SESSION['alert']); 
                    ?>
        </div>
        <?php endif ?>
    </div>
                <div class="container">
                    <h1>Total Students</h1>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Student Id</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Course</th>
                            </tr>
                        </thead>
                        <?php 

        $sql = "SELECT *  FROM student_register ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
                
        ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $row["student_id"]; ?></th>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["phonenumber"]; ?></td>
                                <td><?php echo $row["gender"]; ?></td>
                                <td><?php echo $row["course"]; ?></td>
                            </tr>
                        </tbody>

                        <?php
        }
    } else {
        echo "0 results";
    }
    ?>

                    </table>
                </div>
                <div class="container">
                    <h1>Total Rooms</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Room Id</th>
                                <th scope="col">Room Type</th>
                                <th scope="col">Room Number</th>
                                <th scope="col">Fee</th>
                            </tr>
                        </thead>
                        <?php 

                    $sql = "SELECT * FROM rooms";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        
                        while($row = $result->fetch_assoc()) {
                            
                    ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $row["room_id"]; ?></th>
                                <td><?php echo $row["room_type"]; ?></td>
                                <td><?php echo $row["room_number"]; ?></td>
                                <td><?php echo $row["fees"]; ?></td>
                            </tr>
                        </tbody>
                        <?php
                            }
                        } else {
                            echo "0 results";
                        }


                        ?>
                    </table>
                </div>

                <div class="container">
                    <h1>Total Courses</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Course Id</th>
                                <th scope="col">Course Code</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Duration in Months</th>
                            </tr>
                        </thead>
                        <?php 

                    $sql = "SELECT * FROM course";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        
                        while($row = $result->fetch_assoc()) {
                            
                    ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $row["course_id"]; ?></th>
                                <td><?php echo $row["course_code"]; ?></td>
                                <td><?php echo $row["course_name"]; ?></td>
                                <td><?php echo $row["duration"]; ?></td>
                            </tr>

                        </tbody>
                        <?php
                            }
                        } else {
                            echo "0 results";
                        }

                        ?>
                    </table>
                </div>

                    </div>
                    </div>


<?php require_once 'footer.php'; ?>