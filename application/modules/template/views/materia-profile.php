 <!-- Course info -->
<div class="col-lg-11">
    <div class="panel panel-default">
      <div class="panel-heading">
      <h4 class="panel-title"><strong><?= $ciclo_materia['codigo'].' - '.$ciclo_materia['nombre']; ?></strong></h4>
      </div>
      <div class="panel-body">
        <table class="table profile__table">
          <tbody>
            <tr>
                <td>Carrera: &nbsp;&nbsp;&nbsp;
                    <b><?= $this->template->get_item($ciclos, $ciclo_materia['id_ciclo'], 'carrera');?></b>
                </td>
                <td>Plan: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b><?= $this->template->get_item($ciclos, $ciclo_materia['id_ciclo'], 'plan');?></b>
                </td>
            </tr>
            <tr>
                <td>Ciclo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b><?= $this->template->get_item($ciclos, $ciclo_materia['id_ciclo'], 'nombre');?> </b>
                </td>
                <td>Orientación: &nbsp;&nbsp;
                    <b><?= $this->template->get_item($ciclos, $ciclo_materia['id_ciclo'], 'orientacion');?></b>
                </td>
            </tr>
            <tr>
                <td>Año: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b><?= $ciclo_materia['anio'] ?></b>
                    <br>
                    Régimen: &nbsp;
                    <b><?= $this->template->get_item($regimenes, $ciclo_materia['id_regimen'], 'nombre');?> </b>
                </td>
                <td>Tipo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b><?= $this->template->get_item($tipos, $ciclo_materia['id_tipo'], 'nombre');?> </b>
                </td>
            </tr>
          </tbody>
        </table>

        <?php echo anchor("abm/ciclo_materia/edit/".$ciclo_materia['id'], '<span class="btn btn-primary btn-md col-md-3 col-md-offset-9">Editar</span>') ;?>
      </div>
    </div>
</div>



