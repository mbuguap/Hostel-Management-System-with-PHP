<?php

require_once 'db.php'; 

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
<div class="col-md-9">

    <div class="container">
        <?php if (isset($_SESSION['alert'])) : ?>
        <div class=" alert alert-success">
           
                <?php
                        echo $_SESSION['alert'].$user['name']; 
                        unset($_SESSION['alert']); 
                    ?>

        </div>
        <?php endif ?>
    </div>
    <div class="row" style="padding: 2rem; ">
        <div class="col-md-5 shadow-5" style="padding: 2rem; margin: 2rem;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"> My Profile Details</li>
                </ol>
                <a class="btn btn-light btn-lg" href="studentdetails.php">View Profile Details</a>
            </nav>
        </div>
        <div class="col-md-5 shadow-5" style="padding: 2rem; margin: 2rem;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Room Details</li>
                </ol>
                <a class="btn btn-light btn-lg" href="hosteldetails.php">View Room</a>
            </nav>
        </div>
    </div>
</div>

</div>
</div>

<?php require_once 'footer.php' ?>