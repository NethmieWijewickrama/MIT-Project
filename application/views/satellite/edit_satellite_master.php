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
						<h4>Edit Satellite Data</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Edit Satellite Data</li>
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
						<form id="satMaster_data" name="satMaster_data" class="form-horizontal" action="" method="post">
							<div class="card-header">
								<?php if (isset($msg) && $msg != "") { ?>
									<div class="alert alert-success" role="alert">
										<?php echo $msg; ?>
									</div>
								<?php } ?>
								<h4 class="m-t-0">Satellite Information</h4>
								</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Data Type</label>
											<div class="col-md-9">
												<input type="text" id="dataType" name="dataType"
													   class="form-control"
													   placeholder="Enter Data Type" value="<?php echo $old_data->dataType ?>"  required/>
													   <span id="dataType_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Description</label>
											<div class="col-md-9">
												<textarea id="description" name="description" class="form-control"  step="0.01"
														  placeholder="Enter Description of the Data Type"  required><?php echo $old_data->description ?></textarea>
														  <span id="description_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Currency</label>
											<div class="col-md-9">
												<select class="form-control" name="currency" id="currency">
													<option value="USD" <?php echo $old_data->currency =="USD" ? "selected" : "" ?>>USD</option>
													<option value="LKR" <?php echo $old_data->currency =="LKR" ? "selected" : "" ?>>LKR</option>
													<option value="GBP" <?php echo $old_data->currency =="GBP" ? "selected" : "" ?>>GBP</option>
													<option value="EURO" <?php echo $old_data->currency =="EURO" ? "selected" : "" ?>>EURO</option>
												</select>
												<span id="currency_span" style="font-size:14px; color:red;"></span>											
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Unit Price</label>
											<div class="col-md-9">
												<input type="number" id="unitPrice" name="unitPrice"  step="0.01"
													   class="form-control"
													   placeholder="Enter Unit Price" value="<?php echo $old_data->unitPrice ?>"  required/>
													   <span id="unitPrice_span" style="font-size:14px; color:red;"></span>

											</div>
										</div>
									</div>
								</div>								
							</div>
							<div class="card-footer">
								<button id="btn_submit" name="btn_submit" class="btn btn-primary float-right">Update
										Satellite Data
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
	<script type="text/javascript" src="<?php echo base_url() ?>js/add_satellite_master.js"></script>

