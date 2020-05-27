<?php 
	$ci = &get_instance();
	$ci->load->model("abm/Proyecto_model");
    //$tipo_proyecto= $ci->Proyecto_model->get_tipos_proyecto(); 
?>

<li class="header">ABMs</li>

<li class="treeview">
	<a href="<?php echo base_url();?>abm/escuela/edit/1"><i class="fa fa-link"></i> <span>ESCUELA</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
</li>

<li class="treeview">
	<a href="<?php echo base_url();?>abm/carrera/"><i class="fa fa-link"></i> <span>CARRERAS</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
</li>


<li class="treeview">
	<a href="<?php echo base_url();?>abm/docente"><i class="fa fa-link"></i> <span>DOCENTES</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
</li>

<li class="treeview">
	<a href="<?php echo base_url();?>abm/publicaciones"><i class="fa fa-link"></i> <span>PUBLICACIONES</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
</li>

<li class="treeview">
	<a href="<?php echo base_url();?>abm/cursos"><i class="fa fa-link"></i> <span>CURSOS</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
</li>

<?php /*

<li class="treeview">
	<a href="#"><i class="fa fa-link"></i> <span>PROYECTOS</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>

	<ul class="treeview-menu"> 
		<?php 
			foreach ($tipo_proyecto as $tipo){
				echo "<li><a href=\"".base_url()."abm/proyecto/".$tipo->id."\">";
				echo $tipo->nombre;
				echo "</a></li>";
			}
		?>
		<li><a href="<?php echo base_url();?>abm/estudiante">Estudiantes</a></li>
		<li><a href="<?php echo base_url();?>abm/tutor">Tutores</a></li>
		<li><a href="<?php echo base_url();?>abm/institucion">Instituciones</a></li>
	</ul>
</li>
*/
?>