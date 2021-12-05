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
						<h4>Transponders List</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Transponders</li>
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
										<th width=10>No.</th>
										<th width=60>ISN</th>
										<th width=50>Antenna No</th>
										<th width=50>IMN</th>
										<th width=40>VMS</th>
										<th width="100">Registered Date</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>

									<?php foreach ($tranponder_details->result() as $row) { ?>

										<tr class="odd gradeX">
											<td><?php echo $row->id; ?></td>
											<td><?php echo $row->ISN; ?></td>
											<td><?php echo $row->antennaNo; ?></td>
											<td><?php echo $row->IMN; ?></td>
											<td><?php echo $row->VMS; ?></td>
											<td><?php echo $row->registrationDate; ?></td>
											<td><?php if ($row->is_active == 1) echo "<span class='badge badge-success'>Active</span>"; else echo "<span class='badge badge-danger'>De-Active</span>"; ?></td>
											<td>
												<div class="row" style="justify-content: space-around">
													<a href="<?php echo base_url() ?>edit_transponder?id=<?php echo base64_encode($row->id) ?>">
														<i title="Edit" style="font-size: 18px; color: cornflowerblue"
														   class="fa fa-edit"></i></a>
													<a href="<?php echo base_url() ?>inactive_transponder?id=<?php echo base64_encode($row->id) ?>">
														<i title="Inactive" style="font-size: 18px; color: red"
														   class="fa fa-ban"></i></a>
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
