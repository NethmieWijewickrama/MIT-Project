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
						<h4>Add New Vessel</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Add New Vessel</li>
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
						<form autocomplete="off" id="vessel_data" name="vessel_data" class="form-horizontal" action="" method="post">
							<div class="card-header">
								<?php if (isset($msg) && $msg != "") { ?>
									<div class="alert alert-success" role="alert">
										<?php echo $msg; ?>
									</div>

								<?php } ?>
								<h4 class="m-t-0">Vessel Information</h4>
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
											<label class="col-md-3 col-form-label">Vessel Name</label>
											<div class="col-md-9">
												<input type="text" id="vesselName" name="vesselName"
													   class="form-control"
													   placeholder="Vessel Name" required/>												
												<span id="vesselName_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
<!--									<div class="col-md-6">-->
<!--										<div class="form-group row">-->
<!--											<label class="col-md-3 col-form-label">Vessel Number</label>-->
<!--											<div class="col-md-9">-->
<!--												<input type="text" id="vesselNo" name="vesselNo" class="form-control"-->
<!--													   placeholder="IMUL-A-0140NBO" required/>-->
<!--												<span id="vesselNo_span"></span>-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Length (ft.)</label>
											<div class="col-md-9">
												<input type="text" id="length" name="length"
													   class="form-control"
													   placeholder="35.5" required/>
												<span id="length_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Height (ft.)</label>
											<div class="col-md-9">
												<input type="text" id="height" name="height"
													   class="form-control"
													   placeholder="12" required/>
												<span id="height_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Material</label>
											<div class="col-md-9">
												<select class="form-control" name="material" id="material">
													<option value="" disabled selected>- Select -</option>
													<option value="Fiber">Fiber</option>
													<option value="Steel">Steel</option>
												</select>
												<span id="material_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Year of Made</label>
											<div class="col-md-9">
												<input type="text" id="year" name="year" maxlength="4"
													   class="form-control"
													   placeholder="Year" required/>
												<span id="year_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Serial Number</label>
											<div class="col-md-9">
												<input type="text" id="serialNo" name="serialNo" 
													   class="form-control"
													   placeholder="Serial Number" required/>
												<span id="serialNo_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Engine Category </label>
											<div class="col-md-9">
												<select class="form-control" name="engineCategory" id="engineCategory" required>
													<option value="" disabled selected>- Select -</option>
													<option value="Mitzubishi">Mitzubishi</option>
													<option value="Yamaha">Yamaha</option>
												</select>
												<span id="engineCategory_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Vessel Owner</label>
											<div class="col-md-9">
												<select class="form-control select2" name="ownerID" id="ownerID" required>
													<option value="" disabled selected>- Select -</option>
													<?php foreach ($owners->result() as $row) { ?>
														<option value="<?php echo $row->id ?>"><?php echo $row->ownerName.($row->nic) ?></option>
													<?php } ?>
												</select>
												<span id="ownerID_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">VMS No</label>
											<div class="col-md-9">
												<select class="form-control" name="transponderID" id="transponderID" required>
													<option value="" disabled selected>- Select -</option>
													<?php foreach ($transponder_list->result() as $row) { ?>
														<option value="<?php echo $row->id ?>"><?php echo $row->VMS ?></option>
													<?php } ?>
												</select>
												<span id="transponderID_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Yard Name</label>
											<div class="col-md-9">
												<select class="form-control" name="yardID" id="yardID" required>
													<option value="" disabled selected>- Select -</option>
													<?php foreach ($yard_list->result() as $row) { ?>
														<option value="<?php echo $row->id ?>"><?php echo $row->yardName ?></option>
													<?php } ?>
												</select>
												<span id="yardID_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
									<div class="form-group row">
										<label class="col-md-3 col-form-label">Registration Date</label>
										<div class="col-md-9">
											<input type="date" id="registrationDate" name="registrationDate"
												   class="form-control"  value="<?php echo date('Y-m-d')?>"
												   placeholder="registration Date" required/>
											<span id="registrationDate_span" style="font-size:14px; color:red;"></span>

										</div>
									</div>
								</div>
								</div>						
								<div class="card-footer">
									<button id="btn_submit" name="btn_submit" class="btn btn-primary float-right">Save
										Vessel
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
	<script type="text/javascript" src="<?php echo base_url() ?>js/add_new_vessel.js"></script>
	<script src="<?php echo base_url() ?>plugins/select2/js/select2.full.min.js"></script>

	<script>
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
	</script>

	<style>
		.select2-selection--single{
			height: auto !important;
		}
	</style>
