<?php if(isset($alerta))  {  
	echo $alerta;
} 
?>

<?= $this->template->boton_atras('abm/carrera/'); ?>
<?= $this->template->boton_nuevo('abm/planes/add/'.$id_carrera, 'Nuevo Plan'); ?>

<hr>

<div class="col-lg-11">
	<div class="box">
		<div class="box-header">
			<?= $this->template->get_perfil_carrera($id_carrera); ?>
		</div>
		
		<div class="box-header">
		  <h3 class="box-title"><?php echo lang('title_plan');?></h3>
		</div>

        <br><br>

		<!-- /.box-header -->
		<div class="box-body">
		  	<table id="tabla" class="table table-bordered table-striped">
			    <thead>
				    <tr>
						<th><?php echo lang('table_name_th');?></th>
						<th><?php echo lang('table_duration_th');?></th>
						<th><?php echo lang('table_cicle_th');?></th>
						<th><?php echo lang('table_course_th');?></th>
						<th><?php echo lang('table_status_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
					</tr>
			    </thead>
		    
			    <tbody>
					<?php foreach($planes as $p):?>
					<tr>
						<td><?php echo htmlspecialchars($p->nombre,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($p->duracion,ENT_QUOTES,'UTF-8');?></td>
						<td><?php
								 foreach ($p->ciclos as $ciclo) {
							?>
								<a href="<?= site_url('abm/ciclo_materia/index/'.$ciclo->id) ?>"><?=$ciclo->nombre?></a><br>
							<?php
								 }
							?>
						</td>
						<td>
							<a href="<?= site_url('abm/carrera/carrera_completa/'.$p->id) ?>" class="btn btn-success btn-xs">Materias</a>
						</td>
						<?php 	if($p->vigente == 1) { 
								echo '<td>
										<a href="'.site_url('abm/planes/deactivate/'.$p->id).'" class="btn btn-success btn-xs">Activo</a>
									</td>'; }
							else { 
								echo '<td>
										<a href="'.site_url('abm/planes/activate/'.$p->id).'" class="btn btn-danger btn-xs">Inactivo</a>
										</td>'; 
							} 
						?>
						<td><?php echo anchor("abm/planes/edit/".$p->id, '<span class="btn btn-primary btn-xs">Editar</span>') ;?>
					 	<?php echo anchor("abm/planes/remove/".$p->id, '<span class="btn btn-danger btn-xs">Eliminar</span>') ;?></td>
					 </tr>
					 <?php endforeach;?>
				</tbody>

			    <tfoot>
				    <tr>
						<th><?php echo lang('table_name_th');?></th>
						<th><?php echo lang('table_duration_th');?></th>
						<th><?php echo lang('table_cicle_th');?></th>
						<th><?php echo lang('table_course_th');?></th>
						<th><?php echo lang('table_status_th');?></th>
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