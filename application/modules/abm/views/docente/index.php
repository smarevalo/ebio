
<?php if(isset($alerta))  {  
	echo $alerta;
	} 
?>

<?php echo $this->template->boton_nuevo('abm/docente/add', 'Nuevo Docente'); ?>



<hr>

<div class="col-lg-11">
	<div class="box">
		<div class="box-header">
		  <h3 class="box-title"><?php echo lang('title_teacher');?></h3>
		</div>
		
		<div class="box-title">
			<?php echo $this->template->boton_link('abm/categoria', 'Ver categorías'); ?>
		</div>
		
		<!-- /.box-header -->
		<div class="box-body">
		  	<table id="tabla" class="table table-bordered table-striped">
			    <thead>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_teacher_th');?></th>
						<th><?php echo lang('table_category_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
					</tr>
			    </thead>
		    
			    <tbody>
					<?php foreach($docentes as $d):?>
					<tr>
						<td><?php echo htmlspecialchars($d->id,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($d->docente,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($d->categoria,ENT_QUOTES,'UTF-8');?></td>
						
						<td>
							<?php echo anchor("abm/docente/asignar_materia/".$d->id, '<span class="btn btn-success btn-xs glyphicon glyphicon-list-alt"> MATERIAS</span>') ;?>
							<?php echo anchor("abm/cvar/edit/".$d->id, '<span class="btn btn-success btn-xs glyphicon glyphicon-education"> CVAR</span>') ;?>
							
							<?php echo anchor("abm/docente/edit/".$d->id, '<span class="btn btn-primary btn-xs">Editar</span>') ;?>
					 		<?php echo anchor("abm/docente/remove/".$d->id, '<span class="btn btn-danger btn-xs">Eliminar</span>') ;?>
					 		
					 	</td>
					 </tr>
					 <?php endforeach;?>
				</tbody>

			    <tfoot>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_teacher_th');?></th>
						<th><?php echo lang('table_category_th');?></th>
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