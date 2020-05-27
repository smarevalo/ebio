<div class="container-fluid text-center">    
  	<div class="row content">
    
	    <!-- Eventos -->
	    <div class="container col-lg-2 sidenav eventos" id="tourpackages-carousel">
				<?php if(!empty($prox_even)) {?>
				<h4>Calendario de Eventos</h4>
				<?php } ?>
				<div class="row" >
					
				<?php if(!empty($prox_even)) {?>
					<div class="container card border-primary mb-3 text-center" style="width: 250px;">
							<?php echo $calendario ?>
					</div>
					<?php foreach ($prox_even as $e) { ?>
						<div class="box no_mostrar">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<a target="_BLANK" href="<?= base_url('publicacion/'.$e->id) ?>">
											<figure class="text-center">
												<?php if($e->imagen == ''){?>
													<img src="<?= base_url('assets/images/undec.jpg') ?>" alt="UNdeC">
												<?php }else{ ?>
													<img src="<?= base_url(IMAGES_UPLOAD.'publicaciones/'.$e->imagen) ?>" alt="<?= $e->imagen ?>">
												<?php } ?>
												<figcaption>
													<h5><?= $e->titulo ?></h5>
													<h6><?= date("d.m.Y", strtotime($e->fecha)) ?></h6>
												</figcaption>
											</figure>
										</a>
									</div>
								</div>
								
							</div>
						</div>
					<?php } ?>
				<?php }	?>
				</div>
			

	    </div>
	    <!-- Eventos -->

	    <!-- Carreras -->
	    <div class="container col-lg-8"> 
	    	<div class="row">
	    	  <?php (count($carreras)==1)?$tam='50rem':$tam='20rem'; ?>
		      <?php foreach ($carreras as $row) {?>
					<a href="<?= base_url("/carrera/".$row->id) ?>">
						<div class="card" style="width: <?php echo $tam ?>; border-radius: 20px;">
							<?php if ($row->imagen <> ''){ ?>
								<img class="card-img-top" style="border-radius: 20px;" src="<?= base_url(IMAGES_UPLOAD.$row->imagen) ?>" alt="<?= $row->nombre?>">
							<?php }else { ?>
								<img class="card-img-top" src="<?= base_url('assets/images/default.jpg') ?>">
							<?php } ?>
							<div class="card-body">
								<a href="<?= base_url("/carrera/".$row->id) ?>" class="btn btn-primary float-right">Ver Carrera</a>
							</div>
						</div>
					</a>
				<?php } ?> 
			</div>
	    </div>
	    <!-- Carreras -->
	    

	    <!-- Articulos -->
	    <div class="container col-lg-2 sidenav articulos no_mostrar">
			<?php if(!empty($ult_art)) {?>
				<h4>Artículos de interés</h4>
				<div class="row">
					<?php foreach ($ult_art as $a) { ?>
						<div class="col-lg-10">
						<div class="thumbnail img-thumb-bg">
							<div class="overlay">  
									<?php if($a->imagen == ''){?>
											<img src="<?= base_url('assets/images/undec.jpg') ?>" alt="UNdeC">
										<?php }else{ ?>
											<img src="<?= base_url(IMAGES_UPLOAD.'publicaciones/'.$a->imagen) ?>" alt="">
										<?php } ?>
								</div>
							<div class="caption">
								<div class="tag"><a href="#">UNdeC</a></div>
								<div class="title"><a target="_BLANK" href="<?= base_url('publicacion/'.$a->id) ?>"><?= $a->titulo ?></a></div>
								<div class="clearfix">
									<span class="meta-data">Por <a href=""><?= $a->creador ?></a> el <?= date("d.m.Y", strtotime($a->fecha_creacion)) ?></span>
								</div>
							</div>
						</div>
						</div>
					<?php } ?>
				</div>
			<?php }	?>
	    </div>
	    <!-- Articulos -->

  	</div>
</div>