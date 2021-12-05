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
						<h4>XX List</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">XX List</li>
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
									<tr align="center">
                                        <th>No.</th>
										<th>XX type</th>
										<th>Name</th>
										<th>No</th>
										<!--<th>Dep1</th>
										<th>Dep2</th>-->
                                        <th>Action</th>											
									</tr>
									</thead>
									<tbody>

									<?php foreach ($xx_details->result() as $xxresult) { ?>

										<tr class="odd gradeX">
                                            <td><?php echo $xxresult->xxID; ?></td>
                                            <td><?php echo $xxresult->xxType; ?></td>											
											<td><?php echo $xxresult->xxName; ?></td>
											<td><?php echo $xxresult->xxNo; ?></td>
											<!--<td><?php echo $xxresult->depname1; ?></td>
											<td><?php echo $xxresult->depname2;?></td>  -->                                       										
											
											<td>
												<div class="row" style="justify-content: space-around">
													<a href="<?php echo base_url() ?>edit_xxv?xxID=<?php echo base64_encode($xxresult->xxID) ?>">
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