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
						<h4>Invoice List</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Invoice</li>
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
					<!--	<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Usage Month </label>
										<div class="col-md-3">
											<select class="form-control select2" name="usageMonthdrop" id="usageMonthdrop">
												<option value="" disabled selected>- Select -</option>
												<option value="Jan">Jan</option>
												<option value="Feb">Feb</option>
												<option value="Mar">Mar</option>
												<option value="Apr">Apr</option>
												<option value="May">May</option>
												<option value="Jun">Jun</option>
												<option value="Jul">Jul</option>
												<option value="Aug">Aug</option>
												<option value="Sep">Sep</option>
												<option value="Oct">Oct</option>
												<option value="Nov">Nov</option>
												<option value="Dec">Dec</option>
											</select>
										</div>									
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Vessel </label>
										<div class="col-md-6">
											<select class="form-control select2" name="vesseldrop" id="vesseldrop">
												<option value="" disabled selected>- Select -</option>
												<?php foreach ($vessels->result() as $row) { ?>
														<option value="<?php echo $row->id ?>"><?php echo $row->vesselName . "(" . $row->vesselNo . ")" ?></option>
													<?php } ?>
												
											</select>
										</div>
								</div>
							</div>
						</div>-->
											


							<div class="panel-body">

								<table id="example1" class="table table-striped table-bordered ">
									<thead>
									<tr>
										<th>Invoice Number</th>
										<th>Invoice Date</th>
										<!--<th>Usage Month</th>
										<th>Year</th>-->
										<th>Exchange Rate</th>
										<th>Total Amount (LKR)</th>
										<th>Total Amount (USD)</th>
										<th>Owner</th>
										<th>Vessel</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>

									<?php foreach ($invoice_details->result() as $row) { ?>

										<tr class="odd gradeX">

											<td><?php echo $row->invoiceNumber; ?></td>
											<td><?php echo $row->invoiceDate; ?></td>
											<!--DATE_FORMAT(estb, '%Y %m') 
											//<?php 
												//$usmonth = strtotime($row->usageMonthStartDate);
												//$usyear = strtotime($row->usageMonthStartDate);

											//?>-->
											<!--<td width="10"><?php echo date("M",$usmonth);?></td>
											<td width="10"><?php echo date("Y",$usyear);?></td>-->
											<td width="10"><?php echo $row->ExchangeRate; ?></td>
											<td width="10"><?php echo $row->TotalAmtLKR; ?></td>
											<td width="10"><?php echo $row->TotalAmtUSD; ?></td>
											<td><?php echo $row->ownerName; ?></td>
											<td><?php echo $row->vesselName; ?></td>
											<td>
												<div class="row" style="justify-content: space-around">
													<a href="<?php echo base_url() ?>invoice?id=<?php echo ($row->id) ?>">
														<i title="Invoice" style="font-size: 18px; color: cornflowerblue"
														   class="fa fa-book"></i></a>
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
<script src="<?php echo base_url() ?>plugins/select2/js/select2.full.min.js"></script>

<script>
	$(document).ready(function () {
		App.init();
		TableManageButtons.init();
	});


	$('.select2').select2()

	//Initialize Select2 Elements
	$('.select2bs4').select2({
	theme: 'bootstrap4'
	})

</script>

<style>
		.select2-selection--single{
			height: auto !important;
		}
</style>
