<div class="col-lg-12">
	<div class="box box-success">

		<div class="box-header with-border">
		  	<h3 class="box-title"><?php echo lang('edit_orientation_heading');?></h3>
		</div>

		<?php echo form_open('abm/orientaciones/edit/'.$orientaciones['id'],array("class"=>"form-horizontal")); ?>

			<input type="hidden" name="id_plan" value="<?=$orientaciones['id_plan']?>">

			<?php echo $this->template->cargar_input('Nombre', 'nombre', 'text', '*', form_error('nombre'), ($this->input->post('nombre') ? $this->input->post('nombre') : $orientaciones['nombre'])); ?>

			<?php echo $this->template->cargar_submit(); ?>
			
		<?php echo form_close(); ?>		

		<br><br>
	</div>
</div>