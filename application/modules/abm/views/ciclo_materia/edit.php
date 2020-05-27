<?= $this->template->boton_atras(); ?>

<div class="col-lg-12">
	<div class="box box-success">

		<div class="box-header with-border">
		  	<h3 class="box-title"><?php echo lang('edit_course_heading');?></h3>
		</div>

		<?php echo form_open_multipart('abm/ciclo_materia/edit/'.$ciclo_materia['id'],array("class"=>"form-horizontal")); ?>

			<?php echo $this->template->cargar_select(lang('form_cycle'), 'id_ciclo', '*', form_error('id_ciclo'), $ciclos, $ciclo_materia['id_ciclo']); ?>
			
			<input type="hidden" name="id_materia" value="<?= $ciclo_materia['id_materia'] ?>" >

			<?php echo $this->template->cargar_input(lang('form_name'), 'materia', 'text', '*', form_error('materia'),  ($this->input->post('materia') ? $this->input->post('materia') : $ciclo_materia['materia'])); ?>

			<?php echo $this->template->cargar_select(lang('form_type'), 'id_tipo', '*', form_error('id_tipo'), $tipos, $ciclo_materia['id_tipo']); ?>

			<?php echo $this->template->cargar_select(lang('form_regimen'), 'id_regimen', '*', form_error('id_regimen'), $regimenes, $ciclo_materia['id_regimen']); ?>

			<?php echo $this->template->cargar_input(lang('form_hours'), 'horas', 'text', '', form_error('horas'), ($this->input->post('horas') ? $this->input->post('horas') : $ciclo_materia['horas'])); ?>

			<?php echo $this->template->cargar_input(lang('form_total_hours'), 'hs_total', 'text', '', form_error('horas'), ($this->input->post('hs_total') ? $this->input->post('hs_total') : $ciclo_materia['hs_total'])); ?>

			<?php echo $this->template->cargar_select(lang('form_year'), 'anio', '*', form_error('anio'), $anios, $ciclo_materia['anio']); ?>

			<?php echo $this->template->cargar_input(lang('form_code'), 'codigo', 'text', '', form_error('codigo'), ($this->input->post('codigo') ? $this->input->post('codigo') : $ciclo_materia['codigo'])); ?>

			<?php echo $this->template->cargar_input(
				lang('form_program'), 'programa', 'file', '', form_error('programa'), ($this->input->post('programa') ? $this->input->post('programa') : $ciclo_materia['programa']), 
					($ciclo_materia['programa'] != '')
						?	"<a target='_blank' href='".base_url(PDFS_UPLOAD.'programas/'.$ciclo_materia['programa']).
							"'/> 
								".
									$ciclo_materia['programa'].
								"
							</a>"
						: 
							"<b>* El archivo debe estar en formato PDF.</b>"
				); 
			?>

			<?php echo $this->template->cargar_submit(); ?>
			
		<?php echo form_close(); ?>

		<br><br>
	</div>
</div>



<script>
	
$(document).ready(function(){
	$('#id_ciclo').change(function(){
		var ciclo = $('#id_ciclo').val();
		if(ciclo != '')
		{
			$.ajax({
				url:"<?php echo base_url(); ?>abm/ciclo_materia/fetch_materias",
				method:"POST",
				data:{ciclo_id:ciclo},
				success:function(data)
				{
					$('#id_materia').html(data);
				}
			});
		}
	});

	$('#id_ciclo').change(function(){
		var ciclo = $('#id_ciclo').val();
		if(ciclo != '')
		{
			$.ajax({
				url:"<?php echo base_url(); ?>abm/ciclo_materia/fetch_anios",
				method:"POST",
				data:{ciclo_id:ciclo},
				success:function(data)
				{
					$('#anio').html(data);
				}
			});
		}
	});
});
</script>
