<?php

class Docente_model  extends CI_Model  {

	public function datosLista()
    {
		$query = $this->db->query('	SELECT d.id, p.nombre, p.nombre_2, p.apellido, p.email1 
									FROM docentes d
									JOIN persona p
									ON d.persona_id = p.id
									ORDER BY apellido ASC');
		return $query->result();
	}
	
	/*public function getPerfil($idDocente)
	{
		$query = $this->db->query('	
					SELECT d.id, p.nombre, p.nombre_2, p.apellido, p.email1, p.email2, p.cuit, d.id_docente_categoria ,d.descripcion, dc.nombre AS categoria
					FROM docentes d
					INNER JOIN persona p ON d.persona_id = p.id
					LEFT JOIN docente_categoria dc ON d.id_docente_categoria = dc.id
					WHERE d.id = '.$idDocente.' LIMIT 1');
		return $query->result();
    }*/

    public function getPerfil($idDocente)
	{
		$query = $this->db->query('	
					SELECT p.apellido, p.nombre, p.nombre_2, p.email1, p.email2, dc.nombre as categoria, cv.areas, cv.experticia, cv.grado, cv.especializacion, cv.maestria, cv.doctorado, d.descripcion
					FROM docentes d
					INNER JOIN cvar cv ON cv.id_docente = d.id
					INNER JOIN docente_categoria dc ON dc.id = d.id_docente_categoria 
					INNER JOIN persona p ON  p.id = d.persona_id
					WHERE d.id = '.$idDocente.' LIMIT 1');
		return $query->result();
		}
		

		
}

?>



