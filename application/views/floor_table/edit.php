<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Floor Table Edit</h3>
            </div>
			<?php echo form_open('floor_table/edit/'.$floor_table['floor_rid']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="floor_number" class="control-label">FLOOR NUMBER</label>
						<div class="form-group">
							<input type="text" name="floor_number" value="<?php echo ($this->input->post('floor_number') ? $this->input->post('floor_number') : $floor_table['floor_number']); ?>" class="form-control" id="floor_number" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="building_rid" class="control-label">BUILDING RID</label>
						<div class="form-group">
							<input type="text" name="building_rid" value="<?php echo ($this->input->post('building_rid') ? $this->input->post('building_rid') : $floor_table['building_rid']); ?>" class="form-control" id="building_rid" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>
