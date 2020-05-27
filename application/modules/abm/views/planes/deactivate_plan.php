<!-- Common Pages -->
<!-- Content Wrapper. Contains page content -->
<div class="col-md-7 col-md-offset-2">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Desactivar Plan Vigente</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Your Page Content Here -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo 'Estás seguro que quieres desactivar el plan '.$planes['nombre'];?></h3>
			</div>
			<!-- /.box-header -->
			<?php echo form_open("abm/planes/deactivate/".$planes['id']."");?>
				<div class="box-body">
					<div class="form-group col-md-offset-4">
						<?php echo 'SI';?>
						<input type="radio" name="confirm" value="yes" checked="checked" /> 
						&nbsp;
						<?php echo 'NO';?>
						<input type="radio" name="confirm" value="no" />
					</div>
					
					<?php echo form_hidden(array('id'=>$planes['id'])); ?>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary col-md-offset-10">Guardar</button>
				</div>
			<?php echo form_close();?>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->