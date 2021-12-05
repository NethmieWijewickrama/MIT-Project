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
						<h4>High Sea Departure List</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Departure List</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">

			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-inverse">
							<div class="panel-body">

								<table id="example1" class="table table-striped table-bordered ">
									<thead>
									<tr>
										<th>Active Code</th>
										<th>Departure Date</th>
										<th>Fishing Gear</th>
										<th>View Form</th>
									</tr>
									</thead>
									<tbody>

									<?php foreach ($departures->result() as $row) { ?>

										<tr class="odd gradeX">

											<td><?php echo $row->activeCode; ?></td>
											<td><?php echo $row->departureDate; ?></td>
											<td><?php echo $row->fishingGear; ?></td>
											<td>
												<div class="row" style="justify-content: space-around">
													<a href="<?php echo base_url() ?>vessel_departure_form?id=<?php echo base64_encode($row->id) ?>">
														<i title="View" style="font-size: 18px; color: cornflowerblue"
														   class="fa fa-eye"></i></a>
												</div>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section>
	</div>
</div>
