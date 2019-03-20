<main>
        <h1 style="text-align: center; "> <?=$carrera[0]->plan;?> - <?=$carrera[0]->nombre;?></h1>

		<ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link-carrera" data-toggle="tab" href="#panel1" role="tab">Presentación</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-carrera" data-toggle="tab" href="#panel2" role="tab">Plan de Estudios</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link-carrera" data-toggle="tab" href="#panel3" role="tab">Perfil Egresado</a>
            </li>
        </ul>


		<div class="container tab-content card">
		<a href="<?= base_url('data/'.$carrera[0]->plan_pdf)?>">Descargar Plan</a>
			<div class="tab-pane fade" id="panel1" role="tabpanel">
				<?=$carrera[0]->presentacion;?>
            </div>


			<div class="tab-pane fade in show active" id="panel2" role="tabpanel">

				<table class="table table-hover">
                    <thead>
						<tr>
							<th></th>
							<th>Codigo</th>
							<th>Asignatura</th>
							<th>Año</th>
							<th>Regimen</th>
							<th>Hs Cuat 1</th>
							<th>Hs Cuat 2</th>
							<th>Hs Totales</th>
						</tr>
                    </thead>

                    <tbody>
						<?php foreach ($plan as $row) {?>
							<tr> 
								<td>
									<a href="<?= base_url('/materia/verMateria/'.$row->id)?>">
										<i class="fas fa-search-plus"></i>
									</a>
								</td>
								<td><?=$row->codigo;?></td>
								<td><?=$row->nombre;?></td>
								<td><?=$row->anio;?></td>
								<td><?=$row->regimen;?></td>
								<td><?php if ($row->regid == 2) echo $row->horas; else echo '-'?></td>
								<td><?php if ($row->regid == 3) echo $row->horas; else echo '-'?></td>
								<td><?=$row->hs_total;?></td>
							</tr>
						<?php } ?>

						<?php if(isset($orientaciones)){ ?>
							<tr><td colspan="8" align="center"><b>ORIENTACIONES</b></td></tr>
						<?php } ?>
						
						<?php foreach ($orientaciones as $value) {?>
							<tr> 
								<td colspan="8">
									<b><?php echo $value->id.' - '.$value->nombre ; ?></b>
								</td>
							</tr> 
							
							<?php  ?>
								<?php foreach ($orientacion[$value->id] as $row) {?>
									<tr>
										<td>
										<a href="<?= base_url('/materia/verMateria/'.$row->id)?>">
											<i class="fas fa-search-plus"></i>
										</a>
										</td>
										<td><?=$row->codigo;?></td>
										<td><?=$row->nombre;?></td>
										<td><?=$row->anio;?></td>
										<td><?=$row->regimen;?></td>
										<td><?php if ($row->regid == 2) echo $row->horas; else echo '-'?></td>
										<td><?php if ($row->regid == 3) echo $row->horas; else echo '-'?></td>
										<td><?=$row->hs_total;?></td>
										<?php } ?>
									</tr>
							<?php } ?>
						
					</tbody>
				</table>

            </div>


			<div class="tab-pane fade" id="panel3" role="tabpanel">
				<?=$carrera[0]->perfil;?>
            </div>

		</div>

		<hr>

</main>
