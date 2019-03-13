    <main>

        <div class="container">
            <h1>Docentes</h1>

            <div class="row">    
                <input type="text" class="form-control" placeholder="Buscar..." id="entradafilter">
            </div>

            <table class="table table-hover" id="myTable">
                <thead>
                    <tr>
                        <th></th>
                        <th><a>Nombre</a></th>
                        <th><a>Apellido<a/></th>
                        <th><a>Mail</a></th>
                    </tr>
                </thead>
                
				<tbody class="contenidobusqueda">
					<?php foreach ($listado as $row) {?>
						<tr> 
							<td> 
								<a href="<?= base_url('/docente/verDocente/'.$row->id)?>">
									<i class="fas fa-search-plus"></i>
								</a>
							</td>
							<td><?=$row->nombre.' '.$row->nombre_2;?></td>
							<td><?=$row->apellido;?></td>
							<td><?=$row->email1;?></td>
						</tr>
					<?php } ?>
				</tbody>
            </table>
    
        </div>

		<hr>

    </main>
