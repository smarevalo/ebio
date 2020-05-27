<?php  
        $ci = &get_instance();
        $ci->load->model("Escuela_model");
        $carreras= $ci->Escuela_model->get_escuela(1);
?>

	<head>
		<title><?=$carreras['universidad'] ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon.png') ?>" />
		<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/mystyle.css') ?>">
		<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap4.min.css') ?>">
		<script src="<?= base_url('assets/bootstrap/fonts/fontawesome-all.js') ?>"></script>
		<script src="<?= base_url('assets/plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>
		<script src="<?= base_url('assets/plugins/popper/popper.min.js') ?>"></script>
		<script src="<?= base_url('assets/bootstrap/js/bootstrap4.min.js') ?>"></script>
		<script src="<?= base_url('assets/plugins/script.js') ?>"></script>
		<script src="<?= base_url('assets/plugins/ckeditor/ckeditor.js') ?>"></script>
		
	</head>

	
		
	
