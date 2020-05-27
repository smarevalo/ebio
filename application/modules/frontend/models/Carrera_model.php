<?php

class Carrera_model  extends CI_Model  {
	
	public function getCarrera($idCarrera) 
	{
		$this->db->select('carrera.*, planes.nombre as plan');
      	$this->db->from('carrera');
      	$this->db->join('planes', 'planes.id_carrera = carrera.id');
      	$this->db->where('carrera.id', $idCarrera);
      	$this->db->limit('1');

	    return $this->db->get()->result();
	}

	public function getPlan($idCarrera) 
	{
		$this->db->select('	ciclo_materia.id, ciclo_materia.codigo, ciclo_materia.id_materia, ciclo_materia.horas, 	
							ciclo_materia.hs_total, ciclo_materia.anio, 
							materias.nombre as nombre,
							regimen.id as regid, regimen.nombre as regimen, 
							planes.id as plan_id ');
      	$this->db->from('ciclos');
      	$this->db->join('ciclo_materia', 'ciclo_materia.id_ciclo = ciclos.id');
      	$this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
      	$this->db->join('orientaciones', 'orientaciones.id = ciclos.id_orientacion', 'LEFT');
      	$this->db->join('planes', 'planes.id = ciclos.id_plan');
      	$this->db->join('carrera', 'carrera.id = planes.id_carrera');
      	$this->db->join('regimen', 'regimen.id = ciclo_materia.id_regimen');
      	$this->db->join('materias_tipo', 'materias_tipo.id = materias.id_tipo');

      	$this->db->where('carrera.id', $idCarrera);
      	//$this->db->where('ciclos.id_orientacion', null);
        $this->db->where('materias.id_tipo !=', 3);
        $this->db->where('planes.vigente', 1);
      	$this->db->where('carrera.activo', 1);
      	$this->db->order_by('ciclo_materia.anio, CAST(ciclo_materia.codigo as UNSIGNED INTEGER), ciclo_materia.id_regimen');

      	return $this->db->get()->result();
	}

	public function getOrientaciones($idPlan) 
	{
		$this->db->select('orientaciones.id, orientaciones.nombre');
      	$this->db->from('orientaciones');
      	$this->db->where('orientaciones.id_plan', $idPlan);

	    return $this->db->get()->result();
	}

	public function getPlanPorOrientacion($idOrientacion) 
	{
		$this->db->select('	ciclo_materia.id, ciclo_materia.codigo, ciclo_materia.horas, ciclo_materia.hs_total, ciclo_materia.anio, 
							ciclo_materia.id_materia, 
							materias.nombre as nombre, 
							regimen.id as regid, regimen.nombre as regimen');
      	$this->db->from('ciclos');
      	$this->db->join('ciclo_materia', 'ciclo_materia.id_ciclo = ciclos.id');
      	$this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
      	$this->db->join('orientaciones', 'orientaciones.id = ciclos.id_orientacion', 'LEFT');
      	$this->db->join('planes', 'planes.id = ciclos.id_plan');
      	$this->db->join('carrera', 'carrera.id = planes.id_carrera');
      	$this->db->join('regimen', 'regimen.id = ciclo_materia.id_regimen');
      	$this->db->join('materias_tipo', 'materias_tipo.id = materias.id_tipo');

      	$this->db->where('orientaciones.id', $idOrientacion);
      	$this->db->where('ciclos.id_orientacion IS NOT NULL');

      	$this->db->order_by('ciclo_materia.anio, ciclo_materia.codigo, ciclo_materia.id_regimen');

	    return $this->db->get()->result();
	}

	public function getAllActivates() 
	{
		$this->db->select('*');
      	$this->db->from('carrera');
      	$this->db->where('carrera.activo', 1);

	    return $this->db->get()->result();
	}

	public function get_carrera($id)
    {
        return $this->db->get_where('carrera',array('id'=>$id))->row_array();
    }
    
    function get_all_carrera_count()
    {
        $this->db->from('carrera');
        return $this->db->count_all_results();
    }    
            	
}

?>
