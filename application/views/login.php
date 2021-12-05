<body class="hold-transition login-page" >
<div class="login-box">
	<div class="login-logo">
		<img src="<?php echo base_url()?>dist/img/logo-big.png" width="360px" height="auto">
	</div>
	<!-- /.login-logo -->
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Sign in to start your session</p>

			<form action="<?php echo base_url() ?>welcome/login" method="post" enctype="multipart/form-data"
				  id="loginform">
				<div class="input-group mb-3">
					<input type="text" class="form-control" id="username" name="username"
						   placeholder="User Name" required>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" id="password" name="password"
						   placeholder="Password" required/>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-8">
						<div class="icheck-primary">
						</div>
					</div>
					<!-- /.col -->
					<div class="col-4">
						<button type="submit" class="btn btn-primary btn-block">Sign In</button>
					</div>
					<br>
					<br>
				</div>
				<div id="login_error" class="alert alert-danger">
					<h6><i class="icon fa fa-ban"></i> Alert!</h6>
					Invalid Username or Password.
				</div>
				<?php if($this->session->userdata('last_url')!='') {?>
				<div id="login_expire" class="alert alert-warning">
					<h6><i class="icon fa fa-ban"></i> Alert!</h6>
					Session Expired. Please Login Again.
				</div>
				<?php } ?>
				<!-- /.col -->
		</div>
		</form>
	</div>
	<!-- /.login-card-body -->
</div>
</div>
<!-- /.login-box -->


</body>

<script type="text/javascript">
	$(document).ready(function () {

		jQuery("div#login_error").hide();

		$("#btn_login").click(function () {

			$(this).attr('class', 'btn btn-block btn-default disabled');
			$("#loginform").submit();
		});
		$("#loginform").submit(function (e) {

			var formObj = $(this);
			var formURL = formObj.attr("action");
			var formData = new FormData(this);

			$.ajax({
				url: formURL,
				type: 'POST',
				data: formData,
				mimeType: "multipart/form-data",
				contentType: false,
				cache: false,
				processData: false,
				success: function (data, textStatus, jqXHR) {

					console.log(data);

					jd = $.parseJSON(data)
					if (jd.retval)
						$(location).attr('href', jd.url);
					else {

						jQuery("div#login_error").show();
						jQuery("div#login_expire").hide();
					}

					$("#btn_login").attr('class', 'btn btn-primary btn-block btn-flat');
				},
				error: function (jqXHR, textStatus, errorThrown) {
					$("#btn_login").attr('class', 'btn btn-primary btn-block btn-flat');
					//alert(errorThrown);
				}
			});
			e.preventDefault(); //Prevent Default action.
		});
	});
</script>


<script type="text/javascript">
	//alert("Enter");

	$('#password').keypress(function (event) {
		var keycode = (event.keyCode ? event.keyCode : event.which);

		if (keycode == '13') {

			$("#loginform").submit();
			$("#loginform").submit(function (e) {

				var formObj = $(this);
				var formURL = formObj.attr("action");
				var formData = new FormData(this);

				$.ajax({
					url: formURL,
					type: 'POST',
					data: formData,
					mimeType: "multipart/form-data",
					contentType: false,
					cache: false,
					processData: false,
					success: function (data, textStatus, jqXHR) {

						//alert(data)
						jd = $.parseJSON(data)
						if (jd.retval) {
							jQuery("div#login_error").hide();
							$(location).attr('href', jd.url);
						} else {
							document.getElementById('passowrd').value = "";
							jQuery("div#login_error").show();
						}


						$("#btn_login").attr('class', 'btn btn-primary btn-block btn-flat');
					},
					error: function (jqXHR, textStatus, errorThrown) {
						$("#btn_login").attr('class', 'btn btn-primary btn-block btn-flat');
						//alert(errorThrown);
					}
				});
				e.preventDefault(); //Prevent Default action.
			});
		} //event.stopPropagation();

	});
</script>


<!-- end page container -->

<style>
	.login-page{
		background-image:url(<?php echo base_url()?>dist/img/bg-new.jpg);
		background-repeat:no-repeat;
		background-size: cover ;
	}
</style>


</body>

</html>
