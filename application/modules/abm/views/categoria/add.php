<?= $this->template->boton_volver_a('abm/categoria/', 'Categoría'); ?>

<div class="col-lg-12">
	<div class="box box-success">

		<div class="box-header with-border">
		  	<h3 class="box-title"><?php echo lang('create_category_heading');?></h3>
		</div>

		<?php echo form_open('abm/categoria/add',array("class"=>"form-horizontal")); ?>

			<?php echo $this->template->cargar_input(lang('form_name'), 'nombre', 'text', '*', form_error('nombre'), $this->input->post('nombre')); ?>

			<?php echo $this->template->cargar_submit(); ?>

		<?php echo form_close(); ?>		
		<br><br>
	</div>
</div>