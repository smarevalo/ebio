<?php

class Materia_model  extends CI_Model  {

	public function getMateria($idMateria)
  {
      $this->db->select('ciclo_materia.id as ciclo_materia_id, materias.nombre, materias.id_tipo, carrera.id AS id_carrera, carrera.nombre AS nom_carrera');
      $this->db->from('carrera');
      $this->db->join('planes', 'planes.id_carrera = carrera.id');
      $this->db->join('ciclos', 'ciclos.id_plan = planes.id');
      $this->db->join('ciclo_materia', 'ciclo_materia.id_ciclo = ciclos.id');
      $this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
      $this->db->where('ciclo_materia.id', $idMateria); 
      $this->db->order_by('materias.id', 'desc');
      $this->db->limit('1');

      return $this->db->get()->result();
  }

  public function getProgramaResumido($idMateria)
  {
      $this->db->select('planes.id, carrera.nombre AS carrera, orientaciones.nombre AS orientacion, ciclo_materia.codigo, materias.nombre AS nombre, regimen.id, regimen.nombre AS regimen, ciclo_materia.horas, ciclo_materia.hs_total, ciclo_materia.anio, ciclo_materia.id_materia, ciclo_materia.programa, planes.nombre AS plan');
      $this->db->from('ciclos');
      $this->db->join('ciclo_materia', 'ciclo_materia.id_ciclo = ciclos.id');
      $this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
      $this->db->join('planes', 'planes.id = ciclos.id_plan');
      $this->db->join('carrera', 'carrera.id = planes.id_carrera');
      $this->db->join('regimen', 'regimen.id = ciclo_materia.id_regimen');
      $this->db->join('orientaciones', 'orientaciones.id = ciclos.id_orientacion', 'LEFT');
      $this->db->where('ciclo_materia.id', $idMateria); 
      $this->db->order_by('planes.id', 'desc');
      return $this->db->get()->result();
  }

	public function getEquipo($idMateria)
	{
    $this->db->select('docentes.id as id_docente, persona.nombre, persona.nombre_2, persona.apellido, docentes.descripcion, persona.email1');
    $this->db->from('docentes');
    $this->db->join('persona', 'persona.id = docentes.persona_id');
    $this->db->join('materia_docente', 'materia_docente.id_docente = docentes.id');
    $this->db->join('ciclo_materia', 'ciclo_materia.id = materia_docente.id_ciclo_materia');
    $this->db->where('ciclo_materia.id', $idMateria); 
    return $this->db->get()->result();
	}

	public function getCorrelatividades($idMateria, $tipo)
	{
    $this->db->select('destino.codigo, materias.nombre as correlativa, destino.id as id_materia');
    $this->db->from('correlativas');
    $this->db->join('ciclo_materia as origen', 'origen.id = correlativas.id_ciclo_materia');
    $this->db->join('ciclo_materia as destino', 'destino.id = correlativas.id_correlativa');
    $this->db->join('materias', 'materias.id = destino.id_materia');
    $this->db->where('origen.id', $idMateria); 
    $this->db->where('correlativas.id_correlativa_tipo', $tipo); 
    return $this->db->get()->result();
	}

	public function getOptativas($idMateria)
	{
    $this->db->select('ciclo_materia.id as id_materia, materias.nombre as optativa, orientaciones.nombre as orientacion');
    $this->db->from('optativas');
    $this->db->join('ciclo_materia', 'ciclo_materia.id = optativas.id_optativa');
    $this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
    $this->db->join('ciclos', 'ciclos.id = ciclo_materia.id_ciclo');
    $this->db->join('orientaciones', 'orientaciones.id = ciclos.id_orientacion', 'LEFT');

    $this->db->where('optativas.id_origen', $idMateria);
    $this->db->order_by('orientaciones.id, materias.id');

    return $this->db->get()->result();
  }

  public function get_generica_by_optativa($id_optativa)
  {
    $this->db->select('ciclo_materia.*, regimen.nombre as regimen, optativas.id_origen');
    $this->db->from('optativas');
    $this->db->join('ciclo_materia', 'ciclo_materia.id =  optativas.id_origen');
    $this->db->join('regimen', 'regimen.id =  ciclo_materia.id_regimen');
    $this->db->where('optativas.id_optativa', $id_optativa);
    return $this->db->get()->row_array();
  }

}

?>
