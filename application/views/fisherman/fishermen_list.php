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
						<h4>Fishermen List</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Fishermen List</li>
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

								<table id="example2" class="table table-striped table-bordered ">
									<thead>
									<tr align="center">
										<th>No.</th>
										<th>Fisheries ID No</th>										
										<th width="400">Name in Full</th>
										<th width="100">NIC</th>
										<th width="200">Contact Number</th>
										<th width="500">Address</th>
										<th>Occupation</th>
										<th>Nature Of Occupation</th>
										<th>Registered Date</th>										
										<th>Medical File</th>
										<th>CINEC File</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>

									<?php foreach ($fisherman_details->result() as $fisherman) { ?>

										<tr class="odd gradeX">
											<td><?php echo $fisherman->id; ?></td>
											<td><?php echo $fisherman->fisheriesIDNo; ?></td>
											<!--<td><?php echo $fisherman->nameWithInitials; ?></td>-->
											<td ><?php echo $fisherman->nameInFull; ?></td>
											<td><?php echo $fisherman->nic; ?></td>
											<!--<td><td><?php echo $fisherman->contactNo; ?></td>>-->
											<td><?php echo number_format($fisherman->contactNo, 0, '', ' '); ?></td>
											<td><?php echo $fisherman->addressHouse." ".$fisherman->addressStreetName." ".$fisherman->addressCity; ?></td>
											<td><?php echo $fisherman->occupation; ?></td>
											<td align="center"><?php echo $fisherman->natureOfOccupation; ?></td>
											<td><?php echo $fisherman->registrationDate; ?></td>																						
											<td style="vertical-align:middle; text-align: center;">
												<a target="_blank"
												   href="<?php echo base_url() ?>uploads/medical/<?php echo($fisherman->medicalFile) ?>">
													<i title="View" style="font-size: 18px; color: dodgerblue"
													   class="fa fa-file"></i></a>
											</td>
											<td style="vertical-align:middle; text-align: center;">
												<?php if($fisherman->occupation==="Skipper") { ?>
												<a target="_blank"
													href="<?php echo base_url() ?>uploads/cinec/<?php echo($fisherman->cinecFile) ?>">
													<i title="View" style="font-size: 18px; color: dodgerblue"
													   class="fa fa-file"></i></a>
												<?php } ?>
											</td>
											<td><?php if ($fisherman->is_active == 1) echo "<span class='badge badge-success'>Active</span>"; else echo "<span class='badge badge-danger'>De-Active</span>"; ?></td>
											<td>
												<div class="row" style="justify-content: space-around">
													<a href="<?php echo base_url() ?>edit_fisherman?id=<?php echo base64_encode($fisherman->id) ?>">
														<i title="Edit" style="font-size: 18px; color: cornflowerblue"
														   class="fa fa-edit"></i></a>
													<a href="<?php echo base_url() ?>identity_cart?id=<?php echo base64_encode($fisherman->id) ?>">
														<i title="Licence" style="font-size: 18px; color: forestgreen"
														   class="fa fa-id-card"></i></a>

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
