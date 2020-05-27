<main>
		<?php if (!empty($carrera[0]->plan_pdf)) { ?>
			<a class="btn btn-primary btn-lg" target='_blank' href="<?= base_url(PDFS_UPLOAD.'carreras/'.$carrera[0]->plan_pdf)?>">Descargar Plan</a>
		<?php } ?>

		<div class="container">
	        <h1 style="text-align: center; "> <?=$carrera[0]->plan;?> - <?=$carrera[0]->nombre;?></h1>

			<ul class="nav nav-pills nav-justified">
	            <li class="nav-item">
	                <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">Presentación</a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link " data-toggle="tab" href="#panel2" role="tab">Plan de Estudios</a>
	            </li> 
	            <li class="nav-item">
	                <a class="nav-link " data-toggle="tab" href="#panel3" role="tab">Perfil Egresado</a>
	            </li>
	        </ul>

	        
	        <div class="row">
				<div class="container tab-content card">
				
					<div class="tab-pane fade fade in show active" id="panel1" role="tabpanel">
						<?=$carrera[0]->presentacion;?>
		            </div>


					<div class="tab-pane fade" id="panel2" role="tabpanel">

						<table class="table table-hover">
		                    <thead>
								<tr>
									<th class="no_mostrar"></th>
									<th class="no_mostrar">Código</th>
									<th>Asignatura</th>
									<th>Regimen</th>
									<th class="no_mostrar">Hs Cuat 1</th>
									<th class="no_mostrar">Hs Cuat 2</th>
									<th class="no_mostrar">Hs Totales</th>
								</tr>
		                    </thead>

		                    <tbody>
		                    	<tr> <td colspan="8" style="text-align: center; background-color: <?= $escuela['claro'] ?>"><b>1º AÑO</b></td></tr>
								<?php foreach ($plan as $c => $row) {?>
									
									<?php if (isset($plan[$c-1]) && $plan[$c-1]->anio != $row->anio): ?>
											<tr> <td colspan="8" style="text-align: center; background-color: <?= $escuela['claro'] ?>"><b><?=$row->anio;?>º AÑO</b></td></tr>
									<?php endif ?>

									<tr onclick="window.location='<?= base_url('/materia/'.$row->id)?>'" class="pointer" >
										<td class="no_mostrar">
											<a href="<?= base_url('/materia/'.$row->id)?>">
												<i class="fas fa-search-plus"></i>
											</a>
										</td>
										<td class="no_mostrar"><?=$row->codigo;?></td>
										<td><?=$row->nombre;?></td>
										<td><?=$row->regimen;?></td>
										<td class="no_mostrar"><?php if ($row->regid == 2 || $row->regid == 1) echo $row->horas; else echo '-'?></td>
										<td class="no_mostrar"><?php if ($row->regid == 3 || $row->regid == 1) echo $row->horas; else echo '-'?></td>
										<td class="no_mostrar"><?=$row->hs_total;?></td>
									</tr>
								<?php } ?>
								
							</tbody>
						</table>
						
						<br><br>
						<?php if(!empty($orientaciones)){ ?>
							<table class="table table-hover">
								<thead>
									<tr><th colspan="8" style="text-align: center; background-color: <?= $escuela['claro'] ?>"><b>ORIENTACIONES</b></th></tr>
								</thead>
								<tbody>
									<?php foreach ($orientaciones as $value) {?>
										<tr> 
											<td colspan="8">
												<b><?= ' - '.$value->nombre ; ?></b>
											</td>
										</tr> 
									<?php } ?>
									
									<?php /*foreach ($orientacion[$value->id] as $row) {?>
											<tr>
												<td>
												<a href="<?= base_url('/materia/'.$row->id)?>">
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
										<?php }*/ ?>
								</tbody>
							</table>
						<?php } ?>


		            </div>


					<div class="tab-pane fade" id="panel3" role="tabpanel">
						<?=$carrera[0]->perfil;?>
		            </div>

				</div>
			</div>
		</div>

</main>