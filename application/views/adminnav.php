<li class="nav-item btn-group">
    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ABM 
    </a>
    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="<?= base_url('docente/listar') ?>">Docentes</a>
        <a class="dropdown-item" href="<?= base_url('carrera/listar') ?>">Carreras</a>
        <a class="dropdown-item" href="<?= base_url('asignatura/listar') ?>">Asignaturas</a>
        <a class="dropdown-item" href="<?= base_url('plan/listar') ?>">Planes</a>
    </div>
</li>

<li class="nav-item btn-group">
    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Permisos 
    </a>
    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="<?= base_url('user/listargrupos') ?>">Grupos</a>
        <a class="dropdown-item" href="<?= base_url('user/listarpermisos') ?>">Permisos</a>
        <a class="dropdown-item" href="<?= base_url('user/listargrupospermisos') ?>">Permisos de grupo</a>
        <a class="dropdown-item" href="<?= base_url('user/listarusersgrupos') ?>">Usuarios</a>
    </div>
</li>

<li class="nav-item btn-group">
    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Test 
    </a>
    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="<?= base_url('tests/docenteTest') ?>">Docentes</a>
        <a class="dropdown-item" href="<?= base_url('tests/carreraTest') ?>">Carreras</a>
        <a class="dropdown-item" href="<?= base_url('tests/asignaturaTest') ?>">Asignaturas</a>
    </div>
</li>

<li class="nav-item">
	<a class="nav-link" href="<?= base_url('user/logout') ?>">Cerrar Sesión</a>
</li>
