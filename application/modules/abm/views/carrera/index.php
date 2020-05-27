<?php if(isset($alerta))  {  
	echo $alerta;
	} 
?>

<?php echo $this->template->boton_nuevo('abm/carrera/add', 'Nueva Carrera'); ?>
					
<hr>

<div class="col-lg-11">
	<div class="box">
		<div class="box-header">
		  <h3 class="box-title"><?php echo lang('title_career');?></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		  	<table id="tabla" class="table table-bordered table-striped">
			    <thead>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_name_th');?></th>
						<th><?php echo lang('table_plan_pdf_th');?></th>
						<th><?php echo lang('table_plan_th');?></th>
						<th><?php echo lang('table_status_th');?></th>
						<th><?php echo lang('table_image_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
					</tr>
			    </thead>
		    
			    <tbody>
					<?php foreach($carreras as $c):?>
					<tr>
						<td><?php echo htmlspecialchars($c->id,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($c->nombre,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($c->plan_pdf,ENT_QUOTES,'UTF-8');?></td>
						<!-- <td><a target='_blank' href="<?= base_url('abm/carrera/carrera_completa/'.$c->id) ?>"/>Ver Plan</a></td> -->
						<td><a target='_blank' href="<?= base_url('abm/planes/index/'.$c->id) ?>"/>Ver Planes</a></td>

						<?php 	if($c->activo == 1) { 
								echo '<td>
										<a href="'.site_url('abm/carrera/deactivate/'.$c->id).'" class="btn btn-success btn-xs">Activo</a>
									</td>'; }
							else { 
								echo '<td>
										<a href="'.site_url('abm/carrera/activate/'.$c->id).'" class="btn btn-danger btn-xs">Inactivo</a>
										</td>'; 
							} 
						?>

						<td><img style="height: 140px; width: 140px;" src="<?=base_url(IMAGES_UPLOAD.$c->imagen); ?>" alt="<?= $c->imagen; ?>" class="img-thumbnail"></td>
						<td><?php echo anchor("abm/carrera/edit/".$c->id, '<span class="btn btn-primary btn-xs">Editar</span>') ;?>
					 	<?php echo anchor("abm/carrera/remove/".$c->id, '<span class="btn btn-danger btn-xs">Eliminar</span>') ;?></td>
					 </tr>
					 <?php endforeach;?>
				</tbody>

			    <tfoot>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_name_th');?></th>
						<th><?php echo lang('table_plan_pdf_th');?></th>
						<th><?php echo lang('table_plan_th');?></th>
						<th><?php echo lang('table_status_th');?></th>
						<th><?php echo lang('table_image_th');?></th>
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