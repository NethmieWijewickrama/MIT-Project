<div class="wrapper">
	<!-- Navbar -->

	<!-- /.navbar -->


	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h4>Add New Tranponder</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Add New Tranponder</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">

			<div class="container-fluid">
				<div class="row">
					<div class="card">
						<!-- /.card-header -->
						<!-- form start -->
						<form autocomplete="off" id="tranponder_data" name="tranponder_data" class="form-horizontal" action="" method="post">
							<div class="card-header">
								<?php if (isset($msg) && $msg != "") { ?>
									<div class="alert alert-success" role="alert">
										<?php echo $msg; ?>
									</div>
								<?php } ?>
								<h4 class="m-t-0">Tranponder Information</h4>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">ISN-No</label>
											<div class="col-md-9">
												<input type="text" id="ISN" name="ISN" maxlength="12"
													   class="form-control"
													   placeholder="Enter ISN-No (4TTxxxxxxxxx)"/>
												<span id="ISN_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Antenna No</label>
											<div class="col-md-9">
												<input type="number" id="antennaNo" name="antennaNo" class="form-control"
													   placeholder="Enter Antenna No (14xxxxxx / 15xxxxxx)" required/>
												<span id="antennaNo_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">IMN</label>
											<div class="col-md-9">
												<input type="number" id="IMN" name="IMN"
													   class="form-control"
													   placeholder="Enter IMN (42xxxxxxx)" required/>
												<span id="IMN_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">VMS</label>
											<div class="col-md-9">
												<input type="number" id="VMS" name="VMS"
													   class="form-control"
													   placeholder="Enter VMS No (xxxx)" required/>
												<span id="VMS_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Registration Date</label>
											<div class="col-md-9">
												<input type="date" id="registrationDate" name="registrationDate"
													   class="form-control" value="<?php echo date('Y-m-d')?>"
													   placeholder="registration Date" required/>
												<span id="registrationDate_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>									
								</div>					
							
							</div>
							<div class="card-footer">
								<button id="btn_submit" name="btn_submit" class="btn btn-primary float-right">
									Save Tranponder
								</button>
							</div>

						</form>
					</div>
				</div>
			</div>

		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/src/jquery-key-restrictions.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>js/add_new_transponder.js"></script>

