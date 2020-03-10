<?php

require_once 'db.php'; 

if(isset($_POST['reset'])) {

    $email = strip_tags($_POST['email']);
    $question = strip_tags($_POST['question']);
    $answer = strip_tags($_POST['answer']);

    $check_database_query = mysqli_query($conn, "SELECT * FROM student_register WHERE email='$email' AND question='$question' AND answer='$answer'");
    $row = mysqli_num_rows($check_database_query);

    if($row == 1) {
    $_SESSION['email'] = $email;
      header("Location: resetPassword.php"); 
        } else {
          $_SESSION['error'] = "Wrong Credentials!";
        }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HSM | Forgot Password</title>
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
            <a class="link dim dark-gray f3 dib mr3 mr4-l" href="register.php" title="User Register">User Register</a>
        </div>
    </nav>


    <article class="br3 ba b--black-10 mv4 w-100 w-50-m w-50-l mw6 shadow-5 center">
      <main class="pa4 black-80">
          <div class="measure">
            <form action="" method="post">
              <fieldset id="sign_up" class="ba b--transparent ph0 mh0">
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
              ?>
              </div>
                  <legend class="f1 fw6 ph0 mh0">Forgot Password</legend>
                  <div class="mv3">
                    <label class="clip" for="email-address">Email Address</label>
                    <input class="pa2 ba input-reset hover-bg-black hover-white w-100" placeholder="Enter Your Email Address" type="text" name="email" value="" id="email-address">
                  </div>
                  
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
                  <input class="pa2 ba input-reset hover-bg-black hover-white  w-100" type="text" name="answer" placeholder="Answer" required />
                </div>
                <div class="mv3">
                  <input class="f6 f5-l button-reset fl pv3 tc bn bg-animate bg-black-70 hover-bg-black white pointer w-100 w-25-m w-20-l br2-ns br--right-ns" type="submit" name="reset" value="Reset">
                </div>
                </fieldset>
                
              </form>


          </div>
      </main>
    </article>

<?php require_once 'footer.php'; ?>