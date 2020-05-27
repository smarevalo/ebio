
<main>
    <div class="container">
        <h1>Cronograma de Cursos</h1>

        <button class="navbar-toggler mobile" type="button" data-toggle="collapse" data-target="#menu2" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="far fa-calendar-alt"></i></span>
        </button>

        <div class="col-1 collapse mobile" id="menu2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php foreach ($meses as $mes) {?>
                        <a class="nav-link" id="v-pills-home-tab" data-toggle="tab" href="#<?=$mes;?>" role="tab" aria-controls="v-pills-home" aria-selected="true"><?=$mes;?></a>
                    <?php } ?>
                </div>
            </div>

        <div class="row">
            <div class="col-1 no_mostrar" id="menu">
                <div class="nav flex-column nav-pills no_mobile" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php foreach ($meses as $mes) {?>
                        <a class="nav-link" id="v-pills-home-tab" data-toggle="tab" href="#<?=$mes;?>" role="tab" aria-controls="v-pills-home" aria-selected="true"><?=$mes;?></a>
                    <?php } ?>
                </div>
            </div>

            <div class="container col-10">
                <div class="container tab-content card">
                    <?php foreach ($meses as $key => $mes ) {?>
                        <div class="tab-pane <?php if($key == (int)date("m")) echo'fade fade in show active'; ?> " id="<?=$mes;?>" role="tabpanel">
                            <h3><?=$mes;?></h3>

                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="no_mostrar"></th>
                                        <th><a>Fecha</a></th>
                                        <th class="no_mostrar"><a>Modalidad<a/></th>
                                        <th><a>Curso</a></th>
                                        <th class="no_mostrar"><a>Profesor</a></th>
                                    </tr>
                                </thead>
                                
                                <tbody class="contenidobusqueda">
                                        
                                    <?php foreach ($cursos[$key] as $curso) { ?>
                                        <tr onclick="window.location='<?= $curso->enlace ?>'" class="pointer" > 
                                            <td class="no_mostrar"> 
                                                <a href="">
                                                    <i class="fas fa-search-plus"></i>
                                                </a>
                                            </td>
                                            <td width="135px">
                                                <?php 
                                                    if(strcmp($curso->fecha_inicio, $curso->fecha_fin) <> 0){
                                                        echo 'Desde '.date("d.m.y", strtotime($curso->fecha_inicio)).'<br>Hasta  '.date("d.m.y", strtotime($curso->fecha_fin));
                                                    }
                                                    else{
                                                        echo date("d.m.y", strtotime($curso->fecha_inicio));
                                                    } 
                                                ?>
                                            </td>
                                            <td class="no_mostrar" width="150px"><?=$curso->modalidad ?></td>
                                            <td width="400px"><?=$curso->nombre?> </td>
                                            <td class="no_mostrar" width="150px"><?=$curso->profesor?> </td>
                                        </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>

                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
    <br>
</main>
