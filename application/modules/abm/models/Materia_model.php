<?php

class Materia_model  extends CI_Model  
{
	public function get_materia($id)
    {
        return $this->db->get_where('materias',array('id'=>$id))->row_array();
    }

    public function get_all_materias_count()
    {
        $this->db->from('materias');
        return $this->db->count_all_results();
    }

    public function get_all_materias()
    {
        $this->db->select('materias.*, materias_tipo.nombre as tipo');    
        $this->db->from('materias');
        $this->db->join('materias_tipo', 'materias_tipo.id = materias.id_tipo');
        $this->db->order_by('materias.nombre', 'asc');

        return $this->db->get()->result();
    }

    public function get_all_materias_en_ciclos($params = array())
    {
        $this->db->select('materias.*, materias_tipo.nombre as tipo, ciclo_materia.id as id_ciclo');    
        $this->db->from('materias');
        $this->db->join('ciclo_materia', 'ciclo_materia.id_materia = materias.id');
        $this->db->join('materias_tipo', 'materias_tipo.id = materias.id_tipo');
        $this->db->order_by('materias.id', 'desc');
        if(isset($params) && !empty($params))
            $this->db->limit($params['limit'], $params['offset']);
        return $this->db->get()->result();
    }

    public function add_materia($params)
    {
        $this->db->insert('materias',$params);
        return $this->db->insert_id();
    }

    public function update_materia($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('materias',$params);
    }

    public function delete_materia($id)
    {
        return $this->db->delete('materias',array('id'=>$id));
    }
    
}

?>
