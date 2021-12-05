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
						<h4>Vessel Owners List</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Vessel Owners List</li>
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
										<th>Owner Name</th>
										<th>District Office</th>
										<th>NIC</th>
										<th>Address</th>
										<th width="100">Registered Date</th>
										<th>Contact Number</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>

									<?php foreach ($owner_details->result() as $owner) { ?>

										<tr class="odd gradeX">
											<td><?php echo $owner->id; ?></td>
											<td><?php echo $owner->ownerName; ?></td>
											<td><?php echo $owner->districtOffice; ?></td>
											<td><?php echo $owner->nic; ?></td>
											<td><?php echo $owner->addressHouse." ".$owner->addressStreetName." ".$owner->addressCity; ?></td>
											<td><?php echo $owner->registrationDate; ?></td>
											<td><?php echo number_format($owner->contactNo, 0, '', ' '); ?></td>
											<td><?php if ($owner->is_active == 1) echo "<span class='badge badge-success'>Active</span>"; else echo "<span class='badge badge-danger'>De-Active</span>"; ?></td>
											<td>
												<div class="row" style="justify-content: space-around">
													<a href="<?php echo base_url() ?>edit_owner?id=<?php echo base64_encode($owner->id) ?>">
														<i title="Edit" style="font-size: 18px; color: cornflowerblue"
														   class="fa fa-edit"></i></a>

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
