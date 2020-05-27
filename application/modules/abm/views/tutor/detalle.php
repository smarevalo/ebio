<?php if(isset($alerta))  {  
	echo $alerta;
	}
?>

<div class="col-lg-12">
	<div class="box box-success">

		<div class="box-header with-border">
		  	<h3 class="box-title"><?php echo lang('title_projects');?></h3>
		  	<br><br>
		
		    <?php echo $this->template->get_perfil_docente($id_docente); ?>

		    <?php foreach ($proyectos as $proyecto) { ?>
			    <div class="col-lg-11">
				    <div class="panel panel-default">
				      <div class="panel-heading">
				      <h4 class="panel-title"><strong><?= $proyecto['tipo']->titulo ?></strong></h4>
				      </div>
				      <div class="panel-body">
				        <table class="table profile__table">
				          	<tbody>
				                <?php
				                	if (count($proyecto)==1){
							   			echo '<hr style="border: 1px solid;">';
							   			echo "No tiene ".$proyecto['tipo']->titulo. " activo";
							   		}
							   		echo '<hr style="border: 1px solid;">'; 	
							   		foreach ($proyecto as $key => $p) {
							   			if(strcmp($key, 'tipo') != 0) {
							   	?>
							   				<tr><td colspan="3">Título de proyecto: <b><?=	strtoupper($p->titulo) ?></b></td></tr>
							   				<tr>
							   					<td>Institución: <b><?= $p->razon_social ?></b></td>
							   					<td>CUIT Nº: <?=$p->cuit ?></td>
							   					<td>Dirección: <?=	$p->direccion ?></td>
							   				</tr>
							   				<tr>
							   					<td>Estudiante: <?=	$p->estudiante ?></td>
							   					<td>Legajo: <?=	$p->legajo ?></td>
							   					<td>DNI: <?=	$p->dni ?></td>
							   				</tr>
							   				<tr><td colspan="3"><hr style="border: 1px solid;"></td></tr>
							   	<?php
							   			}
							    	}							    	
							    ?>
				          	</tbody>
				        </table>
				      </div>
				    </div>
				</div>
			<?php }  ?>

		</div>
		<br>
	</div>
</div>