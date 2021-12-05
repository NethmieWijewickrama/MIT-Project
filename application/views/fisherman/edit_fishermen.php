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
						<h4>Edit Fisherman Details</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Edit Fisherman Details</li>
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
						<form autocomplete="off" id="fishermenEdit_data" name="fishermenEdit_data" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
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
														<option value="<?php echo $row->district ?>" <?php echo $old_data->districtOffice ==$row->district ? "selected" : "" ?>><?php echo $row->description ?></option>
													<?php } ?>
												</select>
												<span id="districtOffice_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Fisheries ID No</label>
											<div class="col-md-9">
												<input type="text" id="fisheriesIdNo" name="fisheriesIdNo" readonly
													   class="form-control"
													   placeholder="" value="<?php echo $old_data->fisheriesIDNo ?>" required/>
												<span id="fisheriesIdNo_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Name with Initials</label>
											<div class="col-md-9">
												<input type="text" id="nameWithInitials" name="nameWithInitials"
													   class="form-control"
													   placeholder="Name with Initials (H M Perera)" value="<?php echo $old_data->nameWithInitials ?>" required/>
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
													   placeholder="Name in Full" value="<?php echo $old_data->nameInFull ?>" required/>
												<span id="nameInFull_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">NIC</label>
											<div class="col-md-9">
												<input type="text" id="nic" name="nic" maxlength="12" value="<?php echo $old_data->nic ?>" class="form-control"
													   placeholder="123456789V / 123456789123" required/>
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
											<label class="col-md-3 col-form-label">Address</label>
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
											<label class="col-md-3 col-form-label">Contact Number</label>
											<div class="col-md-9">
												<input type="text" id="contactNo" name="contactNo" minlength="10" maxlength="10"
													   class="form-control"
													   placeholder="0711234567" value="<?php echo $old_data->contactNo ?>" required/>
													   <span id="contactNo_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label"></label>
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
													   placeholder="City" value="<?php echo $old_data->addressCity ?>" required/>
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
												<option value="Crew Member" <?php echo $old_data->occupation =="Crew Member" ? "selected" : "" ?>>Crew Member</option>
												<option value="Skipper" <?php echo $old_data->occupation =="Skipper" ? "selected" : "" ?>>Skipper</option>												
												</select>
												<span id="occupation_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
							
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Nature Of Occupation</label>
											<div class="col-md-9">
												<select class="form-control" name="natureOfOccupation" id="natureOfOccupation">
													<option value="Full Time" <?php echo $old_data->natureOfOccupation =="Full Time" ? "selected" : "" ?>>Full Time</option>
													<option value="Part Time" <?php echo $old_data->natureOfOccupation =="Part Time" ? "selected" : "" ?>>Part Time</option>
												</select>
												<span id="natureOfOccupation_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer"> </div>
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
													   placeholder="Name with Initials (H M Perera)" value="<?php echo $dep_one->Name ?>" />
												<span id="d1name_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">NIC</label>
											<div class="col-md-9">
												<input type="text" id="d1nic" name="d1nic"  maxlength="12"
													   class="form-control"
													   placeholder="123456789V / 123456789123" value="<?php echo $dep_one->NIC ?>"/>
												<span id="d1nic_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Relationship</label>
											<div class="col-md-9">
												<select class="form-control" name="d1relationship" id="d1relationship">
													<option value="Select">Select</option>
													<option value="Father" <?php echo $dep_one->Relationship =="Father" ? "selected" : "" ?>>Father</option>
													<option value="Mother" <?php echo $dep_one->Relationship =="Mother" ? "selected" : "" ?>>Mother</option>
													<option value="Spouse" <?php echo $dep_one->Relationship =="Spouse" ? "selected" : "" ?>>Spouse</option>
													<option value="Daughter" <?php echo $dep_one->Relationship =="Daughter" ? "selected" : "" ?>>Daughter</option>
													<option value="Son" <?php echo $dep_one->Relationship =="Son" ? "selected" : "" ?>>Son</option>
												</select>
												<span id="d1relationship_span" style="font-size:14px; color:red;"></span>
												<!--<input type="text" id="d1relationship" name="d1relationship"
													   class="form-control"
													   placeholder="Dependent Relationship" value="<?php echo $dep_one->Relationship ?>" required/>
												<span id="d1relationship_span"></span> -->

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Contact No</label>
											<div class="col-md-9">
												<input type="text" id="d1tp" name="d1tp" minlength="10" maxlength="10"
													   class="form-control"
													   placeholder="0711234567" value="<?php echo $dep_one->contactNo ?>"/>
												<span id="d1tp_span" style="font-size:14px; color:red;>"</span>

											</div>
										</div>
									</div>
								</div>
								<br>
								<h5 class="m-t-0"><font color="#17a2b8"><i>Dependent Two</i></font></h5>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Name with Initials</label>
												<div class="col-md-9">
													<input type="text" id="d2name" name="d2name"
														   class="form-control"
														   placeholder="Name with Initials (H M Perera)" value="<?php echo $dep_two->Name ?>" required/>
													<span id="d2name_span" style="font-size:14px; color:red"></span>

												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">NIC</label>
												<div class="col-md-9">
													<input type="text" id="d2nic" name="d2nic" maxlength="12"
														   class="form-control"
														   placeholder="123456789V / 123456789123" value="<?php echo $dep_two->NIC ?>"/>
													<span id="d2nic_span" style="font-size:14px; color:red"></span>

												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Relationship</label>
												<div class="col-md-9">
													<select class="form-control" name="d2relationship" id="d2relationship">
														
														<option value="Father" <?php echo $dep_two->Relationship =="Father" ? "selected" : "" ?>>Father</option>
														<option value="Mother" <?php echo $dep_two->Relationship =="Mother" ? "selected" : "" ?>>Mother</option>
														<option value="Spouse" <?php echo $dep_two->Relationship =="Spouse" ? "selected" : "" ?>>Spouse</option>
														<option value="Daughter" <?php echo $dep_two->Relationship =="Daughter" ? "selected" : "" ?>>Daughter</option>
														<option value="Son" <?php echo $dep_two->Relationship =="Son" ? "selected" : "" ?>>Son</option>
													</select>
													<span id="d2relationship_span" style="font-size:14px; color:red;"></span>
													<!--<input type="text" id="d2relationship" name="d2relationship"
													   class="form-control"
													   placeholder="Dependent Relationship" value="<?php echo $dep_two->Relationship ?>" required/>
												<span id="d2relationship_span"></span>-->

												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Contact No</label>
												<div class="col-md-9">
													<input type="text" id="d2tp" name="d2tp" minlength="10" maxlength="10"
														   class="form-control"
														   placeholder="0711234567" value="<?php echo $dep_two->contactNo ?>" />
													<span id="d2tp_span" style="font-size:14px; color:red;"></span>

												</div>
											</div>
										</div>
									</div>
									
							</div>
							
										<div class="card-footer">
											<button id="btn_submit" name="btn_submit" class="btn btn-primary float-right">
												Update Fisherman
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
	<script type="text/javascript" src="<?php echo base_url() ?>js/edit_fishermen.js"></script>

