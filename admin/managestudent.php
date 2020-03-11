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
	<h1 class="page-header text-center">Manage Student</h1>
	<div class="row">
		<div class="col-sm-12">
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
				if(isset($_SESSION['message'])){
					echo
					"
					<div class='alert alert-success text-center'>
						".$_SESSION['message']."
					</div>
					"; 
					unset($_SESSION['message']);
				}
			?>
			</div>
			<div class="row">
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
						<th>Student Id</th>
						<th scope="col">Student Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th> 
					</thead>
					<tbody>
						<?php
						
                            $sql = "SELECT * FROM student_register ";
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['student_id']."</td>
                                    <td>".$row['name']."</td>
									<td>".$row['gender']."</td>
									<td>".$row['email']."</td>
									<td>
										<a href='#view_".$row['student_id']."' class='btn btn-success btn-sm' data-toggle='modal'><i class='fas fa-eye' style='padding-right: .3rem'></i> View</a>
										<a href='#delete_".$row['student_id']."' class='btn btn-danger btn-sm' data-toggle='modal'><i class='fas fa-trash' style='padding-right: .3rem'></i> Delete</a>
									</td>
                                </tr>";
                                include('view_delete_student.php');
							}

						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
						</div>

<?php require_once 'footer.php'; ?>