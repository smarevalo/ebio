<!-- Teacher info -->
<div class="col-lg-11">
    <div class="panel panel-default">
      <div class="panel-heading">
      <h4 class="panel-title"><strong><?= $docente['apellido'].', '.$docente['nombre'].' '.$docente['nombre_2']; ?></strong></h4>
      </div>
      <div class="panel-body">
        <table class="table profile__table">
          <tbody>
            <tr>
                <td>Categoría: &nbsp;&nbsp;&nbsp;
                    <b><?= $this->template->get_item($categorias, $docente['id_docente_categoria'], 'nombre');?></b>
                </td>
                <td>E-Mail 1: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b><?= (empty($docente['email1']))?'': $docente['email1']; ?></b>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>E-Mail 2: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b><?= (empty($docente['email2']))?'': $docente['email2']; ?></b>
                </td>
            </tr>
          </tbody>
        </table>

        <?php echo anchor("abm/docente/edit/".$docente['id'], '<span class="btn btn-primary btn-md col-md-3 col-md-offset-9">Editar</span>') ;?>
      </div>
    </div>
</div>