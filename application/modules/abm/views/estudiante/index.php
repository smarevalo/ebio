<?php if(isset($alerta))  {  
	echo $alerta;
	} 
?>

<?php echo $this->template->boton_nuevo('abm/estudiante/add', 'Nuevo Estudiante'); ?>

<hr>

<div class="col-lg-11">
	<div class="box">
		<div class="box-header">
		  <h3 class="box-title"><?php echo lang('title_student');?></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		  	<table id="tabla" class="table table-bordered table-striped">
			    <thead>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_mat_th');?></th>
						<th><?php echo lang('table_last_name_th');?></th>
						<th><?php echo lang('table_name_th');?></th>
						<th><?php echo lang('table_identification_number_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
					</tr>
			    </thead>
		    
			    <tbody>
					<?php foreach($estudiantes as $d):?>
					<tr>
						<td><?php echo htmlspecialchars($d->id,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($d->legajo,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($d->apellido,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($d->nombre,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($d->dni,ENT_QUOTES,'UTF-8');?></td>
						
						<td>
							<?php echo anchor("abm/estudiante/edit/".$d->id, '<span class="btn btn-primary btn-xs">Editar</span>') ;?>
					 		<?php echo anchor("abm/estudiante/remove/".$d->id, '<span class="btn btn-danger btn-xs">Eliminar</span>') ;?>
					 		
					 	</td>
					 </tr>
					 <?php endforeach;?>
				</tbody>

			    <tfoot>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_mat_th');?></th>
						<th><?php echo lang('table_last_name_th');?></th>
						<th><?php echo lang('table_name_th');?></th>
						<th><?php echo lang('table_identification_number_th');?></th>
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
