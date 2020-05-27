
<?= $this->template->boton_volver_a('abm/carrera/carrera_completa/'.$plan['id'], 'Planes'); ?>

<div class="col-lg-12">
	<div class="box box-success">
		<div class="box-header with-border">
		  	<h3 class="box-title"><?php echo lang('edit_plan_heading');?></h3>
		</div>
		<?php echo form_open('abm/planes/edit/'.$plan['id'],array("class"=>"form-horizontal")); ?>
			<?php echo $this->template->cargar_select(lang('form_career'), 'id_carrera', '*', form_error('carrera'), $carreras, $plan['id_carrera']); ?>
			<?php echo $this->template->cargar_input(lang('form_name'), 'nombre', 'text', '*', form_error('nombre'), ($this->input->post('nombre') ? $this->input->post('nombre') : $plan['nombre'])); ?>	
			<?php echo $this->template->cargar_input(lang('form_duration'), 'duracion', 'text', '', form_error('duracion'), ($this->input->post('duracion') ? $this->input->post('duracion') : $plan['duracion'])); ?>
			<?php echo $this->template->cargar_submit(); ?>
		<?php echo form_close(); ?>		
		<br><br>
	</div>
</div>

<br>

<!-- Ciclos -->
<div class="col-lg-12">
	<div class="box box-primary">
		<!-- box-header -->
		<div class="box-header">
		  	<h3 class="box-title"><?php echo lang('create_cycle_heading');?></h3>
		  	<?php echo form_open('abm/ciclo/add',array("class"=>"form-horizontal")); ?>
				<?php echo $this->template->cargar_select(lang('form_orientation'), 'id_orientacion', '', form_error('id_orientacion'), $orientaciones, $this->input->post('id_orientacion')); ?>
				<?php echo $this->template->cargar_input(lang('form_name'), 'nombre', 'text', '*', form_error('nombre'), $this->input->post('nombre')); ?>
				<input type="hidden" name="id_plan" value="<?=$plan['id']?>">
				<?php echo $this->template->cargar_submit(); ?>
			<?php echo form_close(); ?>
		</div>
		<!-- /.box-header -->

		<!-- box-body -->
		<div class="box-body">
		  	<table id="tabla" class="table table-bordered table-striped">
			    <thead>
				    <tr>
						<th><?php echo lang('table_name_th');?></th>
						<th><?php echo lang('table_orientation_th');?></th>
						<th width="15%"><?php echo lang('table_actions_th');?></th>
					</tr>
			    </thead>
		    
			    <tbody>
					<?php foreach($ciclos as $c):?>
					<tr>
						<td><?php echo htmlspecialchars($c->nombre,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($c->orientacion,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo anchor("abm/ciclo/edit/".$c->id, '<span class="btn btn-primary btn-xs">Editar</span>') ;?>
					 	<?php echo anchor("abm/ciclo/remove/".$c->id, '<span class="btn btn-danger btn-xs">Eliminar</span>') ;?></td>
					 </tr>
					 <?php endforeach;?>
				</tbody>

			    <tfoot>
				    <tr>
						<th><?php echo lang('table_name_th');?></th>
						<th><?php echo lang('table_orientation_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
					</tr>
			    </tfoot>
		  	</table>
	   	</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
</div> 


<!-- Títulos -->
<div class="col-lg-12">
	<div class="box box-primary">
		<!-- box-header -->
		<div class="box-header">
		  	<h3 class="box-title"><?php echo lang('create_title_heading');?></h3>
			<?php echo form_open('abm/titulo/add',array("class"=>"form-horizontal")); ?>
				<input type="hidden" name="id_plan" value="<?=$plan['id']?>">
				<?php echo $this->template->cargar_select(lang('form_orientation'), 'id_orientacion', '', form_error('orientacion'), $orientaciones, $this->input->post('id_orientacion')); ?>
				<?php echo $this->template->cargar_input(lang('form_name'), 'nombre', 'text', '*', form_error('nombre'), $this->input->post('nombre')); ?>
				<?php echo $this->template->cargar_submit(); ?>
			<?php echo form_close(); ?>
		</div>
		<!-- /.box-header -->

		<!-- box-body -->
		<div class="box-body">
		  	<table id="tabla3" class="table table-bordered table-striped">
			    <thead>
				    <tr>
						<th><?php echo lang('table_name_th');?></th>
						<th><?php echo lang('table_orientation_th');?></th>
						<th width="15%"><?php echo lang('table_actions_th');?></th>
					</tr>
			    </thead>
		    
			    <tbody>
					<?php foreach($titulos as $t):?>
					<tr>
						<td><?php echo htmlspecialchars($t->nombre,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($t->orientacion,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo anchor("abm/titulo/edit/".$t->id, '<span class="btn btn-primary btn-xs">Editar</span>') ;?>
					 	<?php echo anchor("abm/titulo/remove/".$t->id, '<span class="btn btn-danger btn-xs">Eliminar</span>') ;?></td>
					 </tr>
					 <?php endforeach;?>
				</tbody>

			    <tfoot>
				    <tr>
				    	<th><?php echo lang('table_name_th');?></th>
						<th><?php echo lang('table_orientation_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
					</tr>
			    </tfoot>
		  	</table>
	   	</div>
		<!-- /.box-body -->

	</div>
</div>


<!-- Orientaciones -->
<div class="col-lg-12">
	<div class="box box-primary">
		<!-- box-header -->
		<div class="box-header">
			<h3 class="box-title"><?php echo lang('create_orientation_heading');?></h3>
			<?php echo form_open('abm/orientaciones/add',array("class"=>"form-horizontal")); ?>
				<input type="hidden" name="id_plan" value="<?=$plan['id']?>">
				<?php echo $this->template->cargar_input('Nombre', 'nombre', 'text', '*', form_error('nombre'), $this->input->post('nombre')); ?>
				<?php echo $this->template->cargar_submit(); ?>
			<?php echo form_close(); ?>		
		</div>
		<!-- /.box-header -->
		
		<!-- box-body -->
		<div class="box-body">
		  	<table id="tabla2" class="table table-bordered table-striped">
			    <thead>
				    <tr>
						<th><?php echo lang('table_name_th');?></th>
						<th width="15%"><?php echo lang('table_actions_th');?></th>
					</tr>
			    </thead>
		    
			    <tbody>
					<?php foreach($orientaciones as $o):?>
						<tr>
							<td><?php echo htmlspecialchars($o->nombre,ENT_QUOTES,'UTF-8');?></td>
							<td><?php echo anchor("abm/orientaciones/edit/".$o->id, '<span class="btn btn-primary btn-xs">Editar</span>') ;?>
						 	<?php echo anchor("abm/orientaciones/remove/".$o->id, '<span class="btn btn-danger btn-xs">Eliminar</span>') ;?></td>
						 </tr>
					 <?php endforeach;?>
				</tbody>

			    <tfoot>
				    <tr>
						<th><?php echo lang('table_name_th');?></th>
						<th><?php echo lang('table_actions_th');?></th>
					</tr>
			    </tfoot>
		  	</table>
	   	</div>
		<!-- /.box-body -->

	</div>
</div>