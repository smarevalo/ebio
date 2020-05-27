<div class="form-group">
	<label for="<?= $nombre; ?>" class="col-md-2 control-label">
		<span class="text-danger"><?php echo (empty($obligatorio))?'':'*'; ?></span>
		<?= $label; ?></label>
	<div class="col-md-8">
		<select id="<?= $nombre; ?>" name="<?= $nombre; ?>" class="form-control">
			<?php 
				echo (empty($obligatorio))?'<option value="" selected="selected"></option>':'';
				foreach($array as $item)
				{
					$selected = ($item->id == $comp) ? ' selected="selected"' : "";
					echo '<option value="'.$item->id.'" '.$selected.'>'.$item->nombre.'</option>';
				} 
			?>
		</select>
	</div>
</div>