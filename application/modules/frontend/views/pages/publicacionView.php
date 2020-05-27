<main>
	<div class="article-clean">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-lg-offset-2 col-md-12 col-md-offset-1">
                    <div class="intro">
                        <h1 class="text-center"><?php echo $publicacion[0]->titulo;?></h1>
                        <p class="text-center"><span class="by">| por</span> <a href="#"><?php echo $publicacion[0]->creador;?></a> | <span class="date"> <?php echo date("d.m.Y", strtotime($publicacion[0]->fecha_creacion));?> |</span></p>
                    </div>
                    <div class="text">
                    	<?php if($publicacion[0]->fecha!=0){ ?>
			                    <p style='margin-left:10px' class="fecha">Fecha: <b><?= date("d.m.Y", strtotime($publicacion[0]->fecha)); ?></b></p>
			            <?php } ?>
			            <?php if($publicacion[0]->comienzo!=0){ ?>
			                    <p style='margin-left:10px'>Inicio:&nbsp <b><?=date("H:i", strtotime($publicacion[0]->comienzo));?></b></p>
			            <?php } ?>
			            <?php if($publicacion[0]->fin!=0){ ?>
			                    <p style='margin-left:10px'>Fin:&nbsp&nbsp&nbsp&nbsp <b><?=date("H:i", strtotime($publicacion[0]->fin));?></b></p>
			            <?php } ?>
                        <?php echo $publicacion[0]->contenido;?>
                    </div>
                </div>
            </div>
        </div>
    </div>

	
</main>
