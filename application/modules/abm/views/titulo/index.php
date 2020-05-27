<?php if(isset($alerta))  {  
	echo $alerta;
} 
?>
<?php echo $this->template->boton_nuevo('abm/titulo/add', 'Nuevo Título'); ?>

<hr>

<div class="col-lg-11">
	<div class="box">
		<div class="box-header">
		  <h3 class="box-title"><?php echo lang('title_title');?></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		  	<table id="tabla" class="table table-bordered table-striped">
			    <thead>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_plan_th');?></th>
						<th><?php echo lang('table_orientation_th');?></th>
						<th><?php echo lang('table_name_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
					</tr>
			    </thead>
		    
			    <tbody>
					<?php foreach($titulos as $t):?>
					<tr>
						<td><?php echo htmlspecialchars($t->id,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($t->plan,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($t->orientacion,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($t->nombre,ENT_QUOTES,'UTF-8');?></td>

						<td><?php echo anchor("abm/titulo/edit/".$t->id, '<span class="btn btn-primary btn-xs">Editar</span>') ;?>
					 	<?php echo anchor("abm/titulo/remove/".$t->id, '<span class="btn btn-danger btn-xs">Eliminar</span>') ;?></td>
					 </tr>
					 <?php endforeach;?>
				</tbody>

			    <tfoot>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_plan_th');?></th>
						<th><?php echo lang('table_orientation_th');?></th>
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