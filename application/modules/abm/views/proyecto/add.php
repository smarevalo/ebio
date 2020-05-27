
<div class="col-lg-12">
	<div class="box box-success">

		<div class="box-header with-border">
		  	<h3 class="box-title"><?php echo lang('create_project_heading');?></h3>
		</div>

		<?php echo form_open('abm/proyecto/add',array("class"=>"form-horizontal")); ?>

			<?php echo $this->template->cargar_select(lang('form_project_type'), 'id_tipo', '*', form_error('id_tipo'), $tipos_proyecto, $this->input->post('id_tipo')); ?>

			<?php echo $this->template->cargar_select(lang('form_institution'), 'id_institucion', '*', form_error('id_institucion'), $instituciones, $this->input->post('id_institucion')); ?>

			<?php echo $this->template->cargar_select(lang('form_tutor'), 'id_tutor', '*', form_error('id_tutor'), $tutores, $this->input->post('id_tutor')); ?>

			<?php echo $this->template->cargar_select(lang('form_student'), 'id_estudiante', '*', form_error('id_estudiante'), $estudiantes, $this->input->post('id_estudiante')); ?>

			<?php echo $this->template->cargar_input(lang('form_title'), 'titulo', 'text', '*', form_error('titulo'), $this->input->post('titulo')); ?>

			<?php echo $this->template->cargar_textarea(lang('form_observations'), 'observaciones', '', form_error('observaciones'), $this->input->post('observaciones')); ?>

			
			    	<?php $input = "<input type=\"file\" name=\"documentos[]\" value=\"\" class=\"form-control col-md-2\" id=\"documentos[]\" />"; ?>
			    	<div class="form-group">
						<label for="documentos[]" class="col-md-2 control-label">
							<span class="text-danger">*</span>Documentación
						</label>
						<div class="col-md-8">		
							<div class="field_wrapper">
				    			<div>
									<?= $input ?>
								</div>
							</div>
							<span class="text-danger"></span>
							<p class="help-block"><b></b></p>
						</div>
						<a href="javascript:void(0);" class="add_button" title="Add field"><i class="fas fa-plus-circle"></i></a>
					</div>

			<?php echo $this->template->cargar_submit(); ?>

		<?php echo form_close(); ?>		

		<br><br>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
	    var maxField = 10; //Input fields increment limitation
	    var addButton = $('.add_button'); //Add button selector
	    var wrapper = $('.field_wrapper'); //Input field wrapper
	    var fieldHTML = '<div><input type="file" class="form-control col-md-2" name="documentos[]" value=""/><a href="javascript:void(0);" class="remove_button"><i class="fas fa-backspace"></i></a></div>'; //New input field html 
	    var x = 1; //Initial field counter is 1
	    
	    //Once add button is clicked
	    $(addButton).click(function(){
	        //Check maximum number of input fields
	        if(x < maxField){ 
	            x++; //Increment field counter
	            $(wrapper).append(fieldHTML); //Add field html
	        }
	    });
	    
	    //Once remove button is clicked
	    $(wrapper).on('click', '.remove_button', function(e){
	        e.preventDefault();
	        $(this).parent('div').remove(); //Remove field html
	        x--; //Decrement field counter
	    });
	});
</script>