<div class="wrapper">
	<!-- Navbar -->

	<!-- /.navbar -->


	<!-- Content Wrapper. Contains page content -->
	<div class="">
		<div class="col-md-6">
			<div class="card bg-light">
				<div class="card-body pt-0">
					<div class="row">
							<div class="col-md-12">
								<div class="form-group row">
									<label class="col-md-3 col-form-label"></label>
									<div class="col-md-9">												
									</div>
								</div>
							</div>
						<div class="col-2 text-center">
							<img src="<?php echo base_url() ?>dist/img/img_1.png" alt="" class="img-circle img-fluid"
								 style="width: 105px">
						</div>
						<div class="col-8 text-center">
							<br>
							<h3><?php echo $fisherman->occupation == "Skipper" ?"SKIPPER LICENCE":"FISHERMEN IDENTITY CARD" ?></h3>
							<h5>Department of Fisheries & Aquatic Resources</h5>
							<h5>Sri Lanka</h5>
							<h6>(Valid for Fishing Vessels Registered in Sri Lanka Only)</h6>
						</div>
						<div class="col-2 text-center">
							<img src="<?php echo base_url() ?>dist/img/img.png" alt="" class="img-circle img-fluid"
								 style="width: 105px">
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<table align="center">
								<tr>
									<td ><h2 class="lead"><b>Fisheries ID No </b></td>
									<td><h2 class="lead">: &nbsp;&nbsp;&nbsp;<?php echo $fisherman->fisheriesIDNo ?></h2></td>
								</tr>
								<tr>
									<td><h2 class="lead"><b>Name </b></td>
									<td><h2 class="lead">: &nbsp;&nbsp;&nbsp;<?php echo $fisherman->nameWithInitials ?></h2></td>
								</tr>
								<tr>
									<td><h2 class="lead"><b>Fishing Vessel Category </b></td>
									<td><h2 class="lead">: &nbsp;&nbsp;&nbsp;<?php echo "IMUL" ?></h2></td>
								</tr>
								<tr>
									<td><h2 class="lead"><b>Address </b></td>
									<td>
										<!-- <h2 class="lead">: <?php echo $fisherman->addressHouse . " " . $fisherman->addressStreetName . " " . $fisherman->addressCity ?></h2> -->
										<h2 class="lead">: &nbsp;&nbsp;&nbsp;<?php echo $fisherman->addressHouse ?> <br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fisherman->addressStreetName ?> <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fisherman->addressCity ?> </h2>
										
										
									</td>
								</tr>
								<tr>
									<td><h2 class="lead"><b>NIC </b></td>
									<td><h2 class="lead">: &nbsp;&nbsp;&nbsp;<?php echo $fisherman->nic ?></h2></td>
								</tr>
								<tr>
									<td><h2 class="lead"><b>Date of Registration </b></td>
									<td><h2 class="lead">: &nbsp;&nbsp;&nbsp;<?php echo $fisherman->registrationDate ?></h2></td>
								</tr>
								<tr>
									<td><h2 class="lead"><b>Date of Issue </b></td>  <!-- "d-M-Y" -->
									<td><h2 class="lead">: &nbsp;&nbsp;&nbsp;<?php echo date("Y-m-d") ?></h2></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	window.addEventListener("load", window.print());
</script>
