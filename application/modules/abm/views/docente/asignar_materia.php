<?= $this->template->boton_volver_a('abm/docente/', 'Docentes'); ?>

<?php echo $this->template->get_perfil_docente($docente['id']); ?>

<div class="col-lg-11">
	<div class="box box-success">

		<div class="box-header with-border">
		  	<h3 class="box-title"><?php echo lang('designate_course_heading');?></h3>
		</div>

		<?php echo form_open('abm/docente/asignar_materia/'.$docente['id'],array("class"=>"form-horizontal")); ?>
			
			<?php //echo $this->template->cargar_select(lang('form_cycle_course'), 'id_ciclo_materia', '*', form_error('id_ciclo_materia'), $ciclos_materias, $this->input->post('id_ciclo_materia')); ?>

			<?php echo $this->template->cargar_select(lang('form_plan'), 'id_ciclo', '*', form_error('id_ciclo'), $planes, $this->input->post('id_ciclo')); ?>

			<?php echo $this->template->cargar_select(lang('form_course'), 'id_materia', '*', form_error('id_materia'), $materias, $this->input->post('id_materia')); ?>	
			
			<?php echo $this->template->cargar_submit(); ?>
			
		<?php echo form_close(); ?>		

		<br><br>
	</div>
</div>

<br><br><br>

<div class="col-lg-11">
	<div class="box">
		<div class="box-header">
		  <h3 class="box-title"><?php echo lang('title_designated_course');?></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		  	<table id="tabla" class="table table-bordered table-striped">
			    <thead>
				    <tr>
						<th><?php echo lang('table_career_th');?></th>
						<th><?php echo lang('table_plan_th');?></th>
						<th><?php echo lang('table_cicle_th');?></th>
						<th><?php echo lang('table_orientation_th');?></th>
						<th><?php echo lang('table_course_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
					</tr>
			    </thead>
		    
			    <tbody>
					<?php foreach($materias_asignadas as $m):?>
					<tr>
						<td><?php echo htmlspecialchars($m->carrera,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($m->plan,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($m->ciclo,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($m->orientacion,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($m->materia,ENT_QUOTES,'UTF-8');?></td>

					 	<td><?php echo anchor("abm/docente/remove_materia_docente/".$m->id, '<span class="btn btn-danger btn-xs">Eliminar</span>') ;?></td>
					 </tr>
					 <?php endforeach;?>
				</tbody>

			    <tfoot>
				    <tr>
						<th><?php echo lang('table_career_th');?></th>
						<th><?php echo lang('table_plan_th');?></th>
						<th><?php echo lang('table_cicle_th');?></th>
						<th><?php echo lang('table_orientation_th');?></th>
						<th><?php echo lang('table_course_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
					</tr>
			    </tfoot>
		  	</table>
	   	</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
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
