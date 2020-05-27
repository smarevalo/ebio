<?= $this->template->boton_volver_a('abm/cursos/', 'Cursos'); ?>

<div class="col-lg-12">
	<div class="box box-success">

		<div class="box-header with-border">
		  	<h3 class="box-title"><?php echo lang('create_schedule_heading');?></h3>
		</div>

		<?php echo form_open_multipart('abm/cursos/add',array("class"=>"form-horizontal")); ?>

			<?php echo $this->template->cargar_input(lang('form_name'), 'nombre', 'text', '*', form_error('nombre'), $this->input->post('nombre')); ?>
			
			<?php echo $this->template->cargar_input(lang('form_start'), 'fecha_inicio', 'date', '*', form_error('fecha_inicio'), $this->input->post('fecha_inicio')); ?>

			<?php echo $this->template->cargar_input(lang('form_end'), 'fecha_fin', 'date', '*', form_error('fecha_fin'), $this->input->post('fecha_fin')); ?>

			<?php echo $this->template->cargar_input(lang('form_modality'), 'modalidad', 'text', '', form_error('modalidad'), $this->input->post('modalidad')); ?>

			<?php echo $this->template->cargar_input(lang('form_link'), 'enlace', 'text', '', form_error('enlace'), $this->input->post('enlace')); ?>

			<?php echo $this->template->cargar_input(lang('form_teacher_schedule'), 'profesor', 'text', '', form_error('profesor'), $this->input->post('profesor')); ?>

			<div class="form-group">
				<label for="esta_publicado" class="col-md-3 control-label"><span class="text-danger">*</span>Publicar</label>
				<input type="checkbox" name="publicado" id="publicado" value="1">
			</div>
			
			<?php echo $this->template->cargar_submit(); ?>

		<?php echo form_close(); ?>		

		<br><br>
	</div>
</div>