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
						<h4>Add New log</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Logs</li>
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
						<form autocomplete="off" id="client_data" name="client_data" class="form-horizontal" action="" method="post">
							<div class="card-body">
								<?php if (isset($msg) && $msg != "") { ?>
									<div class="alert alert-success" role="alert">
										<?php echo $msg; ?>
									</div>

								<?php } ?>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Date</label>
											<div class="col-md-9">
												<input type="datetime-local" id="dateTime" name="dateTime"
													   class="form-control"
													   placeholder="registration Date" required/>
												<span id="registrationDate_span"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Vessel Number</label>
											<div class="col-md-9">
												<select class="form-control" name="vesselID" id="vesselID">
													<option value="" disabled selected>- Select -</option>
													<?php foreach ($vessel_list->result() as $row) { ?>
														<option value="<?php  echo $row->id ?>"><?php echo $row->vesselName."(".$row->vesselNo.")"?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Latitude</label>
											<div class="col-md-9">
												<input type="number" step="0.01" id="latitude" name="latitude"
													   class="form-control"
													   placeholder="latitude" required/>
												<span id="ownerName_span"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Longitude</label>
											<div class="col-md-9">
												<input type="number" step="0.01" id="longitude" name="longitude" class="form-control"
													   placeholder="longitude" required/>
												<span id="nic_span"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Description</label>
											<div class="col-md-9">
												<input type="text" id="description" name="description"
													   class="form-control"
													   placeholder="Description" required/>
												<span id="addressHouse_span"></span>

											</div>
										</div>
									</div>
								</div>

								<div class="card-footer">
									<button type="submit" class="btn btn-primary float-right">Save
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
