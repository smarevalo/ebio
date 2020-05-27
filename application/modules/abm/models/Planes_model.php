<?php
 
class Planes_model extends CI_Model
{
    public function get_planes($id)
    {
        return $this->db->get_where('planes',array('id'=>$id))->row_array();
    }

    public function get_carrera_by_plan($id_plan)
    {
        $this->db->select('planes.id_carrera');
        $this->db->from('planes');
        $this->db->where('planes.id', $id_plan);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function get_all_planes_count()
    {
        $this->db->from('planes');
        return $this->db->count_all_results();
    }

    public function get_all_planes()
    {
        $this->db->select('planes.*, carrera.nombre as carrera');    
        $this->db->from('planes');
        $this->db->join('carrera', 'carrera.id = planes.id_carrera', 'LEFT');
        $this->db->order_by('planes.id', 'desc');
        return $this->db->get()->result();
    }

    public function get_all_planes_by_carrera($id_carrera)
    {
        $this->db->select('planes.*, carrera.nombre as carrera');    
        $this->db->from('planes');
        $this->db->join('carrera', 'carrera.id = planes.id_carrera', 'LEFT');
        $this->db->where('planes.id_carrera', $id_carrera);
        $this->db->order_by('planes.id', 'desc');
        return $this->db->get()->result();
    }

    public function add_planes($params)
    {
        $this->db->insert('planes',$params);
        return $this->db->insert_id();
    }

    public function update_planes($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('planes',$params);
    }

    public function delete_planes($id)
    {
        return $this->db->delete('planes',array('id'=>$id));
    }

    public function change_status($id, $params)
    {
        $this->db->where('id',$id);
        return $this->db->update('planes',$params);
    } 

    public function existe_plan_carrera($plan)
    {
        $subQuery = $this->db->get_where('planes', array('id' => $plan))->result();

        $this->db->select('COUNT(id) as cantidad');    
        $this->db->from('planes');
        $this->db->where('planes.id_carrera', $subQuery[0]->id_carrera); 
        $this->db->where('planes.vigente', 1); 

        return $this->db->get()->result();
    }
    
}
