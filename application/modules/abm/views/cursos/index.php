<?php if(isset($alerta))  {  
	echo $alerta;
	} 
?>

<?php echo $this->template->boton_nuevo('abm/cursos/add', 'Nuevo Curso'); ?>

<hr>

<div class="col-lg-11">
	<div class="box">
		<div class="box-header">
		  <h3 class="box-title"><?php echo lang('title_schedule');?></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		  	<table id="tabla" class="table table-bordered table-striped">
			    <thead>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_name_th');?></th>
						<th><?php echo lang('table_start_date_th');?></th>
						<th><?php echo lang('table_end_date_th');?></th>
						<th><?php echo lang('table_modality_th');?></th>
						<th><?php echo lang('table_link_th');?></th>
						<th><?php echo lang('table_teacher_cron_th');?></th>
						<th><?php echo lang('table_published_th');?></th>
					</tr>
			    </thead>
		    
			    <tbody>
					<?php foreach($cursos as $c):?>
						<tr>
							<td><?php echo $c['id']; ?></td>
							<td><?php echo $c['nombre']; ?></td>
							<td><?php echo $c['fecha_inicio']; ?></td>
							<td><?php echo $c['fecha_fin']; ?></td>
							<td><?php echo $c['modalidad']; ?></td>
							<td><?php echo $c['enlace']; ?></td>
							<td><?php echo $c['profesor']; ?></td>
							<td align="center"><?php echo ($c['publicado']==1)?"<i class=\"far fa-check-square\"></i>": "<i class=\"far fa-square\"></i>"; ?></td>
							<td>
								<a href="<?php echo site_url('abm/cursos/edit/'.$c['id']); ?>" class="btn btn-info btn-xs">Editar</a> 
								<a href="<?php echo site_url('abm/cursos/remove/'.$c['id']); ?>" class="btn btn-danger btn-xs">Eliminar</a>
							</td>
						 </tr>
					 <?php endforeach;?>
				</tbody>

			    <tfoot>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_name_th');?></th>
						<th><?php echo lang('table_start_date_th');?></th>
						<th><?php echo lang('table_end_date_th');?></th>
						<th><?php echo lang('table_modality_th');?></th>
						<th><?php echo lang('table_link_th');?></th>
						<th><?php echo lang('table_teacher_cron_th');?></th>
						<th><?php echo lang('table_published_th');?></th>
					</tr>
			    </tfoot>
		  	</table>
	   	</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
</div>    

<hr>