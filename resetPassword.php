<?php 
require_once 'db.php'; 

if (isset($_SESSION['email'])){
    $userLoggedIn = $_SESSION['email'];
} 
if (!isset($_SESSION['email'])) { 
    $_SESSION['msg'] = "You have to log in first"; 
    header('location: index.php'); 
} 
if(isset($_POST['submit'])) {

    $new_password_1 = strip_tags($_POST['new_password_1']);
    $new_password_2 = strip_tags($_POST['new_password_2']);

    

        if($new_password_1 == $new_password_2) {


            if(strlen($new_password_1) <= 6) {
                $_SESSION['error'] = "Sorry, your password must be greater than 6 characters";
            }	
            else {
                $new_password_md5 = md5($new_password_1);
                $password_query = mysqli_query($conn, "UPDATE student_register SET password='$new_password_md5' WHERE email='$userLoggedIn'");
                $_SESSION['password_success'] = "Password has been changed! Please Proceed and Login";
            }


        }
        else {
            $_SESSION['error'] = "Your two new passwords need to match!";
        }

    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HSM | Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link
        href="https://fonts.googleapis.com/css?family=Acme|PT+Serif|Sacramento|Ubuntu|ZCOOL+QingKe+HuangYou&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div id="particles-js"></div>

    <nav class="db f3 dt-l w-100 border-box pa3 ph5-l">
        <a class="db dtc-l v-mid f3 mid-gray link dim  w-50-l tc tl-l mb2 mb0-l link-head" href="#" title="Home">
            La Casa De Papel Hostel
        </a>
        <div class="db dtc-l v-mid w-100 w-50-l tc tr-l">
            <a class="link dim dark-gray f3 dib mr3 mr4-l" href="admin/index.php" title="Admin Login">Admin Login</a>
            <a class="link dim dark-gray f3 dib mr3 mr4-l" href="index.php" title="User Register">User Login</a>
        </div>
    </nav>


    <article class="br3 ba b--black-10 mv4 w-100 w-50-m w-50-l mw6 shadow-5 center">
      <main class="pa4 black-80">
          <div class="measure">
            <form action="resetPassword.php" method="post">
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
				if(isset($_SESSION['password_success'])){
					echo
					"
					<div class='alert alert-success text-center'>
						".$_SESSION['password_success']."
					</div>
					";
					unset($_SESSION['password_success']); 
				}
			?>
            </div>
              <fieldset id="sign_up" class="ba b--transparent ph0 mh0">
                  <legend class="f1 fw6 ph0 mh0">Reset Password</legend>
                  <div class="mv3">
                    <input class="b pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" type="password" name="new_password_1" placeholder="New Password" required />
                </div>
                <div class="mv3">
                    <input class="b pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" type="password" name="new_password_2" placeholder="Confirm Password" required />
                </div>
                <div class="mv3">
                  <input class="f6 f5-l button-reset fl pv3 tc bn bg-animate bg-black-70 hover-bg-black white pointer w-100 w-25-m w-20-l br2-ns br--right-ns" type="submit" name="submit" value="Submit">
                </div>
                </fieldset>
                
              </form>


          </div>
      </main>
    </article>

<?php require_once 'footer.php'; ?>