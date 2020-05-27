<?php
 
class Regimen_model extends CI_Model
{
    public function get_regimen($id)
    {
        return $this->db->get_where('regimen',array('id'=>$id))->row_array();
    }

    public function get_all_regimen_count()
    {
        $this->db->from('regimen');
        return $this->db->count_all_results();
    }

    public function get_all_regimen()
    {
        $this->db->order_by('id', 'asc');
        return $this->db->get('regimen')->result();
    }

    public function add_regimen($params)
    {
        $this->db->insert('regimen',$params);
        return $this->db->insert_id();
    }

    public function update_regimen($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('regimen',$params);
    }

    public function delete_regimen($id)
    {
        return $this->db->delete('regimen',array('id'=>$id));
    }
    
}
