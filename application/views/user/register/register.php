<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>

		
		<div class="col-md-12">
			<div class="input-group justify-content-center">
				<h3>Registrar Usuario</h3>
			</div>
			<div class="input-group justify-content-center"> 
			<?= form_open() ?>
				<div class="form-group" >
					<input type="text" class="form-control" id="username" name="username" placeholder="Ingrese usuario">
					<footer class="blockquote-footer">Al menos 4 caracteres, letras o números solamente</footer>
					<p class="help-block"></p>
				</div>
				<div class="form-group">
					<input type="email" class="form-control" id="email" name="email" placeholder="Ingrese e-mail">
					<footer class="blockquote-footer">Una dirección de correo electrónico válida</footer>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" id="password" name="password" placeholder="Ingrese contraseña">
					<footer class="blockquote-footer">Al menos 6 caracteres</footer>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirmar contraseña">
					<footer class="blockquote-footer">Debe coincidir con su contraseña</footer>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary float-right" value="Registrar">
				</div>
				</div>

			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->