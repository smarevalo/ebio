<?php
 
class Orientaciones_model extends CI_Model
{
    public function get_orientaciones($id)
    {
        return $this->db->get_where('orientaciones',array('id'=>$id))->row_array();
    }

    public function get_all_orientaciones_count()
    {
        $this->db->from('orientaciones');
        return $this->db->count_all_results();
    }

    public function get_all_orientaciones()
    {
        $this->db->select('orientaciones.*, planes.nombre as plan');    
        $this->db->from('orientaciones');
        $this->db->join('planes', 'planes.id = orientaciones.id_plan', 'LEFT');
        $this->db->order_by('orientaciones.id', 'desc');
        return $this->db->get()->result();
    }

    public function get_all_orientaciones_by_carrera($id_carrera)
    {
        $this->db->select('orientaciones.*, planes.nombre as plan');    
        $this->db->from('orientaciones');
        $this->db->join('planes', 'planes.id = orientaciones.id_plan', 'LEFT');
        $this->db->where('planes.id_carrera', $id_carrera);
        $this->db->order_by('orientaciones.id', 'desc');
        return $this->db->get()->result();
    }

    public function get_orientaciones_by_plan($id_plan)
    {
        $this->db->select('orientaciones.*, planes.nombre as plan');    
        $this->db->from('orientaciones');
        $this->db->join('planes', 'planes.id = orientaciones.id_plan', 'LEFT');
        $this->db->where('orientaciones.id_plan', $id_plan);
        $this->db->order_by('orientaciones.id', 'desc');
        return $this->db->get()->result();
    }

    public function add_orientaciones($params)
    {
        $this->db->insert('orientaciones',$params);
        return $this->db->insert_id();
    }

    public function update_orientaciones($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('orientaciones',$params);
    }

    public function delete_orientaciones($id)
    {
        return $this->db->delete('orientaciones',array('id'=>$id));
    }

    public function fetch_orientaciones_by_plan($plan_id)
    {
        $this->db->select('orientaciones.id as id, orientaciones.nombre as nombre'); 
        $this->db->from('orientaciones');
        $this->db->join('planes', 'planes.id = orientaciones.id_plan');
        $this->db->where('planes.id', $plan_id);
        $query = $this->db->get()->result();
        
        $output = '<option value=""></option>';
        for ($i=0; $i < count($query); $i++) 
        { 
            $output .= '<option value="'.$query[$i]->id.'">'.$query[$i]->nombre.'</option>';
        }
        return $output;
    }

}
