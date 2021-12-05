<!-- Main Sidebar Container -->

<?php

if (!isset($active_main_tab))
	$active_main_tab = '';
//die();
?>

<aside class="main-sidebar sidebar-dark-success elevation-4">
	<!-- Brand Logo -->
	<a href="#" class="brand-link">
		<img src="<?php echo base_url() ?>dist/img/dfar_fb_logo.png" alt="AdminLTE Logo"
			 class="brand-image img-circle elevation-3"
			 style="opacity: 1">
		<span class="brand-text font-weight-light"><h3>DFAR</h3></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
				data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

				<li class="nav-item has-treeview ">
					<a href="<?php echo base_url() ?>dashboard"
					   class="nav-link <?php if ($active_tab == 'Dashboard') echo "active" ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview <?php if ($active_main_tab == 'owner') echo "menu-open" ?> ">
					<a href="#" class="nav-link <?php if ($active_main_tab == 'owner') echo "active" ?>">
						<i class="nav-icon fas fa-users"></i>
						<p>
							Vessel Owners
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview ">
						<?php if (in_array(SYS_ADD_OWNERS, $permission_list)) { ?>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>new_owner"
								   class="nav-link <?php if ($active_tab == 'new_owner') echo "active" ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Add New Vessel Owner</p>
								</a>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>owners_list"
							   class="nav-link <?php if ($active_tab == 'view_owner') echo "active" ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Vessel Owners List</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview <?php if ($active_main_tab == 'vessel') echo "menu-open" ?> ">
					<a href="#" class="nav-link <?php if ($active_main_tab == 'vessel') echo "active" ?>">
						<i class="nav-icon fas fa-ship"></i> 
						<p>
							Vessels
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview ">
						<?php if (in_array(SYS_ADD_VESSELS, $permission_list)) { ?>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>new_vessel"
								   class="nav-link <?php if ($active_tab == 'new_vessel') echo "active" ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Add New Vessel</p>
								</a>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>vessel_list"
							   class="nav-link <?php if ($active_tab == 'view_vessel') echo "active" ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Vessels List</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview <?php if ($active_main_tab == 'fishermen') echo "menu-open" ?> ">
					<a href="#" class="nav-link <?php if ($active_main_tab == 'fishermen') echo "active" ?>">
						<i class="nav-icon fas fa-users"></i>
						<p>
							Fishermen
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview ">
						<?php if (in_array(SYS_ADD_FISHERMAN, $permission_list)) { ?>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>new_fishermen"
								   class="nav-link <?php if ($active_tab == 'new_fishermen') echo "active" ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Add New Fisherman</p>
								</a>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>fishermen_list"
							   class="nav-link <?php if ($active_tab == 'view_fishermen') echo "active" ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Fishermen List</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview <?php if ($active_main_tab == 'tranponder') echo "menu-open" ?> ">
					<a href="#" class="nav-link <?php if ($active_main_tab == 'tranponder') echo "active" ?>">
						<i class="nav-icon fas fa-inbox"></i>
						<p>
							Tranponders
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview ">
						<?php if (in_array(SYS_ADD_TRANSPONDER, $permission_list)) { ?>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>new_tranponder"
								   class="nav-link <?php if ($active_tab == 'new_tranponder') echo "active" ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Add New Tranponder</p>
								</a>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>tranponder_list"
							   class="nav-link <?php if ($active_tab == 'view_tranponder') echo "active" ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Tranponder List</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview <?php if ($active_main_tab == 'satellite') echo "menu-open" ?> ">
					<a href="#" class="nav-link <?php if ($active_main_tab == 'satellite') echo "active" ?>">
						<i class="nav-icon fas fa-satellite-dish"></i>
						<p>
							Satellite
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview ">
						<?php if (in_array(SYS_ADD_SATELLITE, $permission_list)) { ?>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>new_satellite"
								   class="nav-link <?php if ($active_tab == 'new_satellite') echo "active" ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Add New Satellite</p>
								</a>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>satellite_list"
							   class="nav-link <?php if ($active_tab == 'view_satellite') echo "active" ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Satellite List</p>
							</a>
						</li>
						<?php if (in_array(SYS_ADD_SATELLITE_BILL, $permission_list)) { ?>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>vessel_list"
								   class="nav-link <?php if ($active_tab == 'satellite_bill') echo "active" ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Satellite Bill</p>
								</a>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>invoice_list"
							   class="nav-link <?php if ($active_tab == 'invoice_list') echo "active" ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Invoice List</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview <?php if ($active_main_tab == 'distress_log') echo "menu-open" ?> ">
					<a href="#" class="nav-link <?php if ($active_main_tab == 'distress_log') echo "active" ?>">
						<i class="nav-icon fas fa-marker"></i>
						<p>
							Distress Log Book
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview ">
						<?php if (in_array(SYS_ADD_LOG, $permission_list)) { ?>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>log_book"
								   class="nav-link <?php if ($active_tab == 'log') echo "active" ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Log Book</p>
								</a>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>log_list"
							   class="nav-link <?php if ($active_tab == 'log_list') echo "active" ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Log List</p>
							</a>
						</li>
<!--						--><?php //if (in_array(SYS_ADD_DEATH, $permission_list)) { ?>
<!--							<li class="nav-item">-->
<!--								<a href="--><?php //echo base_url(); ?><!--death_details"-->
<!--								   class="nav-link --><?php //if ($active_tab == 'death') echo "active" ?><!--">-->
<!--									<i class="far fa-circle nav-icon"></i>-->
<!--									<p>Death Details</p>-->
<!--								</a>-->
<!--							</li>-->
<!--						--><?php //} ?>
					</ul>
				</li>
				<li class="nav-item has-treeview <?php if ($active_main_tab == 'high_sea') echo "menu-open" ?> ">
					<a href="#" class="nav-link <?php if ($active_main_tab == 'high_sea') echo "active" ?>">
						<i class="nav-icon fas fa-file-signature"></i>
						<p>
							High Sea Departure
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview ">
						<?php if (in_array(SYS_ADD_DEPARTURE, $permission_list)) { ?>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>high_sea_departure"
								   class="nav-link <?php if ($active_tab == 'high_sea_departure') echo "active" ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>New Departure</p>
								</a>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>high_sea_form"
							   class="nav-link <?php if ($active_tab == 'high_sea_form') echo "active" ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Departure List</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview <?php if ($active_main_tab == 'transfers') echo "menu-open" ?> ">
					<a href="#" class="nav-link <?php if ($active_main_tab == 'transfers') echo "active" ?>">
						<i class="nav-icon fas fa-list"></i>
						<p>
							Transfers
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview ">
						<?php if (in_array(SYS_ADD_TRANSFERS, $permission_list)) { ?>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>transfers"
								   class="nav-link <?php if ($active_tab == 'transfers') echo "active" ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Transfers</p>
								</a>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>transfer_list"
							   class="nav-link <?php if ($active_tab == 'transfer_list') echo "active" ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Transfer List</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview <?php if ($active_main_tab == 'Administration') echo "menu-open" ?> ">
					<a href="#" class="nav-link <?php if ($active_main_tab == 'Administration') echo "active" ?>">
						<i class="nav-icon fas fa-cogs"></i>
						<p>
							Administration
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview ">
						<li class="nav-item">
							<a href="<?php echo base_url() ?>user/user"
							   class="nav-link <?php if ($active_tab == 'user_list') echo "active" ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Users</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() ?>user/user/user_group_list"
							   class="nav-link <?php if ($active_tab == 'group_list') echo "active" ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>User Roles</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview <?php if ($active_main_tab == 'Reports') echo "menu-open" ?> ">
					<a href="#" class="nav-link <?php if ($active_main_tab == 'Reports') echo "active" ?>">
						<i class="nav-icon fas fa-file-download"></i>
						<p>
							Reports
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview ">
						<?php if (in_array(SYS_VIEW_REPORTS, $permission_list)) { ?>
							<li class="nav-item">
								<a href="<?php echo base_url() ?>reports/high_sea_departure"
								   class="nav-link <?php if ($active_tab == 'high_sea_departure') echo "active" ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>High Sea Departure Report</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url() ?>reports/annual_log"
								   class="nav-link <?php if ($active_tab == 'annual_log') echo "active" ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Log Report</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url() ?>reports/annual_death"
								   class="nav-link <?php if ($active_tab == 'annual_death') echo "active" ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Death Report</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url() ?>reports/annual_vessel"
								   class="nav-link <?php if ($active_tab == 'annual_vessel') echo "active" ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Vessel Report</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url() ?>reports/annual_fisherman"
								   class="nav-link <?php if ($active_tab == 'annual_fisherman') echo "active" ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Fishermen Report</p>
								</a>
							</li>
						<?php } ?>
					</ul>
				</li>
<!--
				<li class="nav-item has-treeview <?php if ($active_main_tab == 'xX') echo "menu-open" ?> ">
					<a href="#" class="nav-link <?php if ($active_main_tab == 'xX') echo "active" ?>">
						<i class="nav-icon fas fa-users"></i>
						<p>
							xX
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview ">
						<?php if (in_array(SYS_ADD_XX, $permission_list)) { ?>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>add_xxv"
								   class="nav-link <?php if ($active_tab == 'add_xxv') echo "active" ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Add XXV</p>
								</a>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>xx_list"
							   class="nav-link <?php if ($active_tab == 'xx_list') echo "active" ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>XXV List</p>
							</a>
						</li>
					</ul>
				</li>-->
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
<body class="hold-transition sidebar-mini layout-fixed">
