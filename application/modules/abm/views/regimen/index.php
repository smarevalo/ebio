<?php if(isset($alerta))  {  
	echo $alerta;
} 
?>
<?= $this->template->boton_atras(); ?>
<?php echo $this->template->boton_nuevo('abm/regimen/add', 'Nuevo Regimen'); ?>

<hr>

<div class="col-lg-11">
	<div class="box">
		<div class="box-header">
		  <h3 class="box-title"><?php echo lang('title_regimen');?></h3>
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
					<?php foreach($regimenes as $r):?>
					<tr>
						<td><?php echo htmlspecialchars($r->id,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($r->nombre,ENT_QUOTES,'UTF-8');?></td>

						<td><?php echo anchor("abm/regimen/edit/".$r->id, '<span class="btn btn-primary btn-xs">Editar</span>') ;?>
					 	<?php echo anchor("abm/regimen/remove/".$r->id, '<span class="btn btn-danger btn-xs">Eliminar</span>') ;?></td>
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