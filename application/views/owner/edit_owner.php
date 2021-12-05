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
						<h4>Edit Vessel Owner Details</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Edit Vessel Owner</li>
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
						<form autocomplete="off" id="owner_data" name="owner_data" class="form-horizontal" action="" method="post">
							<div class="card-header">
								<?php if (isset($msg) && $msg != "") { ?>
									<div class="alert alert-success" role="alert">
										<?php echo $msg; ?>
									</div>

								<?php } ?>
								<h4 class="m-t-0">Personal Information</h4>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Fisheries District Office </label>
											<div class="col-md-9">
												<select class="form-control" name="districtOffice" id="districtOffice">
													<?php foreach ($districts->result() as $row) { ?>
														<option value="<?php  echo $row->district ?>" <?php echo $old_data->districtOffice ==$row->district ? "selected" : "" ?>> <?php echo $row->description?></option>
													<?php } ?>
												</select>
												<span id="districtOffice_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Owner Name</label>
											<div class="col-md-9">
												<input type="text" id="ownerName" name="ownerName"
													   class="form-control"
													   placeholder="Name with Initials (H M Perera)" value="<?php echo $old_data->ownerName ?>" required/>
													   <span id="ownerName_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">NIC</label>
											<div class="col-md-9">
												<input type="text" id="nic" name="nic" class="form-control"
													   placeholder="123456789V / 123456789123" value="<?php echo $old_data->nic ?>" required/>
												<span id="nic_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Registered Date</label>
											<div class="col-md-9">
												<input type="date" id="registrationDate" name="registrationDate"
													   class="form-control"
													   placeholder="registration Date" value="<?php echo $old_data->registrationDate ?>" required/>
												<span id="registrationDate_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Address House</label>
											<div class="col-md-9">
												<input type="text" id="addressHouse" name="addressHouse"
													   class="form-control"
													   placeholder="House No" value="<?php echo $old_data->addressHouse ?>" required/>
												<span id="addressHouse_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Address Street</label>
											<div class="col-md-9">
												<input type="text" id="addressStreetName" name="addressStreetName"
													   class="form-control"
													   placeholder="Street Name" value="<?php echo $old_data->addressStreetName ?>" required/>
												<span id="addressStreetName_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Address City</label>
											<div class="col-md-9">
												<input type="text" id="addressCity" name="addressCity"
													   class="form-control"
													   placeholder="City" value="<?php echo $old_data->addressCity ?>" required/>
												<span id="addressCity_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Telephone Number</label>
											<div class="col-md-9">
												<input type="text" id="contactNo" name="contactNo" minlength="10" maxlength="10"
													   class="form-control"
													   placeholder="0711234567" value="<?php echo $old_data->contactNo ?>" required/>
												<span id="contactNo_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									
								</div>

								<div class="card-footer">
									<button id="btn_submit" name="btn_submit" class="btn btn-primary float-right">Update Vessel Owner
									</button>
								</div>
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
	<script type="text/javascript" src="<?php echo base_url() ?>js/add_new_owner.js"></script>
