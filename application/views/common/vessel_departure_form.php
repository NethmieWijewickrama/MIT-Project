<div class="wrapper">
	<!-- Navbar -->

	<!-- /.navbar -->


	<!-- Content Wrapper. Contains page content -->
	<div class="">
		<div class="col-md-12">
			<div class="card bg-light">
				<div class="card-body pt-0">
					<div class="row">
						<div class="col-3 text-right">
							<img src="<?php echo base_url() ?>dist/img/img_1.png" alt="" class="img-circle img-fluid"
								 style="width: 105px">
						</div>
						<div class="col-6 text-center">
							<br>
							<h3>VESSEL HIGH SEA DEPARTURE FORM</h3>
							<h5>Department of Fisheries & Aquatic Resources <br/>
								Sri Lanka
							</h5>
						</div>
						<div class="col-3 text-left">
							<img src="<?php echo base_url() ?>dist/img/img.png" alt="" class="img-circle img-fluid"
								 style="width: 105px">
						</div>
					</div>
					<div class="col-md-12">
							<div class="form-group row">							
							</div>
					</div>					
					<div class="row ">
						<div class="col-md-12 text-center">
							<h6><b>THE FISHERIES AND AQUATIC RESOURCES ACT, No. 2 OF 1996</b></h6>
						</div>
					</div>										
					<div class="card col-md-12" style="align-items: center">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group row">							
								</div>
							</div>
							<div class="col-12">
								<table>
									<tr>
										<td><h3 class="lead"><b>Active Code </b></h3></td>
										<td><h3 style="margin-left: 30px"
												class="lead">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $departure->activeCode ?></h3></td>
									</tr>
									<tr>
										<td><h3 class="lead"><b>Vessel Registration No </b></h3></td>
										<td><h3 style="margin-left: 30px"
												class="lead">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $departure->vesselNo ?></h3></td>
									</tr>
									<tr>
										<td><h3 class="lead"><b>Departure Harbour </b></h3></td>
										<td><h3 style="margin-left: 30px"
												class="lead">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $departure->harbour ?></h3></td>
									</tr>
									<tr>
										<td><h3 class="lead"><b>Departure Date </b></h3></td>
										<td>
											<h3 style="margin-left: 30px"
												class="lead">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $departure->departureDate ?></h3>
										</td>
									</tr>
									<tr>
										<td><h3 class="lead"><b>Fishing Gear </b></h3></td>
										<td><h3 style="margin-left: 30px"
												class="lead">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $departure->fishingGear ?></h3></td>
									</tr>
									<tr>
										<td><h3 class="lead"><b>Name of the Skipper </b></h3></td>
										<td><h3 style="margin-left: 30px"
												class="lead">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $departure->nameWithInitials ?></h3></td>
									</tr>
									<tr>
										<td><h3 class="lead"><b>Skipper ID No </b></h3></td>
										<td><h3 style="margin-left: 30px"
												class="lead">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $departure->fisheriesIDNo ?></h3></td>
									</tr>
									<tr>
										<td><h3 class="lead"><b>Skipper NIC </b></h3></td>
										<td><h3 style="margin-left: 30px"
												class="lead">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $departure->nic ?></h3></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="row">
							<row style="display: flex; justify-content: center">
								<div class="col-md-12">
									<div class="card-body form-group col-sm-12">
										<h6 align="center"> |---------- Details of Crew Members ----------| </h6>
										<table id="data_table" class="table table-bordered table-striped">
											<thead>
											<tr align="center">
												<th width="200">ID</th>
												<th width="200">Name</th>
												<th width="200">NIC</th>
											</tr>
											</thead>
											<tbody>
											<?php foreach ($fishermans->result() as $fisherman) { ?>
												<tr>
													<td><?php echo $fisherman->fisheriesIDNo ?></td>
													<td><?php echo $fisherman->nameWithInitials ?></td>
													<td><?php echo $fisherman->nic ?></td>
												</tr>
											<?php } ?>
											</tbody>
										</table>

									</div>
								</div>
							</row>
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

<script type="text/javascript">
	// window.addEventListener("load", window.print());
</script>
