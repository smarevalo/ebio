<?php

class Escuela_model  extends CI_Model  {
	
	public function get_escuela($id)
    {
        return $this->db->get_where('escuela',array('id'=>$id))->row_array();
    }
    
    public function get_all_escuela_count()
    {
        $this->db->from('escuela');
        return $this->db->count_all_results();
    }
    
    public function get_all_escuela()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('escuela')->result();
    }

    public function add_escuela($params)
    {
        $this->db->insert('escuela',$params);
        return $this->db->insert_id();
    }

    public function update_escuela($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('escuela',$params);
    }

    public function delete_escuela($id)
    {
        return $this->db->delete('escuela',array('id'=>$id));
    }	

}

?>
