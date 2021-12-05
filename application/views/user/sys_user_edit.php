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
							<li class="breadcrumb-item active">Edit User</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->

			<div class="card card-default">
				<div class="card-header">
					<h3 class="card-title">Edit user</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
<!--				<form role="form">-->
					<?php if ($msg != "") { ?>
						<div class="card-body">
							<div class="alert <?php echo $class_alert ?>" role="alert">
								<?php echo $msg; ?>
							</div>
						</div>
						<?php
					} else {
						$info = $user_info->row();
						?>
						<input type="hidden" name="test_name" id="test_name"
							   value="<?php echo $info->username ?>">
						<form id="form_data" method="post"
							  action="<?php echo base_url() ?>user/user/edit_user?user_id=<?php echo base64_encode($info->user_id) ?>">
							<div class="card-body">



								<div class="form-group">
									<li class="fa fa-user">&nbsp;&nbsp;</li>
									<label for="input_username">User Name</label>
									<br/>

									<input class="form-control input-rounded" value="<?php echo $info->username ?>"
										   name="username" id="input_username" placeholder="User Name" required=""
										   type="text">
									<label id="input_username-error" style="display:none; color: red" class="error"
										   for="input_username">Username Already Exists...!</label>
								</div>


								<div class="form-group">
									<li class="fa fa-envelope">&nbsp;&nbsp;</li>
									<label>Email</label>
									<input class="form-control input-rounded" value="<?php echo $info->email ?>"
										   name="email" placeholder="Email" required="" type="email">
								</div>

								<div class="form-group">
									<li class="fa fa-eye">&nbsp;&nbsp;</li>
									<label>Name</label>
									<input class="form-control input-rounded" value="<?php echo $info->name ?>"
										   name="name" placeholder="Name" required="" type="text">
								</div>

								<div class="form-group">
									<li class="fa fa-eye">&nbsp;&nbsp;</li>
									<label>Password</label>
									<input class="form-control input-rounded" name="password" placeholder="password"
										   required="" type="password" id="password-indicator-default">
									<div id="passwordStrengthDiv" class="is0 m-t-5"></div>

								</div>

								<div class="form-group">
									<li class="fa fa-users">&nbsp;&nbsp;</li>
									<label>User Role</label>
									<select class="form-control m-b-sm input-rounded" name="user_group_id" required="">

										<?php foreach ($user_group->result() as $grops) { ?>
											<?php $selected = '';
											if ($grops->user_group_id == $info->user_group_id) $selected = 'Selected'; ?>
											<option <?php echo $selected; ?>
												value="<?php echo $grops->user_group_id ?>"><?php echo $grops->user_group ?></option>
										<?php } ?>
									</select>

								</div>
								<div class="form-group">
									<li class="fa fa-gears">&nbsp;&nbsp;</li>
									<label>User Status</label>
									<select class="form-control m-b-sm input-rounded" name="status_id" required="">

										<option <?php if ($info->status_id == 1) echo "Selected"; ?> value="1">Active
										</option>
										<option <?php if ($info->status_id == 0) echo "Selected"; ?> value="0">
											De-Active
										</option>

									</select>

								</div>


							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="submit" class="btn btn-primary m-r-5 m-b-5">
									<i class="fa fa-user"></i>
									Update
								</button>
							</div>
						</form>
					<?php } ?>
			</div>

		</div>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
</div>
<script>

	// $(window).load(function () {
	// 	$(".se-pre-con").fadeOut("slow");
	//
	// });
	$('#input_username').blur(function (e) {
		var username_input_text = $.trim($('#input_username').val());
		var test_name = $('#test_name').val();
		if (username_input_text.length > 0 && test_name != username_input_text) {


			$.ajax({
				url: '<?php echo base_url() ?>user/user/check_valide_username',
				method: 'POST',
				data: {username_input_text: username_input_text},
				beforeSend: function () {
					$('#ajaxBusy').show();
				},
				success: function (data) {
					// $('#ajaxBusy').hide();
					if ($.trim(data) != 0) {
						$('#input_username-error').show();
						$('#input_username').focus();
					} else {
						$('#input_username-error').hide();
					}
				},
				error: function (err, message, xx) {
				}
			});
		} else {
			$('#input_username-error').hide();
		}
	});


</script>
