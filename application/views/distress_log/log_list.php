<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
	  href="https://adminlte.io/themes/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<script src="<?php echo base_url()?>dist/js/adminlte.min.js"></script>
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
						<h4>Log List</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Logs</li>
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

								<table id="example3" class="table table-bordered table-striped">
									<thead align="top">
									<tr align="center">
										<th>Log No</th>
										<th>Log Date</th>
										<th>Vessel No</th>
										<th>Vessel Name</th>
										<th>Latitude</th>
										<th>Longitude</th>
										<th>Description</th>
										<th>Add Death</th>
									</tr>
									</thead>
									<tbody>

									<?php foreach ($report_data->result() as $row) { ?>

										<tr class="odd gradeX">

											<td width="200"><?php echo "Log/".$row->id; ?></td>
											<td width="300"><?php echo $row->dateTime; ?></td>
											<td width="400"><?php echo $row->vesselNo; ?></td>
											<td width="500"><?php echo $row->vesselName; ?></td>
											<td width="200"><?php echo $row->latitude; ?></td>
											<td width="200"><?php echo $row->longitude; ?></td>
											<td width="500"><?php echo $row->description; ?></td>
											<td width="200">
												<div class="row" style="justify-content: space-around">
													<a href="<?php echo base_url() ?>death_details?id=<?php echo base64_encode($row->id) ?>">
														<i title="Edit" style="font-size: 18px; color: orangered"
														   class="fa fa-plus"></i></a>
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

<!--<script type="text/javascript" language="javascript" src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>-->
<script type="text/javascript" language="javascript"
		src="https://adminlte.io/themes/v3/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript"
		src="https://adminlte.io/themes/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" language="javascript"
		src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" language="javascript"
		src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" language="javascript"
		src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript"
		src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" language="javascript"
		src="https://adminlte.io/themes/v3/plugins/jszip/jszip.min.js"></script>
<script type="text/javascript" language="javascript"
		src="https://adminlte.io/themes/v3/plugins/pdfmake/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript"
		src="https://adminlte.io/themes/v3/plugins/pdfmake/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript"
		src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript"
		src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script type="text/javascript" language="javascript"
		src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
	$(function () {
		$("#example3").DataTable({
			"responsive": true, "lengthChange": false, "autoWidth": false,
			"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
		}).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
	});
</script>


