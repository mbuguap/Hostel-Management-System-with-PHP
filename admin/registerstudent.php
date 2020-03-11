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

$full_name = ""; 
$username = "";
$email = "";
$phone_number = "";
$course = "";
$gender = "";
$password = "";
$confirm_password = "";
$error_array = array();

if(isset($_POST['register'])){

    $full_name = mysqli_real_escape_string($conn,$_POST['full_name']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone_number = mysqli_real_escape_string($conn,$_POST['phone_number']);
    $course = mysqli_real_escape_string($conn,$_POST['course']);
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn,$_POST['confirm_password']);
   
   
    if ($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            $select = mysqli_query($conn, "SELECT email FROM student_register WHERE email = '$email'");
            $num_rows = mysqli_num_rows($select);

            if($num_rows > 0){
                array_push($error_array, '<div class="alert alert-danger" style="margin-top: 1rem" role="alert">This email is already being used</div>') ;
            }
        } else { array_push($error_array,'<div class="alert alert-danger" style="margin-top: 1rem" role="alert">Invalid format</div>' ) ;}
    } 
    
    
    if ($password != $confirm_password){ 
        array_push($error_array, "<div class='alert alert-danger' style='margin-top: 1rem'>Your passwords do not match. please type carefully.</div>") ;
    }
    if (strlen($password > 30 || strlen ($password) < 6)){
        array_push($error_array, "<div class='alert alert-danger' style='margin-top: 1rem'>Your password must be more than 6 characters</div>");
    }
    
    if(empty($error_array)){
        $password = md5($password);

        $sql = mysqli_query($conn, "INSERT INTO `student_register`(`name`,`username`,`email`,`phonenumber`,`course`,`gender`,`password`) 
        VALUES ('$full_name','$username','$email','$phone_number','$course','$gender','$password')");
       
    array_push($error_array, "<div class='alert alert-success' style='margin-top: 1rem'>Registration Successfull</div>");
       
}
}
?>
<?php require_once 'header.php'; ?>
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
            <a class="link dim dark-gray f3 dib mr3 mr4-l" href="adminprofile.php"><?php echo $admin['name']; ?> </a>

            <a class="link dim dark-gray f3 dib mr3 mr4-l" href="logout.php" title="Log Out">Log Out</a>
        </div>
    </nav>
</div>
<?php require_once 'sidebar.php'; ?>
<div class="col-md-9">
<article class="br3 ba b--black-10 mv4 w-100 w-50-m w-50-l mw6 shadow-5 center">
    <main class="pa4 black-80">
        <div class="measure">
            <form action="registerstudent.php" method="post">
                <fieldset id="sign_up" class="ba b--transparent ph0 mh0">
                    <legend class="f1 fw6 ph0 mh0">Register</legend>
                    <?php if(in_array("<div class='alert alert-success' style='margin-top: 1rem'>Registration Successfull</div>", $error_array)) echo "<div class='alert alert-success' style='margin-top: 1rem'>Registration Successfull</div>";  ?>
                    <div class="mt3">
                        <!-- <label class="db fw6 lh-copy f6" htmlFor="full-name">Full Name</label> -->
                        <input class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100"
                            type="full_name" name="full_name" placeholder="Your Full Name" required />
                    </div>
                    <div class="mt3">
                        <!-- <label class="db fw6 lh-copy f6" htmlFor="user-name">Username</label> -->
                        <input class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100"
                            type="username" name="username" placeholder="Username" required />
                    </div>
                    <div class="mt3">
                        <!-- <label class="db fw6 lh-copy f6" htmlFor="email-address">Email</label> -->
                        <input class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" type="email"
                            name="email" placeholder="Email" required />
                        <?php if(in_array('<div class="alert alert-danger" style="margin-top: 1rem" role="alert">This email is already being used</div>', $error_array)) echo '<div class="alert alert-danger" style="margin-top: 1rem" role="alert">This email is already being used</div>';
                                        elseif(in_array('<div class="alert alert-danger" style="margin-top: 1rem" role="alert">Invalid format</div>', $error_array)) echo '<div class="alert alert-danger" style="margin-top: 1rem" role="alert">Invalid format</div>';
                                        ?>
                    </div>
                    <div class="mt3">
                        <!-- <label class="db fw6 lh-copy f6" htmlFor="phone-number">Phone Number</label> -->
                        <input class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100"
                            type="phone_number" name="phone_number" placeholder="Phone Number" required />
                    </div>
                    <div class="mt3">
                        <!-- <label class="db fw6 lh-copy f6" htmlFor="course">Course</label> -->
                        <input class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" type="course"
                            name="course" placeholder="Course" required />
                    </div>
                    <div class="mt3 ">
                        <!-- <p>Gender:</p> -->
                        <select class=" pa2 ba input-reset hover-bg-black hover-white  w-100 " name="gender" id=""
                            required>
                            <option selected>Choose Gender...</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>

                    </div>

                    <div class="mv3">
                        <!-- <label class="db fw6 lh-copy f6" htmlFor="password">Password</label> -->
                        <input class="b pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100"
                            type="password" name="password" placeholder="Password" required />
                    </div>
                    <div class="mv3">
                        <!-- <label class="db fw6 lh-copy f6" htmlFor="confirm-password">Confirm Password</label> -->
                        <input class="b pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100"
                            type="password" name="confirm_password" placeholder="Confirm Password" required />
                        <?php if(in_array("<div class='alert alert-danger' style='margin-top: 1rem'>Your passwords do not match. please type carefully.</div>", $error_array)) echo "<div class='alert alert-danger' style='margin-top: 1rem'>Your passwords do not match. please type carefully.</div>";
                                        elseif(in_array("<div class='alert alert-danger' style='margin-top: 1rem'>Your password must be more than 6 characters</div>", $error_array)) echo "<div class='alert alert-danger' style='margin-top: 1rem'>Your password must be more than 6 characters</div>";
                            
                                        ?>
                    </div>
                    <hr>
                            <div class="mv3">
                                <label class="db fw6 lh-copy f6">Security Question</label>
                                <select class=" pa2 ba input-reset hover-bg-black hover-white  w-100" name="question" id="question" required>
                                <option value="What is the name of your dog?">What is the name of your dog?</option>
                                <option value="What is the name of your favorite teacher?">What is the name of your favorite teacher?</option>
                                <option value="What is your maiden name?">What is your maiden name?</option>
                                <option value="In what city were you born?">In what city were you born?</option>
                                <option value="What is your favorite food?">What is your favorite food?</option>
                                </select>
                                
                            </div>
                            <div class="mv3">
                                <input class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" type="text" name="answer" placeholder="Answer" required />
                            </div>    
                </fieldset>
                <div class="">
                    <input class="b ph3 pv2 input-reset ba b--black bg-transparent grow pointer f6 dib" type="submit"
                        value="Register Student" name="register" />
                    
                </div>
            </form>
        </div>
    </main>
</article>
</div>
</div>
</div>
<?php require_once 'footer.php'; ?>