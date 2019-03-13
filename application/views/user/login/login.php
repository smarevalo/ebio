<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
	
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>

		
		<div class="col-md-12"><br><br><br><br>
			<div class="input-group justify-content-center">
				<h3>Login</h3>
			</div>
			<div class="input-group justify-content-center">
			 
			<?= form_open() ?>
				<div style="height: 200px; width: 400px">
					
					<div class="form-group">
						<input type="text" class="form-control" id="username" name="username" placeholder="Ingrese su usuario">
					</div>
					
					<div class="form-group">
						<input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña">
					</div>
					
					<div class="form-group">
						<input type="submit" class="btn btn-primary float-right" value="Enviar">
					</div>
				</div>
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->

