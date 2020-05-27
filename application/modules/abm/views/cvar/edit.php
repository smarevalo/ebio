<?php if(isset($alerta))  {  
	echo $alerta;
	} 
?>
<?= $this->template->boton_volver_a('abm/docente/', 'Docentes'); ?>

<div class="col-lg-12">
	<div class="box box-success">

		<div class="box-header with-border">
		  	<h3 class="box-title"><?php echo lang('edit_cvar_heading');?></h3>
		</div>

		<?php echo form_open('abm/cvar/edit/'.$docente['id'],array("class"=>"form-horizontal")); ?>

		    	<?php echo $this->template->get_perfil_docente($docente['id']); ?>

		    	<?php echo $this->template->cargar_textarea(lang('form_area'), 'areas', '', form_error('areas'), ($this->input->post('areas') ? $this->input->post('areas') : $cvar['areas'])); ?>

				<?php echo $this->template->cargar_textarea(lang('form_expertes'), 'experticia', '', form_error('experticia'), ($this->input->post('experticia') ? $this->input->post('experticia') : $cvar['experticia'])); ?>
				
				<?php echo $this->template->cargar_textarea(lang('form_grade'), 'grado', '', form_error('grado'), ($this->input->post('grado') ? $this->input->post('grado') : $cvar['grado'])); ?>
				
				<?php echo $this->template->cargar_textarea(lang('form_specialization'), 'especializacion', '', form_error('especializacion'), ($this->input->post('especializacion') ? $this->input->post('especializacion') : $cvar['especializacion'])); ?>
				
				<?php echo $this->template->cargar_textarea(lang('form_master'), 'maestria', '', form_error('maestria'), ($this->input->post('maestria') ? $this->input->post('maestria') : $cvar['maestria'])); ?>
				
				<?php echo $this->template->cargar_textarea(lang('form_doctorate'), 'doctorado', '', form_error('doctorado'), ($this->input->post('doctorado') ? $this->input->post('doctorado') : $cvar['doctorado'])); ?>
				
				<?php echo $this->template->cargar_submit(); ?>

		<?php echo form_close(); ?>
		

		<br><br>
	</div>
</div>