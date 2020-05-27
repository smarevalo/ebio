<div class="col-lg-12">
	<div class="box box-success">

		<div class="box-header with-border">
		  	<h3 class="box-title"><?php echo lang('edit_project_heading');?></h3>
		</div>

		<?php echo form_open('abm/proyecto/edit/'.$proyecto['id'],array("class"=>"form-horizontal")); ?>

			<?php echo $this->template->cargar_select(lang('form_project_type'), 'id_tipo', '*', form_error('id_tipo'), $tipos_proyecto, $proyecto['id_tipo']); ?>

			<?php echo $this->template->cargar_select(lang('form_institution'), 'id_institucion', '*', form_error('id_institucion'), $instituciones, $proyecto['id_institucion']); ?>

			<?php echo $this->template->cargar_select(lang('form_tutor'), 'id_tutor', '*', form_error('id_tutor'), $tutores, $proyecto['id_tutor']); ?>

			<?php echo $this->template->cargar_select(lang('form_student'), 'id_estudiante', '*', form_error('id_estudiante'), $estudiantes, $proyecto['id_estudiante']); ?>

			<?php echo $this->template->cargar_input(lang('form_title'), 'titulo', 'text', '', form_error('titulo'), ($this->input->post('titulo') ? $this->input->post('titulo') : $proyecto['titulo'])); ?>
			
			<?php echo $this->template->cargar_textarea(lang('form_observations'), 'observaciones', '', form_error('observaciones'), ($this->input->post('observaciones') ? $this->input->post('observaciones') : $proyecto['observaciones'])); ?>
			
			<?php echo $this->template->cargar_submit(); ?>
			
		<?php echo form_close(); ?>		

		<br><br>
	</div>
</div>