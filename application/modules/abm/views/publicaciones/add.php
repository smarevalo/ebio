<?= $this->template->boton_volver_a('abm/publicaciones/', 'Publicaciones'); ?>
<div class="col-lg-12">
	<div class="box box-success">

		<div class="box-header with-border">
		  	<h3 class="box-title"><?php echo lang('create_publication_heading');?></h3>
		</div>

		<?php echo form_open_multipart('abm/publicaciones/add',array("class"=>"form-horizontal")); ?>

			<?php echo $this->template->cargar_input(lang('form_title'), 'titulo', 'text', '*', form_error('titulo'), $this->input->post('titulo')); ?>
			
			<?php echo $this->template->cargar_input(lang('form_date'), 'fecha', 'date', '*', form_error('fecha'), $this->input->post('fecha')); ?>

			<?php echo $this->template->cargar_input(lang('form_start'), 'comienzo', 'time', '', form_error('time'), $this->input->post('time')); ?>
			<?php echo $this->template->cargar_input(lang('form_end'), 'fin', 'time', '', form_error('time'), $this->input->post('time')); ?>

			<?php echo $this->template->cargar_input(lang('form_place'), 'lugar', 'text', '', form_error('lugar'), $this->input->post('lugar')); ?>

			<?php echo $this->template->cargar_input(lang('form_image'), 'imagen', 'file', '', form_error('imagen'), $this->input->post('imagen'), $this->input->post('imagen').'*La imágen debe estar en formato JPG o PNG.'); ?>

			<?php echo $this->template->cargar_textarea(lang('form_content'), 'contenido', '', form_error('contenido'), $this->input->post('contenido')); ?>

			<?php echo $this->template->cargar_select(lang('form_type'), 'tipo', '*', form_error('tipo'), $tipos, $this->input->post('tipo')); ?>

			<div class="form-group">
				<label for="esta_publicado" class="col-md-3 control-label"><span class="text-danger">*</span>Publicar</label>
				<input type="checkbox" name="esta_publicado" id="esta_publicado" value="1">
			</div>
			
			<?php echo $this->template->cargar_submit(); ?>

		<?php echo form_close(); ?>		

		<br><br>
	</div>
</div>

<script>
    //CKEDITOR.replace( 'contenido' );
  	window.onload = function()
	{
		editor = CKEDITOR.replace('contenido');
		CKFinder.setupCKEditor( editor, '/ckfinder/' );
	}
</script>