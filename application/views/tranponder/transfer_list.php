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
						<h4>Transfer List</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Transfers</li>
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
								<?php if (isset($msg) && $msg != "") { ?>
									<div class="alert alert-success" role="alert">
										<?php echo $msg; ?>
									</div>

								<?php } ?>
								<table id="example1" class="table table-striped table-bordered ">
									<thead>
									<tr>
										<th>VMS</th>
										<th>Vessel Name</th>
										<th>Vessel No</th>
										<th>Installed Date</th>
										<th>Job Status</th>
										<th>Uninstalled Date</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>

									<?php foreach ($transfer_details->result() as $row) { ?>

										<tr class="odd gradeX">

											<td><?php echo $row->VMS; ?></td>
											<td><?php echo $row->vesselName; ?></td>
											<td><?php echo $row->vesselNo; ?></td>
											<td><?php echo $row->jobDate; ?></td>
											<td><?php if ($row->jobStatus == 1) echo "<span class='badge badge-success'>Installed</span>"; else echo "<span class='badge badge-danger'>Uninstalled</span>"; ?></td>
											<td><?php echo $row->uninstallDate; ?></td>
											<td>
												<div class="row" style="justify-content: space-around">
													<a href="<?php echo base_url() ?>uninstall_transfer?id=<?php echo base64_encode($row->id) ?>">
														<i title="Uninstall" style="font-size: 18px; color: red"
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
