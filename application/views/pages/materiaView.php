<main>
	<b><a href="<?= base_url('/carrera/verCarrera/'.$materia[0]->id_carrera)?>">Volver al plan</a></b>
	<ul class="nav nav-tabs nav-justified">
		<li class="nav-item">
			<h1>Asignatura</h1>
		</li>
	</ul>

	<!-- Materias Genericas -->
	<?php if($materia[0]->id_tipo == '2'){ ?>
		<div class="container tab-content card" >
		<table class="table table-striped sombreado">
			<thead>
				<tr>
                    <th colspan="6"><h3>Optativas</h3></th>
                	<th>Orientación</th>
                </tr>
			</thead>

            <tbody>
				<?php 
					foreach ($optativas as $row) 
					{?>
						<tr>
							<td colspan="6">
								<a href="<?= base_url('/materia/verMateria/'.$row->id_materia)?>">
									<?=$row->optativa;?>
								</a>
							</td>
							<td colspan="6">
									<?=$row->orientacion;?>
							</td>
						</tr>	
				  <?php } ?>
					
			</tbody>
        </table>
    	</div>

	<!-- Materias Comunes -->
	<!-- Tabla de carreras -->
	<?php } else { ?>
	<div class="container tab-content card" >
		<table class="table table-striped sombreado">
			<tr><h3><?= $materia[0]->nombre; ?></h3></tr>
			<thead class="thead-escuela">
				<tr>
					<th><a >Carrera</a></th>
					<?php if(isset($pr[0]->orientacion)) { ?><th><a>Orientación</a></th> <?php } ?>
					<th><a >Programa</a></th>
					<th><a >Año</a></th>
					<th><a >Regimen</a></th>
					<th><a >Plan</a></th>
					<th><a >Total Hs</a></th>
				</tr>
			</thead>

            <tbody>
				<?php foreach ($pr as $key => $row) {?>
					<tr> 
						<td><?=$row->carrera;?></td>
						<?php if(isset($row->orientacion)) { ?><td><?=$row->orientacion;?></td> <?php } ?>
						<td>
							<?php 
								if (empty($row->programa))
								{ 
									echo "- - -"; 
								} 
								else 
								{ 
								?>	
									<a href="<?= base_url($row->programa); ?>" target="blank">
										Ver Programa
									</a>
							<?php } ?>
						</td>
						<td><?=$row->anio;?></td>
						<td><?=$row->regimen;?></td>
						<td><?=$row->plan;?></td>
						<td><?=$row->hs_total;?></td>
						
					</tr>
				<?php } ?>
			</tbody>
        </table>
    </div>
	<!-- Fin Tabla Carrera -->

    <hr>

	<!-- Tabla Equipo -->
	<div class="container tab-content card" >
		<table class="table table-hover sombreado">
			<thead class="thead-escuela">
				<tr>
                    <th colspan="6"><h3>EQUIPO</h3></th>
                </tr>
			</thead>

			<?php if(!empty($equipo)) { ?>
            <tbody>
				<?php foreach ($equipo as $row) {?>
					<tr> 
						<td colspan="2">
							<a href="<?= base_url('/docente/verDocente/'.$row->id_docente)?>">
								<?=strtoupper($row->apellido);?>, <?=strtoupper($row->nombre);?>
							</a>
						</td>
						<td colspan="2"><?=$row->descripcion;?></td>
						<td colspan="2"><?=$row->email1;?></td>
					</tr>
				<?php } ?>
			</tbody>

			<?php } else { ?>
					<tbody>
						<tr>
							<td>A DETERMINAR</td>
						</tr>
					</tbody>
			<?php } ?>
        </table>
    </div>
	<!-- Fin Tabla Equipo -->

	<hr>

	<!-- Tabla Correlatividades -->
	<div class="container tab-content card" >
		<table class="table table-striped sombreado">
			<thead class="thead-escuela">
				<tr>
					<th><h3>CORRELATIVIDADES</h3></th>
				</tr>
			</thead>
        </table>

		<table class="table table-striped sombreado">
			<thead>
				<tr>
                    <th colspan="6"><h3>Regularizada para Cursar</h3></th>
                </tr>
			</thead>

            <tbody>
				<?php 
					if(empty($regulCursar)) {echo "<tr><td colspan='6'><hr></td></tr>";}
					else
					{
						foreach ($regulCursar as $row) 
						{?>
							<tr>
								<td colspan="6">
									<a href="<?= base_url('/materia/verMateria/'.$row->id_materia)?>">
										<?=$row->id_materia;?> - <?=$row->correlativa;?>
									</a>
								</td>
							</tr>	
				  <?php }
					} ?>
			</tbody>
        </table>

		<table class="table table-striped sombreado">
			<thead>
				<tr>
                    <th colspan="6"><h3>Aprobada para Cursar</h3></th>
                </tr>
			</thead>

            <tbody>
				<?php 
					if(empty($aprobadaCursar)) {echo "<tr><td colspan='6'><hr></td></tr>";}
					else
					{
						foreach ($aprobadaCursar as $row) 
						{?>
							<tr>
								<td colspan="6">
									<a href="<?= base_url('/materia/verMateria/'.$row->id_materia)?>">
										<?=$row->id_materia;?> - <?=$row->correlativa;?>
									</a>
								</td>
							</tr>	
				  <?php }
					} ?>
			</tbody>
        </table> 

		<table class="table table-striped sombreado">
			<thead>
				<tr>
                    <th colspan="6"><h3>Aprobada para Rendir</h3></th>
                </tr>
			</thead>

            <tbody>
				<?php 
					if(empty($aprobadaRendir)) {echo "<tr><td colspan='6'><hr></td></tr>";}
					else
					{
						foreach ($aprobadaRendir as $row) 
						{?>
							<tr>
								<td colspan="6">
									<a href="<?= base_url('/materia/verMateria/'.$row->id_materia)?>">
										<?=$row->id_materia;?> - <?=$row->correlativa;?>
									</a>
								</td>
							</tr>	
				  <?php }
					} ?>
			</tbody>
        </table>
    </div>
	<!-- Fin Tabla Correlatividades -->
	<?php } ?>
	<hr>

</main>
