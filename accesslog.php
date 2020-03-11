<?php require_once 'db.php'; 
if (isset($_SESSION['email'])){
    $userLoggedIn = $_SESSION['email'];
    $user_details_query = mysqli_query($conn, "SELECT * FROM student_register WHERE email = '$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
    $email = $user['email'];
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
    <h3 class="text-center">Access Logs</h3>
    <div class="container-fluid">
    <?php 
    $logfile_dir = "logs/user.log"; 
    $logfile = $logfile_dir . "php" . $email . ".log";

    $filestring = file_get_contents($logfile_dir . "php" . $email . ".log");
    $filearray = explode("\n", $filestring);

    while (list($var, $val) = each($filearray)) {
        ++$var;
        $val = trim($val); ?>

        <div style="padding: .6rem;">
            <?php print "$val"; ?>
        </div>
        <?php
        
    }
    ?>
    </div>
    
</main>

</div>
</div>
<?php require_once 'footer.php' ?>