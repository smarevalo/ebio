<?php if(isset($alerta))  {  
	echo $alerta;
	} 
?>

<div class="col-lg-12">
	<div class="box box-success">

		<div class="box-header with-border">
		  	<h3 class="box-title"><?php echo lang('edit_school_heading');?></h3>
		</div>

		<?php echo form_open_multipart('abm/escuela/edit/'.$escuela['id'],array("class"=>"form-horizontal")); ?>


			<?php echo $this->template->cargar_input(lang('form_name'), 'nombre', 'text', '*', form_error('nombre'), ($this->input->post('nombre') ? $this->input->post('nombre') : $escuela['nombre'])); ?>

			<?php echo $this->template->cargar_input(lang('form_university'), 'universidad', 'text', '*', form_error('universidad'), ($this->input->post('universidad') ? $this->input->post('universidad') : $escuela['universidad'])); ?>

			<?php echo $this->template->cargar_input(lang('form_director'), 'director', 'text', '*', form_error('director'), ($this->input->post('director') ? $this->input->post('director') : $escuela['director'])); ?>

			<?php echo $this->template->cargar_input(lang('form_color'), 'color', 'color', '*', form_error('color'), ($this->input->post('color') ? $this->input->post('color') : $escuela['color'])); ?>

			<?php echo $this->template->cargar_submit(); ?>
					
		<?php echo form_close(); ?>

		<br><br>
	</div>
</div>