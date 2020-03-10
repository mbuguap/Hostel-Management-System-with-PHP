<!-- Add New -->
<div class="modal fade" id="addnewroom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <center><h4 class="modal-title" id="myModalLabel">Add New</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="addroom.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Room Type:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="type" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Room Number:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="number" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Fees:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="fees" required>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-times" style="padding-right: .3rem"></i> Cancel</button>
                <button type="submit" name="addroom" class="btn btn-primary"><i class="fas fa-save" style="padding-right: .3rem"></i>  Save</a>
			</form>
            </div>

        </div>
    </div>
</div>  