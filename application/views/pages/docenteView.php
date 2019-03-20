<main>
	<div class="row col align-self-center" >
		<div class="col-sm-3"></div>
		<div class="jumbotron col-sm-6 align-center sombreado" style="border-radius: 20px;">
			<p><b><h2><?=$docente[0]->nombre.' '.$docente[0]->nombre_2;?> <?=$docente[0]->apellido;?> </h2></b></p>
			<div class="row">
				<div class="col-sm-12">
					<p class="align-center" style="text-decoration: underline overline"><?=$docente[0]->categoria;?></p>
				</div>

			</div>
			<b>Email de contacto:</b> <br>
			<?php 
				if(isset($docente[0]->email1) && isset($docente[0]->email2)) 
					 $tam = "col-sm-6";
				else $tam = "col-sm-12"; 
			?>
			<div class="row">
				<?php if(isset($docente[0]->email1)){ ?>
				<div class="<?php echo $tam; ?>"> 
						<?=$docente[0]->email1;?>
				</div>
				<?php } ?>
				<?php if(isset($docente[0]->email2)){ ?>
				<div class="<?php echo $tam; ?>">	
						<?=$docente[0]->email2;?>
				</div>
				<?php } ?>
			</div>

			<br>
			
			<?php if(isset($docente[0]->descripcion)){ ?>
			<div class="row">
				<div class="col-sm-12">
					<h5>Descripción</h5>
					<p><?=$docente[0]->descripcion;?></p>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($docente[0]->areas)){ ?>
			<div class="row">
				<div class="col-sm-12">
					<h5><b>Área de actuación</b></h5>
					<p><?=$docente[0]->areas;?></p>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($docente[0]->experticia)){ ?>
			<div class="row">
				<div class="col-sm-12">
					<h5><b>Experticia</b></h5>
					<p align="justify"><?=$docente[0]->experticia;?></p>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($docente[0]->grado)){ ?>
			<div class="row">
				<div class="col-sm-12">
					<h5><b>Grado</b></h5>
					<p ><?=$docente[0]->grado;?></p>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($docente[0]->especializacion)){ ?>
			<div class="row">
				<div class="col-sm-12">
					<h5><b>Especialización</b></h5>
					<p><?=$docente[0]->especializacion;?></p>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($docente[0]->maestria)){ ?>
			<div class="row">
				<div class="col-sm-12">
					<h5><b>Maestria</b></h5>
					<p><?=$docente[0]->maestria;?></p>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($docente[0]->doctorado)){ ?>
			<div class="row">
				<div class="col-sm-12">
					<h5><b>Doctorado</b></h5>
					<p><?=$docente[0]->doctorado;?></p>
				</div>
			</div>
			<?php } ?>			
		</div>
		<div class="col-sm-3"></div>
	</div>

	<hr class="extra-margins">
</main>
