<div class="wrapper">

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark">Administration</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">User Roles</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->

			<div class="card">
				<div class="card-header">
					<h3 class="card-title">User List &nbsp; &nbsp;
						<button id="add_new_group" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp;&nbsp; New
							Role
						</button>
					</h3>

					<br>
					<br>

					<?php if (isset($message) && $message != "") { ?>
						<div class="alert alert-success" role="alert">
							<?php echo $message; ?>
						</div>

					<?php } ?>

				</div>
				<!-- /.card-header -->
				<div class="card-body p-0">
					<table class="table table-striped">
						<thead>
						<tr>
							<th>#</th>
							<th>User Role</th>
							<th style="text-align: center;">Users</th>

						</tr>
						</thead>
						<tbody>
						<?php $row_count = 1;
						foreach ($user_groups->result() as $groups) { ?>
							<tr>
								<th scope="row">
									<?php echo $row_count ?>
								</th>
								<td >
									<a
										href="<?php echo base_url() ?>index.php/user/user/user_group?group_id=<?php echo base64_encode($groups->user_group_id) ?>">
										<?php echo $groups->user_group ?> </a>
								</td>
								<td style="text-align: center;">
									<?php echo $groups->user_count ?>
								</td>

							</tr>
							<?php $row_count++;
						} ?>
						</tbody>
					</table>
				</div>
				<!-- /.card-body -->
			</div>

		</div>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
</div>


<div class="modal fade" id="modal-dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add New User Role</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			</div>

			<form method="post" action="<?php echo base_url() ?>user/user/add_new_group">
				<div class="modal-body">
					<div class="form-group">
						<li class="fa fa-users">&nbsp;&nbsp;</li>
						<label>New User Role</label>
						<input class="form-control input-rounded" name="user_group"
							   placeholder="Enter User Role" required="" type="text">
					</div>
					<div class="modal-footer">
						<div class="col-md-4 pull-right">
							<button type="submit" class="btn btn-primary m-r-5 m-b-5">
								<i class="fa fa-user"></i>
								Submit
							</button>

						</div>
					</div>
				</div>
			</form>

		</div>
	</div>
</div>

<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
<script src="<?php echo base_url()?>js/sweetaleart.js"></script>
<script>

	function confirm(id) {

		Swal.fire({
			title: 'Are you sure?',
			text: "Your will not be able to recover this Role!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.value) {
				location.replace("<?php echo base_url() ?>user/user/delete_user_group?group_id=" + btoa(id));
			}
		});
	}
</script>


<?php //require_once('loader.php'); ?>
<script>

	$('#add_new_group').click(function (e) {
		$('#modal-dialog').modal({backdrop: 'static', keyboard: false})
	});
</script>
