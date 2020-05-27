<?php if(isset($alerta))  {  
	echo $alerta;
	} 
?>

<?php echo $this->template->boton_nuevo('abm/proyecto/add', 'Nuevo '.$tipo[0]->abreviatura); ?>
					
<hr>

<div class="col-lg-11">
	<div class="box">
		<div class="box-header">
		  <h3 class="box-title"><?= $tipo[0]->nombre;?></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		  	<table id="tabla" class="table table-bordered table-striped">
			    <thead>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_title_th');?></th>
						<th><?php echo lang('table_institution_th');?></th>
						<th><?php echo lang('table_tutor_th');?></th>
						<th><?php echo lang('table_active_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
					</tr>
			    </thead>
		    
			    <tbody>
					<?php foreach($proyectos as $c):?>
					<tr>
						<td><?php echo htmlspecialchars($c->id,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($c->titulo,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($c->institucion,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($c->tutor,ENT_QUOTES,'UTF-8');?></td>

						<?php 	if($c->activo == 1) { 
								echo '<td>
										<a href="'.site_url('abm/proyecto/deactivate/'.$c->id).'" class="btn btn-success btn-xs">Activo</a>
									</td>'; }
							else { 
								echo '<td>
										<a href="'.site_url('abm/proyecto/activate/'.$c->id).'" class="btn btn-danger btn-xs">Inactivo</a>
										</td>'; 
							} 
						?>
						<td><?php echo anchor("abm/proyecto/edit/".$c->id, '<span class="btn btn-primary btn-xs">Editar</span>') ;?>
					 	<?php echo anchor("abm/proyecto/remove/".$c->id, '<span class="btn btn-danger btn-xs">Eliminar</span>') ;?></td>
					 </tr>
					 <?php endforeach;?>
				</tbody>

			    <tfoot>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_title_th');?></th>
						<th><?php echo lang('table_institution_th');?></th>
						<th><?php echo lang('table_tutor_th');?></th>
						<th><?php echo lang('table_active_th');?></th>
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