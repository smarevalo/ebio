<!-- Common Pages -->			
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php //echo lang('index_heading');?></h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Your Page Content Here -->
		<?php if($message != '') { ?>
		<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<p><?php echo $message;?></p>
		</div>
		<?php } ?>

		<?php echo $this->template->boton_nuevo('auth/create_user', 'Nuevo Usuario'); ?>
		<br><br>
		<div class="row">
			<div class="col-md-11">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><?php echo lang('index_heading');?></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="tabla" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th><?php echo lang('username');?></th>
									<th><?php echo lang('index_fname_th');?></th>
									<th><?php echo lang('index_lname_th');?></th>
									<th><?php echo lang('index_email_th');?></th>
									<th><?php echo lang('index_groups_th');?></th>
									<th><?php echo lang('index_status_th');?></th>
									<th><?php echo lang('index_action_th');?></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($users as $user):?>
								<tr>
									<td><?php echo htmlspecialchars($user->username,ENT_QUOTES,'UTF-8');?></td>
									<td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
									<td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
									<td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
									<td><?php foreach ($user->groups as $group):?>
										<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
										<?php endforeach?></td>
									<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link'), array('class'=>'btn btn-success btn-xs')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'), array('class'=>'btn btn-danger btn-xs'));?></td>
									<td><?php echo anchor("auth/edit_user/".$user->id, '<span class="btn btn-primary btn-xs">Editar</span>') ;?></td>
								 </tr>
								 <?php endforeach;?>
							</tbody>
							<tfoot>
								<tr>
									<th><?php echo lang('username');?></th>
									<th><?php echo lang('index_fname_th');?></th>
									<th><?php echo lang('index_lname_th');?></th>
									<th><?php echo lang('index_email_th');?></th>
									<th><?php echo lang('index_groups_th');?></th>
									<th><?php echo lang('index_status_th');?></th>
									<th><?php echo lang('index_action_th');?></th>
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