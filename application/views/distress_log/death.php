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
						<h4>Add New Death</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">New Death</li>
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
											<label class="col-md-3 col-form-label">Log Id</label>
											<div class="col-md-9">
												<input type="text"
													   class="form-control"
													   value="<?php echo "log/".$log_list->row()->id?>" disabled/>
												<span id="registrationDate_span"></span>
												<input type="hidden" name="logBookID" id="logBookID" value="<?php echo $log_list->row()->id?>">

											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Fisherman</label>
											<div class="col-md-9">
												<select class="form-control" name="fishermenID" id="fishermenID" required>
													<option value="" disabled selected>Select Value</option>
													<?php foreach ($fisherman_list->result() as $row) { ?>
														<option value="<?php  echo $row->id ?>"><?php echo $row->nameWithInitials."(".$row->nic.")"?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Log Date</label>
											<div class="col-md-9">
												<select class="form-control" name="date" id="date">
													<?php foreach ($log_list->result() as $row) { ?>
														<option value="<?php  echo $row->dateTime ?>"><?php echo $row->dateTime?></option>
													<?php } ?>
												</select>
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
