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
							<li class="breadcrumb-item active">Users</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->

			<div class="card">
				<div class="card-header">
					<h3 class="card-title">User List &nbsp; &nbsp;
						<button id="add_new_user" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp;&nbsp; New User</button>
					</h3>

					<br>
					<br>
					<?php if ($msg != "") { ?>
						<div class="alert <?php echo $class_alert ?>" role="alert">

							<?php echo $msg; ?>
						</div>
					<?php } ?>

				</div>
				<!-- /.card-header -->
				<div class="card-body p-0">
					<table class="table table-striped">
						<thead>
						<tr>
							<th>#</th>
							<th>UserName</th>
							<th>User Role</th>
							<th>Name</th>
							<th>Email</th>
							<th style="text-align:center">Status</th>
						</tr>
						</thead>
						<tbody>
						<?php $row_count = 1;
						foreach ($user_list->result() as $users) { ?>
							<tr>
								<th scope="row"><?php echo $row_count ?></th>
								<td><a
										href="<?php echo base_url() ?>index.php/user/user/edit_user?user_id=<?php echo base64_encode($users->user_id) ?>"><?php echo $users->username ?>
									</a></td>
								<td><?php echo $users->user_group ?></td>
								<td><?php echo $users->name ?></td>
								<td><?php echo $users->email ?></td>
								<td align="center">
									<?php if ($users->status_id == 1) echo "<span class='right badge badge-success'>Active</span>"; else echo "<span class='right badge badge-danger'>De-Active</span>"; ?>
								</td>

							</tr>
							<?php $row_count++;
						} ?>
						</tbody>
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


<!-- add new user modal -->


<div class="modal fade" id="modal-dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add New User</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			</div>
			<form id="form_data" method="post"
				  action="<?php echo base_url() ?>index.php/user/user/add_new_sys_user_page">
				<div class="modal-body">


					<div class="form-group">
						<li class="fa fa-user">&nbsp;&nbsp;</li>
						<label for="input_username">User Name</label>
						<br/>

						<input class="form-control input-rounded" name="username" id="input_username"
							   placeholder="User Name" required="" type="text">
						<label id="input_username-error" style="display:none; color:red;" class="error"
							   for="input_username">Username Already Exists...!</label>
					</div>


					<div class="form-group">
						<li class="fa fa-key">&nbsp;&nbsp;</li>
						<label>Password</label>
						<input class="form-control input-rounded" name="password" placeholder="Password" required=""
							   type="password">
					</div>

					<div class="form-group">
						<li class="fa fa-envelope">&nbsp;&nbsp;</li>
						<label>Email</label>
						<input class="form-control input-rounded" name="email" placeholder="Email" required=""
							   type="email">
					</div>

					<div class="form-group">
						<li class="fa fa-eye">&nbsp;&nbsp;</li>
						<label>Name</label>
						<input class="form-control input-rounded" name="name" placeholder="Name" required=""
							   type="text">
					</div>

					<div class="form-group">
						<li class="fa fa-users">&nbsp;&nbsp;</li>
						<label>User Role</label>
						<select class="form-control m-b-sm input-rounded" name="user_group_id" required="">
							<option value="" disabled selected>Select User Role</option>
							<?php foreach ($user_group->result() as $grops) { ?>
								<option value="<?php echo $grops->user_group_id ?>">
									<?php echo $grops->user_group ?>
								</option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<li class="fa fa-gears">&nbsp;&nbsp;</li>
						<label>User Status</label>
						<select class="form-control m-b-sm input-rounded" name="status_id" required="">
							<option value="" disabled selected>Select Status</option>
							<option value="1">Active</option>
							<option value="0">De-Active</option>

						</select>
					</div>


				</div>


				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-sm btn-white m-r-5 m-b-5" data-dismiss="modal">Close</a>
					<button type="submit" class="btn btn-sm btn-primary m-r-5 m-b-5 ">
						<i class="fa fa-user"></i>
						Submit
					</button>
				</div>
			</form>
		</div>
	</div>
</div>


<script>
	$(window).load(function () {
		$(".se-pre-con").fadeOut("slow");
		$('#input_username').change();
	});
	$('#input_username').change(function (e) {
		check_username();
	});


	function check_username() {
		var username_input_text = $.trim($('#input_username').val());
		if (username_input_text.length > 0) {
			$.ajax({
				url: '<?php echo base_url() ?>user/user/check_valide_username',
				method: 'POST',
				data: {
					username_input_text: username_input_text
				},
				success: function (data) {
					$('#ajaxBusy').hide();
					if ($.trim(data) == true) {
						$('#input_username-error').show();
						$('#input_username').focus();
					} else {
						$('#input_username-error').hide();
					}
				},
				error: function (err, message, xx) {

				}
			});
		}
	}
</script>

<script>
	$('#add_new_user').click(function (e) {

		$.ajax({
			url: '<?php echo base_url() ?>user/user/check_add_user_permission',
			method: 'POST',
			data: {
				module: ''
			},
			success: function (data) {
				console.log(data);
				if (data == 1) {

					$('#form_data')[0].reset();
					$('#input_username-error').hide();
					$('#modal-dialog').modal({backdrop: 'static', keyboard: false})
				} else {
					window.location = "<?php echo base_url() ?>user/user/no_permission";
				}

			},
			error: function (err, message, xx) {

			}
		});

	});
</script>
