<main>
	<div class="container">
	<div class="row" >
					
	    
	    <div class="receipt-main col-md-12">				
				<div class="row">
					<div class="receipt-header receipt-header-mid">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="receipt-left">
								<h1 style="text-decoration: underline; text-align: left;"><?=$docente[0]->nombre.' '.$docente[0]->nombre_2;?> <?=$docente[0]->apellido;?></h1>
							</div>
						</div>
						<div class="col-xs-8 col-sm-8 col-md-8 text-left">
							<div class="receipt-right">
								<h5><?=$docente[0]->categoria;?></h5>
								<?php if(!empty($docente[0]->email1)){ ?> 
										<p><span><i class="far fa-envelope"></i>   </span>    <?=$docente[0]->email1;?></p>
								<?php } ?>
								<?php if(!empty($docente[0]->email2)){ ?>	
										<p style="text-align: justify;"><span><i class="far fa-envelope"></i>   </span><?=$docente[0]->email2;?></p>
								<?php } ?>
							</div>
						</div>
					</div>
	            </div>

	            <div class="receipt-header receipt-header-mid">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="receipt-left">
							<?php if(!empty($docente[0]->descripcion)){ ?>	
									<p><?=$docente[0]->descripcion;?></p>
							<?php } ?>
						</div>
					</div>
				</div>
				
				<div class="receipt-header receipt-header-mid">	                
					<table class="table table-bordered">
	                    <tbody>
	                        <?php if(!empty($docente[0]->areas)){ ?>
	                        <tr>
	                        	<td class="col-md-3"><b>Área de actuación:</b></td>
	                            <td class="col-md-9"><?=$docente[0]->areas;?></td>
							</tr>
							<?php } ?>
	                        <?php if(!empty($docente[0]->experticia)){ ?>
	                        <tr>
	                        	<td class="col-md-3"><b>Experticia:</b></td>
	                            <td class="col-md-9"><?=$docente[0]->experticia;?></td>
							</tr>
							<?php } ?>
							<?php if(!empty($docente[0]->grado)){ ?>
	                        <tr>
	                        	<td class="col-md-3"><b>Grado:</b></td>
	                            <td class="col-md-9"><?=$docente[0]->grado;?></td>
							</tr>
							<?php } ?>
							<?php if(!empty($docente[0]->especializacion)){ ?>
	                        <tr>
	                        	<td class="col-md-3"><b>Especialización:</b></td>
	                            <td class="col-md-9"><?=$docente[0]->especializacion;?></td>
							</tr>
							<?php } ?>
							<?php if(!empty($docente[0]->maestria)){ ?>
	                        <tr>
	                        	<td class="col-md-3"><b>Maestria:</b></td>
	                            <td class="col-md-9"><?=$docente[0]->maestria;?></td>
							</tr>
							<?php } ?>
							<?php if(!empty($docente[0]->doctorado)){ ?>
	                        <tr>
	                        	<td class="col-md-3"><b>Doctorado:</b></td>
	                            <td class="col-md-9"><?=$docente[0]->doctorado;?></td>
							</tr>
							<?php } ?>
	                    </tbody>
	                </table>
	            </div>				
	    </div>    
		
		
	</div>	
	</div>
</main>
