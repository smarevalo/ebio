<div class="form-group">
	<label for="<?= $nombre; ?>" class="col-md-2 control-label">
		<span class="text-danger"><?php echo (empty($obligatorio))?'':'*'; ?></span>
		<?= $label; ?>
	</label>
	<div class="col-md-8">
		<textarea name="<?= $nombre; ?>" class="form-control" id="<?= $nombre; ?>"><?= $descripcion; ?></textarea>
		<span class="text-danger"><?= $error;?></span>
	</div>
</div>
