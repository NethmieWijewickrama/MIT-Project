<div class="wrapper">

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark">Satellite Airtime Charges</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Satellite Airtime Charges</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content -->


		<section class="content">
			<div class="container-fluid">
				<form id="satbill" action="<?php echo base_url() ?>save_transaction" method="post">
					<div class="row">
						<div class="col-md-12">
							<div class="row float-left pull-left">
								<div class="col-md-4">
									<!-- text input -->
									<div class="form-group row">
										<label for="inputEmail3" class="col-md-4 col-form-label"> Invoice No</label>
										<div class="col-md-8">
											<input type="text" class="form-control" id="inv_no"
												   value="<?php echo $inv_number ?>"
												   name="inv_no" disabled>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group row">
										<label for="inputEmail3" class="col-md-4 col-form-label">Invoice Date</label>
										<div class="col-md-8">
											<input type="text" class="form-control" id="inv_date"
												   value="2021-07-02"
												   name="inv_date" disabled>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<!-- text input -->
									<div class="form-group row">
										<label for="inputEmail3" class="col-md-4 col-form-label"> </label>
										<div class="col-md-8">
											
											<span></span>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<!-- text input -->
									<div class="form-group row">
										<label for="inputEmail3" class="col-md-4 col-form-label"> Start Date</label>
										<div class="col-md-8">
											<input type="date" class="form-control" id="start_date" placeholder="" value=""
												   name="start_date"/>
											<span id="start_date_span" style="font-size:14px; color:red;"></span>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group row">
										<label for="inputEmail3" class="col-md-4 col-form-label">End Date</label>
										<div class="col-md-8">
											<input type="date" class="form-control" id="end_date" placeholder="" value=""
												   name="end_date"/>
											<span id="end_date_span" style="font-size:14px; color:red;"></span>
										</div>
									</div>
								</div><!--
								<div class="col-md-4">
									<div class="form-group row">
										<label for="inputEmail3" class="col-md-5 col-form-label">Exchange Rate</label>
										<div class="col-md-6">
											<input type="text" class="form-control" id="exchangeRate" placeholder="" 
												   name="exchangeRate">
										</div>
									</div>
								</div>-->

							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group row">
										<label for="inputEmail3" class="col-md-4 col-form-label">Vessel No</label>
										<div class="col-md-8">
											<input type="text" class="form-control" id="vessel_no" placeholder=""
												   name="vessel_no" value="<?php echo $vessel_details->vesselNo ?>" readonly>
											<input type="hidden" id="vesselID" name="vesselID" value="<?php echo $vessel_details->vesselID ?>">
											<input type="hidden" id="ownerID" name="ownerID" value="<?php echo $vessel_details->ownerID ?>">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group row">
										<label for="inputEmail3" class="col-md-4 col-form-label">Owner Name</label>
										<div class="col-md-8">
											<input type="text" class="form-control" id="owner_name" placeholder=""
												   name="owner_name" readonly value="<?php echo $vessel_details->ownerName ?>">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group row">
										<label for="inputEmail3" class="col-md-5 col-form-label">Owner Contact No</label>
										<div class="col-md-6">
											<input type="text" class="form-control" id="owner_contact" placeholder=""
												   name="owner_contact" readonly value="<?php echo $vessel_details->contactNo ?>">
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

					<br>
					<div class="col-md-12">
						<div class="row">
							<label for="" class="col-md-1 col-form-label">Item</label>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
											<div class="col-md-12">
												<select id="item_code" class="form-control select2bs4">
													<?php foreach ($items->result() as $item) { ?>
														<option value="<?php echo $item->id ?>"><?php echo $item->description ?>
														</option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group row">
											<div class="col-md-12">
												<input type="number" class="form-control" id="item_qty"
													   placeholder="Qty (1)">
											</div>
										</div>
									</div>
									<div class="col-md-1">
										<div class="form-group row">
											<div class="col-md-12">
												<input type="button" class=" btn btn-primary" id="btn_add" value="Add">
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="col-md-8">
								<div class="card-body form-group col-sm-12">
									<table id="data_table" class="table table-bordered table-striped">
										<thead>
										<tr>
											<th>Data Type</th>
											<th>Unit Price (USD)</th>
											<th>No of Units</th>
											<th>Total Price (USD)</th>
											<th>Action</th>
										</tr>
										</thead>
										<tbody>
										</tbody>
									</table>

								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<!-- /.card-header -->
									<!-- form start -->
									<div class="form-horizontal">
										<div class="card-body">
											<div class="form-group row">
												<label for="inputEmail3" class="col-sm-4 col-form-label">Grand Total (USD)
													</label>
												<div class="col-sm-8">
													<input type="number" class="form-control" id="grand_total_usd"
														   name="grand_total_usd"
														   value="0" disabled/>
													<span id="grand_total_usd_span" style="font-size:14px; color:red;"></span>
												</div>
											</div>
											<div class="form-group row">
												<label for="inputPassword3"
													   class="col-sm-4 col-form-label">Grand Total (LKR)</label>
												<div class="col-sm-8">
													<input type="number" class="form-control" id="grand_total_lkr"
														   name="grand_total_lkr"
														   value="0" disabled/>
													<span id="grand_total_lkr_span" style="font-size:14px; color:red;"></span>
												</div>
											</div>

										</div>
										<!-- /.card-body -->
										<div class="card-footer">
											<a href="<?php echo base_url()?>dashboard" type="button" class="btn btn-default">Cancel</a>
											<button type="submit" id="btn_save_tans" class="btn btn-info full-width float-right">Save</button>
										</div>
										<!-- /.card-footer -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</section>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>js/new_bill.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/add_satellite_billing.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>




<script>
	var baseUrl = "<?php echo base_url()?>";
	//var usd = document.querySelector('#exchangeRate');
	var usd = "<?php echo Currency::USDLKR?>";
	
	
	
		
	
/*

	$(document).ready(function(){
		$("#exchangeRate","#grand_total_usd").keyup(function(){
			var stot = 0;
			var sexchangerate = Number($("#exchangeRate").val());
			var stotusd = Number($("#grand_total_usd").val());
			var stot = sexchangerate*stotusd;
			$("#grand_total_lkr1").val(stot);
		});
	})*/


	
</script>




