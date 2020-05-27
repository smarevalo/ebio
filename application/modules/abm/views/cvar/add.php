<?= $this->template->boton_atras(); ?>

<div class="col-lg-12">
	<div class="box box-success">

		<div class="box-header with-border">
		  	<h3 class="box-title"><?php echo lang('create_cvar_heading');?></h3>
		</div>

		<?php echo form_open('abm/docente/add',array("class"=>"form-horizontal")); ?>

			<?php echo $this->template->cargar_input(lang('form_last_name'), 'apellido', 'text', '*', form_error('apellido'), $this->input->post('apellido')); ?>

			<?php echo $this->template->cargar_input(lang('form_name'), 'nombre', 'text', '*', form_error('nombre'), $this->input->post('nombre')); ?>
			
			<?php echo $this->template->cargar_input(lang('form_second_name'), 'nombre_2', 'text', '', form_error('nombre_2'), $this->input->post('nombre_2')); ?>

			<?php echo $this->template->cargar_input(lang('form_dni'), 'dni', 'text', '', form_error('dni'), $this->input->post('dni')); ?>

			<?php echo $this->template->cargar_input(lang('form_cuit'), 'cuit', 'text', '', form_error('cuit'), $this->input->post('cuit')); ?>

			<?php echo $this->template->cargar_input(sprintf(lang('form_email'),'1'), 'email1', 'text', '*', form_error('email1'), $this->input->post('email1')); ?>

			<?php echo $this->template->cargar_input(sprintf(lang('form_email'),'2'), 'email2', 'text', '', form_error('email2'), $this->input->post('email2')); ?>
				
			<?php echo $this->template->cargar_select(lang('form_category'), 'id_docente_categoria', '*', form_error('id_docente_categoria'), $categorias, $this->input->post('id_docente_categoria')); ?>

			<?php echo $this->template->cargar_textarea(lang('form_description'), 'descripcion', '', form_error('descripcion'), $this->input->post('descripcion')); ?>
			
			<?php echo $this->template->cargar_submit(); ?>

		<?php echo form_close(); ?>		

		<br><br><br><br>
	</div>
</div>