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
						<h4>Satellite Master List</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Satellite Master</li>
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
										<th width="10">No.</th>
										<th>Data Type</th>
										<th>Description</th>
										<th>Currency</th>
										<th>Unit Price</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>

									<?php foreach ($satellite_details->result() as $row) { ?>

										<tr class="odd gradeX">

											<td><?php echo $row->id; ?></td>
											<td><?php echo $row->dataType; ?></td>
											<td><?php echo $row->description; ?></td>
											<td><?php echo $row->currency; ?></td>
											<td><?php echo $row->unitPrice; ?></td>
<!--											<td>--><?php //if ($row->is_active == 1) echo "<span class='badge badge-success'>Active</span>"; else echo "<span class='badge badge-danger'>De-Active</span>"; ?><!--</td>-->
											<td>
												<div class="row" style="justify-content: space-around">
													<a href="<?php echo base_url() ?>edit_satellite_master?id=<?php echo base64_encode($row->id) ?>">
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
<script>
	$(document).ready(function () {
		App.init();
		TableManageButtons.init();
	});

</script>
