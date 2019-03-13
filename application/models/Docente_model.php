<?php


class Docente_model  extends CI_Model  {

	public $idDocente; 
	public $nombre; 
	public $apellido; 
	public $categoria; 
	public $telefono; 
	public $email; 
	public $descripcion; 

	

	public function datosLista()
    {
		$query = $this->db->query('	SELECT d.id, p.nombre, p.nombre_2, p.apellido, p.email1 
									FROM docente d
									JOIN persona p
									ON d.persona_id = p.id
									ORDER BY apellido ASC');
		return $query->result();
	}
	
	public function getPerfil($idDocente)
	{
		$query = $this->db->query('	SELECT d.id, p.nombre, p.nombre_2, p.apellido, p.email1, p.email2, p.cuit, d.categoria ,d.descripcion, c.descripcion AS categoria
									FROM docente d
									JOIN persona p
									ON d.persona_id = p.id
									LEFT JOIN categoria c ON d.categoria = c.id
									WHERE d.id = '.$idDocente.' LIMIT 1');
		return $query->result();
    }

}

?>
