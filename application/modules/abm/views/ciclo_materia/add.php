<?= $this->template->boton_atras(); ?>

<div class="col-lg-12">
	<div class="box box-success">

		<div class="box-header with-border">
		  	<h3 class="box-title"><?php echo lang('create_course_heading');?></h3>
		</div>

		<?php echo form_open_multipart('abm/ciclo_materia/add',array("class"=>"form-horizontal")); ?>

		<?php echo $this->template->cargar_select(lang('form_cycle'), 'id_ciclo', '*', form_error('id_ciclo'), $ciclos, $this->input->post('id_ciclo')); ?>

		<?php echo $this->template->cargar_input(lang('form_name'), 'materia', 'text', '*', form_error('materia'), $this->input->post('materia')); ?>

		<?php echo $this->template->cargar_select(lang('form_type'), 'id_tipo', '*', form_error('id_tipo'), $tipos, $this->input->post('id_tipo')); ?>

		<?php echo $this->template->cargar_select(lang('form_regimen'), 'id_regimen', '*', form_error('id_regimen'), $regimenes, $this->input->post('id_regimen')); ?>

		<?php echo $this->template->cargar_input(lang('form_hours'), 'horas', 'text', '', form_error('horas'), $this->input->post('horas')); ?>

		<?php echo $this->template->cargar_input(lang('form_total_hours'), 'hs_total', 'text', '', form_error('hs_total'), $this->input->post('hs_total')); ?>

		<?php echo $this->template->cargar_input(lang('form_program'), 'programa', 'file', '', form_error('programa'), $this->input->post('programa')); ?>
		
		<?php echo $this->template->cargar_select(lang('form_year'), 'anio', '*', form_error('anio'), $anios, $this->input->post('anio')); ?>

		<?php echo $this->template->cargar_input(lang('form_code'), 'codigo', 'text', '*', form_error('codigo'), $this->input->post('codigo')); ?>
		<input type="hidden" name="plan" value="<?= $id_plan ?>" >
		
		<?php echo $this->template->cargar_submit(); ?>
		
	<?php echo form_close(); ?>

		<br><br>
	</div>
</div>



