 <!-- Plan info -->
 <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
      <h4 class="panel-title"><strong><?= $carrera['nombre'].' - '.$plan['nombre']?></strong></h4>
      </div>
      <div class="panel-body">
        
        <table class="table profile__table">
          <tbody>
            <tr>
                <td>
                    Activo: <b><?= ($plan['vigente']==0)? "No":"Si";?></b>
                </td>
                <td>
                   Duración: <b><?= $plan['duracion']; ?> años</b>
                </td>
            </tr>
            <tr>
                <td>
                    Ciclos:
                    <ul>
                        <?php foreach ($ciclos as $c) {
                            echo '<li>'.$c->nombre.'</li>';
                            if (!is_null($c->orientacion)) {
                                echo '<ul><li>'.$c->orientacion.'</li></ul>';
                            }
                        } ?>
                    </ul>
                </td>
                <td>
                    Títulos:
                    <ul>
                        <?php foreach ($titulos as $t) {
                            echo '<li>'.$t->nombre.'</li>';
                            if (!is_null($t->orientacion)) {
                                echo '<ul><li>'.$t->orientacion.'</li></ul>';
                            }
                        } ?>
                    </ul>
                </td>
            </tr>

          </tbody>
        </table>

        <?php echo anchor("abm/planes/edit/".$plan['id'], '<span class="btn btn-primary btn-md col-md-3 col-md-offset-9">Editar</span>') ;?>
      </div>
    </div>
</div>