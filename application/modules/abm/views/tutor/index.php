
<div class="col-lg-11">
	<div class="box">
		<div class="box-header">
		  <h3 class="box-title"><?php echo lang('title_tutor');?></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		  	<table id="tabla" class="table table-bordered table-striped">
			    <thead>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_teacher_th');?></th>
						<th><?php echo lang('table_category_th');?></th>
						<th><?php echo lang('table_active_project_th');?></th>
					</tr>
			    </thead>
		    
			    <tbody>
					<?php foreach($tutores as $d):?>
					<tr>
						<td><?php echo htmlspecialchars($d->id,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($d->docente,ENT_QUOTES,'UTF-8');?>
						</td>
						<td><?php echo htmlspecialchars($d->categoria,ENT_QUOTES,'UTF-8');?>
						</td>
						<td><?php echo htmlspecialchars($d->proyectos,ENT_QUOTES,'UTF-8');?>
							- 
							<?php echo anchor("abm/tutor/detalle/".$d->id, '<span class="btn btn-success btn-xs glyphicon glyphicon-list-alt"> Ver detalle</span>') ;?>
						</td>
					 </tr>
					 <?php endforeach;?>
				</tbody>

			    <tfoot>
				    <tr>
						<th><?php echo lang('table_id_th');?></th>
						<th><?php echo lang('table_teacher_th');?></th>
						<th><?php echo lang('table_category_th');?></th>
						<th><?php echo lang('table_active_project_th');?></th>
					</tr>
			    </tfoot>
		  	</table>
	   	</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
</div>    

<hr>