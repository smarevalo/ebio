 <!-- Career info -->
 <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
      <h4 class="panel-title"><strong><?= $carrera['nombre']?></strong></h4>
      </div>
      <div class="panel-body">
     
        <table class="table profile__table">
          <tbody>
            <tr>
                <td>
                    Activa: <b><?= ($carrera['activo']==0)? "No":"Si";?></b>
                </td>
            </tr>
          </tbody>
        </table>

        <?php //echo anchor("abm/carrera/edit/".$carrera['id'], '<span class="btn btn-primary btn-md col-md-3 col-md-offset-9">Editar</span>') ;?>
      </div>
    </div>
</div>