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
						<h4>Add New Vessel Owner</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Add New Vessel Owner</li>
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
								<!--<h4 class="card-title">Personal Information</h4>-->								 
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Fisheries District Office </label>
											<div class="col-md-9">
												<select class="form-control" name="districtOffice" id="districtOffice">
												<option value="" disabled selected>- Select -</option>
													<?php foreach ($districts->result() as $row) { ?>
														<option value="<?php  echo $row->district ?>"><?php echo $row->description?></option>
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
													   placeholder="Name with Initials (H M Perera)" required/>
												<span id="ownerName_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">NIC</label>
											<div class="col-md-9">
												<input type="text" id="nic" name="nic" maxlength="12" class="form-control"
													   placeholder="123456789V / 123456789123" required/>
												<span id="nic_span" style="font-size:14px; color:red;"></span>
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
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Address House</label>
											<div class="col-md-9">
												<input type="text" id="addressHouse" name="addressHouse"
													   class="form-control"
													   placeholder="House No" required/>
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
													   placeholder="Street Name" required/>
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
													   placeholder="City" required/>
												<span id="addressCity_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Contact Number</label>
											<div class="col-md-9">
												<input type="text" id="contactNo" name="contactNo" minlength="10" maxlength="10"
													   class="form-control"
													   placeholder="0711234567" required/>
												<span id="contactNo_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									
								</div>

								

								<div class="card-footer">
									<button id="btn_submit" name="btn_submit" class="btn btn-primary float-right">Save
										Vessel Owner
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
													-