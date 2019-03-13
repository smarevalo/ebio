<?php

class Asignatura_model  extends CI_Model  {

	public $idAsignatura; 
	public $nombre; 
	

	public function getAsignatura($idAsignatura)
    {
		$query = $this->db->query('SELECT * FROM asignatura WHERE id = '.$idAsignatura.' LIMIT 1');
		return $query->result();
	}
	
	public function getProgramaResumido($idAsignatura)
	{
		$query = $this->db->query('SELECT c.nombre AS carrera, a.nombre,p.anio,p.regimen,c.plan,p.horas_anuales, p.horas_primer_cuat , p.horas_segundo_cuat   FROM asignatura a
									INNER JOIN plan p ON a.id = p.id_asignatura
									INNER JOIN carrera c ON c.id = p.id_carrera
									WHERE a.id = '.$idAsignatura);
		return $query->result();
	}

	public function getPrograma($idAsignatura)
	{
		$query = $this->db->query('SELECT programa FROM plan WHERE id_asignatura ='.$idAsignatura);
		return $query->result();
	}

	public function getEquipo($idAsignatura)
	{
		$query = $this->db->query('	SELECT d.id, id_docente, p.nombre,p.apellido,c.descripcion, p.email1 
									FROM equipo e 
									INNER JOIN asignatura a ON e.id = a.id 
									INNER JOIN docente d ON e.id_docente = d.id 
									INNER JOIN persona p ON d.persona_id = p.id
									LEFT JOIN categoria c ON d.categoria = c.id 
									WHERE a.id = '.$idAsignatura.' ORDER BY c.id');
		return $query->result();
	}

	public function getCorrelatividades($idAsignatura, $tipo)
	{
		$query = $this->db->query("SELECT p.codigo,a.nombre AS correlativa, a.id id_asignatura
									FROM correlatividad c
									INNER JOIN plan p ON c.id = p.id
									INNER JOIN  asignatura a ON p.id_asignatura = a.id
									INNER JOIN tipo_correlatividad tc ON c.tipo = tc.id
									WHERE c.correlativade IN (SELECT id 
																FROM plan 
																WHERE id_asignatura = $idAsignatura) 
									AND c.tipo = $tipo");
		return $query->result();
	}

}

?>
