<div class="wrapper">
	<!-- Navbar -->

	<!-- /.navbar -->


	<!-- Content Wrapper. Contains page content -->
	<div class="">
		<div class="col-md-12">
			<div class="card bg-light">
				<div class="card-body pt-0">
						<div class="col-md-12">								
							<label class="col-md-3 col-form-label"></label>																				
						</div>
							
					<div class="row">						
						<div class="col-3 text-right">
							<img src="<?php echo base_url() ?>dist/img/img_1.png" alt="" class="img-circle img-fluid"
								 style="width: 105px">
						</div>
						<div class="col-6 text-center">
							<br>
							<h3><b>Department of Fisheries & Aquatic Resources</b></h3>
							<h6> <font face="Tahoma"> New Secretariat Building </font></h6>
							<h6><font face="Tahoma">Maligawatta, Colombo - 10</font></h6>
							<h6><font face="Tahoma">Sri Lanka</font></h6>
							<h6><font face="Tahoma">Fax: +94-11-1421541&nbsp;&nbsp;&nbsp;&nbsp;Tel: +94-11-2352145</font></h6>
							
							
						</div>
						<div class="col-3 text-left">
							<img src="<?php echo base_url() ?>dist/img/img.png" alt="" class="img-circle img-fluid"
								 style="width: 105px">
						</div>
					</div>
					<br>
					<div class="card">
						<div class="card-header">
							<h4 class="m-t-0" align="center"><b>Satellite Airtime Bill</b></h4>
						</div> <!-- style="justify-content:left"-->
						<div class="card-footer"> </div>
						<div class="col-md-12">
								<div class="form-group row">
									<label class="col-md-3 col-form-label"></label>
									<div class="col-md-9">												
									</div>
								</div>
							</div>				
						<div class="row" style="justify-content:center">
							<div class="col-4">
								<table align="left">
									<tr>
										<td><h5><b>Vessel No</b></td>
										<td width="10"><h5><b>:</b></td>
										<td><h5 style="margin-left: 30px"><?php echo $vessel->vesselNo ?></h5></td>
									</tr>
									<tr>
										<td><h5><b>Vessel Name</b></td>
										<td width="10"><h5><b>:</b></td>
										<td><h5 style="margin-left: 30px"><?php echo $vessel->vesselName ?></h5></td>
									</tr>
									<tr>
										<td><h5></td>										
									</tr>
									<tr>
										<td><h5><b></b></td>										
									</tr>
									<tr>
										<td><h5><b>Name</b></td>
										<td width="10"><h5><b>:</b></td>
										<td><h5 style="margin-left: 30px"><?php echo $vessel->ownerName ?></h5></td>
									</tr>
									<tr>
										<td style="vertical-align:top"><h5><b>Address</b></td>
										<td style="vertical-align:top" width="10"><h5><b>:</b></td>
										<td><h5 style="margin-left: 30px"><?php echo $vessel->addressHouse ?><br/><?php echo $vessel->addressStreetName ?><br/><?php echo $vessel->addressCity ?></h5></td>									
								
									</tr>

								</table>
							</div>
							<div class="col-3"> 
							
								<table width="350" align="left">
									<tr>
										<td><h5><b>Invoice No</b></td>
										<td><h5><b>:</b></td>
										<td><h5 style="margin-left: 30px"><?php echo $vessel->invoiceNumber ?></h5></td>
										
									</tr>
									<tr>
										<td style="width:150px"><h5><b>Invoice Date</b></td>
										<td width="10"><h5><b>:</b></td>
										<td><h5 style="margin-left: 30px"><?php echo $vessel->invoiceDate ?></h5></td>
									</tr>
									<tr>
										<td><h5></td>										
									</tr>
									<tr>
										<td><h5><b></b></td>										
									</tr>
									<tr>
										<td style="width:200px; vertical-align:top"><h5><b>Usage Period</b></td>
										<td style="vertical-align:top" width="10"><h5><b>:</b></td>
										<td style="width:250px"><h5 style="margin-left: 30px">From:&nbsp;&nbsp;<?php echo $vessel->usageMonthStartDate ?><br/>To&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $vessel->usageMonthStartDate ?></h5>
										</td>
									</tr>
									<tr>
										
									</tr>

								</table>
							</div>
						</div>
						<div class="row" style="justify-content: center">
							<row style="display: flex; justify-content: center">
								<div class="col-md-12">
									<div class="card-body form-group col-sm-12">
										<table id="data_table" class="table table-striped">
											<thead align="center">
											<tr>
												<th width="250">DATA TYPE</th>
												<th width="250">UNIT PRICE (USD)</th>
												<th width="250">NO. OF UNITS</th>
												<th width="250">AMOUNT (USD)</th>
											</tr>
											</thead>
											<tbody>
											<?php foreach ($items->result() as $item) { ?>
												<tr>
													<td><h6 style="margin-left: 80px">
														<?php echo $item->dataType ?></h6></td>
													<td><h6 style="margin-left: 80px">
														<?php echo $item->unitPrice ?></td>
													<td><h6 style="margin-left: 80px">
														<?php echo $item->noOfUnits ?></td>
													<td><h6 style="margin-left: 80px">
														<?php echo $item->Amount ?></td>
												</tr>
											<?php } ?>
											</tbody>
										</table>

									</div>
								</div>
							</row>
						</div>
						<div class="row">
							<!-- /.col -->
							<div class="col-6">
							</div>
							<div class="col-5">
								<h5 align="center"><b>Payment Summary</b></h5>

								<div class="table-responsive">
									<table class="table">
										<tr>
											<th style="width:70%"><h6 style="margin-left: 30px"><b>TOTAL AMOUNT (USD)</b></h6></th>
											<td><p style="margin-left: 20px"><?php echo number_format($vessel->TotalAmtUSD, 2, '.', ',') ?></p></td>
										</tr>
										<tr>
											<th><h6 style="margin-left: 30px"><b>EXCHANGE RATE [1 USD = ]</b></h6></th>
											<td><p style="margin-left: 20px"><?php echo $vessel->ExchangeRate ?></p></td>
										</tr>
										<tr>
											<th><h6 style="margin-left: 30px"><b>TOTAL AMOUNT (LKR)</b></h6></th>
											<td><p style="margin-left: 20px"><?php echo number_format($vessel->TotalAmtLKR, 2, '.', ',') ?><hr style="border: 1px groove #333;"></p></td>
											
										</tr>
										
									</table>
								</div>
							</div>
							<!-- /.col -->
						</div>
						<div class="row ">
							<div class="col-md-12 text-center">
								<h6>*** No Signature Required, Computer Generated Printout ***</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
  window.addEventListener("load", window.print());
</script>
