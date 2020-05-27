<?php if(isset($alerta))  {  
	echo $alerta;
	} 
?>
	
	<?= $this->template->boton_atras(); ?>	

<div class="col-lg-12">
	<div class="box box-success">

		<div class="box-header with-border">
		  	<h3 class="box-title"><?php echo lang('edit_career_heading');?></h3>
		</div>

		<?php echo form_open_multipart('abm/carrera/edit/'.$carrera['id'],array("class"=>"form-horizontal")); ?>

		<?php echo $this->template->cargar_input(lang('form_name'), 'nombre', 'text', '*', form_error('nombre'), ($this->input->post('nombre') ? $this->input->post('nombre') : $carrera['nombre'])); ?>

		<?php echo $this->template->cargar_input(lang('form_plan_pdf'), 'plan_pdf', 'file', '', form_error('plan_pdf'), ($this->input->post('plan_pdf') ? $this->input->post('plan_pdf') : $carrera['plan_pdf']), 
				($carrera['plan_pdf'] != '')
					?	"<a target='_blank' href='".base_url(PDFS_UPLOAD.$carrera['plan_pdf'])."'/> 
							<p class='help-block'>".
								$carrera['plan_pdf'].
								"</p>
						</a>": '<b>* El archivo debe estar en formato PDF.</b>'
			); 
		?>

		<div class="form-group">
				<label for="imagen" class="col-md-2 control-label">Imágen</label>
				<div class="col-md-6">
					<input type="file" name="imagen" value="<?php echo ($this->input->post('imagen') ? $this->input->post('imagen') : $carrera['imagen']); ?>" class="form-control" id="imagen" />
					<p class="help-block"> <?php echo ($carrera['imagen'] ? '' : '<b>* La imágen debe estar en formato JPG o PNG.</b>'); ?> </p>
						
				</div>
				<div class="col-md-3">
					<span class="text-danger"><?php echo form_error('imagen');?></span>
					
					<?php if($carrera['imagen'] != '') echo "<a target='_blank' href='".base_url(IMAGES_UPLOAD.$carrera['imagen'])."'/>"; ?>
						
						<img style="height: 140px; width: 140px;" src="<?=base_url(IMAGES_UPLOAD.$carrera['imagen']); ?>" alt="..." class="img-thumbnail">
						
						<p class="help-block"><?php echo ($carrera['imagen'] != '' ? $carrera['imagen'] : 'SIN IMAGEN'); ?></p>
					
					<?php if($carrera['imagen'] != '') echo "</a>"; ?>

				</div>
		</div>



		<?php echo $this->template->cargar_textarea(lang('form_presentation'), 'presentacion', '', form_error('presentacion'), ($this->input->post('presentacion') ? $this->input->post('presentacion') : $carrera['presentacion'])); ?>

		<?php echo $this->template->cargar_textarea(lang('form_career_profile'), 'perfil', '', form_error('perfil'), ($this->input->post('perfil') ? $this->input->post('perfil') : $carrera['perfil'])); ?>

		<?php echo $this->template->cargar_submit(); ?>
				
	<?php echo form_close(); ?>	
	<br><br>
	</div>
</div>

<script>
    CKEDITOR.replace( 'presentacion' );
    CKEDITOR.replace( 'perfil' );
</script>