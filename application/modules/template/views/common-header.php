<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!-- This is a starter template page. Use this page to start your new project from scratch. This page gets rid of all links and provides the needed markup only. -->
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Admin Panel</title>
	 	<!-- Tell the browser to be responsive to screen width -->
	 	<link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon.png') ?>" />
	 	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	 	<!-- jQuery 2.2.3 -->
		<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/ckfinder/ckfinder.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/script.js"></script>
	 	<!-- Bootstrap 3.3.6 -->
	 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
	 	<!-- Font Awesome 
	 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	 	<!-- Ionicons 
	 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
	 	<!-- DataTables -->
	 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
	 	<!-- Theme style -->
	 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
	 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/main.css">
	 	<!-- AdminLTE Skins -->
	 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/skin-green.min.css">
	 	<!-- iCheck -->
	 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/green.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome/css/all.css">
	 	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	 	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	 	<!--[if lt IE 9]>
		  	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	 	<![endif]-->
	</head>