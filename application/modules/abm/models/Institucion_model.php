<?php
 
class Institucion_model extends CI_Model
{
    public function get_institucion($id)
    {
        return $this->db->get_where('institucion',array('id'=>$id))->row_array();
    }

    public function get_all_institucion_count()
    {
        $this->db->from('institucion');
        return $this->db->count_all_results();
    }

    public function get_all_instituciones($params = array())
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('institucion')->result_array();
    }

    public function add_institucion($params)
    {
        $this->db->insert('institucion',$params);
        return $this->db->insert_id();
    }

    public function update_institucion($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('institucion',$params);
    }

    public function delete_institucion($id)
    {
        return $this->db->delete('institucion',array('id'=>$id));
    }
    
}
