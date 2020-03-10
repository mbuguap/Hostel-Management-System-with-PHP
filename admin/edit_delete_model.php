<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['course_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <center><h4 class="modal-title" id="myModalLabel">Edit Course</h4></center>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit.php">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['course_id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Course Code:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="coursecode" value="<?php echo $row['course_code']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Course Name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="coursename" value="<?php echo $row['course_name']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Duration:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="duration" value="<?php echo $row['duration']; ?>">
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal"><i class='fas fa-trash' style="padding-right: .3rem"></i>  Cancel</button>
                <button type="submit" name="edit" class="btn btn-success"><i class="fas fa-check-square" style="padding-right: .3rem"></i> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['course_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <center><h4 class="modal-title" id="myModalLabel">Delete Course</h4></center>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['course_code'].' '.$row['course_name']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-times" style="padding-right: .3rem"></i> Cancel</button>
                <a href="delete.php?id=<?php echo $row['course_id']; ?>" class="btn btn-danger"><i class="fas fa-check-square" style="padding-right: .3rem"></i>Yes</a>
            </div>

        </div>
    </div>
</div>