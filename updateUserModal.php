<!-- Edit -->
<div class="modal fade" id="update<?php echo $row['student_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <center><h4 class="modal-title" id="myModalLabel">Edit Details</h4></center>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="updateUser.php">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['student_id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Full Name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="full_name" value="<?php echo $row['name']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Username:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Email:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Phone Number:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="phone_number" value="<?php echo $row['phonenumber']; ?>">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Course:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="course" value="<?php echo $row['course']; ?>">
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal"><i class='fas fa-trash' style="padding-right: .3rem"></i>  Cancel</button>
                <button type="submit" name="update" class="btn btn-success"><i class="fas fa-check-square" style="padding-right: .3rem"></i> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>
