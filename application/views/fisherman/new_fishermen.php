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
						<h4>Add New Fisherman</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?php echo base_url()?>dashboard">Home</a></li>
							<li class="breadcrumb-item active">Add New Fisherman</li>
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
						<form autocomplete="off" id="fishermen_data" name="fishermen_data" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
						<!--<div class="card card-info  card-outline">-->
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
													<option value="" disabled selected>- Select -</option>
													<?php foreach ($districts->result() as $row) { ?>
														<option value="<?php echo $row->district ?>"><?php echo $row->description ?></option>
													<?php } ?>
												</select>
												<span id="districtOffice_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Registration Date</label>
											<div class="col-md-9">
												<input type="date" id="registrationDate" name="registrationDate"
													   class="form-control"
													   placeholder="registration Date" value="<?php echo date('Y-m-d')?>" required/>
												<span id="registrationDate_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Name with Initials</label>
											<div class="col-md-9">
												<input type="text" id="nameWithInitials" name="nameWithInitials"
													   class="form-control"
													   placeholder="Name with Initials (H M Perera)" required/>
												<span id="nameWithInitials_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Name in Full</label>
											<div class="col-md-9">
												<input type="text" id="nameInFull" name="nameInFull"
													   class="form-control"
													   placeholder="Name in Full" required/>
												<span id="nameInFull_span" style="font-size:14px; color:red;"></span>
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
											<label class="col-md-3 col-form-label">Contact Number</label>
											<div class="col-md-9">
												<input type="text" id="contactNo" name="contactNo" minlength="10" maxlength="10"
													   class="form-control"
													   placeholder="0711234567" required/>
												<span id="contactNo_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Address</label>
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
											<label class="col-md-3 col-form-label"></label>
											<div class="col-md-9">												
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label"></label>
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
											<label class="col-md-3 col-form-label"></label>
											<div class="col-md-9">												
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label"></label>
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
											<label class="col-md-3 col-form-label"></label>
											<div class="col-md-9">												
											</div>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Occupation</label>
											<div class="col-md-9">
												<select class="form-control" name="occupation" id="occupation">
													<option value="" disabled selected>- Select -</option>
													<option>Crew Member</option>
													<option>Skipper</option>
												</select>
												<span id="occupation_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Nature Of Occupation</label>
											<div class="col-md-9">
												<select class="form-control" name="natureOfOccupation"
														id="natureOfOccupation">
													<option value="" disabled selected>- Select -</option>
													<option>Full Time</option>
													<option>Part Time</option>
												</select>
												<span id="natureOfOccupation_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Medical File</label>
											<div class="col-md-9">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="far fa-file"></i></span>
													</div>
													<input type="file" class="form-control" name="medicalFile" id="medicalFile" size="20" required/>
												</div>
												<span id="medicalFile_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">CINEC File</label>
											<div class="col-md-9">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="far fa-file"></i></span>
													</div>
													<input type="file" class="form-control" name="cinecFile" id="cinecFile" size="20" required/>
												</div>
												<span id="cinecFile_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
								</div>
							</div>
						<!--</div>-->
						
<!-- -------------------------------*****************************-------------------------------------- -->




<!-- Dependent Details-->
<!-- -------------------------------*****************************----------------------------------- -->

						<div class="card-footer"> </div>
										
								
						<!--<div class="card card-info  card-outline">-->						
							<div class="card-header">
								<h4 class="m-t-0">Dependent Information</h4>
							</div>
							<div class="card-body">		
								
								<h5 class="m-t-0"><font color="#17a2b8"><i>Dependent One</i></font></h5>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
												<label class="col-md-3 col-form-label">Name with Initials</label>
											<div class="col-md-9">
													<input type="text" id="d1name" name="d1name"
													   class="form-control"
													   placeholder="Name with Initials (H M Perera)"/>
													<span id="d1name_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
												<label class="col-md-3 col-form-label">NIC</label>
											<div class="col-md-9">
													<input type="text" id="d1nic" name="d1nic" maxlength="12"
													   class="form-control"
													   placeholder="123456789V / 123456789123"/>
													<span id="d1nic_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
												<label class="col-md-3 col-form-label">Relationship</label>
											<div class="col-md-9">
												<select class="form-control" name="d1relationship" id="d1relationship">
													<option value="" disabled selected>- Select -</option>
													<option value="Father">Father</option>
													<option value="Mother">Mother</option>
													<option value="Spouse">Spouse</option>
													<option value="Daughter">Daughter</option>
													<option value="Son">Son</option>
												</select>
													<span id="d1relationship_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
												<label class="col-md-3 col-form-label">Contact No</label>
											<div class="col-md-9">
													<input type="text" id="d1tp" name="d1tp" minlength="10" maxlength="10"
													   class="form-control"
													   placeholder="0711234567"/>
													<span id="d1tp_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
								</div>
								<br>                      <!-- #28a745 -->
								<h5 class="m-t-0"><font color="#17a2b8"><i>Dependent Two</i></font></h5>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Name with Initials</label>
												<div class="col-md-9">
													<input type="text" id="d2name" name="d2name"
														   class="form-control"
														   placeholder="Name with Initials (H M Perera)"/>
													<span id="d2name_span" style="font-size:14px; color:red;"></span>

												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">NIC</label>
												<div class="col-md-9">
													<input type="text" id="d2nic" name="d2nic" maxlength="12"
														   class="form-control"
														   placeholder="123456789V / 123456789123"/>
													<span id="d2nic_span" style="font-size:14px; color:red;"></span>

												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Relationship</label>
												<div class="col-md-9">
												<select class="form-control" name="d2relationship" id="d2relationship">
													<option value="" disabled selected>- Select -</option>
													<option value="Father">Father</option>
													<option value="Mother">Mother</option>
													<option value="Spouse">Spouse</option>
													<option value="Daughter">Daughter</option>
													<option value="Son">Son</option>
												</select>
													<span id="d2relationship_span" style="font-size:14px; color:red;"></span>

												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Contact No</label>
												<div class="col-md-9">
													<input type="text" id="d2tp" name="d2tp" minlength="10" maxlength="10"
														   class="form-control"
														   placeholder="0711234567"/>
													<span id="d2tp_span" style="font-size:14px; color:red;"></span>

												</div>
											</div>
										</div>
									</div>
							</div>
						<!--</div>-->

						<div class="card-footer">
							<button id="btn_submit" name="btn_submit" class="btn btn-primary float-right">
									Save Fisherman
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
	<script type="text/javascript" src="<?php echo base_url() ?>js/add_new_fishermen.js"></script>

