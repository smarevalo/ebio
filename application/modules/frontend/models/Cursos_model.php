<?php

class Cursos_model extends CI_Model  {

	public function getCursos()
    {
		$this->db->select('*, month(cursos.fecha_inicio) mes');
      	$this->db->from('cursos');
		$this->db->where('year(cursos.fecha_inicio)', date("Y"));
        $this->db->order_by('month(cursos.fecha_inicio), day(cursos.fecha_inicio)', 'asc');
	    return $this->db->get()->result();
	}
	
	public function getCursosPorMes($mes)
    {
		$this->db->select('*, month(cursos.fecha_inicio) mes');
      	$this->db->from('cursos');
		$this->db->where('month(cursos.fecha_inicio)', $mes);
		$this->db->where('year(cursos.fecha_inicio)', date("Y"));
		$this->db->where('publicado', 1);
        $this->db->order_by('day(cursos.fecha_inicio)', 'asc');
	    return $this->db->get()->result();
	}

	public function hay_cursos()
    {
    	$this->db->select('COUNT(id) as cantidad');
      	$this->db->from('cursos');
		$this->db->where('year(cursos.fecha_inicio)', date("Y"));
		$this->db->where('publicado', 1);

		$cursos = $this->db->get()->result();
		if($cursos[0]->cantidad > 0){
			return TRUE;
		}
		else return FALSE;
    }
}
?>