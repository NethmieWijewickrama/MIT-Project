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
						<h4>Vessel List</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Vessel List</li>
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
									<tr align="center">
										<th>No.</th>
										<th>Vessel Name</th>
										<th>Vessel Number</th>
										<th>District Office</th>										
										<th>Length (ft.)</th>
										<th>Height (ft.)</th>
										<th>Material</th>
										<th width="50">Year of Made</th>
										<th>Serial Number</th>
										<th>Engine Category</th>
										<th>Yard</th>										
										<th>Vessel Owner</th>
										<th>Date Registered</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>

									<?php foreach ($owner_details->result() as $owner) { ?>

										<tr class="odd gradeX">
											<td><?php echo $owner->id; ?></td>
											<td><?php echo $owner->vesselName; ?></td>
											<td><?php echo $owner->vesselNo; ?></td>
											<td><?php echo $owner->districtOffice; ?></td>											
											<td><?php echo $owner->length; ?></td>
											<td><?php echo $owner->height; ?></td>
											<td><?php echo $owner->material; ?></td>
											<td><?php echo $owner->year; ?></td>
											<td><?php echo $owner->serialNo; ?></td>
											<td><?php echo $owner->engineCategory; ?></td>
											<td><?php echo $owner->yardName; ?></td>											
											<td><?php echo $owner->ownerName; ?></td>
											<td><?php echo $owner->registrationDate; ?></td>
											<td><?php if ($owner->is_active == 1) echo "<span class='badge badge-success'>Active</span>"; else echo "<span class='badge badge-danger'>De-Active</span>"; ?></td>
											<td>
												<div class="row" style="justify-content: space-around">
													<a href="<?php echo base_url() ?>vessel_owner_identity?id=<?php echo base64_encode($owner->id) ?>"><i
																title="View ID" style="font-size: 18px;"
																class="fa fa-eye"> </i></a>
													<a href="<?php echo base_url() ?>edit_vessel?id=<?php echo base64_encode($owner->id) ?>">
														<i title="Edit" style="font-size: 18px; color: cornflowerblue"
														   class="fa fa-edit"></i></a>
													<a href="<?php echo base_url(); ?>satellite_bill?vessel_id=<?php echo base64_encode($owner->id) ?>">
														<i title="New Bill" style="font-size: 18px; color: forestgreen"
														   class="fa fa-money-bill"></i></a>
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
<script>
	$(document).ready(function () {
		App.init();
		TableManageButtons.init();
	});

</script>
