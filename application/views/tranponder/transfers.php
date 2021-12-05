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
						<h4>Add New Transfer</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">New Transfer</li>
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
												<input type="date" id="jobDate" name="jobDate"
													   class="form-control"  value="<?php echo date('Y-m-d')?>"
													   placeholder="registration Date" required/>
												<span id="registrationDate_span"></span>

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Vessel No</label>
											<div class="col-md-9">
												<select class="form-control" name="vesselID" id="vesselID">
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
											<label class="col-md-3 col-form-label">VMS No</label>
											<div class="col-md-9">
												<select class="form-control" name="transponderID" id="transponderID">
													<option value="" disabled selected>- Select -</option>
													<?php foreach ($transponder_list->result() as $row) { ?>
														<option value="<?php echo $row->id ?>"><?php echo $row->VMS ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>

								</div>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary float-right">Save
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



