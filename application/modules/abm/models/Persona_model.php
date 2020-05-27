<?php
 
class Persona_model extends CI_Model
{
    public function get_persona($id)
    {
        return $this->db->get_where('persona',array('id'=>$id))->row_array();
    }

    public function get_persona_by_dni($dni)
    {
        $query = $this->db->get_where('persona',array('dni'=>$dni))->row_array();
        return $query['id'];
    }

    public function get_all_persona()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('persona')->result_array();
    }

    public function add_persona($params)
    {
        $this->db->insert('persona',$params);
        return $this->db->insert_id();
    }

    public function update_persona($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('persona',$params);
    }

    public function delete_persona($id)
    {
        return $this->db->delete('persona',array('id'=>$id));
    }
    
}
