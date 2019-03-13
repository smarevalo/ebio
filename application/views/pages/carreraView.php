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
			<div class="tab-pane fade in show active" id="panel1" role="tabpanel">
				<?=$carrera[0]->presentacion;?>
            </div>


			<div class="tab-pane fade" id="panel2" role="tabpanel">

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
							<th>Hs Anuales</th>
						</tr>
                    </thead>

                    <tbody>
						<?php foreach ($plan as $row) {?>
							<tr> 
								<td>
									<a href="<?= base_url('/asignatura/verAsignatura/'.$row->id_asignatura)?>">
										<i class="fas fa-search-plus"></i>
									</a>
								</td>
								<td><?=$row->codigo;?></td>
								<td><?=$row->nombre;?></td>
								<td><?=$row->anio;?></td>
								<td><?=$row->regimen;?></td>
								<td><?php if ($row->horas_primer_cuat == 0) echo '-'; else echo $row->horas_primer_cuat?></td>
								<td><?php if ($row->horas_segundo_cuat == 0) echo '-'; else echo $row->horas_segundo_cuat?></td>
								<td><?php if ($row->horas_anuales == 0) echo '-'; else echo $row->horas_anuales?></td>
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
