	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
				<a href="#"><b>Admin </b>Login</a>
			</div>
			<!-- /.login-logo -->
			<div class="login-box-body">
				<p class="login-box-msg"><?php echo lang('login');?></p>

				<div id="infoMessage"><?php echo $message;?></div>

				<?php echo form_open("login");?>
				<div class="form-group has-feedback">
					<?php echo lang('login_identity_label', 'identity');?>
					<?php echo form_input($identity);?>
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<?php echo lang('login_password_label', 'password');?>
					<?php echo form_input($password);?>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>

				<div class="row">
					<div class="col-xs-8">
						<div class="checkbox icheck">
							<label>
								<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
								<?php echo lang('login_remember_label', 'remember');?>
							</label>
						</div>
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
						<p><?php echo form_submit('submit', lang('login_submit_btn'), 'class="btn btn-primary btn-block btn-flat"');?></p>
					</div>
					<!-- /.col -->
				</div>
				<?php echo form_close();?>
				<hr/>
					
				<?php /* 
				<a href="<?php echo base_url();?>auth/forgot_password"><?php echo lang('forgot_my_password');?></a>
				*/	?>

			</div>
			<!-- /.login-box-body -->
		</div>
		<!-- /.login-box -->