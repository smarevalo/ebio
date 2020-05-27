<?= $this->template->boton_volver_a('abm/docente/', 'Docentes'); ?>

<div class="col-lg-12">
	<div class="box box-success">

		<div class="box-header with-border">
		  	<h3 class="box-title"><?php echo lang('edit_teacher_heading');?></h3>
		</div>

		<?php echo form_open('abm/docente/edit/'.$docente['id'],array("class"=>"form-horizontal")); ?>


			<?php echo $this->template->cargar_input(lang('form_last_name'), 'apellido', 'text', '*', form_error('apellido'), ($this->input->post('apellido') ? $this->input->post('apellido') : $docente['apellido'])); ?>

			<?php echo $this->template->cargar_input(lang('form_name'), 'nombre', 'text', '*', form_error('nombre'), ($this->input->post('nombre') ? $this->input->post('nombre') : $docente['nombre'])); ?>

			<?php echo $this->template->cargar_input(lang('form_second_name'), 'nombre_2', 'text', '', form_error('nombre_2'), ($this->input->post('nombre_2') ? $this->input->post('nombre_2') : $docente['nombre_2'])); ?>

			<?php echo $this->template->cargar_input(lang('form_dni'), 'dni', 'text', '', form_error('dni'), ($this->input->post('dni') ? $this->input->post('dni') : $docente['dni'])); ?>

			<?php echo $this->template->cargar_input(lang('form_cuit'), 'cuit', 'text', '', form_error('cuit'), ($this->input->post('cuit') ? $this->input->post('cuit') : $docente['cuit'])); ?>

			<?php echo $this->template->cargar_input(sprintf(lang('form_email'),'1'), 'email1', 'text', '*', form_error('email1'), ($this->input->post('email1') ? $this->input->post('email1') : $docente['email1'])); ?>

			<?php echo $this->template->cargar_input(sprintf(lang('form_email'),'2'), 'email2', 'text', '', form_error('email2'), ($this->input->post('email2') ? $this->input->post('email2') : $docente['email2'])); ?>

			<?php echo $this->template->cargar_select(lang('form_category'), 'id_docente_categoria', '*', form_error('id_docente_categoria'), $categorias, $docente['id_docente_categoria']); ?>

			<?php echo $this->template->cargar_textarea(lang('form_description'), 'descripcion', '', form_error('descripcion'), ($this->input->post('descripcion') ? $this->input->post('descripcion') : $docente['descripcion'])); ?>
			
			<?php echo $this->template->cargar_submit(); ?>
			
		<?php echo form_close(); ?>
		

		<br><br>
	</div>
</div>