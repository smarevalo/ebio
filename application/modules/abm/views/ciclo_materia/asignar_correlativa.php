<?= $this->template->boton_volver_a('abm/carrera/carrera_completa/'.$carrera[0]->id_plan, "Plan"); ?>

<?php echo $this->template->get_perfil_materia($ciclo_materia['id']); ?>

<div class="col-lg-11">
	<div class="box box-success">

		<div class="box-header with-border">
		  	<h3 class="box-title"><?php echo lang('designate_correlative_heading');?></h3>
		</div>

		<div class="box-title">
			<?php echo $this->template->boton_link('abm/correlatividad_tipo', 'Ver tipos correlativas'); ?>
		</div>

		<br>

		<?php echo form_open('abm/ciclo_materia/asignar_correlativa/'.$ciclo_materia['id'],array("class"=>"form-horizontal")); ?>
	
			<?php echo $this->template->cargar_select(lang('form_cycle_course'), 'id_correlativa', '*', form_error('id_correlativa'), $ciclos_materias, $this->input->post('id_correlativa')); ?>	

			<?php echo $this->template->cargar_select(lang('form_course_type'), 'id_correlativa_tipo', '*', form_error('id_correlativa_tipo'), $tipos, $this->input->post('id_correlativa_tipo')); ?>	
			
			<?php echo $this->template->cargar_submit(); ?>
			
		<?php echo form_close(); ?>		

		<br><br>
	</div>
</div>

<br><br><br>

<div class="col-lg-11">
	<div class="box">
		<div class="box-header">
		  <h3 class="box-title"><?php echo lang('title_designated');?></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		  	<table id="tabla" class="table table-bordered table-striped">
			    <thead>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_course_th');?></th>
						<th><?php echo lang('table_type_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
					</tr>
			    </thead>
		    
			    <tbody>
					<?php foreach($correlativas as $c):?>
					<tr>
						<td><?php echo htmlspecialchars($c->id,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($c->materia,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($c->descripcion,ENT_QUOTES,'UTF-8');?></td>

					 	<td><?php echo anchor("abm/ciclo_materia/remove_correlativa/".$c->id, '<span class="btn btn-danger btn-xs">Eliminar</span>') ;?></td>
					 </tr>
					 <?php endforeach;?>
				</tbody>

			    <tfoot>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_course_th');?></th>
						<th><?php echo lang('table_type_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
					</tr>
			    </tfoot>
		  	</table>
	   	</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
</div>  