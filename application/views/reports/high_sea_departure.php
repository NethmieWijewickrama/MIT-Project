<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
	  href="https://adminlte.io/themes/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
						<h4>High Sea Departure</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">High Sea Departure Reports</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">

			<div class="container-fluid">
				<form action="" method="GET" class="form-horizontal">
					<div class="row">
						<div class="col-md-10">
							<div class="input-group">
								<label class="col-md-1 col-form-label">From</label>
								<input type="date" name="from" class="form-control float-right" value="<?php echo isset($_GET['from']) ? $_GET['from'] : "" ?>">
								<label class="col-md-1 col-form-label">To</label>
								<input type="date" name="to" class="form-control float-right" value="<?php echo isset($_GET['to']) ? $_GET['to'] : "" ?>">
							<!--	<label class="col-md-1 col-form-label">Harbour</label>
								<select class="form-control" name="harbour" id="harbour">
									<option value="" disabled selected>- Select -</option>
									<?php foreach ($harbour_list->result() as $row) { ?>
										<option value="<?php echo $row->harbour ?>"><?php echo $row->harbour ?></option>
									<?php } ?>
								</select>-->
							</div>
						</div>
						<div class="form-group col-sm-1" style="flex:auto;">
							<button id="btnSearch" type="submit" class="btn btn-primary bg-gradient-primary">Search</button>
						</div>
					</div>
				</form>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-inverse">
						<!--<h3 align="center"> High Sea Departure Report </h3>-->
							<div class="panel-body">								
								<table id="example3" class="table table-bordered table-striped">
									<thead>
									<tr>
										<th>High Sea Active Code</th>
										<th>Vessel No</th>
										<th>Vessel Name</th>
										<th>Departure Date</th>
										<th>Departure Harbour</th>
										<th>Fishing Gear</th>
									</tr>
									</thead>
									<tbody>

									<?php foreach ($report_data->result() as $row) { ?>

										<tr class="odd gradeX">

											<td>
												<?php echo $row->activeCode; ?></td>
											<td>
												<?php echo $row->vesselNo; ?></td>
											<td>
												<?php echo $row->vesselName; ?></td>
											<td>
												<?php echo $row->departureDate; ?></td>
											<td>
												<?php echo $row->harbour; ?></td>
											<td>
												<?php echo $row->fishingGear; ?></td>
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
<script src="<?php echo base_url()?>dist/js/adminlte.min.js"></script>
<script>
	$(function () {
		$("#example3").DataTable({
			"responsive": true, "lengthChange": false, "autoWidth": false,
			"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
		}).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#harbour").on('change',function(){
			var value= $(this).val();

			$.ajax({
				url:"Reports_Model.php",
				type:"POST",
				data:'request'+value;
			});
		});
	});
</script> 
	


