<!-- Common Pages -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php //echo lang('edit_user_heading');?></h1>
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
	<div class="row">
		<div class="col-md-11">
			<div class="box">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo lang('edit_user_heading');?></h3>
					</div>

			<!-- /.box-header -->
			<?php echo form_open(uri_string());?>
				<div class="box-body">
					<div class="form-group">
						<?php echo lang('edit_username_label', 'username');?> <br />
						<?php echo form_input($username);?>
					</div>
					<div class="form-group">
						<?php echo lang('edit_user_fname_label', 'first_name');?> <br />
						<?php echo form_input($first_name);?>
					</div>
					<div class="form-group">
						<?php echo lang('edit_user_lname_label', 'last_name');?> <br />
						<?php echo form_input($last_name);?>
					</div>
					<div class="form-group">
						<?php echo lang('edit_user_email_label', 'email');?> <br />
						<?php echo form_input($email);?>
					</div>
					<?php /*
					<div class="form-group">
						<?php echo lang('edit_user_company_label', 'company');?> <br />
						<?php echo form_input($company);?>
					</div>
					 */ ?>
					<div class="form-group">
						<?php echo lang('edit_user_phone_label', 'phone');?> <br />
						<?php echo form_input($phone);?>
					</div>
					<div class="form-group">
						<?php echo lang('edit_user_password_label', 'password');?> <br />
						<?php echo form_input($password);?>
					</div>
					<div class="form-group">
						<?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
						<?php echo form_input($password_confirm);?>
					</div>
					
					<?php  ?>
					<div class="form-group">
						<?php if ($this->ion_auth->is_admin()): ?>
							<h3><?php echo lang('edit_user_groups_heading');?></h3>
							<?php foreach ($groups as $group):?>
							    <label class="checkbox">
							    <?php
							        $gID=$group['id'];
							        $checked = null;
							        $item = null;
							        foreach($currentGroups as $grp) {
							            if ($gID == $grp->id) {
							                $checked= ' checked="checked"';
							            break;
							            }
							        }
							    ?>
							    <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
							    <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
							    </label>
							<?php endforeach?>
						<?php endif ?>
					</div>
					<?php  ?>
					
					<?php echo form_hidden('id', $user->id);?>
						<?php echo form_hidden($csrf); ?>
				</div>
				<?php /*<
				<div class="box-footer">
					<?php echo form_submit('submit', lang('edit_user_submit_btn'), 'class="btn btn-primary"');?>
				</div>
				*/?>
				<div class="col-md-3 col-md-offset-9">
					<button style="border: 1px solid rgba(0,0,0,0.1); box-shadow: inset 0 1px 0 rgba(255,255,255,0.7);" type='submit' class='btn btn-block btn-success btn-md'>Guardar</button>
				</div>
				<br><br>
				<?php echo form_close();?>
			
				</div>
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