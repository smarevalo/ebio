<!-- Common Pages -->			
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>Admin Control Panel</h1>
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Your Page Content Here -->
					<div id="infoMessage"></div>
					<div class="row">
						<div class="col-xs-12">
							<div class="box">
								<div class="box-header">
									<h3 class="box-title">Distributor List</h3>
									<div class="box-tools pull-right">
										<div class="btn-group">
											<?php echo anchor('admin/add_distributor/', '<i class="fa fa-plus text-green"></i> Add','class="btn btn-default "');?>
										</div>
									</div>
								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Full Name</th>
												<th>Contact Number</th>
												<th>Email ID</th>
												<th>Comapny Name</th>
												<th>Address</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($result as $user) { ?>
											<tr>
												<td><?php echo $user->full_name; ?></td>
												<td><?php echo $user->phone; ?></td>
												<td><?php echo $user->email; ?></td>
												<td><?php echo $user->company_name; ?></td>
												<td><?php echo $user->address."<br/>".$user->city."-".$user->pincode."<br/>".$user->state; ?></td>
												<td><?php echo $user->status==1 ? anchor("admin/deactivate/".$user->id, '<span class="btn btn-danger btn-xs">Deactivate</span>') : anchor("admin/activate/". $user->id, '<span class="btn btn-primary btn-xs">Activate</span>');?></td>
												<td class="text-center">
													<a href="<?php echo site_url('admin/view_profile/'.$user->id); ?>">
														<span class="btn btn-success btn-xs">View Profile</span>
													</a>
													<div class="clearfix"></div>
													<br/>
													<a href="<?php echo site_url('admin/edit_distributor/'.$user->id); ?>">
														<img src="<?php echo base_url('assets/dist/img/ico_edit.png'); ?>">
													</a>
													<a href="javascript: if(confirm('Do you really want to delete this level?')){
														window.location='<?php echo site_url('admin/remove_user/'.$user->id); ?>';}">
														<img src="<?php echo base_url('assets/dist/img/ico_delete.png'); ?>">
													</a>
												</td>
											</tr>
											<?php }?>
										</tbody>
										<tfoot>
											<tr>
												<th>Full Name</th>
												<th>Contact Number</th>
												<th>Email ID</th>
												<th>Comapny Name</th>
												<th>Address</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</tfoot>
									</table>
								</div>
								<!-- /.box-body -->
							</div>
							<!-- /.box -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->