    
    <?php  
        $ci = &get_instance();
        $ci->load->model("Carrera_model");
        $carreras= $ci->Carrera_model->getAllActivates();

        $ci2 = &get_instance();
        $ci2->load->model("Publicaciones_model");
        $tipo_publicaciones = $ci2->Publicaciones_model->getTipos();
        foreach ($tipo_publicaciones as $tipo) {
             $p[$tipo->id]= $ci2->Publicaciones_model->hay_publicaciones($tipo->id);
        }

        $ci3 = &get_instance();
        $ci3->load->model("Cursos_model");
        $cursos = $ci3->Cursos_model->hay_cursos();        
    ?>
    
    <nav class="navbar navbar-escuela bg-escuela navbar-expand-lg margen-inf" style="background-color: <?= $escuela['color'] ?>">
		
		<a class="navbar-brand" href="<?= base_url('') ?>">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="logo">
        </a>
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
		</button>
        
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			
            <ul class="navbar-nav mr-auto">
                        
                <li class="nav-item btn-group">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Carreras 
                    </a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <?php foreach ($carreras as $row) {?>
                        <a class="nav-link dropdown-item" href="<?= base_url("/carrera/".$row->id) ?>"><?=$row->nombre;?></a>
                    <?php } ?>    
                    </div>
				</li>
				
                <li class="nav-item">
                    <a class="nav-link menu" href="<?= base_url('docentes') ?>">Docentes</a>
				</li>

                <?php if($cursos == TRUE){ ?>
                <li class="nav-item">
                    <a class="nav-link menu" href="<?= base_url('cronograma') ?>">Cursos</a>
                </li>
                <?php } ?>
                
                <?php foreach ($tipo_publicaciones as $tipo) {?>
                    <?php if ($p[$tipo->id]) { ?>
                    <li class="nav-item">
                        <a class="nav-link menu" href="<?= base_url("/publicaciones/".$tipo->id) ?>"><?=$tipo->nombre;?></a>
                    </li>
                    <?php } ?>
                <?php } ?>  

            </ul>              
		</div>
	</nav>
