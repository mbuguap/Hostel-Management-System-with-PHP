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
	<h1 class="page-header text-center">Rooms</h1>
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
				if(isset($_SESSION['msg'])){
					echo
					"
					<div class='alert alert-success text-center'>
						".$_SESSION['msg']."
					</div>
					";
					unset($_SESSION['msg']);
				}
			?>
			</div>
			<div class="row d-flex justify-content-end">
				<a href="#addnewroom" data-toggle="modal" class="btn btn-primary btn-md "><i class="fas fa-plus" style="padding-right: .3rem"></i> Add a new room</a>
			</div>
		<br>
			<div class="row">
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
						<th>ID</th>
						<th>Room Type</th>
						<th>Room Number</th>
						<th>Fees</th>
						<th>Action</th>
					</thead>
					<tbody>
						<?php
						
							$sql = "SELECT * FROM rooms";
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['room_id']."</td>
									<td>".$row['room_type']."</td>
									<td>".$row['room_number']."</td>
									<td>".$row['fees']."</td>
									<td>
										<a href='#editroom_".$row['room_id']."' class='btn btn-success btn-sm' data-toggle='modal'><i class='fas fa-edit' style='padding-right: .3rem'></i> Edit</a>
										<a href='#deleteroom_".$row['room_id']."' class='btn btn-danger btn-sm' data-toggle='modal'><i class='fas fa-trash' style='padding-right: .3rem'></i> Delete</a>
									</td>
                                </tr>";
                               
                               include('edit_room.php');
							}

						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
						</div>

<?php include('add_room.php') ?>
<?php require_once 'footer.php'; ?>