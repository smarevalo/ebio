				<!-- Content Wrapper. Contains page content -->
				<div class="content-wrapper">
					<!-- Content Header (Page header) -->
					<section class="content-header">
						<h1>User Profile</h1>
					</section>

					<!-- Main content -->
					<section class="content">

						<div class="row">
							<div class="col-md-3">

								<!-- Profile Image -->
								<div class="box box-primary">
									<div class="box-body box-profile">
										<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/dist/img/avatar.png" alt="profile picture">

										<h3 class="profile-username text-center"><?php echo $user->first_name.' '.$user->last_name; ?></h3>
										<p class="text-center"><?php echo $user->email; ?></p>
									</div>
									<!-- /.box-body -->
								</div>
								<!-- /.box -->

								<!-- About Me Box -->
								<div class="box box-primary">
									<div class="box-header with-border">
										<h3 class="box-title">Contact Detail</h3>
									</div>
									<!-- /.box-header -->
									<div class="box-body">
										<strong><i class="fa fa-building margin-r-5"></i> Name of Company</strong>
										<p class="text-muted"><?php echo $user->company; ?></p>
										<hr>
										<!-- <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>
										<p class="text-muted"><br/></p>
										<hr> -->
										<strong><i class="fa fa-phone margin-r-5"></i> Contact</strong>
										<p class="text-muted"><?php echo $user->phone; ?><br/><?php echo $user->email; ?></p>
									</div>
									<!-- /.box-body -->
								</div>
								<!-- /.box -->
							</div>
							<!-- /.col -->
							<div class="col-md-9">
								<div class="nav-tabs-custom">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#activity" data-toggle="tab">Business Details</a></li>
									</ul>
									<div class="tab-content">
										<div class="active tab-pane" id="activity">
											<!-- Post -->
											<div class="post">
												<div class="user-block">
													<h4 class="text-green">Nature of business<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a></h4>
												</div>
												<!-- /.user-block -->
												<p></p>
											</div>
											<div class="post">
												<div class="user-block">
													<h4 class="text-green">Comapny registration number<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a></h4>
												</div>
												<!-- /.user-block -->
												<p></p>
											</div>
											<!-- /.post -->
										</div>
										<!-- /.tab-pane -->
									</div>
									<!-- /.tab-content -->
								</div>
								<!-- /.nav-tabs-custom -->
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

					</section>
					<!-- /.content -->
				</div>
				<!-- /.content-wrapper -->