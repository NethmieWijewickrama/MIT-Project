<div class="wrapper">
<div class="content-wrapper">
    <section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h4>Add XXV</h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?php echo base_url()?>dashboard">Home</a></li>
							<li class="breadcrumb-item active">Add XXV</li>
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
                       
                        <h4 class="m-t-0">XX Personal Information</h4>
                    </div>

                    <div class="card-body">
					    <div class="row">


						    <div class="col-md-6">
							    <div class="form-group row">
                                    <label class="col-md-3 col-form-label">XX Type </label>
								    <div class="col-md-9">
								        <select class="form-control" name="xxtype" id="xxtype">
									    <option value="" disabled selected>- Select -</option>
                                        <?php foreach ($harbours->result() as $row) { ?>
														<option value="<?php  echo $row->harbour ?>"><?php echo $row->harbour?></option>
													<?php } ?>
                                        </select> 
                                        <span id="xxtype_span" style="font-size:14px; color:red;"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
							    <div class="form-group row">
                                    <label class="col-md-3 col-form-label">XX Name </label>
								    <div class="col-md-9">
                                        <input type="text" id="xxname" name="xxname"
											class="form-control"
											placeholder="Name" required/> 
                                        <span id="xxname_span" style="font-size:14px; color:red;"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
							    <div class="form-group row">
                                    <label class="col-md-3 col-form-label">XX No </label>
								    <div class="col-md-9">
                                        <input type="text" id="xxno" name="xxno"
											class="form-control"
											 required/> 
                                        <span id="xxno_span" style="font-size:14px; color:red;"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
							    <div class="form-group row">
                                    <label class="col-md-3 col-form-label">dep name1 </label>
								    <div class="col-md-9">
                                        <input type="text" id="xxdep1name" name="xxdep1name"
											class="form-control"
											 required/> 
                                        <span id="xxno_span" style="font-size:14px; color:red;"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
							    <div class="form-group row">
                                    <label class="col-md-3 col-form-label">xxdep1contact </label>
								    <div class="col-md-9">
                                        <input type="text" id="xxdep1contact" name="xxdep1contact"
											class="form-control"
											 required/> 
                                        <span id="xxno_span" style="font-size:14px; color:red;"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
							    <div class="form-group row">
                                    <label class="col-md-3 col-form-label">xxdep1addhouse </label>
								    <div class="col-md-9">
                                        <input type="text" id="xxdep1addhouse" name="xxdep1addhouse"
											class="form-control"
											 required/> 
                                        <span id="xxno_span" style="font-size:14px; color:red;"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
							    <div class="form-group row">
                                    <label class="col-md-3 col-form-label">xxdep1addstreet </label>
								    <div class="col-md-9">
                                        <input type="text" id="xxdep1addstreet" name="xxdep1addstreet"
											class="form-control"
											 required/> 
                                        <span id="xxno_span" style="font-size:14px; color:red;"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
							    <div class="form-group row">
                                    <label class="col-md-3 col-form-label">xxdep1addcity </label>
								    <div class="col-md-9">
                                        <input type="text" id="xxdep1addcity" name="xxdep1addcity"
											class="form-control"
											 required/> 
                                        <span id="xxno_span" style="font-size:14px; color:red;"></span>
                                    </div>
                                </div>
                            </div>


                        </div>  
                    </div>    
                        
                        <div class="card-footer">
							<button id="btn_submit" name="btn_submit" class="btn btn-primary float-right">Save XX				
							</button>
						</div>


                    <!--</div>-->
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