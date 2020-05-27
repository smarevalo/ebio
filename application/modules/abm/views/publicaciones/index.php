<?php if(isset($alerta))  {  
	echo $alerta;
	} 
?>

<?php echo $this->template->boton_nuevo('abm/publicaciones/add', 'Nueva Publicación'); ?>

<hr>

<div class="col-lg-11">
	<div class="box">
		<div class="box-header">
		  <h3 class="box-title"><?php echo lang('title_publication');?></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		  	<table id="tabla" class="table table-bordered table-striped">
			    <thead>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_creator_th');?></th>
						<th><?php echo lang('table_modifier_th');?></th>
						<th><?php echo lang('table_title_th');?></th>
						<th><?php echo lang('table_date_th');?></th>
						<th><?php echo lang('table_created_date_th');?></th>
						<th><?php echo lang('table_modified_date_th');?></th>
						<th><?php echo lang('table_published_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
					</tr>
			    </thead>
		    
			    <tbody>
					<?php foreach($publicaciones as $p):?>
						<tr>
							<td><?php echo $p['id']; ?></td>
							<td><?php echo $p['creador']; ?></td>
							<td><?php echo $p['modificador']; ?></td>
							<td><?php echo $p['titulo']; ?></td>
							<td><?php echo $p['fecha']; ?></td>
							<td><?php echo $p['fecha_creacion']; ?></td>
							<td><?php echo $p['ultima_modificacion']; ?></td>
							<td align="center"><?php echo ($p['esta_publicado']==1)?"<i class=\"far fa-check-square\"></i>": "<i class=\"far fa-square\"></i>"; ?></td>
							<td>
								<a href="<?php echo site_url('abm/publicaciones/edit/'.$p['id']); ?>" class="btn btn-info btn-xs">Editar</a> 
								<a href="<?php echo site_url('abm/publicaciones/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs">Eliminar</a>
							</td>
						 </tr>
					 <?php endforeach;?>
				</tbody>

			    <tfoot>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_creator_th');?></th>
						<th><?php echo lang('table_modifier_th');?></th>
						<th><?php echo lang('table_title_th');?></th>
						<th><?php echo lang('table_date_th');?></th>
						<th><?php echo lang('table_created_date_th');?></th>
						<th><?php echo lang('table_modified_date_th');?></th>
						<th><?php echo lang('table_published_th');?></th>
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