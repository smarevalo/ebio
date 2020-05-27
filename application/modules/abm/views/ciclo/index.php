<?php if(isset($alerta))  {  
	echo $alerta;
	} 
?>
<?= $this->template->boton_atras(); ?>

<?php echo $this->template->boton_nuevo('abm/ciclo/add', 'Nuevo Ciclo'); ?>

<hr>

<div class="col-lg-11">
	<div class="box">
		<div class="box-header">
		  <h3 class="box-title"><?php echo lang('title_cycle');?></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		  	<table id="tabla" class="table table-bordered table-striped">
			    <thead>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_name_th');?></th>
						<th><?php echo lang('table_plan_th');?></th>
						<th><?php echo lang('table_orientation_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
					</tr>
			    </thead>
		    
			    <tbody>
					<?php foreach($ciclos as $c):?>
					<tr>
						<td><?php echo htmlspecialchars($c->id,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($c->nombre,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($c->plan,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($c->orientacion,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo anchor("abm/ciclo/edit/".$c->id, '<span class="btn btn-primary btn-xs">Editar</span>') ;?>
					 	<?php echo anchor("abm/ciclo/remove/".$c->id, '<span class="btn btn-danger btn-xs">Eliminar</span>') ;?></td>
					 </tr>
					 <?php endforeach;?>
				</tbody>

			    <tfoot>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_name_th');?></th>
						<th><?php echo lang('table_plan_th');?></th>
						<th><?php echo lang('table_orientation_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
					</tr>
			    </thead>
			    </tfoot>
		  	</table>
	   	</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
</div>    

<hr>