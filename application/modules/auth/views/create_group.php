<!-- Common Pages -->
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1><?php echo lang('create_group_heading');?></h1>
				</section>

				<!-- Main content -->
				<section class="content">
					<!-- Your Page Content Here -->
					<?php if($message != '') { ?>
					<div class="alert alert-danger alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<p><?php echo $message;?></p>
					</div>
					<?php } ?>
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo lang('create_group_subheading');?></h3>
						</div>
						<!-- /.box-header -->
						<?php echo form_open("auth/create_group");?>
							<div class="box-body">
								<div class="form-group">
									<?php echo lang('create_group_name_label', 'group_name');?> <br />
									<?php echo form_input($group_name);?>
								</div>

								<div class="form-group">
									<?php echo lang('create_group_desc_label', 'description');?> <br />
									<?php echo form_input($description);?>
								</div>

							</div>
							<div class="box-footer">
								<?php echo form_submit('submit', lang('create_group_submit_btn'), 'class="btn btn-primary"');?>
							</div>
						<?php echo form_close();?>
					</div>
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->