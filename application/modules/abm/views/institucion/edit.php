<div class="col-lg-12">
	<div class="box box-success">

		<div class="box-header with-border">
		  	<h3 class="box-title"><?php echo lang('edit_institution_heading');?></h3>
		</div>

		<?php echo form_open('abm/institucion/edit/'.$institucion['id'],array("class"=>"form-horizontal")); ?>
	
			<?php echo $this->template->cargar_input(lang('form_name'), 'razon_social', 'text', '*', form_error('nombre'), ($this->input->post('razon_social') ? $this->input->post('razon_social') : $institucion['razon_social'])); ?>

			<?php echo $this->template->cargar_input(lang('form_cuit'), 'cuit', 'text', '*', form_error('cuit'), ($this->input->post('cuit') ? $this->input->post('cuit') : $institucion['cuit'])); ?>

			<?php echo $this->template->cargar_input(lang('form_address'), 'direccion', 'text', '*', form_error('direccion'), ($this->input->post('direccion') ? $this->input->post('direccion') : $institucion['direccion'])); ?>
			
			<?php echo $this->template->cargar_submit(); ?>
			
		<?php echo form_close(); ?>
		

		<br><br>
	</div>
</div>