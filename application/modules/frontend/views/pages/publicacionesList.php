    <main>
        <button class="btn btn-default" type="button">
          <?php echo "Hoy es ".date('d - M - Y', time()); $ban=0;?>
        </button>
        <div class="container"> 
            <h1><?= (isset($listado[0]->tipo_nombre))?$listado[0]->tipo_nombre:"Publicaciones"?></h1>
            <hr>
            
            <?php if(!empty($listado)){ ?>
                <div class="row">
                    <div class="[ col-xs-12 col-sm-offset-2 col-sm-12 ]">
                        <ul class="event-list">
                            <?php foreach ($listado as $row) {?>
                                
                                <?php if ( date("m/d/Y", strtotime($row->fecha)) < date('m/d/Y', time()) && $ban==0) {
                                            
                                            if($listado[0]->tipo == 1) {
                                                echo "<hr style='border: 5px solid;'>";
                                                echo "<h3>".$listado[0]->tipo_nombre." pasados</h3>"; 
                                            }
                                            $ban=1;
                                        }
                                ?>

                                <li onclick="location.href='<?= base_url('/publicacion/'.$row->id)?>';" class="pointer">

                                    <?php if($row->fecha!=0){ ?>
                                    <time datetime="<?=$row->fecha;?>">
                                        <span class="day"><?= date("d", strtotime($row->fecha)); ?></span>
                                        <span class="month"><?= date("M", strtotime($row->fecha)); ?></span>
                                        <span class="year"><?= date("Y", strtotime($row->fecha)); ?></span>
                                    </time>
                                    <?php }else{ ?>
                                        <?php if( $row->imagen == '') {?>
                                            <img src="<?= base_url('assets/images/arrow.png')?>" alt="">
                                        <?php }else { ?>
                                            <img src="<?= base_url(IMAGES_UPLOAD.'publicaciones/'.$row->imagen) ?>" alt="<?= $row->imagen ?>">
                                        <?php } ?>

                                        
                                    <?php } ?>
                                    <div class="info">
                                        <h2 class="title"><?= $row->titulo; ?></h2>
                                        
                                        <?php if($row->fecha!=0){ ?>
                                            <p class="fecha">Fecha: <?= date("d-m-Y", strtotime($row->fecha)); ?> 
                                                    <?php if($row->comienzo!=0){ ?>
                                                        <span style='margin-left:10px'>Inicio: <b><?=date("H:i", strtotime($row->comienzo));?></b></span>
                                                    <?php } ?>
                                                    <?php if($row->fin!=0){ ?>
                                                        <span style='margin-left:10px'>Fin: <b><?=date("H:i", strtotime($row->fin));?></b></span>
                                                    <?php } ?>
                                            </p>
                                        <?php } ?>

                                        <?php if(!empty($row->lugar)){ ?>
                                            <p class="lugar">Lugar: <?=$row->lugar;?></p>
                                        <?php } ?>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php }else{ echo "No hay eventos/artículos disponibles"; }?>
            
            
            
        </div>
        
    
    </main>
