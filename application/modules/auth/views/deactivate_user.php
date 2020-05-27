<!-- Common Pages -->
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1><?php echo lang('deactivate_heading');?></h1>
				</section>

				<!-- Main content -->
				<section class="content">
					<!-- Your Page Content Here -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></h3>
						</div>
						<!-- /.box-header -->
						<?php echo form_open("auth/deactivate/".$user->id);?>
							<div class="box-body">
								<div class="form-group">
									<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
									<input type="radio" name="confirm" value="yes" checked="checked" /> 
									&nbsp;
									<?php echo lang('deactivate_confirm_n_label', 'confirm');?>
									<input type="radio" name="confirm" value="no" />
								</div>
								<?php echo form_hidden($csrf); ?>
								<?php echo form_hidden(array('id'=>$user->id)); ?>
							</div>
							<div class="box-footer">
								<?php echo form_submit('submit', lang('deactivate_submit_btn'), 'class="btn btn-primary"');?>
							</div>
						<?php echo form_close();?>
					</div>
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->