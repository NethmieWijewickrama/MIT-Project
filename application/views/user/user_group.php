<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Edit User Role Permission</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">User Role Permission</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<?php $name = $user_group_name->row(); ?>
	<!-- Main content -->
	<section class="content">

		<div class="card">
			<div class="card-header">
				<h3 class="card-title">User Role (<?php echo $name->user_group; ?>)</h3>
			</div>
			<div class="card-body">
				<form method="post"
					  action="<?php echo base_url() . 'user/user/save_user_group?edit=' . $name->user_group_id ?>">
					<input hidden="" type="text" name="user_group_name" value="<?php echo $name->user_group; ?>"/>
					<?php if (isset($message) && $message != "") { ?>
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h5><i class="icon fas fa-check"></i> Alert!</h5>
							<?php echo $message; ?>
						</div>

					<?php } ?>
					<div class="row">
						<?php foreach ($query_parent->result() as $row_parent) { ?>
						<div class="col-md-3">
							<div class="card card-primary collapsed-card">
								<div class="card-header">
									<h3 class="card-title">
										<a aria-expanded="false" class="collapsed" data-toggle="collapse"
										   data-parent="#accordion" href="#<?php echo $row_parent->module_id; ?>">
											<?php echo $row_parent->module; ?>
										</a>
									</h3>
									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
									</div>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<?php foreach ($query_module->result() as $row_module) {
										if ($row_module->parent_module_id == $row_parent->module_id) { ?>

											<div class="checkbox">
												<label>
													<input name="<?php echo $row_module->module_id; ?>"
														   type="checkbox" <?php
													foreach ($query_check->result() as $row_check) {
														if ($row_module->module_id == $row_check->module_id) {
															echo 'checked="checked"';
														}
													}
													?> />
													<?php echo $row_module->module; ?>
												</label>
											</div>
										<?php }
									} ?>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<?php } ?>
					</div>
					<div class="footer">
						<button class="btn btn-primary float-right" type="submit">Save</button>
					</div>
				</form>
			</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->


