<div class="form-group">
	<label for="<?= $nombre; ?>" class="col-md-2 control-label">
		<span class="text-danger"><?php echo (empty($obligatorio))?'':'*'; ?></span>
		<?= $label; ?>
	</label>
	<div class="col-md-8">
		<input type="<?= $type; ?>" name="<?= $nombre; ?>" value="<?= $value; ?>" class="form-control col-md-2" id="<?= $nombre; ?>" />
		<span class="text-danger"><?php echo $error;?></span>
		<p class="help-block"><b><?php if (isset($mensaje)) echo $mensaje; ?></b></p>
	</div>
</div>