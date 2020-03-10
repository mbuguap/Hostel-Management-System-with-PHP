<!-- Edit -->
<div class="modal fade" id="editroom_<?php echo $row['room_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"> 
                
                <center><h4 class="modal-title" id="myModalLabel">Edit Room</h4></center>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="editroom.php">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['room_id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Room Type:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="type" value="<?php echo $row['room_type']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Room Number:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="number" value="<?php echo $row['room_number']; ?>">
					</div>
				</div>  
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Fees:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="fees" value="<?php echo $row['fees']; ?>">
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal"><i class='fas fa-trash' style="padding-right: .3rem"></i>  Cancel</button>
                <button type="submit" name="editroom" class="btn btn-success"><i class="fas fa-check-square" style="padding-right: .3rem"></i> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deleteroom_<?php echo $row['room_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <center><h4 class="modal-title" id="myModalLabel">Delete Room</h4></center>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['room_type'].' '.$row['room_number']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-times" style="padding-right: .3rem"></i> Cancel</button>
                <a href="deleteroom.php?id=<?php echo $row['room_id']; ?>" class="btn btn-danger"><i class="fas fa-check-square" style="padding-right: .3rem"></i>Yes</a>
            </div>

        </div>
    </div>
</div>