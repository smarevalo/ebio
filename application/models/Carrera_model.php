<?php


class Carrera_model  extends CI_Model  {

	private $idCarrera; 
	private $plan; 
	private $nombre; 
	private $presentacion; 
	private $perfil; 
	private $planPdf;
	

	public function getCarrera($idCarrera) 
	{
		$query = $this->db->query('SELECT * FROM carrera WHERE id = '.$idCarrera.' LIMIT 1');
		return $query->result();
	}

	public function getPlan($idCarrera) 
	{
		$query = $this->db->query(
			'SELECT p.id, p.codigo, a.nombre, p.regimen, p.horas_primer_cuat, p.anio, p.horas_segundo_cuat, p.horas_anuales, p.id_asignatura
			FROM carrera c
			INNER JOIN plan p ON p.id_carrera = c.id
			INNER JOIN asignatura a ON a.id = p.id_asignatura
			WHERE c.id = '.$idCarrera.'');

		return $query->result();
	}

	public function getAll() 
	{
		$query = $this->db->query('SELECT * FROM carrera');
		return $query->result();
	}
	
}

?>
