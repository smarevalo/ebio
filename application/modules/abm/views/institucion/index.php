<?php if(isset($alerta))  {  
	echo $alerta;
	} 
?>

<?php echo $this->template->boton_nuevo('abm/institucion/add', 'Nueva Institución'); ?>

<hr>

<div class="col-lg-11">
	<div class="box">
		<div class="box-header">
		  <h3 class="box-title"><?php echo lang('title_institution');?></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		  	<table id="tabla" class="table table-bordered table-striped">
			    <thead>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_name_th');?></th>
						<th><?php echo lang('table_cuit_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
					</tr>
			    </thead>
		    
			    <tbody>
					<?php foreach($instituciones as $p):?>
						<tr>
							<td><?php echo $p['id']; ?></td>
							<td><?php echo $p['razon_social']; ?></td>
							<td><?php echo $p['cuit']; ?></td>

							<td>
								<a href="<?php echo site_url('abm/institucion/edit/'.$p['id']); ?>" class="btn btn-info btn-xs">Editar</a> 
								<a href="<?php echo site_url('abm/institucion/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs">Eliminar</a>
							</td>
						 </tr>
					 <?php endforeach;?>
				</tbody>

			    <tfoot>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_name_th');?></th>
						<th><?php echo lang('table_cuit_th');?></th>
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