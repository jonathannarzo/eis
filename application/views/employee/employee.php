<?php include(APPPATH.'views/template/header.php'); ?>

<div class="container">

	<div class="panel panel-default">
		<div class="panel-heading">Employee List</div>
		<div class="panel-body">

			<div class="row">
				<div class="col-md-6">
					<button type="button" class="btn btn-success" id="edit-selected" rel="<?=base_url('/employees/edit/')?>" disabled>Edit Selected</button>
					<button type="button" class="btn btn-danger" id="remove-selected" rel="<?=base_url('/employees/delete/')?>" disabled>Remove Selected</button>
				</div>
				<div class="col-md-6 text-right">
					<button type="button" class="btn btn-primary" id="add-employee" data-toggle="modal" data-target="#add-new-emp-modal">Add New Employee</button>
				</div>
			</div>

			<p></p>
			<table class="table table-hover">
				<thead>
					<tr>
						<th><input type="checkbox" id="emp-selectall-checbox"></th>
						<th>Name</th>
						<th>Position</th>
						<th>Brith Date</th>
						<th>Age</th>
						<th>Salary</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($results as $result) {
							echo '
							<tr>
								<td><input type="checkbox" class="emp-record-checkbox" value="'.$result->id.'"></td>
								<td>'.$result->fullname.'</td>
								<td>'.$result->position.'</td>
								<td>'.$result->birth_date.'</td>
								<td>'.compute_age($result->birth_date).'</td>
								<td>'.$result->salary.'</td>
							</tr>';
						}
					?>
				</tbody>
			</table>
			 <p><?php echo $links; ?></p>
		</div>
	</div>

</div>

<!-- Modal -->
<div class="modal fade" id="add-new-emp-modal" tabindex="-1" role="dialog" aria-labelledby="addempModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="addempModalLabel">Add New Employee</h4>
			</div>
			<?php echo form_open('employees/create', array('class' => 'form-horizontal', 'id' => 'add-emp-form')); ?>
				<div class="modal-body">
					<input type="hidden" name="record-id" id="emp-record-id" />
					<input type="hidden" name="method" id="form-method" />
					<div id="form-msg"></div>
					<div class="form-group">
						<label class="control-label col-md-4">Full Name</label>
						<div class="col-md-6"><?php echo form_input($fullname); ?></div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">Position</label>
						<div class="col-md-6"><?php echo form_input($position); ?></div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">Birth date</label>
						<div class="col-md-6"><?php echo form_input($birth_date); ?></div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">Age</label>
						<div class="col-md-6"><?php echo form_input($age); ?></div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">Salary</label>
						<div class="col-md-6"><?php echo form_input($salary); ?></div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<?php
	$page_scripts = array(
		'<script type="text/javascript" src="'.base_url('/assets/js/app/employee.js').'"></script>'
	);
?>

<?php include(APPPATH.'views/template/footer.php'); ?>