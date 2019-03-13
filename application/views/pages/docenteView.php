<main>
	<div class="row col align-self-center" >
		<div class="col-sm-3"></div>
		<div class="jumbotron col-sm-6 align-center sombreado" style="border-radius: 20px;">
			<p><b><h2><?=$docente[0]->nombre.' '.$docente[0]->nombre_2;?> <?=$docente[0]->apellido;?> </h2></b></p>
			<div class="row">
				<div class="col-sm-12">
					<p class="align-center" style="text-decoration: underline overline"><?=$docente[0]->categoria;?></p>
				</div>

			</div>
			<div class="row">
				<div class="col-sm-12">
					<p><b>Email de contacto:</b> <h5><?=$docente[0]->email1;?></h5></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<p><?=$docente[0]->descripcion;?></p>
				</div>
			</div>
		</div>
		<div class="col-sm-3"></div>
	</div>

	<hr class="extra-margins">
</main>
