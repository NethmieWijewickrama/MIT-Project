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
						<h4>Edit Tranponder Details</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Edit Transponder Details</li>
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
											<label class="col-md-3 col-form-label">ISN</label>
											<div class="col-md-9">
												<input type="text" id="ISN" name="ISN"
													   class="form-control"
													   placeholder="Enter ISN-No (4TTxxxxxxxxx)" value="<?php echo $old_data->ISN ?>"  required/>
													   <span id="ISN_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Antenna No</label>
											<div class="col-md-9">
												<input type="number" id="antennaNo" name="antennaNo" class="form-control"  step="0.01"
													   placeholder="Enter Antenna No (14xxxxxx / 15xxxxxx)" value="<?php echo $old_data->antennaNo ?>"  required/>
													   <span id="antennaNo_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">IMN</label>
											<div class="col-md-9">
												<input type="number" id="IMN" name="IMN" step="0.01"
													   class="form-control"
													   placeholder="Enter IMN (42xxxxxxx)" value="<?php echo $old_data->IMN ?>"  required/>
													   <span id="IMN_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">VMS</label>
											<div class="col-md-9">
												<input type="number" id="VMS" name="VMS"  step="0.01"
													   class="form-control"
													   placeholder="Enter VMS No (xxxx)" value="<?php echo $old_data->VMS ?>"  required/>
													   <span id="VMS_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Registered Date</label>
											<div class="col-md-9">
												<input type="date" id="registrationDate" name="registrationDate"
													   class="form-control"
													   placeholder="registration Date" value="<?php echo $old_data->registrationDate ?>"  required/>
													   <span id="registrationDate_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
								</div>

								
							</div>
							<div class="card-footer">
								<button id="btn_submit" name="btn_submit" class="btn btn-primary float-right">
									Update Tranponder
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

