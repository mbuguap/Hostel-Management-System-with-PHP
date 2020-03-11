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
<h1 class="page-header text-center">Access Log</h1>
<div class="container-fluid">
    <?php 
    
    $filestring = file_get_contents("../logs/access.log");
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
</div>
                        </div>
                        </div>
<?php require_once 'footer.php'; ?>