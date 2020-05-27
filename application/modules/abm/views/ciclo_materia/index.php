<?php if(isset($alerta))  {  
	echo $alerta;
	} 
?>
<?= $this->template->boton_volver_a('abm/planes/index/'.$carrera[0]->id_carrera, 'Planes'); ?>
<hr>

<div class="col-md-11">
	<div class="box">
		<div class="box-header">
		  <h3 class="box-title">Ciclo: <?= $ciclo['nombre'];?></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		  	<table id="tabla" class="table table-bordered table-striped">
			    <thead>
				    <tr>
						<th><?php echo lang('table_code_th');?></th>
						<th><?php echo lang('table_year_th');?></th>
						<th><?php echo lang('table_course_th');?></th>
						<th><?php echo lang('table_regimen_th');?></th>
						<th><?php echo lang('table_hours_th');?></th>
						<th><?php echo lang('table_total_hours_th');?></th>
						<th><?php echo lang('table_programa_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
				    </tr>
			    </thead>
		    
			    <tbody>
					<?php foreach($ciclo_materia as $cm):?>
						<tr>
							<td><?php echo htmlspecialchars($cm->codigo,ENT_QUOTES,'UTF-8');?></td>
							<td><?php echo htmlspecialchars($cm->anio,ENT_QUOTES,'UTF-8');?></td>
							<td><?php echo htmlspecialchars($cm->nombre_materia,ENT_QUOTES,'UTF-8');?></td>
							<td><?php echo htmlspecialchars($cm->nombre_regimen,ENT_QUOTES,'UTF-8');?></td>
							<td><?php echo htmlspecialchars($cm->horas,ENT_QUOTES,'UTF-8');?></td>
							<td><?php echo htmlspecialchars($cm->hs_total,ENT_QUOTES,'UTF-8');?></td>
							<td><?php echo htmlspecialchars($cm->programa,ENT_QUOTES,'UTF-8');?></td>
							
							<td>
								<?php 
									if ($cm->tipo == 2) {
										echo anchor("abm/ciclo_materia/asignar_optativas/".$cm->id, '<span class="btn btn-warning btn-xs glyphicon glyphicon-list-alt"> OPTATIVAS</span>');
									}else{
										echo anchor("abm/ciclo_materia/asignar_correlativa/".$cm->id, '<span class="btn btn-success btn-xs glyphicon glyphicon-list-alt"> CORRELATIVAS</span>') ;
									}
									
								?>
								<br><br>
								<?php echo anchor("abm/ciclo_materia/edit/".$cm->id, '<span class="btn btn-primary btn-xs">Editar</span>') ;?>
						 		<?php echo anchor("abm/ciclo_materia/remove/".$cm->id, '<span class="btn btn-danger btn-xs">Eliminar</span>') ;?>
							</td>
						 </tr>
					 <?php endforeach;?>
				</tbody>

			    <tfoot>
				    <tr>
				      	<th><?php echo lang('table_code_th');?></th>
						<th><?php echo lang('table_year_th');?></th>
						<th><?php echo lang('table_course_th');?></th>
						<th><?php echo lang('table_regimen_th');?></th>
						<th><?php echo lang('table_hours_th');?></th>
						<th><?php echo lang('table_total_hours_th');?></th>
						<th><?php echo lang('table_programa_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
				    </tr>
			    </tfoot>
		  	</table>
	   	</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
</div>
    

<hr>
