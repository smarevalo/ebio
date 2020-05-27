<!-- Left Side Menu/Navbar -->		
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">					
		<!-- Sidebar Menu -->
		
		<ul class="sidebar-menu">

			<li class="header">MENU</li>

			<?php if(isset($usuarios)) ?>
					<?=$usuarios?>

			<?php /* ?>
			<li>
				<a href="<?php echo base_url();?>auth/change_password"><i class="fa fa-link"></i> <span>Modificar Contraseña</span></a>
			</li>
			*/ ?>
			<?php if(isset($abm)) ?>
					<?=$abm?>

		</ul>
		<!-- /.sidebar-menu -->
	</section>
	<!-- /.sidebar -->
</aside>