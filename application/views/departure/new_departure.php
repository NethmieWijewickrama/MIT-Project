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
						<h4>New High Sea Departure</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">New Departure</li>
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
						<form>
							<div class="card-body">
								<?php if (isset($msg) && $msg != "") { ?>
									<div class="alert alert-success" role="alert">
										<?php echo $msg; ?>
									</div>

								<?php } ?>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Active Code</label>
											<div class="col-md-9">
												<input type="text" id="activeCode" name="activeCode"
													   class="form-control"
													   value="<?php echo $active_code ?>" readonly/>
												<span id="registrationDate_span"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Vessel Number</label>
											<div class="col-md-9">
												<select class="form-control select2" name="vesselID" id="vesselID">
													<option value="" disabled selected>- Select -</option>
													<?php foreach ($vessel_list->result() as $row) { ?>
														<option value="<?php echo $row->id ?>"><?php echo $row->vesselName . "(" . $row->vesselNo . ")" ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Date</label>
											<div class="col-md-9">
												<input type="date" id="departureDate" name="departureDate"
													   class="form-control" value="<?php echo date('Y-m-d') ?>" required/>
												<span id="registrationDate_span"></span>

											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Harbour</label>
											<div class="col-md-9">
												<select class="form-control" name="harbour" id="harbour">
													<option value="" disabled selected>- Select -</option>
													<?php foreach ($harbour_list->result() as $row) { ?>
														<option value="<?php echo $row->harbour ?>"><?php echo $row->harbour ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Skipper</label>
											<div class="col-md-9">
												<select class="form-control select2" name="skipperID" id="skipperID">
													<option value="" disabled selected>- Select -</option>
													<?php foreach ($fisherman_list->result() as $row) {
														if ($row->occupation == "Skipper") { ?>
															<option value="<?php echo $row->id ?>"><?php echo $row->nameWithInitials . "(" . $row->nic . ")" ?></option>
														<?php }
													} ?>
												</select>
											</div>
										</div>
									</div>
									<!--<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Fisherman</label>
											<div class="col-md-9">
												<select class="form-control" name="fishermenID" id="fishermenID">
													<option value="" disabled selected>- Select -</option>
													<?php foreach ($fisherman_list->result() as $row) { ?>
														<option value="<?php echo $row->id ?>"><?php echo $row->nameWithInitials . "(" . $row->nic . ")" ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>-->
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Fishing Gearing </label>
											<div class="col-md-9">
												<select class="form-control" name="fishingGear" id="fishingGear">
													<option value="" disabled selected>- Select -</option>
													<option value="Long Line">Long Line</option>
													<option value="Ring Net">Ring Net</option>
													<option value="Gill Net">Gill Net</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<row>
									<div class="col-md-12">
										<label class="col-md-3 col-form-label">Select Crew Members to add </label>
										<div class="row" style="justify-content: center">
											<div class="col-md-8">
												<div class="form-group row">
													<div class="col-md-12">
														<select class="form-control select2" name="crewID" id="crewID">
															<option value="" disabled selected>- Select -</option>
															<?php foreach ($fisherman_list->result() as $row) { ?>
																<option value="<?php echo $row->id ?>"><?php echo $row->nameWithInitials . "(" . $row->nic . ")" ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
											</div>

											<div class="col-md-1">
												<div class="form-group row">
													<div class="col-md-12">
														<input type="button" class=" btn btn-primary" id="btn_add"
															   value="Add">
													</div>
												</div>
											</div>

										</div>
									</div>

								</row>
								<row style="display: flex; justify-content: center">
									<div class="col-md-8">
										<div class="card-body form-group col-sm-12">
											<table id="data_table" class="table table-bordered table-striped">
												<thead>
												<tr>
													<th>Name</th>
													<th>NIC</th>
													<th>Action</th>
												</tr>
												</thead>
												<tbody>
												</tbody>
											</table>

										</div>
									</div>
								</row>

								<div class="card-footer">
									<button type="submit" id="btn_save_tans" class="btn btn-info full-width float-right">Save</button>
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
</div>

<script type="text/javascript" src="<?php echo base_url() ?>js/new_departure.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo base_url() ?>plugins/select2/js/select2.full.min.js"></script>

<script>

	$('.select2').select2()

	//Initialize Select2 Elements
	$('.select2bs4').select2({
	theme: 'bootstrap4'
	})


	var baseUrl = "<?php echo base_url()?>";
	var usd = "<?php echo Currency::USDLKR?>";
</script>

<style>
		.select2-selection--single{
			height: auto !important;
		}
	</style>

