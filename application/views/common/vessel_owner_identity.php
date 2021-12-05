<div class="wrapper">
	<!-- Navbar -->

	<!-- /.navbar -->


	<!-- Content Wrapper. Contains page content -->
	<div class="">
		<div class="col-md-6">
			<div class="card bg-light">
				<div class="card-body pt-0">
					<div class="row">
						<div class="col-2 text-center">
							<img src="<?php echo base_url() ?>dist/img/img_1.png" alt="" class="img-circle img-fluid"
								 style="width: 105px">
						</div>
						<div class="col-8 text-center">
							<br>
							<h3>VESSEL OPERATION LICENCE</h3>
							<h5>Department of Fisheries & Aquatic Resources<br/>
								Sri Lanka
							</h5>
						</div>
						<div class="col-2 text-center">
							<img src="<?php echo base_url() ?>dist/img/img.png" alt="" class="img-circle img-fluid"
								 style="width: 105px">
						</div>
					</div>
					<br>
					<div class="row ">
						<div class="col-md-12 text-center">
							<h6><b>THE FISHERIES AND AQUATIC RESOURCES ACT, No. 2 OF 1996</b></h6>
						</div>
					</div>
					<br>
					<div class="card" style="align-items: center">
						<div class="row">
							<div class="col-12">
								<table align="center">
									<tr>
										<td><h2 class="lead"><b>Vessel No </b></td>
										<td><h2 style="margin-left: 10px"
												class="lead">:&nbsp;&nbsp;&nbsp;<?php echo $vessel->vesselNo ?></h2></td>
									</tr>
									<tr>
										<td><h2 class="lead"><b>Vessel Name </b></td>
										<td><h2 style="margin-left: 10px"
												class="lead">:&nbsp;&nbsp;&nbsp;<?php echo $vessel->vesselName ?></h2></td>
									</tr>
									<tr>
										<td><h2 class="lead"><b>Registration Date </b></td>
										<td><h2 style="margin-left: 10px"
												class="lead">:&nbsp;&nbsp;&nbsp;<?php echo $vessel->registrationDate ?></h2></td>
									</tr>
									<?php 
										$regDate = $vessel->registrationDate
										
									?>
									<tr>
										<td><h2 class="lead"><b>Issued Date </b></td>
										<td><h2 style="margin-left: 10px"
												class="lead">:&nbsp;&nbsp;&nbsp;<?php echo date('Y-m-d') ?></h2></td>
									</tr>											
								</table>
							</div>
						</div>
						<div class="row ">
							<div class="col-md-12 text-justify">
								<h6 style="margin-left: 20px; margin-right: 20px"><b>This allows the vessel bearing the above registration number under the Department of Fisheries and Aquatic Resources, Sri Lanka to fish in the high seas. We hereby inform you that if you are found guilty of illegal, unreported and unregulated (IUU) fishing, your operating license will be revoked from that moment.</b></h6>
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
