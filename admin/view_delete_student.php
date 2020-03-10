<!-- View -->
<div class="modal fade" id="view_<?php echo $row['student_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel">View Student</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="">
            
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['student_id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Full Name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="full_name" value="<?php echo $row['name']; ?>" disabled>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Gender:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="gender" value="<?php echo $row['gender']; ?>" disabled>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Email:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" disabled>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal"><i class='fas fa-times' style="padding-right: .3rem"></i>  Cancel</button>
			</form>
            </div>

        </div> 
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['student_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel">Delete Student</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['name'] ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-times" style="padding-right: .3rem"></i> Cancel</button>
                <a href="deletestudent.php?id=<?php echo $row['student_id']; ?>" class="btn btn-danger"><i class="fas fa-check-square" style="padding-right: .3rem"></i>Yes</a>
            </div>

        </div> 
    </div>
</div>