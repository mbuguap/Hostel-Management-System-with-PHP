<?php 
require_once 'db.php';

$error_array = array();

if(isset($_POST['login'])) {
 
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); //sanitize email

	$_SESSION['email'] = $email; //Store email into session variable 
    $password = md5($_POST['password']); //Get password

	$check_database_query = mysqli_query($conn, "SELECT * FROM student_register WHERE email='$email' AND password='$password'");
	$check_login_query = mysqli_num_rows($check_database_query); 

	if($check_login_query == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['alert'] = "You have logged in! Welcome ";
        header("Location: dashboard.php"); 

        $userLoggedIn = $_SESSION['email'];
        $user_details_query = mysqli_query($conn, "SELECT * FROM student_register WHERE email = '$userLoggedIn'");
        $user = mysqli_fetch_array($user_details_query);
        
        $ip_address=$_SERVER['REMOTE_ADDR'];
        $geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip_address;
        $addrDetailsArr = unserialize(file_get_contents($geopluginURL));
        $city = $addrDetailsArr['geoplugin_city'];
        $country = $addrDetailsArr['geoplugin_countryName'];
        if(!$city){
        $city='Not Define';
        }if(!$country){
        $country='Not Define';
        }
        $student_id = $user['student_id'];
        $email = $user['email'];
        $name= $user['name'];
        $browser = $_SERVER['HTTP_USER_AGENT'];

        $error_message = date("F j, Y, g:i a").", Student Id: "."$student_id".", Email: "."$email".", Name: "."$name".", IP_Address: "."$ip_address".", Browser: "."$browser".", City: "."$city".", Country: "."$country".PHP_EOL; 
  
        $log_file = "logs/access.log"; 
        
        error_log($error_message, 3, $log_file); 

        $logfile_dir = "logs/user.log"; 
        $logfile = $logfile_dir . "php" . $email . ".log";
    
        function error_handler($errno, $errstr, $errfile, $errline)
        {
            global $logfile_dir, $logfile;
    
        
    
            $filename = basename($errfile);
    
            switch ($errno) {
                case E_USER_ERROR:
                    file_put_contents($logfile, "  [$errno] $errstr\n", FILE_APPEND | LOCK_EX);
                    exit(1);
                    break;
    
                case E_USER_WARNING:
                    file_put_contents($logfile, " $errstr\n", FILE_APPEND | LOCK_EX);
                    break;
    
                case E_USER_NOTICE:
                    file_put_contents($logfile, " $errstr\n", FILE_APPEND | LOCK_EX);
                    break;
    
                default:
                    file_put_contents($logfile, " $errstr\n", FILE_APPEND | LOCK_EX);
                    break;
            }
        }
    
        set_error_handler("error_handler");
    
        trigger_error($error_message, E_USER_NOTICE);
        
  
	}
	else {
		array_push($error_array, "Email or password was incorrect<br>");
    }
}



 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HSM | La Casa De Papel Hostel</title>
    <link href="https://fonts.googleapis.com/css?family=Acme|PT+Serif|Sacramento|Ubuntu|ZCOOL+QingKe+HuangYou&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
 
<body>  
    <div id="particles-js"></div>
 
    <nav class="db f3 dt-l w-100 border-box pa3 ph5-l">
        <a class="db dtc-l v-mid f3 mid-gray link dim  w-50-l tc tl-l mb2 mb0-l link-head" href="#" title="Home">
            La Casa De Papel Hostel
        </a>
        <div class="db dtc-l v-mid w-100  w-50-l tc tr-l">
            <a class="link dim dark-gray f3 dib mr3 mr4-l" href="admin/index.php" title="Admin Login">Admin Login</a>
            <a class="link dim dark-gray f3 dib mr3 mr4-l" href="register.php" title="User Register">User Register</a>
        </div>
    </nav>
    <article class="br3 ba b--black-10 mv4 w-100 w-50-m w-50-l mw6 shadow-5 center">
        <main class="pa4 black-80"> 
            <div class="measure center">
            <form action="index.php" method="post">
                <fieldset id="login" class="ba b--transparent ph0 mh0">
                    <legend class="f1 fw6 ph0 mh0 center">User Login</legend>
                    <div class="mt3">
                        <!-- <label class="db fw6 lh-copy f4" for="Email">Email</label> -->
                        <input class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" type="email" name="email" placeholder="Email Address" 
                        value="<?php 
                        if(isset($_SESSION['email'])) {
                            echo $_SESSION['email'];
                        } 
                        ?>" required >
                    </div> 
                    <div class="mv3">
                        <!-- <label class="db fw6 lh-copy f4" for="password">Password</label> -->
                        <input class="b pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" type="password" name="password" placeholder="Password" required>
                    </div>
                </fieldset>
                <?php if(in_array("Email or password was incorrect<br>", $error_array)) echo  "<div class='alert alert-danger'>Email or password was incorrect<br></div>"; ?>
                <div class="">
                    <input class="b ph3 pv2 input-reset ba b--black bg-transparent grow pointer f4 dib" type="submit" name="login" value="Login">
                </div>
                </form>
                <div class="lh-copy mt3">
                    <a href="register.php" class="f4 link dim black db">Create New Account</a>
                    <a href="./forgotPassword.php" class="f4 link dim black db">Forgot your password?</a>
                </div>
            </div>
        </main>
    </article> 

       <footer class="pv4 ph3 ph5-m ph6-l mid-gray">
  <small class="f6 db tc">© 2020 <b class="ttu">La Casa De Papel Hostel</b>., All Rights Reserved</small>
  <div class="tc mt3">
    <a href="" title="Language" class="f6 dib ph2 link mid-gray dim">Language</a>
    <a href="/terms/"    title="Terms" class="f6 dib ph2 link mid-gray dim">Terms of Use</a>
    <a href="/privacy/"  title="Privacy" class="f6 dib ph2 link mid-gray dim">Privacy</a>
  </div>
</footer>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="./assets/js/app.js"></script>
</body>

</html>