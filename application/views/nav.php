    
    <?php  
        $ci = &get_instance();
        $ci->load->model("Carrera_model");

        $carreras= $ci->Carrera_model->getAll();
    ?>
    
    <nav class="navbar navbar-escuela bg-escuela navbar-expand-lg margen-inf">
		
		<a class="navbar-brand" href="<?= base_url('') ?>">
            <img src="<?= base_url('assets/uploads/images/logo.png') ?>" alt="logo">
        </a>
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
        
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			
            <ul class="navbar-nav mr-auto">
                        
                <li class="nav-item btn-group">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Carreras 
                    </a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <?php foreach ($carreras as $row) {?>
                        <a class="dropdown-item" href="<?= base_url("/carrera/verCarrera/".$row->id) ?>"><?=$row->nombre;?></a>
                    <?php } ?>    
                    </div>
				</li>
				
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('docente/index') ?>">Docentes</a>
				</li>
                
                <?php if($this->session->userdata('logged_in')){?>
                <?php   $this->load->view('adminnav'); ?>

                <?php } else { ?>
			        <li class="nav-item">
			        <a class="nav-link" href="<?= base_url('user/login') ?>">Login</a>
			        </li>
		        <?php } ?>
				
            </ul>              
		</div>
	</nav>
