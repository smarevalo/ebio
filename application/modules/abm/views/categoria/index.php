<?php if(isset($alerta))  {  
	echo $alerta;
} 
?>

<?php echo $this->template->boton_nuevo('abm/categoria/add', 'Nueva Categoria'); ?>

<hr>

<div class="col-lg-11">
	<div class="box">
		<div class="box-header">
		  <h3 class="box-title"><?php echo lang('title_category');?></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		  	<table id="tabla" class="table table-bordered table-striped">
			    <thead>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_name_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
					</tr>
			    </thead>
		    
			    <tbody>
					<?php foreach($categorias as $c):?>
						<tr>
							<td><?php echo htmlspecialchars($c->id,ENT_QUOTES,'UTF-8');?></td>
							<td><?php echo htmlspecialchars($c->nombre,ENT_QUOTES,'UTF-8');?></td>

							<td><?php echo anchor("abm/categoria/edit/".$c->id, '<span class="btn btn-primary btn-xs">Editar</span>') ;?>
						 	<?php echo anchor("abm/categoria/remove/".$c->id, '<span class="btn btn-danger btn-xs">Eliminar</span>') ;?></td>
						</tr>
					<?php endforeach;?>
				</tbody>

			    <tfoot>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_name_th');?></th>
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