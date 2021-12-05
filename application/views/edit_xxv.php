<div class="wrapper">
<div class="content-wrapper">
    <section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h4>Edit XXV</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?php echo base_url()?>dashboard">Home</a></li>
							<li class="breadcrumb-item active">Edit XXV</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
    </section>

<section class="content"> 
    <div class="container-fluid">
		<div class="row">
			<div class="card"> 
                <form autocomplete="off" id="xx_data" name="xx_data" class="form-horizontal" action="" method="post">
                <div class="card-header">
								<?php if (isset($msg) && $msg != "") { ?>
									<div class="alert alert-success" role="alert">
										<?php echo $msg; ?>
									</div>

								<?php } ?>
								<h4 class="m-t-0">Personal Information</h4>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">XX Type </label>
											<div class="col-md-9">
												<select class="form-control" name="xxType" id="xxType">
													<?php foreach ($harbours->result() as $row) { ?>
														<option value="<?php  echo $row->harbour ?>" <?php echo $old_data->xxType ==$row->harbour ? "selected" : "" ?>> <?php echo $row->harbour?></option>
													<?php } ?>
												</select>
												<span id="districtOffice_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">XX Name</label>
											<div class="col-md-9">
												<input type="text" id="xxName" name="xxName"
													   class="form-control"
													   placeholder="Name with Initials (H M Perera)" value="<?php echo $old_data->xxName ?>" required/>
													   <span id="ownerName_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">XX No</label>
											<div class="col-md-9">
												<input type="text" id="xxNo" name="xxNo" class="form-control"
													   placeholder="123456789V / 123456789123" value="<?php echo $old_data->xxNo ?>" required/>
												<span id="nic_span" style="font-size:14px; color:red;"></span>
											</div>
										</div>
									</div>
																
									
									
								</div>

								<div class="card-footer">
									<button id="btn_submit" name="btn_submit" class="btn btn-primary float-right">Edit XX
									</button>
								</div>
							</div>
                </form>

            </div>
        </div>
    </div>
</section>

</div>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/src/jquery-key-restrictions.js"></script>
<!--
<script type="text/javascript" src="<?php echo base_url() ?>js/add_xx_js.js"></script>-->