<!-- Top Navbar/Header Section -->	
	<body class="hold-transition skin-green sidebar-mini">
		<div class="wrapper">
			<!-- Main Header -->
			<header class="main-header">
				<!-- Logo -->
				<a href="<?= site_url('auth'); ?>" class="logo">
					 <!-- mini logo for sidebar mini 50x50 pixels -->
					 <span class="logo-mini"><b>A</b>P</span>
					 <!-- logo for regular state and mobile devices -->
					 <span class="logo-lg"><b>ADMIN PANEL</b></span>
				</a>

				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>

					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<?php $user = $this->ion_auth->user()->row(); ?>
						<ul class="nav navbar-nav">
							<!-- Messages: style can be found in dropdown.less -->							
							<!-- User Account Menu -->
							<li class="dropdown user user-menu">
								<!-- Menu Toggle Button -->
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<!-- The user image in the navbar -->
									<img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image">
									<!-- hidden-xs hides the username on small devices so only the image appears. -->
									<span class="hidden-xs text-uppercase"><?php echo $user->first_name.' '.$user->last_name; ?></span>
								</a>
								<ul class="dropdown-menu">
									<!-- The user image in the menu -->
									<li class="user-header">
										<img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image">
										<p><?php echo $user->first_name.' '.$user->last_name; ?><br/><?php echo $user->email; ?></p>
									</li>
									<li>
										<a href="<?php echo base_url();?>auth/change_password" class="btn btn-default btn-flat" ><span>Modificar Contraseña</span></a>
									</li>
									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="text-center">
											<a href="<?php echo base_url();?>logout" class="btn btn-default btn-flat">Salir</a>
										</div>
									</li>
								</ul>
							</li>
							<!-- Control Sidebar Toggle Button -->
							<!-- <li>
								<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
							</li> -->
						</ul>
					</div>
				</nav>
			</header>