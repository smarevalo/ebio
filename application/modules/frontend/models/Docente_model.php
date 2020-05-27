<?php

class Docente_model  extends CI_Model  {

	public function datosLista()
    {
		$this->db->select('docentes.id, persona.nombre, persona.nombre_2, persona.apellido, persona.email1 ');
      	$this->db->from('docentes');
      	$this->db->join('persona', 'persona.id = docentes.persona_id');
      	$this->db->order_by('persona.apellido', 'asc');

	    return $this->db->get()->result();
	}
	
    public function getPerfil($idDocente)
	{
		$this->db->select('	persona.apellido, persona.nombre, persona.nombre_2, persona.email1, persona.email2, 	
							          docente_categoria.nombre as categoria, 
							          cvar.areas, cvar.experticia, cvar.grado, cvar.especializacion, cvar.maestria, 
                        cvar.doctorado, 
							          docentes.descripcion');
      	$this->db->from('docentes');
      	$this->db->join('cvar', 'cvar.id_docente = docentes.id', 'LEFT');
      	$this->db->join('docente_categoria', 'docente_categoria.id = docentes.id_docente_categoria', 'LEFT');
      	$this->db->join('persona', 'persona.id = docentes.persona_id');
      	$this->db->where('docentes.id', $idDocente);
      	$this->db->limit('1');
        
	    return $this->db->get()->result();
	}
	
}

?>



