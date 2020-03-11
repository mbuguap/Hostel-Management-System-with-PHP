<?php 
require_once 'db.php'; 
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

<?php require_once 'sidebar.php' ?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 shadow-5">
    <div class="col-sm-12">
        <h3 class="text-center">User Details</h3>
        <div class="row d-flex justify-content-center">
            <?php
				if(isset($_SESSION['error'])){
					echo
					"
					<div class='alert alert-danger text-center'>
						".$_SESSION['error']."
					</div>
					";
					unset($_SESSION['error']);
				}
				if(isset($_SESSION['updated'])){
					echo
					"
					<div class='alert alert-success text-center'>
						".$_SESSION['updated']."
					</div>
					";
					unset($_SESSION['updated']);
				}
			?>

        </div>

        <div class="card-deck">
            <?php
						
                        $sql = "SELECT * FROM student_register WHERE email = '$userLoggedIn'";
                        $query = $conn->query($sql);
                        while($row = $query->fetch_assoc()){ ?>
            <div class="card border-success mb-3">
                <div class="card-body text-secondary">
                    <h5 class="card-title">Student Id</h5>
                    <p class="card-text"><?php echo $row["student_id"]; ?></p>
                  </div>
            </div>
            <div class="card border-success mb-3">
                <div class="card-body text-secondary">
                    <h5 class="card-title">Student Name</h5>
                    <p class="card-text"><?php echo $row["name"]; ?></p>
                  </div>
            </div>
            <div class="card border-success mb-3">
                <div class="card-body text-secondary">
                    <h5 class="card-title">Email</h5>
                    <p class="card-text"><?php echo $row["email"]; ?></p>
                  </div>
            </div>
        </div>
        <div class="card-deck">

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
            <div class="card border-success mb-3">
                <div class="card-body text-secondary">
                    <h5 class="card-title">Course</h5>
                    <p class="card-text"><?php echo $row["course"]; ?></p>
                  </div>
            </div>
            
        </div>
        <a href='#update<?php echo $row['student_id']; ?>' class='btn btn-info btn-lg ' data-toggle='modal'><i
                class='fas fa-edit' style='padding-right: .3rem'></i> Edit</a>


        <?php
                include('updateUserModal.php');
                    }
               

                ?>
        <br><br>

       
        <article class="br3 ba b--black-10 mv4 w-100 w-50-m w-50-l mw9 shadow-5 center">
            <main class="pa4 black-80">
                <div class="measure center">
        <?php
                if(isset($_POST['update_password'])) {

                    $old_password = strip_tags($_POST['old_password']);
                    $new_password_1 = strip_tags($_POST['new_password_1']);
                    $new_password_2 = strip_tags($_POST['new_password_2']);
                
                    $password_query = mysqli_query($conn, "SELECT password FROM student_register WHERE email='$userLoggedIn'");
                    $row = mysqli_fetch_array($password_query);
                    $db_password = $row['password'];
                
                    if(md5($old_password) == $db_password) {
                
                        if($new_password_1 == $new_password_2) {
                
                
                            if(strlen($new_password_1) <= 6) {
                                $_SESSION['error'] = "Sorry, your password must be greater than 6 characters";
                            }	
                            else {
                                $new_password_md5 = md5($new_password_1);
                                $password_query = mysqli_query($conn, "UPDATE student_register SET password='$new_password_md5' WHERE email='$userLoggedIn'");
                                $_SESSION['pass_success'] = "Password has been changed!";
                            }
                
                
                        }
                        else {
                            $_SESSION['error'] = "Your two new passwords need to match!";
                        }
                
                    }
                    else {
                        $_SESSION['error'] = "The old password is incorrect! ";
                    }
                
                }

            ?>
        <form action="studentdetails.php" method="post">
            <h3 class="text-center">Change Password</h3>
            <div class="row d-flex justify-content-center">
                <?php
				if(isset($_SESSION['error'])){
					echo
					"
					<div class='alert alert-danger text-center'>
						".$_SESSION['error']."
					</div>
					";
					unset($_SESSION['error']);
				}
				if(isset($_SESSION['pass_success'])){
					echo
					"
					<div class='alert alert-success text-center'>
						".$_SESSION['pass_success']."
					</div>
					";
					unset($_SESSION['pass_success']);
				}
			?>
            </div>

            <fieldset id="sign_up" class="ba b--transparent ph0 mh0">
                <div class="mv3">
                    <input type="password" class="form-control b pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" name="old_password" placeholder="Old Password" required>
              </div>
              <div class="mv3">
                <input type="password" class="form-control b pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" name="new_password_1" placeholder="New Password" required>
              </div>
              <div class="mv3">
                <input type="password" class="form-control b pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" name="new_password_2" placeholder="Confirm Password" required>
              </div>
              <div class="mv3">
                <button class="f6 f5-l button-reset fl pv3 tc bn bg-animate bg-black-70 hover-bg-black white pointer w-100 w-25-m w-20-l br2-ns br--right-ns" type="submit" name="update_password">Update
                    Password</button>
              </div>
              </fieldset>

        </form>
    </div>
</main>
    </article>
    </div>
    </div>
</main>

</div>
</div>
<?php require_once 'footer.php' ?>